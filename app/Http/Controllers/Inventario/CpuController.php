<?php

namespace App\Http\Controllers\Inventario;

use App\Http\Controllers\Controller;
use App\Models\Inventario\Cpu;
use App\Models\Inventario\ImagenCpu;
use App\Models\Inventario\Puesto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            '4' => 'Disponible',
            '5' => 'Act-Mejorable',
            '6' => 'Act-ParaBaja'
        ];

        
        $equipamientos = Puesto::pluck('nombre', 'equipamiento_id');
        return view('inventario.cpus.create', compact('estados', 'equipamientos'));
        
        /* return view('inventario.cpus.create', compact('estados')); */
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
            'sistema_operativo' => 'required',
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
            '6' => 'Act-ParaBaja',
            '5' => 'Act-Mejorable',
            '4' => 'Disponible',
            '3' => 'Desaparecido',
            '2' => 'En Reparación',
            '1' => 'Activo',
            '0' => 'Baja'
        ];

        
        $equipamientos = Puesto::pluck('nombre', 'equipamiento_id');
        return view('inventario.cpus.edit', compact('cpu', 'estados', 'equipamientos'));

        /* return view('inventario.cpus.edit', compact('cpu', 'estados')); */
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
            'sistema_operativo' => 'required',
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
        $imagenes = ImagenCpu::where('cpu_id','=',$cpu->id)->get();
        
        foreach ($imagenes as $imagen) {
            Storage::delete($imagen->url);
        }

        $cpu->delete();
        return redirect()->route('inventario.cpus.index')->with('eliminar', 'ok');
    }

    //Función para mostrar las imágenes del CPU:
    public function imagenes(Cpu $cpu){
        $imagenes = ImagenCpu::where('cpu_id','=',$cpu->id)->get();
        return view('inventario.cpus.imagenes', compact('cpu','imagenes'));
    }
}

