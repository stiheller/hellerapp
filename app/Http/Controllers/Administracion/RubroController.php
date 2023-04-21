<?php

namespace App\Http\Controllers\Administracion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Session;

//datos
use App\Models\Administracion\Rubros;
use App\Models\Admin\Log;

class RubroController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:administracion.rubro.index')->only('index');
        $this->middleware('can:administracion.rubro.create')->only('create', 'store');
        $this->middleware('can:administracion.rubro.edit')->only('edit', 'update');
        $this->middleware('can:administracion.rubro.destroy')->only('destroy');

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rubros = Rubros::all();

        return view('administracion.rubros.index', compact('rubros'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administracion.rubros.create');
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
            'name' => ['required','min:3', 'max:50', 'unique:adm_rubros,name'],
            'activo' => 'required'
        ]);

        $rubro = Rubros::create($request->all());
         //inserto log
         $log = new Log;
         $log->user_id = auth()->user()->id;
         $log->ip = $request->ip();
         $log->table_id = $rubro->id;
         $log->log_accion_id = 36;
         $log->save();
        //mensje
        Session::flash('message','Rubro Creado con Exito');
        //retorno
        return redirect()->route('administracion.rubro.index');
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
        $rubro = Rubros::findOrFail($id);
        return view('administracion.rubros.edit', compact('rubro'));
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
        $rubro = Rubros::findOrFail($id);

        $request->validate([
            'name' => ['required', 'min:3', 'max:50', 'unique:adm_rubros,name,'.$rubro->id],
            'activo' => 'required'
        ]);

        $rubro->update($request->all());
         //inserto log
         $log = new Log;
         $log->user_id = auth()->user()->id;
         $log->ip = $request->ip();
         $log->table_id = $rubro->id;
         $log->log_accion_id = 37;
         $log->save();
        //mensje
        Session::flash('message','Rubro Actualizado con Exito');
        //retorno
        return redirect()->route('administracion.rubro.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $rubro = Rubros::findOrFail($id);
        $rubro->eliminado = 1;
        $rubro->activo = 0;
        $rubro->update();
         //inserto log
         $log = new Log;
         $log->user_id = auth()->user()->id;
         $log->ip = $request->ip();
         $log->table_id = $rubro->id;
         $log->log_accion_id = 38;
         $log->save();
        //mensje
        Session::flash('message','Rubro Eliminado con Exito');
        //retorno
        return redirect()->route('administracion.rubro.index');
    }
}
