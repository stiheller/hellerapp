<?php

namespace App\Http\Controllers\Inventario;

use App\Http\Controllers\Controller;
use App\Models\Inventario\Rack;
use Illuminate\Http\Request;

class RackController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('inventario.racks.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('inventario.racks.create');
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
            'nombre' => 'required',
            'slug' => 'required|unique:inv_racks',
            'descripcion' => 'required',
            'fecha_limpieza' => 'required',
        ]);
        $rack = Rack::create($request->all());
        return redirect()->route('inventario.racks.index')->with('create', 'ok');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Rack $rack)
    {
        return view('inventario.racks.show');
        /* $conmutadores = Conmutador::where('rack_id','=',$rack->id)
                                    ->get();

        return view('inventario.racks.show', compact('rack', 'conmutadores')); */
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Rack $rack)
    {
        return view('inventario.racks.edit', compact('rack'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rack $rack)
    {
        $request->validate([
            'nombre' => 'required',
            'slug' => "required|unique:inv_racks,slug,$rack->id",
            'descripcion' => 'required',
            'fecha_limpieza' => 'required',
        ]);
        $rack->update($request->all());

        return redirect()->route('inventario.racks.index')->with('edit', 'ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rack $rack)
    {
        $rack->delete();

        return redirect()->route('inventario.racks.index')->with('eliminar', 'ok');
    }

    //Función para mostrar las imágenes del Rack:
    /* public function imagenes(Rack $rack){
        $imagenes = ImagenRack::where('rack_id','=',$rack->id)->get();
        return view('inventario.racks.imagenes', compact('rack','imagenes'));
    } */
}
