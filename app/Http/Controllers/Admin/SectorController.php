<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Session;
use Carbon\Carbon;
//modelos
use App\Models\Admin\Sector;
use App\Models\Admin\Log;


class SectorController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.sector.index')->only('index');
        $this->middleware('can:admin.sector.create')->only('create', 'store');
        $this->middleware('can:admin.sector.edit')->only('edit', 'update');
        $this->middleware('can:admin.sector.destroy')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sectores = Sector::orderBy('Nombre', 'asc')->get();
        return view('admin.sectores.index', compact('sectores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sectores.create');
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
            'Nombre' => ['required', 'min:3','max:50','unique:sectores,Nombre'],
            'Nivel' => ['required', 'max:99','min:1'],
            'Activo' => 'required',
            'eliminado' => 'required'
        ]);

        $sector = Sector::create($request->all());
         //inserto log
         $log = new Log;
         $log->user_id = auth()->user()->id;
         $log->ip = $request->ip();
         $log->table_id = $sector->id;
         $log->log_accion_id = 52;
         $log->save();
         //mensje
         Session::flash('message','Sector Creado con Exito');
         //retorno
         return redirect()->route('admin.sector.index');
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
        $sector = Sector::findOrFail($id);
        return view('admin.sectores.edit', compact('sector') );

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
        $sector = Sector::findOrFail($id);

        $request->validate([
            'Nombre' => ['required', 'min:3','max:50','unique:sectores,Nombre,'.$sector->id],
            'Nivel' => ['required', 'max:99','min:1'],
            'Activo' => 'required',
            'eliminado' => 'required'
        ]);

        $sector->update($request->all());
         //inserto log
         $log = new Log;
         $log->user_id = auth()->user()->id;
         $log->ip = $request->ip();
         $log->table_id = $sector->id;
         $log->log_accion_id = 53;
         $log->save();
         //mensje
         Session::flash('message','Sector Actualizado con Exito');
         //retorno
         return redirect()->route('admin.sector.index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $sector = Sector::findOrFail($id);
        //marco como eliminado
        $sector->eliminado = 1;
        $sector->Activo = 0;
        $sector->update();
        //inserto log
        $log = new Log;
        $log->user_id = auth()->user()->id;
        $log->ip = $request->ip();
        $log->table_id = $sector->id;
        $log->log_accion_id = 54;
        $log->save();
        //mensje
        Session::flash('message','Sector Eliminado con Exito');
        //retorno
        return redirect()->route('admin.sector.index');

    }
}
