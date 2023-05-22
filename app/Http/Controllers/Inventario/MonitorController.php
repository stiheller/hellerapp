<?php

namespace App\Http\Controllers\Inventario;

use App\Http\Controllers\Controller;
use App\Models\Inventario\ImagenMonitor;
use App\Models\Inventario\Monitor;
use App\Models\Inventario\Puesto;
use Illuminate\Http\Request;

class MonitorController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('inventario.monitores.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estados = [
            '1' => 'Activo',
            '0' => 'Baja',
            '2' => 'En Reparación',
            '3' => 'Desaparecido',
        ];

        /* $equipamientos = Equipamiento::pluck('descripcion', 'id'); */
        $equipamientos = Puesto::pluck('nombre', 'equipamiento_id');

        return view('inventario.monitores.create', compact('estados', 'equipamientos'));

        /* return view('inventario.monitores.create', compact('estados')); */
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
            'marca' => 'required',
            'tamanio' => 'required',
            'modelo' => 'required',
            'serial' => 'required',
        ]);

        $monitor = Monitor::create($request->all());

        return redirect()->route('inventario.monitores.index')->with('create', 'ok');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Monitor $monitore)
    {
        $monitor = $monitore;
        return view('inventario.monitores.show', compact('monitor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Monitor $monitore)
    {
        $estados = [
            '3' => 'Desaparecido',
            '2' => 'En Reparación',
            '1' => 'Activo',
            '0' => 'Baja'
        ];

        /* $equipamientos = Equipamiento::pluck('descripcion', 'id'); */
        $equipamientos = Puesto::pluck('nombre', 'equipamiento_id');
        return view('inventario.monitores.edit', compact('monitore', 'estados', 'equipamientos'));
    
        /* return view('inventario.monitores.edit', compact('monitore', 'estados')); */
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Monitor $monitore)
    {
        $request->validate([
            'marca' => 'required',
            'tamanio' => 'required',
            'modelo' => 'required',
            'serial' => 'required',
        ]);

        $monitore->update($request->all());

        return redirect()->route('inventario.monitores.index')->with('editar', 'ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Monitor $monitore)
    {
        //Acá hay que recorrer las imágenes creo. Hay que ver el cascade.
        /* if($monitore->image){
            Storage::delete($monitore->image->url);
        } */
        $monitore->delete();
        return redirect()->route('inventario.monitores.index')->with('eliminar', 'ok');
    }

    public function imagenes(Monitor $monitor){
        $imagenes = ImagenMonitor::where('monitor_id','=',$monitor->id)->get();
        return view('inventario.monitores.imagenes', compact('monitor','imagenes'));
    }
}
