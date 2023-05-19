<?php

namespace App\Http\Controllers\Inventario;

use App\Http\Controllers\Controller;
use App\Models\Inventario\Sector;
use Illuminate\Http\Request;

class SectorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* $sectores = Sector::all(); 
        return view('inventario.sectores.index', compact('sectores')); */
        return view('inventario.sectores.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('inventario.sectores.create');
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
            'slug' => 'required|unique:inv_sectores',
            'descripcion' => 'required',
        ]);
        $sectore = Sector::create($request->all());

        return redirect()->route('inventario.sectores.index')->with('create', 'ok');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Sector $sectore)
    {
        return view('inventario.sectores.show', compact('sectore'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Sector $sectore)
    {
        return view('inventario.sectores.edit', compact('sectore'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sector $sectore)
    {
        $request->validate([
            'nombre' => 'required',
            'slug' => "required|unique:inv_sectores,slug,$sectore->id",
            'descripcion' => 'required',
        ]);

        $sectore->update($request->all());
        
        return redirect()->route('inventario.sectores.index', $sectore)->with('info', 'El Sector se actualizó con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sector $sectore)
    {
        $sectore->delete();

        return redirect()->route('inventario.sectores.index')->with('eliminar', 'ok');
    }
}

