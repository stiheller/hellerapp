<?php

namespace App\Http\Controllers\Homeintranet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

//modelos
use App\Models\Homeintranet\Noticia;
use App\Models\Homeintranet\Novedad;
use App\Models\Homeintranet\SeguimientoClick;
use App\Models\Homeintranet\Alertas;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $dia = Carbon::now()->format('Y-m-d');
        /* noticias */
        $noticias = Noticia::where('activo', '=', 'S')->take(6)->orderBy('id', 'DESC')->get();
        /* novedades */
        $novedades = Novedad::Where('activo', '=', 'S')->orderBy('id', 'ASC')->get();
        /* alertas */
        $query = "SELECT * FROM `homeintranet_alertas` WHERE '".$dia."' BETWEEN desde AND hasta ORDER BY dia asc, hora asc";
        $alertas = DB::select(DB::raw($query));
        /* año */
        $year = Carbon::now()->format('Y');
        //return( $year);

        $ip = \Request::ip();

        return view('homeintranet.index', compact('noticias', 'novedades', 'ip', 'year', 'alertas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function linkseg($id)
    {
        //inserto seguimiento
        $click = new SeguimientoClick;
        $click->accion_id = $id;
        $click->save();
    }

}
