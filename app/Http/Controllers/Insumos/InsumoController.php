<?php

namespace App\Http\Controllers\Insumos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use Carbon\Carbon;
//modelos
use App\Models\Insumos\Insumo;
use App\Models\Insumos\Grupo;

class InsumoController extends Controller
{

    /*public function __construct()
    {
        $this->middleware('can:insumos.insumos.index')->only('index');
        $this->middleware('can:insumos.insumos.create')->only('create', 'store');
        $this->middleware('can:insumos.insumos.edit')->only('edit', 'update');
        $this->middleware('can:insumos.insumos.destroy')->only('destroy');
        $this->middleware('can:insumo.seguimiento')->only('seguimiento');

    }*/

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //$envases = Envase::All();
        $grupo_id = "";
        $search = "";
        $gpfilter = "";
        $insumos = Insumo::where('grupo_id', '=', 0)->orderBy('nombre', 'ASC')->get();
        $grupos = Grupo::orderBy('nombre', 'ASC')->get();

        if(isset($request->grupo)){
            $insumos = Insumo::where('grupo_id', '=', $request->grupo)->orderBy('nombre', 'ASC')->get();
            $grupo_id = $request->grupo;
        }
        if(isset($request->search)){
            $search = $request->search;
            $insumos = Insumo::where('Nombre', 'LIKE', "%".$request->search."%")->orderBy('nombre', 'ASC')->get();
            
        }

        return view('insumos.insumos.index', compact('insumos','grupos', 'grupo_id', 'search'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $grupos = Grupo::orderBy('nombre', 'asc')->get();
        return view('insumos.insumos.create', compact('grupos'));
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
            'grupo_id' => 'required',
            'codigo_sss' => ['required','min:3','max:50','unique:stk_insumos,codigo_sss'],
            'nombre' => ['required','min:3','max:255'],
            'descripcion' => ['required','min:3','max:255'],
            'activo' => 'required',
            'eliminado' => 'required'
           
        ]);

        $insumo = Insumo::create($request->all());
        //inserto log
        insert_log(auth()->user()->id, $request->ip(), $insumo->id, 9);
        //mensje
        Session::flash('message','Insumo Creado con Exito');
        //retorno al index
        return redirect()->route('insumos.insumos.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $insumo = Insumo::findOrFail($id);
        $grupos = Grupo::orderBy('nombre', 'asc')->get();

        return view('insumos.insumos.edit', compact('grupos', 'insumo'));
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
        $insumo = Insumo::findOrFail($id);

        $request->validate([
            'grupo_id' => 'required',
            'codigo_sss' => ['required','min:3','max:50','unique:stk_insumos,codigo_sss, '.$insumo->id],
            'nombre' => ['required','min:3','max:255'],
            'descripcion' => ['required','min:3','max:255'],
            'activo' => 'required',
            'eliminado' => 'required'
           
        ]);

        $insumo->update($request->all());
        //inserto log
        insert_log(auth()->user()->id, $request->ip(), $insumo->id, 10);
        //mensje
        Session::flash('message','Insumo Actualizado con Exito');
        //retorno al index
        return redirect()->route('insumos.insumos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $insumo = Insumo::findOrFail($id);
        $insumo->eliminado = 1;
        $insumo->update();
        //inserto log
        insert_log(auth()->user()->id, $request->ip(), $insumo->id, 11);
        //mensje
        Session::flash('message','Insumo Eliminado con Exito');
        //retorno
        return redirect()->route('insumos.insumos.index');
    }

    
}
