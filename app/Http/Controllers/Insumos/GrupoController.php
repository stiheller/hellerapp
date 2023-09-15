<?php

namespace App\Http\Controllers\Insumos;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
//modelos
use App\Models\Insumos\Grupo;


class GrupoController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:insumos.grupos.index')->only('index');
        $this->middleware('can:insumos.grupos.create')->only('create', 'store');
        $this->middleware('can:insumos.grupos.edit')->only('edit', 'update');
        $this->middleware('can:insumos.grupos.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $grupos = $grupos = Grupo::orderBy('nombre', 'ASC')->get();
        //return ($grupos);
        return view('insumos.grupos.index',compact('grupos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('insumos.grupos.create');
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
            'nombre' => 'required|min:3|max:255|unique:stk_gurpos,nombre',
            'descripcion' => 'required|min:3|max:255',
            'activo' => 'required'
        ]);
        //creo el grupo
        $grupo = Grupo::create($request->all());
        //insertar en stock
        $newgroup  = new GrupoUSuario;
        $newgroup->user_id = auth()->user()->id;
        $newgroup->grupo_id = $grupo->id;
        $newgroup->generado_por = auth()->user()->id;
        $newgroup->save();
        //inserto log
         insert_log(auth()->user()->id, $request->ip(), $grupo->id, 6);
        //mensje
        Session::flash('message','Grupo Creado con Exito');
        //retorno
        return redirect()->route('insumos.grupos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
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
        $grupo = Grupo::findOrFail($id);
        return view('insumos.grupos.edit', compact('grupo'));
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
        $grupo = Grupo::findOrFail($id);
        //validacion
        $request->validate([
            'nombre' => ['required','min:3','max:255','unique:stk_gurpos,nombre, '.$grupo->id],
            'descripcion' => 'required|min:3|max:255',
            'activo' => 'required'
        ]);
        //creo el grupo
        $grupo->update($request->all());
        //inserto log
         insert_log(auth()->user()->id, $request->ip(), $grupo->id, 7);
        //mensje
        Session::flash('message','Grupo Actualizado con Exito');
        //retorno
        return redirect()->route('insumos.grupos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $grupo = Grupo::findOrFail($id);
        //marco como eliminado
        $grupo->eliminado = 1;
        $grupo->update();
        //inserto log
        insert_log(auth()->user()->id, $request->ip(), $grupo->id, 8);
        //mensje
        Session::flash('message','Grupo Eliminado con Exito');
        //retorno
        return redirect()->route('insumos.grupos.index');

    }
}
