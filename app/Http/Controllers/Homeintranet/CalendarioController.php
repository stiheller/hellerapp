<?php

namespace App\Http\Controllers\Homeintranet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

//modelo
use App\Models\Homeintranet\Calendario;

class CalendarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if(isset($request->month)){
            $fecha = explode("-", $request->month);
            $year = $fecha[0];
            $mes = $fecha[1];
            $valor = $fecha[0]."-".$fecha[1];
        }else{
            $dia = \Carbon\Carbon::parse(now());
            $fecha = explode("-", $dia);
            $year = $fecha[0];
            $mes = $fecha[1];
            $valor = $fecha[0]."-".$fecha[1];
        }

        $query="SELECT c.start_date, c.start_time, c.title,c.end_date, c.end_time, c.color, e.estadoAgendaTeleconf, s.salonTeleconferencia, s.salonNombreColor,
                       s.salonColorFondo, c.agendaObservacion, c.urlAgendaTeleconf
                FROM calendario c
                INNER JOIN calendario_estados e ON e.id = c.idEstadoAgendaTeleconf
                INNER JOIN calendario_salones s on s.id = c.idSalonTeleconferencia
                WHERE MONTH(c.start_date) = ".$mes." AND YEAR(c.start_date) = ".$year." ORDER BY c.start_date, c.start_time";




        $eventos = DB::select(DB::raw($query));

        return view('homeintranet.calendario', compact('eventos','valor'));
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
}
