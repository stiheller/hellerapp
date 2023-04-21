<?php

namespace App\Http\Controllers\Administracion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Session;
//datos
use App\Models\Administracion\Proveedor;
use App\Models\Admin\Log;

class ProveedorController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:administracion.proveedores.index')->only('index');
        $this->middleware('can:administracion.proveedores.create')->only('create', 'store');
        $this->middleware('can:administracion.proveedores.edit')->only('edit', 'update');
        $this->middleware('can:administracion.proveedores.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proveedores = Proveedor::where('eliminado', '=', 0)->get();
        return view('administracion.proveedores.index', compact('proveedores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administracion.proveedores.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //reglas de validacion
        $request->validate([
            'nombreProveedor' => 'required|min:3|max:255',
            'nombreContactoProveedor' => 'required|min:3|max:50',
            'telefonoProveedor' => 'required|min:3|max:30',
            'emailProveedor' => 'required','email',
            'cuitProveedor' => ['required', 'max:20','unique:adm_proveedores,cuitProveedor'],
            'nombreChequeProveedor' => 'required|min:3|max:255',
            'nroCbu' => ['required', 'max:30','unique:adm_proveedores,nroCbu'],
            'nombreBanco' => 'required|min:3|max:255',
            'activo' => 'required'
        ]);
        //actualizo datos del proveedor
        $proveedor = Proveedor::create($request->all());
        //inserto log
        $log = new Log;
        $log->user_id = auth()->user()->id;
        $log->ip = $request->ip();
        $log->table_id = $proveedor->id;
        $log->log_accion_id = 10;
        $log->save();
        //mensaje
        Session::flash('message','Proveedor Creado con Exito');
        //retorno
        return redirect()->route('administracion.proveedores.index');
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
        $proveedor = Proveedor::findOrFail($id);

        return view('administracion.proveedores.edit', compact('proveedor'));
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
        $proveedor = Proveedor::findOrFail($id);
        //reglas de validacion
        $request->validate([
            'nombreProveedor' => 'required|min:3|max:255',
            'nombreContactoProveedor' => 'required|min:3|max:50',
            'telefonoProveedor' => 'required|min:3|max:30',
            'emailProveedor' => 'required','email',
            'cuitProveedor' => ['required', 'max:20','unique:adm_proveedores,cuitProveedor,' . $proveedor->id],
            'nombreChequeProveedor' => 'required|min:3|max:255',
            'nroCbu' => ['required', 'max:30','unique:adm_proveedores,nroCbu,' . $proveedor->id],
            'nombreBanco' => 'required|min:3|max:255',
            'activo' => 'required'
        ]);
        //actualizo datos del proveedor
        $proveedor->update($request->all());
        //inserto log
        $log = new Log;
        $log->user_id = auth()->user()->id;
        $log->ip = $request->ip();
        $log->table_id = $proveedor->id;
        $log->log_accion_id = 11;
        $log->save();
        //mensaje
        Session::flash('message','Proveedor Actualizado con Exito');
        //retorno
        return redirect()->route('administracion.proveedores.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $proveedor = Proveedor::findOrFail($id);
        //marco como eliminado
        $proveedor->eliminado = 1;
        $proveedor->update();
        //inserto log
        $log = new Log;
        $log->user_id = auth()->user()->id;
        $log->ip = $request->ip();
        $log->table_id = $proveedor->id;
        $log->log_accion_id = 12;
        $log->save();
        //mensaje
        Session::flash('message','Proveedor Eliminado con Exito');
        //retorno
        return redirect()->route('administracion.proveedores.index');
    }

    public function rptProveedor(Request $request)
    {
       $proveedores = Proveedor::where('eliminado', '=', 0)->get();


        if(isset($request->proveedor_id))
        {
            $desde = $request->desde;
            $hasta = $request->hasta;
            $proveedor_sel = $request->proveedor_id;
            $proveedor = Proveedor::findOrFail($request->proveedor_id);
            $query="SELECT f.numeroFactura, f.detalleInternoFactura, f.eliminada, f.destinatarioFactura, e.name, cte.fecha, cte.facturado, cte.cobrado
                    FROM adm_proveedores_ctacte cte
                    INNER JOIN adm_facturas f ON f.id = cte.factura_id
                    INNER JOIN adm_facturas_estado e ON e.id = f.estado_id
                    WHERE cte.fecha BETWEEN '".$desde."' AND '".$hasta."' AND cte.proveedor_id = ".$request->proveedor_id."
                    ORDER BY cte.fecha DESC";
            $registros = DB::select(DB::raw($query));

        }else{
            $desde = Carbon::now()->subDays(30)->format('Y-m-d');
            $hasta = Carbon::now()->format('Y-m-d');
            $proveedor_sel = 0;
            $registros = array();
            $proveedor = array();
        }


        return view('administracion.proveedores.rptProveedor', compact('proveedores','proveedor','desde','hasta', 'proveedor_sel', 'registros'));
    }
}
