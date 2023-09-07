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

use App\Models\Admin\Log;


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
        $envases = Envase::pluck('envase', 'id');
        //$grupos = Grupo::pluck('nombre', 'id');

        $query = "SELECT g.id, g.nombre
                    FROM stk_gurpos g
                    INNER JOIN stk_grupos_usuarios gu ON gu.grupo_id = g.id
                    INNER JOIN users u ON u.id = g.user_id
                    WHERE gu.user_id =".auth()->user()->id." ORDER BY g.nombre";
        $grupos = DB::select(DB::raw($query));

        return view('insumos.insumos.create', compact('grupos', 'envases'));
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
            'codigo_sss' => ['required','min:3','max:255','unique:stk_insumos,codigo_sss, '.$request->codigo_sss],
            'nombre' => ['required','min:3','max:255'],
            'descripcion' => ['required','min:3'],
            'activo' => 'required',
            'ctrlnegativos' => 'required'
        ]);

        $insumo = Insumo::create($request->all());

        //inserto log
        $log = new Log;
        $log->user_id = auth()->user()->id;
        $log->ip = $request->ip();
        $log->table_id =$insumo->id;
        $log->log_accion_id = 25;
        $log->save();
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
        $envases = Envase::pluck('envase', 'id');

        $query = "SELECT g.id, g.nombre
        FROM stk_gurpos g
        INNER JOIN stk_grupos_usuarios gu ON gu.grupo_id = g.id
        INNER JOIN users u ON u.id = g.user_id
        WHERE gu.user_id =".auth()->user()->id." ORDER BY g.nombre";
        $grupos = DB::select(DB::raw($query));

        return view('insumos.insumos.edit', compact('grupos', 'envases', 'insumo'));
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
            'nombre' => ['required','min:3','max:255'],
            'descripcion' => ['required','min:3'],
            'activo' => 'required',
            'ctrlnegativos' => 'required'
        ]);

        $insumo->update($request->all());
        //inserto log
        $log = new Log;
        $log->user_id = auth()->user()->id;
        $log->ip = $request->ip();
        $log->table_id = $insumo->id;
        $log->log_accion_id = 26;
        $log->save();
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
        $log = new Log;
        $log->user_id = auth()->user()->id;
        $log->ip = $request->ip();
        $log->table_id = $id;
        $log->log_accion_id = 27;
        $log->save();
        //mensje
        Session::flash('message','Insumo Eliminado con Exito');
        //retorno
        return redirect()->route('insumos.insumos.index');
    }
    public function insumoIngreso()
    {
        return view('insumos.ingresos.ingreso');
    }

    public function seguimiento(Request $request, $id)
    {

        $desde = Carbon::now()->subDays(30)->Format('Y-m-d');
        $hasta = Carbon::now()->Format('Y-m-d');

        if(isset($request->desde)){
            $desde = $request->desde;
            $hasta = $request->hasta;
            $insumo = Insumo::findOrFail($request->id);
        }else{
            $insumo = Insumo::findOrFail($id);
        }

        $query = "SELECT l.id, l.rotulo, l.created_at, l.interno,l.ingreso, l.egreso,  u.`name`
                FROM stk_insumos_log l
                INNER JOIN users u ON u.id = l.user_id
                WHERE l.insumo_id = ".$id." AND l.created_at BETWEEN '".$desde." 00:00:00' AND '".$hasta." 23:59:59' ORDER BY l.id DESC";
        $movimientos = DB::select(DB::raw($query));

        return view('insumos.insumos.seguimiento',compact('insumo', 'movimientos', 'desde', 'hasta'));
    }

    public function listadoNegativos(){
        $negativos = DB::table('stk_insumos')
                    ->select('stk_gurpos.nombre as grupo', 'stk_insumos.id', 'stk_insumos.codigo_sss', 'stk_insumos.nombre',
                             'stk_insumos.descripcion', 'stk_insumos.disponible')
                    ->join('stk_gurpos', 'stk_gurpos.id', '=', 'stk_insumos.grupo_id')
                    ->where('disponible', '<', 0)
                    ->where('ctrlnegativos', '=', 1)
                    ->get();

        return view('insumos.insumos.negativos',compact('negativos'));
        //return($negativos);
    }

    public function listadoSinSaldo(){
        $sinsaldo = DB::table('stk_insumos')
                    ->select('stk_gurpos.nombre as grupo', 'stk_insumos.id', 'stk_insumos.codigo_sss', 'stk_insumos.nombre',
                             'stk_insumos.descripcion', 'stk_insumos.disponible')
                    ->join('stk_gurpos', 'stk_gurpos.id', '=', 'stk_insumos.grupo_id')
                    ->where('disponible', '<=', 0)
                    ->where('ctrlnegativos', '=', 0)
                    ->get();

        return view('insumos.insumos.sinsaldo',compact('sinsaldo'));
        //return($negativos);
    }
}
