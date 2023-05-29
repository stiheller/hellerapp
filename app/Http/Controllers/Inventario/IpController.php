<?php

namespace App\Http\Controllers\Inventario;

use App\Http\Controllers\Controller;
use App\Models\Inventario\Conexion;
use App\Models\Inventario\Ip;
use Illuminate\Http\Request;
use Livewire\WithPagination;

class IpController extends Controller
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('inventario.ips.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('inventario.ips.create');
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
            'direccion_ip' => 'required|unique:inv_ips',
            'estado' => 'required',
        ]);

        $ip = Ip::create($request->all());

        return redirect()->route('inventario.ips.index')->with('create', 'ok');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Ip $ip)
    {
        return view('inventario.ips.show', compact('ip'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Ip $ip)
    {
        return view('inventario.ips.edit', compact('ip'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ip $ip)
    {
        $request->validate([
            'direccion_ip' => 'required',
            'estado' => 'required',
        ]);

        $ip->update($request->all());

        return redirect()->route('inventario.ips.edit', $ip)->with('info', 'El Ip se Actualizó correctamente');
    }

    public function liberar($conexion)
    {
        $con = Conexion::findOrFail($conexion);

        $ipAux = Ip::findOrFail($con->ip_id);

        $con->update([
            'en_uso' => 0,
            'ip_id' => null,
        ]);

        $ipAux->update([
            'estado' => 0,
        ]);

        return redirect()->route('inventario.ips.index')->with('liberar', 'ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ip $ip)
    {
        $ip->delete();
        return redirect()->route('inventario.ips.index')->with('eliminar', 'ok');
    }
}
