<?php

namespace App\Http\Controllers\Administracion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Session;
use Carbon\Carbon;

use App\Models\Administracion\Banco;
use App\Models\Administracion\BancoCtaCte;
use App\Models\Administracion\Chequera;
use App\Models\Administracion\Cheque;
use App\Models\Admin\Log;

class BancoController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:administracion.bancos.index')->only('index');
        $this->middleware('can:administracion.bancos.create')->only('create', 'store');
        $this->middleware('can:administracion.bancos.edit')->only('edit', 'update');
        $this->middleware('can:administracion.bancos.destroy')->only('destroy');
        $this->middleware('can:administracion.bancos.chequeras')->only('chequeras');
        $this->middleware('can:administracion.bancos.chequerasCreate')->only('chequerasCreate');
        $this->middleware('can:administracion.bancos.transferencia')->only('transferencia', 'transferenciaUpdate');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bancos = Banco::where('eliminado', '=', 0)->get();
        return view('administracion.bancos.index', compact('bancos'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administracion.bancos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|min:3|max:50',
            'sucursal' => ['required', 'max:50', 'unique:adm_bancos,sucursal'],
            'nroCuenta' => ['required', 'max:20', 'unique:adm_bancos,nroCuenta'],
            'nombreCuenta' => ['required','min:3', 'max:50'],
            'telefono' => ['required', 'max:50'],
            'referente' => 'required|max:50',
            'cbu' => 'required|max:22',
            'activo' => 'required'
        ]);

        $banco = Banco::create($request->all());

        //inserto log
        $log = new Log;
        $log->user_id = auth()->user()->id;
        $log->ip = $request->ip();
        $log->table_id = $banco->id;
        $log->log_accion_id = 6;
        $log->save();
        //mensje
        Session::flash('message','Banco Creado con Exito');
        //retorno
        return redirect()->route('administracion.bancos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $banco = Banco::findOrFail($id);
        return view('administracion.bancos.edit', compact('banco'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $banco = Banco::findOrFail($id);

        $request->validate([
            'nombre' => 'required|min:3|max:50',
            'sucursal' => ['required', 'max:50', 'unique:adm_bancos,sucursal,'.$banco->id],
            'nroCuenta' => ['required', 'max:20', 'unique:adm_bancos,nroCuenta,' . $banco->id],
            'nombreCuenta' => ['required','min:3', 'max:50'],
            'telefono' => ['required', 'max:50'],
            'referente' => 'required|max:50',
            'cbu' => 'required|max:22',
            'activo' => 'required'
        ]);

        $banco->update($request->all());

        //inserto log
        $log = new Log;
        $log->user_id = auth()->user()->id;
        $log->ip = $request->ip();
        $log->table_id = $banco->id;
        $log->log_accion_id = 7;
        $log->save();
        //mensje
        Session::flash('message','Banco Actualizado con Exito');
        //retorno
        return redirect()->route('administracion.bancos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $banco = Banco::findOrFail($id);
        //marco como eliminado
        $banco->eliminado = 1;
        $banco->update();
        //inserto log
        $log = new Log;
        $log->user_id = auth()->user()->id;
        $log->ip = $request->ip();
        $log->table_id = $banco->id;
        $log->log_accion_id = 8;
        $log->save();
        //mensje
        Session::flash('message','Banco Eliminado con Exito');
        //retorno
        return redirect()->route('administracion.bancos.index');
    }

    public function chequeras($id)
    {
        $banco = Banco::findOrFail($id);
        $chequeras = Chequera::where('banco_id', '=', $id)->get();

        return view('administracion.bancos.chequeras', compact('banco', 'chequeras'));

    }

    public function chequerasCreate(Request $request)
    {
        $request->validate([
            'nroDesde' => "required|numeric",
            'nroHasta' => "required|numeric",
        ]);

        //creo la chequera

        $chequera = Chequera::create([
            'nroDesde' => $request->nroDesde,
            'nroHasta' => $request->nroHasta,
            'user_id' => auth()->user()->id,
            'banco_id' =>  $request->banco,
            'activa' => 1

        ]);
        //generando los cheques
        for ($i = $request->nroDesde; $i <=$request->nroHasta; $i++)
        {
            $cheque=Cheque::create([
                'numero' => $i,
                'importe' => 0,
                'proveedor_id' => 0,
                'chequera_id' => $chequera->id,
                'user_id' => auth()->user()->id
            ]);
        }

        //inserto log
        $log = new Log;
        $log->user_id = auth()->user()->id;
        $log->ip = $request->ip();
        $log->table_id = $chequera->id;
        $log->log_accion_id = 9;
        $log->save();

        //redirecciono a menu principal
        return redirect()->route('administracion.bancos.index')->withSuccessMessage('Chequera Creada con Exito');


    }

    public function transferencia($id){

        $banco = Banco::findOrFail($id);
        $query = "SELECT B.id, B.concepto,B.ingresos, B.egresos,B.created_at, U.name, B.fecha
                    FROM adm_bancos_ctacte B
                    INNER JOIN users U ON U.id = B.user_id
                    WHERE B.banco_id = ".$id." AND B.created_at >= NOW() - INTERVAL 6 MONTH ORDER BY B.id DESC";
        $movimientos = DB::select(DB::raw($query));
        return view('administracion.bancos.transferencia', compact('banco','movimientos'));

    }

    public function transferenciaUpdate(Request $request, $id)
    {
        $banco = Banco::findOrFail($id);
        //validacion
        $request->validate([
            'monto' => 'required',
            'concepto' => 'required|min:3|max:50',
        ]);
        //grabo transferencia
        $transf = new BancoCtaCte;
        $transf->banco_id = $banco->id;
        $transf->fecha = $request->fecha;
        $transf->ingresos = $request->monto;
        $transf->egresos = 0;
        $transf->concepto = $request->concepto;
        $transf->user_id = $request->user_id;
        $transf->factura_id = 0;
        $transf->save();
        //actualizo saldo
        $newSaldo =  $banco->saldo + $request->monto;
        $banco->saldo = $newSaldo;
        $banco->update();
        //inserto el log
        $log = new Log;
        $log->user_id = auth()->user()->id;
        $log->ip = $request->ip();
        $log->table_id = $transf->id;
        $log->log_accion_id = 21;
        $log->save();
        //mensje
        Session::flash('message','Transferencia Registrada con Exito');
        //retorno
        return redirect()->route('administracion.bancos.index');
    }

    public function extracto(Request $request, $id)
    {
        /* inicializacion variables */
        $r = 0;
        $saldo = 0;
        $banco_id = $id;
        /*$desde = '2022-01-25';
        $hasta = '2022-12-31';*/


        $desde = Carbon::now()->subDays(30)->Format('Y-m-d');
        $hasta = Carbon::now()->Format('Y-m-d');


        if(isset($request->desde)){
            $desde = $request->desde;
            $hasta = $request->hasta;
            $banco_id = $request->banco_id;
        }



        /* banco */
        $banco = Banco::findOrFail($id);
        /* saldos */
        $query = "SELECT SUM(ingresos) - SUM(egresos) AS saldo
                  FROM adm_bancos_ctacte
                  WHERE banco_id = ".$banco_id." AND created_at <'".$desde." 23:59:00'";



        $result = DB::select($query);
        foreach($result as $value){
            $saldoInicial[] = intval($value->saldo);
        }
        /* movimientos */
        $query = "SELECT b.id, B.fecha ,  B.concepto,  B.ingresos, B.egresos
                    FROM adm_bancos_ctacte B
                    WHERE B.fecha BETWEEN '".$desde."' AND '".$hasta."' AND B.banco_id = ".$banco_id." ORDER BY B.id ASC";


        $extracto = DB::select(DB::raw($query));

        /* hasta aca esta controlado y correcto */

       // return($extracto);

        $data[] = ['id'=>'0', 'fecha' => $desde, 'concepto' => 'SALDO INCIAL AL DIA '.$desde, 'ingreso' => '0', 'egreso' => '0', 'saldo' => floatval($saldoInicial[0]) ];
        $saldo = floatval($saldoInicial[0]);
        foreach($extracto as $item)
        {
            $r++;
           /* if($r == 1){

                $saldo = $saldo - floatval($item->egresos);
            }*/
            if($item->ingresos > 0){
                $saldo = floatval($data[$r-1]['saldo']) + floatval($item->ingresos);
            }else{
                $saldo = floatval($data[$r-1]['saldo']) - floatval($item->egresos);
            }




            $data[] = ['id'=> $item->id, 'fecha' => $item->fecha, 'concepto' => $item->concepto, 'ingreso' => $item->ingresos, 'egreso' => $item->egresos, 'saldo' => floatval($saldo) ];

        }

        return view('administracion.bancos.extracto', compact('banco', 'data','saldoInicial','desde', 'hasta'));
    }
}

