<?php

namespace App\Http\Controllers\Inventario;

use App\Http\Controllers\Controller;
use App\Models\Inventario\Cpu;
use Illuminate\Http\Request;

class CpuController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('inventario.cpus.index');
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

        
        /* $equipamientos = Puesto::pluck('nombre', 'equipamiento_id');
        return view('inventario.cpus.create', compact('estados', 'equipamientos')); */
        
        return view('inventario.cpus.create', compact('estados'));
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
            'macaddress' => 'required',
            'procesador' => 'required',
            'ram_modelo' => 'required',
            'ram_cant_gb' => 'required',
        ]);

        $cpu = Cpu::create($request->all());

        return redirect()->route('inventario.cpus.index')->with('create', 'ok');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Cpu $cpu)
    {
        return view('inventario.cpus.show', compact('cpu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Cpu $cpu)
    {
        $estados = [
            '3' => 'Desaparecido',
            '2' => 'En Reparación',
            '1' => 'Activo',
            '0' => 'Baja'
        ];

        
        /* $equipamientos = Puesto::pluck('nombre', 'equipamiento_id');
        return view('inventario.cpus.edit', compact('cpu', 'estados', 'equipamientos')); */

        return view('inventario.cpus.edit', compact('cpu', 'estados'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cpu $cpu)
    {
        $request->validate([
            'macaddress' => 'required',
            'procesador' => 'required',
            'ram_modelo' => 'required',
            'ram_cant_gb' => 'required',
        ]);

        $cpu->update($request->all());

        return redirect()->route('inventario.cpus.index')->with('editar', 'ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cpu $cpu)
    {
        /* if($cpu->image){
            Storage::delete($cpu->image->url);
        } */

        //Atención Falta eliminar las imágenes almacenadas.!!!

        $cpu->delete();
        return redirect()->route('inventario.cpus.index')->with('eliminar', 'ok');
    }

    //Función para mostrar las imágenes del CPU:
    /* public function imagenes(Cpu $cpu){
        $imagenes = ImagenCpu::where('cpu_id','=',$cpu->id)->get();
        return view('inventario.cpus.imagenes', compact('cpu','imagenes'));
    } */
}

