<?php

namespace App\Http\Controllers\Reportes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Str;
//modelo
use App\Models\Homeintranet\SeguimientoClick;

class SegIntranetController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:sti.segIntranet.index')->only('index');

    }

    public function index(Request $request)
    {
        $desde = Carbon::now()->subDays(30)->Format('Y-m-d');
        $hasta = Carbon::now()->Format('Y-m-d');

        if(isset($request->desde)){
            $desde = $request->desde;
            $hasta = $request->hasta;

        }
        /* detalle de clicks */
        $query ="SELECT b.id, b.accion,COUNT(h.accion_id) as cant
        FROM homeintraet_seguimiento h
        RIGHT JOIN homeintraet_btn_seguimiento b ON h.accion_id = b.id
        WHERE h.created_at BETWEEN '2022-01-01' AND '2022-12-31'
        GROUP BY b.id, b.accion  ORDER BY COUNT(h.accion_id) DESC";
        $acciones = DB::select(DB::raw($query));
        foreach($acciones  as $item){
            $puntos1[] = ['name' => $item->accion, 'y' => floatval($item->cant)];
        }
        /* agrupados */
        $query ="SELECT b.seccion,COUNT(h.accion_id) as cant
                FROM homeintraet_seguimiento h
                RIGHT JOIN homeintraet_btn_seguimiento b ON h.accion_id = b.id
                WHERE h.created_at BETWEEN '2022-01-01' AND '2022-12-31'
                GROUP BY  b.seccion ORDER BY COUNT(h.accion_id) DESC";
        $grupos = DB::select(DB::raw($query));
        foreach($grupos  as $item){
            $puntos2[] = ['name' => $item->seccion, 'y' => floatval($item->cant)];
        }

        return view('reportes.seguimientoIntranet', compact('desde', 'hasta'), ["grupos" => json_encode($puntos2), 'columnas' =>json_encode($puntos1)]);
    }
}
