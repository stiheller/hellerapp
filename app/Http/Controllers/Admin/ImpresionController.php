<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Str;
//modelo
use App\Models\Admin\Impresion;
use App\Models\User;

class ImpresionController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.impresiones')->only('index');

    }

    public function index(Request $request)
    {

        $desde = Carbon::now()->subDays(30)->Format('Y-m-d');
        $hasta = Carbon::now()->Format('Y-m-d');
        $anio = Carbon::now()->Format('Y');

        if(isset($request->desde)){
            $desde = $request->desde;
            $hasta = $request->hasta;
            $anio =  substr($request->hasta,0,4);
        }



        $query = "SELECT Impresora, sum(Paginas * Copias) AS cant FROM impresiones WHERE Hora BETWEEN '".$desde." 00:00:00' AND '".$hasta." 23:59:00' GROUP BY Impresora";
        $impresoras = DB::select(DB::raw($query));

        $query = "SELECT `Formato Papel` as papel, sum(Paginas * Copias) AS cant FROM impresiones WHERE Hora BETWEEN '".$desde." 00:00:00' AND '".$hasta." 23:59:00' GROUP BY `Formato Papel`";
        $hojas = DB::select(DB::raw($query));

        $puntos = [];
        $puntos1 = [];
        $puntos2 = [];


        foreach($impresoras as $item){
            $puntos[] = ['name' => $item->Impresora, 'y' => floatval($item->cant)];
        }

        foreach($hojas  as $item){
            $puntos1[] = ['name' => $item->papel, 'y' => floatval($item->cant)];
        }
        /* anual */
        $data = [];
        $query = "SELECT sum(Paginas * Copias) as cant FROM impresiones WHERE YEAR(Hora) = ".$anio." GROUP BY MONTH(Hora) ORDER BY MONTH(Hora) ASC";
        $anual = DB::select(DB::raw($query));

        foreach($anual as $value){
            $data[] = intval($value->cant);
        }

        return view('admin.impresiones.index', compact('desde', 'hasta','data', 'anio'), ["impresora" => json_encode($puntos), "hoja" => json_encode($puntos1)]);
    }
}
