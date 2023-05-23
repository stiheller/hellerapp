<?php

namespace App\Http\Controllers\Inventario;

use App\Http\Controllers\Controller;
use App\Models\Inventario\ImagenScanner;
use App\Models\Inventario\Puesto;
use App\Models\Inventario\Scanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ScannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('inventario.scanners.index');
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
        ];

        /* $equipamientos = Equipamiento::pluck('descripcion', 'id'); */
        $equipamientos = Puesto::pluck('nombre', 'equipamiento_id');
        return view('inventario.scanners.create', compact('estados', 'equipamientos'));
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
            'slug' => 'required|unique:inv_scanners',
            'descripcion' => 'required',
            'estado' => 'required',
        ]);

        $scanner = Scanner::create($request->all());
        return redirect()->route('inventario.scanners.index')->with('create', 'ok');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Scanner $scanner)
    {
        return view('inventario.scanners.show', compact('scanner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Scanner $scanner)
    {
        $estados = [
            '4' => 'Disponible',
            '3' => 'Desaparecido',
            '2' => 'En Reparación',
            '1' => 'Activo',
            '0' => 'Baja'
        ];

        /* $equipamientos = Equipamiento::pluck('descripcion', 'id'); */
        $equipamientos = Puesto::pluck('nombre', 'equipamiento_id');
        return view('inventario.scanners.edit', compact('scanner', 'estados', 'equipamientos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Scanner $scanner)
    {
        $request->validate([
            'nombre' => 'required',
            'slug' => "required|unique:inv_scanners,slug,$scanner->id",
            'descripcion' => 'required',
            'estado' => 'required',
        ]);
        $scanner->update($request->all());

        return redirect()->route('inventario.scanners.index')->with('editar', 'ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Scanner $scanner)
    {
        $imagenes = ImagenScanner::where('scanner_id','=',$scanner->id)->get();
        
        foreach ($imagenes as $imagen) {
            Storage::delete($imagen->url);
        }

        $scanner->delete();
        return redirect()->route('inventario.scanners.index')->with('eliminar', 'ok');
    }

     //Función para mostrar las imágenes de la Impresora:
     public function imagenes(Scanner $scanner){
        $imagenes = ImagenScanner::where('scanner_id','=',$scanner->id)->get();
        return view('inventario.scanners.imagenes', compact('scanner','imagenes'));
    }
}
