<?php

namespace App\Http\Controllers\Administracion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Session;
use Carbon\Carbon;
//modelos
use App\Models\Administracion\Factura;
use App\Models\Administracion\Proveedor;
use App\Models\Administracion\ProveedorCtaCte;
use App\Models\Administracion\Banco;
use App\Models\Administracion\BancoCtaCte;
use App\Models\Administracion\Rubros;
use App\Models\Administracion\EstadoFactura;
use App\Models\Administracion\TipoFactura;
use App\Models\Administracion\FacturaRubro;
use App\Models\Administracion\FacturaPago;
use App\Models\Admin\Log;
//validadores
use App\Http\Requests\Administracion\RequestNewFactura;
use App\Http\Requests\Administracion\RequestEditFactura;


class FacturaController extends Controller
{
    /**
     * permisos del controlador
     */
    public function __construct()
    {
        $this->middleware('can:administracion.facturas.index')->only('index');
        $this->middleware('can:administracion.facturas.create')->only('create', 'store');
        $this->middleware('can:administracion.facturas.edit')->only('edit', 'update');
        $this->middleware('can:administracion.facturas.destroy')->only('destroy');
        $this->middleware('can:administracion.facturas.pagar')->only('pagarFactura','agregarPagoFactura', 'eliminarPagoFactura', 'procesarPagoFactura', 'anularPagoFactura');
        $this->middleware('can:administracion.facturas.imprimir')->only('imprimirFactura');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $desde = Carbon::now()->subDays(30)->Format('Y-m-d');
        $hasta = Carbon::now()->Format('Y-m-d');

        if(isset($request->desde)){
            $desde = $request->desde;
            $hasta = $request->hasta;
        }


        $facturas = Factura::whereBetween('fecha', [$desde, $hasta])
                            ->orderBy('id', 'desc')
                            ->get();

       return view('administracion.facturas.index', compact('facturas', 'desde', 'hasta'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $proveedores = Proveedor::pluck('nombreProveedor', 'id');
        $rubros = Rubros::All();
        $estados = EstadoFactura::pluck('name','id');
        $tipos = TipoFactura::pluck('tipoFactura', 'id');
        $query = 'SELECT id, `name`, 0 as infactura FROM adm_rubros WHERE activo=1';
        $rubros_in_factura = DB::select(DB::raw($query));


        return view('administracion.facturas.create', compact('proveedores', 'rubros', 'estados', 'tipos', 'rubros_in_factura'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestNewFactura $request)
    {


        /* grabo la factura en la base de Datos */
        $factura = Factura::create($request->all());
        /* grabo los rubros asignados */
        foreach($request->rubros as $item){
            $newRubro = new FacturaRubro;
            $newRubro->factura_id = $factura->id;
            $newRubro->rubro_id = $item;
            $newRubro->save();
        }
        /* inserte el movimiento en la cuenta corriente*/
        $moviento = new ProveedorCtaCte;
        $moviento->proveedor_id = $request->proveedor_id;
        $moviento->factura_id = $factura->id;
        $moviento->fecha = $request->fecha;
        $moviento->facturado = $request->importeFactura;
        $moviento->cobrado = 0.00;
        $moviento->user_id = $request->user_id;
        $moviento->save();
        //actualizo el saldo
        $proveedor = Proveedor::findOrFail($request->proveedor_id);
        $newSaldo = $proveedor->saldo + $request->importeFactura;
        $proveedor->saldo = $newSaldo;
        $proveedor->update();
        //inserto log
        $log = new Log;
        $log->user_id = auth()->user()->id;
        $log->ip = $request->ip();
        $log->table_id = $factura->id;
        $log->log_accion_id = 13;
        $log->save();
        //mensaje
        Session::flash('message','Factura Creada con Exito');
        //retorno al index
        return redirect()->route('administracion.facturas.index');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $factura = Factura::findOrFail($id);
        $proveedores = Proveedor::pluck('nombreProveedor', 'id');
        $estados = EstadoFactura::pluck('name','id')->toArray();
        $tipos = TipoFactura::pluck('tipoFactura', 'id');
        //rubos + rubros en factura
        $query = "select r.id, r.`name`,'0' as infactura
        from adm_rubros r
        WHERE
            id not in (
            SELECT r.id
            FROM adm_rubros r
            inner join adm_facturas_rubros fr
                on r.id = fr.rubro_id
            INNER JOIN adm_facturas f
                ON fr.factura_id = f.id
            where f.id =".$factura->id.")

        union ALL
         SELECT r.id,r.name,'1' as infactura
            FROM adm_rubros r
            inner join adm_facturas_rubros fr
                on r.id = fr.rubro_id
            INNER JOIN adm_facturas f
                ON fr.factura_id = f.id
            where f.id =".$factura->id;

        $rubros_in_factura = DB::select(DB::raw($query));

        return view('administracion.facturas.edit', compact('proveedores', 'estados', 'tipos', 'factura','rubros_in_factura'));
    }

    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestEditFactura $request, $id)
    {
        $factura = Factura::findOrFail($id);
        //grabo la factura en la base de Datos
        $factura->update($request->only(['tipo_id',
                                        'numeroFactura',
                                        'detalleRendicionFactura',
                                        'detalleInternoFactura',
                                        'destinatarioFactura',
                                        'estado_id',
                                        'user_id']));
        //borro los grupos existentes
        DB::table('adm_facturas_rubros')->where('factura_id', $id)->delete();
        //grabo los rubros asignados
        foreach($request->rubros as $item){
            $newRubro = new FacturaRubro;
            $newRubro->factura_id = $factura->id;
            $newRubro->rubro_id = $item;
            $newRubro->save();
        }

        //inserto log
        $log = new Log;
        $log->user_id = auth()->user()->id;
        $log->ip = $request->ip();
        $log->table_id = $factura->id;
        $log->log_accion_id = 14;
        $log->save();
        //mensaje
        Session::flash('message','Factura Actualizada con Exito');
        //retorno
        return redirect()->route('administracion.facturas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {

        //elimino la factura
        $factura = Factura::findOrFail($id);
        $factura->eliminada = 1;
        $factura->user_id = auth()->user()->id;
        $factura->update();
        //agrego contra asiento en cta cte por anulacion
        $moviento = new ProveedorCtaCte;
        $moviento->proveedor_id = $factura->proveedor_id;
        $moviento->factura_id = $factura->id;
        $moviento->fecha = $factura->fecha;
        $moviento->facturado = 0.00;
        $moviento->cobrado = $factura->importeFactura;
        $moviento->user_id = auth()->user()->id;
        $moviento->save();
        //actualizo el saldo restando el importe
        $proveedor = Proveedor::findOrFail($factura->proveedor_id);
        $newSaldo = $proveedor->saldo - $factura->importeFactura;
        $proveedor->saldo = $newSaldo;
        $proveedor->update();
        //inserto log
        $log = new Log;
        $log->user_id = auth()->user()->id;
        $log->ip = $request->ip();
        $log->table_id = $factura->id;
        $log->log_accion_id = 15;
        $log->save();
        //mensaje
        Session::flash('message','Factura Eliminada con Exito');
        //regreso al index
        return redirect()->route('administracion.facturas.index');

    }

    public function pagarFactura($id)
    {

        $factura = Factura::findOrFail($id);
        //cambio el estado a en proceso de pago
        $factura->estado_id = 6;
        $factura->user_id = auth()->user()->id;
        $factura->update();
        //busco proveedor
        $proveedor = Proveedor::findOrFail($factura->proveedor_id);
        $tipo = TipoFactura::findOrFail($factura->tipo_id);
        $bancos = Banco::where('saldo', '>', 0)->get();
        $hoy = Carbon::now()->Format('Y-m-d');
        //pagos
        $query ="SELECT p.id, p.fecha_pago,p.cheque_nro,p.retencion_nro, p.fecha_transferencia, p.transferencia_nro, p.imp_afip, p.imp_afip2, p.imp_rentas,p.imp_pago,
                b.nombre, b.nombreCuenta, b.nroCuenta, u.name AS usuario
                FROM adm_facturas_pago p
                INNER JOIN adm_bancos b ON b.id = p.banco_id
                INNER JOIN users u ON u.id = p.user_id
                WHERE p.factura_id =".$id;
        $pagos = DB::select(DB::raw($query));
        //total factura
        $totalPagado = FacturaPago::where('factura_id', '=', $id)->sum('imp_pago');


        return view('administracion.facturas.pagar', compact('factura','proveedor','tipo','bancos','hoy','pagos', 'totalPagado'));

    }

    public function imprimirFactura(Request $request, $id)
    {
        $factura = Factura::findOrFail($id);
        $proveedores = Proveedor::pluck('nombreProveedor', 'id');
        $rubros = Rubros::All();
        $ramdom = Str::random(20);

        $estados = EstadoFactura::pluck('name','id');
        $tipos = TipoFactura::pluck('tipoFactura', 'id');

        //rubos + rubros en factura
        $query = "select r.id, r.`name`,'0' as infactura
        from adm_rubros r
        WHERE
            id not in (
            SELECT r.id
            FROM adm_rubros r
            inner join adm_facturas_rubros fr
                on r.id = fr.rubro_id
            INNER JOIN adm_facturas f
                ON fr.factura_id = f.id
            where f.id =".$factura->id.")

        union ALL
         SELECT r.id,r.name,'1' as infactura
            FROM adm_rubros r
            inner join adm_facturas_rubros fr
                on r.id = fr.rubro_id
            INNER JOIN adm_facturas f
                ON fr.factura_id = f.id
            where f.id =".$factura->id;

        $rubros_in_factura = DB::select(DB::raw($query));

        //inserto log
        $log = new Log;
        $log->user_id = auth()->user()->id;
        $log->ip = $request->ip();
        $log->table_id = $factura->id;
        $log->log_accion_id = 16;
        $log->save();

        return view('administracion.facturas.print', compact('proveedores', 'rubros', 'estados', 'tipos', 'factura','ramdom', 'rubros_in_factura'));


    }

    public function agregarPagoFactura(Request $request)
    {

       $pago = FacturaPago::create($request->all());

       //inserto log
       $log = new Log;
       $log->user_id = auth()->user()->id;
       $log->ip = $request->ip();
       $log->table_id = $pago->id;
       $log->log_accion_id = 28;
       $log->save();
        //mensaje
       Session::flash('message','Pago Agregado con Exito');
       //retorno
       return redirect()->back();



    }

    public function eliminarPagoFactura(Request $request, $id)
    {
        $pago = FacturaPago::findOrFail($id);
        $pago->delete();
        //inserto log
        $log = new Log;
        $log->user_id = auth()->user()->id;
        $log->ip = $request->ip();
        $log->table_id = $pago->id;
        $log->log_accion_id = 29;
        $log->save();
        //mensje
        Session::flash('message','Pago Eliminado con Exito');
        //retorno
        return redirect()->back();

    }

    public function procesarPagoFactura(Request $request, $id)
    {
        //obtengo los datos de la factura
        $factura = Factura::findOrFail($id);
        $detalleFactura = "PAGO FACTURA NRO: ".$factura->numeroFactura;
        //adm_facturas --> cambiar estado a 3 PAGADO
        $factura->estado_id = 3;
        $factura->update();
        //adm_facturas_pagoo -- marcar a 1 pagos_procesados
        $totalPagado = FacturaPago::where('factura_id', '=', $id)->sum('imp_pago');
        FacturaPago::where('factura_id', '=', $id)->update(['pagos_procesados' => 1, 'user_id' => auth()->user()->id]);
        //adm_proveedores --> actualizar saldo
        $proveedor = Proveedor::findOrFail($factura->proveedor_id);
        $detalleFactura =  $detalleFactura ." proveedor ".$proveedor->nombreProveedor;
        $saldo = $proveedor->saldo - $totalPagado;
        $proveedor->saldo = $saldo;
        $proveedor->update();
        //adm_proveedores_ctacte --> registar el pago
        $ctacte = new ProveedorCtaCte;
        $ctacte->proveedor_id = $proveedor->id;
        $ctacte->factura_id = $factura->id;
        $ctacte->fecha = $factura->fecha;
        $ctacte->facturado = 0;
        $ctacte->cobrado =  $factura->importeFactura;
        $ctacte->user_id = auth()->user()->id;
        $ctacte->save();
        //adm_bancos --> restar del saldo
        $bco_id = FacturaPago::select('banco_id')->where('factura_id', '=', $factura->id)->first();
        $banco = Banco::findOrFail($bco_id);
        $newsaldobco = $banco[0]->saldo - $factura->importeFactura;
        $banco[0]->saldo = $newsaldobco;
        $banco[0]->update();
        //adm_bancos_ctacte --> registar todos los pagos
        $pagos = FacturaPago::where('factura_id', '=', $factura->id)->get();
        foreach ($pagos as $pago) {
            $reg = new BancoCtaCte;
            $reg->banco_id = $pago->banco_id;
            $reg->fecha = $pago->fecha_pago;
            $reg->ingresos = 0;
            $reg->egresos = $pago->imp_pago;
            $reg->concepto = $detalleFactura ;
            $reg->user_id = auth()->user()->id;
            $reg->factura_id = $pago->factura_id;
            $reg->save();
        }
        //inserto log
        $log = new Log;
        $log->user_id = auth()->user()->id;
        $log->ip = $request->ip();
        $log->table_id = $factura->id;
        $log->log_accion_id = 30;
        $log->save();
       //mensaje
       Session::flash('message','Pago Procesado con Exito');
       //retorno al index
       return redirect()->route('administracion.facturas.index');
    }

    public function anularPagoFactura($id)
    {
        //retirno la factura al estado original
        $factura = Factura::findOrFail($id);
        $factura->estado_id = 1;
        $factura->update();
        //borro los pagos
        $query = "delete  from adm_facturas_pago where factura_id =".$id;
        $pagos = DB::select(DB::raw($query));
        //mensaje
        Session::flash('message','Pago Anulado con Exito');
        //retorno al index
        return redirect()->route('administracion.facturas.index');
    }


}

