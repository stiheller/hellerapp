<?php

namespace App\Http\Controllers\Mantenimiento;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
/*modelos*/
use App\Models\Mantenimiento\Empresa;
use App\Models\Admin\Log;

class EmpresaController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:mnt.empresa.index')->only('index');
        $this->middleware('can:mnt.empresa.create')->only('create', 'store');
        $this->middleware('can:mnt.empresa.edit')->only('edit', 'update');
        $this->middleware('can:mnt.empresa.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empresas = Empresa::orderBy('name', 'asc')->get();
        return view('mantenimiento.empresas.index', compact('empresas'));
        //return($empresas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mantenimiento.empresas.create');
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
            'name' => ['required', 'min:3', 'max:50', 'unique:mnt_empresas,name'],
            'contacto1' => ['required', 'min:3', 'max:50'],
            'mail1' =>['required', 'email'],
            'telefono1' => ['required','min:3', 'max:30'],
            'activa' => 'required'
        ]);

        $empresa = Empresa::create($request->all());

        //inserto log
        $log = new Log;
        $log->user_id = auth()->user()->id;
        $log->ip = $request->ip();
        $log->table_id = $empresa->id;
        $log->log_accion_id = 55;
        $log->save();
        //mensje
        Session::flash('message','Empresa Creada con Exito');
        //retorno
        return redirect()->route('mnt.empresa.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empresa = Empresa::findOrFail($id);
        return view('mantenimiento.empresas.edit', compact('empresa'));

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
        $empresa = Empresa::findOrFail($id);

        $request->validate([
            'name' => ['required', 'min:3', 'max:50', 'unique:mnt_empresas,name,'.$empresa->id],
            'contacto1' => ['required', 'min:3', 'max:50'],
            'mail1' =>['required', 'email'],
            'telefono1' => ['required','min:3', 'max:30'],
            'activa' => 'required'
        ]);

        $empresa->update($request->all());

        //inserto log
        $log = new Log;
        $log->user_id = auth()->user()->id;
        $log->ip = $request->ip();
        $log->table_id = $empresa->id;
        $log->log_accion_id = 56;
        $log->save();
        //mensje
        Session::flash('message','Empresa Actualizada con Exito');
        //retorno
        return redirect()->route('mnt.empresa.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $empresa = Empresa::findOrFail($id);
        $empresa->activa = 0;
        $empresa->update();
        //inserto log
        $log = new Log;
        $log->user_id = auth()->user()->id;
        $log->ip = $request->ip();
        $log->table_id = $empresa->id;
        $log->log_accion_id = 57;
        $log->save();
        //mensje
        Session::flash('message','Empresa Eliminada con Exito');
        //retorno
        return redirect()->route('mnt.empresa.index');
    }

}
