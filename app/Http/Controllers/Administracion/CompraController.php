<?php

namespace App\Http\Controllers\Administracion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;

use App\Models\Administracion\Compra;
use App\Models\Administracion\CompraEstado;
use App\Models\Administracion\CompraPrioridad;
use App\Models\Admin\Sector;
use App\Models\Admin\Log;

class CompraController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:administracion.compras.index')->only('index');
        $this->middleware('can:administracion.compras.create')->only('create', 'store');
        $this->middleware('can:administracion.compras.edit')->only('edit', 'update');
        $this->middleware('can:administracion.compras.destroy')->only('destroy');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $compras = Compra::All();
        return view('administracion.compras.index', compact('compras'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sectores = Sector::pluck('Nombre','id');
        $estados = CompraEstado::pluck('estado', 'id');
        $prioridades = CompraPrioridad::pluck('prioridad', 'id');
        return view('administracion.compras.create',compact('sectores','estados', 'prioridades'));
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
            'titulo' => 'required|min:3|max:255',
            'fecha' => 'required',
            'detallecompra' => 'required',
            'referente' => 'required|min:3|max:255',
            'monto_aprox' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'sector_id' => 'required',
            'estado_id' => 'required',
            'prioridad_id' => 'required'
        ]);
        $compra = Compra::create($request->all());
        //inserto log
        $log = new Log;
        $log->user_id = auth()->user()->id;
        $log->ip = $request->ip();
        $log->table_id = $compra->id;
        $log->log_accion_id = 18;
        //mensje
        Session::flash('message','Compra Creada con Exito');
        //retornpo
        return redirect()->route('administracion.compras.index');

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
        $compra = Compra::findOrFail($id);
        $sectores = Sector::pluck('Nombre','id');
        $estados = CompraEstado::pluck('estado', 'id');
        $prioridades = CompraPrioridad::pluck('prioridad', 'id');

        return view('administracion.compras.edit',compact('compra','sectores','estados', 'prioridades'));
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
        $request->validate([
            'titulo' => 'required|min:3|max:255',
            'fecha' => 'required',
            'detallecompra' => 'required',
            'referente' => 'required|min:3|max:255',
            'monto_aprox' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'sector_id' => 'required',
            'estado_id' => 'required',
            'prioridad_id' => 'required'
        ]);
        //graba en bd
        $compra = Compra::findOrFail($id);
        $compra->update($request->all());
        //inserto log
        $log = new Log;
        $log->user_id = auth()->user()->id;
        $log->ip = $request->ip();
        $log->table_id = $compra->id;
        $log->log_accion_id = 19;
        //mensje
        Session::flash('message','Compra Actualizada con Exito');
        //regreso
        return redirect()->route('administracion.compras.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $compra = Compra::findOrFail($id);
        $compra->eliminada = 1;
        $compra->update();
        //inserto log
        $log = new Log;
        $log->user_id = auth()->user()->id;
        $log->ip = $request->ip();
        $log->table_id = $compra->id;
        $log->log_accion_id = 20;
        //mensje
        Session::flash('message','Compra Eliminada con Exito');
        //retornpo
        return redirect()->route('administracion.compras.index');
    }
}
