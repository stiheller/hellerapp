<?php

namespace App\Http\Controllers\Inventario;

use App\Http\Controllers\Controller;
use App\Models\Inventario\Conexion;
use App\Models\Inventario\Conmutador;
use App\Models\Inventario\ImagenConmutador;
use App\Models\Inventario\Rack;
use App\Models\Inventario\Sector;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Stmt\Foreach_;

class ConmutadorController extends Controller
{
    public function index()
    {
        return view('inventario.conmutadores.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sectores = Sector::pluck('nombre', 'id');
        $racks = Rack::pluck('nombre', 'id');
        return view('inventario.conmutadores.create', compact('sectores', 'racks'));
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
            'numero' => 'required|numeric',
            'serial' => 'required|unique:inv_conmutadores',
            'marca' => 'required',
            'referencia_lugar' => 'required',
            'fecha_limpieza' => 'required',
        ]);

        $conmutador = Conmutador::create($request->all());
        return redirect()->route('inventario.conmutadores.index')->with('create', 'ok');
    }

    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show (Conmutador $conmutadore)
    {
        $conmutador = $conmutadore;

        /* return view('inventario.conmutadores.show', compact('conmutador')); */
        $conexiones = Conexion::where('conmutador_id','=',$conmutador->id)
                                ->leftjoin('inv_ips','inv_conexiones.ip_id','=','inv_ips.id')
                                ->join('inv_puestos','inv_conexiones.id','=','inv_puestos.conexion_id')
                                ->select('inv_conexiones.*','inv_ips.direccion_ip as direccion_ip',
                                'inv_puestos.nombre as nombre_puesto')
                                ->get();

        return view('inventario.conmutadores.show', compact('conmutador', 'conexiones'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit (Conmutador $conmutadore)
    {
        $sectores = Sector::pluck('nombre', 'id');
        $racks = Rack::pluck('nombre', 'id');
        return view('inventario.conmutadores.edit', compact('conmutadore', 'sectores', 'racks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Conmutador $conmutadore)
    {
        $request->validate([
            'numero' => 'required|numeric',
            'serial' => "required|unique:inv_conmutadores,serial,$conmutadore->id",
            'marca' => 'required',
            'referencia_lugar' => 'required',
            'fecha_limpieza' => 'required',
        ]);

        $conmutadore->update($request->all());
        return redirect()->route('inventario.conmutadores.index')->with('edit', 'ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy (Conmutador $conmutadore)
    {
        $imagenes = ImagenConmutador::where('conmutador_id','=',$conmutadore->id)->get();
        
        foreach ($imagenes as $imagen) {
            Storage::delete($imagen->url);
        }

        $conmutadore->delete();
        return redirect()->route('inventario.conmutadores.index')->with('eliminar', 'ok');
    }

    //Función para mostrar las imágenes de la Impresora:
    public function imagenes(Conmutador $conmutador){
        $imagenes = ImagenConmutador::where('conmutador_id','=',$conmutador->id)->get();
        return view('inventario.conmutadores.imagenes', compact('conmutador','imagenes'));
    }
}
