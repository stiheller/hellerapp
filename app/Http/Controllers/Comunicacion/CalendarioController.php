<?php

namespace App\Http\Controllers\Comunicacion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Session;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
/* modelo */
use App\Models\Comunicacion\Calendario;
use App\Models\Comunicacion\CalendarioEstado;
use App\Models\Comunicacion\CalendarioSalon;
//validadores
use App\Http\Requests\Comunicacion\RequestNewEvento;

class CalendarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:comunicacion.calendario.index')->only('index');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = array();
        $bookings = Calendario::All();
        foreach($bookings as $booking) {
           //$color = null;
            /*if($booking->title == 'Test') {
                $color = '#924ACE';
            }
            if($booking->title == 'Test 1') {
                $color = '#68B01A';
            }*/

            $events[] = [
                'id'   => $booking->id,
                'title' => $booking->title. ' '.$booking->start_time.' '.$booking->end_time,
                'start' => $booking->start_date,
                'end' => $booking->end_date,
                'color' => $booking->color
            ];
        }

        return view('comunicacion.calendario.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return('hola');
        $salones = CalendarioSalon::pluck('salonTeleconferencia', 'id');
        $estados = CalendarioEstado::pluck('estadoAgendaTeleconf', 'id' );
        $dia = Carbon::now()->format('Y-m-d');
        $hora = Carbon::now()->format('H:i');

        return view('comunicacion.calendario.create', compact('salones', 'estados', 'dia', 'hora'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestNewEvento $request)

    {


        //control de eventos
        $query = "SELECT *
                  FROM calendario
                  WHERE '".$request->start_date."' BETWEEN start_date and end_date
                  AND '".$request->start_time."' BETWEEN start_time and end_time
                  AND idSalonTeleconferencia = ".$request->idSalonTeleconferencia." AND idEstadoAgendaTeleconf =1";
        $array_eventos = DB::select(DB::raw($query));
        if(count($array_eventos) >= 1){
            //mensaje
            Session::flash('warning','Hay otro evento programado revise los datos por favor');
            //retorno al index
            return redirect()->route('comunicacion.calendario.create');
        }else{
            //formateo las fechas
            $startDate = Carbon::createFromFormat('Y-m-d', $request->start_date);
            $endDate = Carbon::createFromFormat('Y-m-d', $request->end_date);
            //obtengo la cantidad de dias
            $cantDias = $startDate->diffInDays($endDate, false);
            if($cantDias == 0){
                //inserto 1 solo registro
                $evento = Calendario::create($request->all());
                //return($cantDias);
            }else{
                //insertp varios
                $dateRange = CarbonPeriod::create($startDate, $endDate);
                foreach ($dateRange as $date) {
                    $nroDia=$date->dayOfWeek;
                    //echo $date->format('Y-m-d')."-".$date->dayOfWeek."\n";
                    //if(isset($request->lunes) && $request->lunes == $dia)
                }
            }
            //mensaje
             Session::flash('message','Evento Programado con Exito');
             //retorno al index
             return redirect()->route('comunicacion.calendario.create');

        }
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
    public function update(Request $request ,$id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
