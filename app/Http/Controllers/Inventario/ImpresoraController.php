<?php

namespace App\Http\Controllers\Inventario;

use App\Http\Controllers\Controller;
use App\Models\Inventario\Impresora;
use App\Models\Inventario\Puesto;
use Illuminate\Http\Request;

class ImpresoraController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('inventario.impresoras.index');
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
        return view('inventario.impresoras.create', compact('estados', 'equipamientos'));
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
            'slug' => 'required|unique:inv_impresoras',
            'descripcion' => 'required',
            'estado' => 'required',
        ]);

        $impresora = Impresora::create($request->all());
        return redirect()->route('inventario.impresoras.index')->with('create', 'ok');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Impresora $impresora)
    {
        return view('inventario.impresoras.show', compact('impresora'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Impresora $impresora)
    {
        $estados = [
            '3' => 'Desaparecido',
            '2' => 'En Reparación',
            '1' => 'Activo',
            '0' => 'Baja'
        ];

        /* $equipamientos = Equipamiento::pluck('descripcion', 'id'); */
        $equipamientos = Puesto::pluck('nombre', 'equipamiento_id');
        return view('inventario.impresoras.edit', compact('impresora', 'estados', 'equipamientos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Impresora $impresora)
    {
        $request->validate([
            'nombre' => 'required',
            'slug' => "required|unique:inv_impresoras,slug,$impresora->id",
            'descripcion' => 'required',
            'estado' => 'required',
        ]);
        $impresora->update($request->all());

        return redirect()->route('inventario.impresoras.index')->with('editar', 'ok');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Impresora $impresora)
    {
        $impresora->delete();
        return redirect()->route('inventario.impresoras.index')->with('eliminar', 'ok');
    }

    //Función para mostrar las imágenes de la Impresora:
   /*  public function imagenes(Impresora $impresora){
        $imagenes = ImagenImpresora::where('impresora_id','=',$impresora->id)->get();
        return view('admin.impresoras.imagenes', compact('impresora','imagenes'));
    } */
}
