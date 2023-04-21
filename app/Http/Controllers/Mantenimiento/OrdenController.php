<?php

namespace App\Http\Controllers\Mantenimiento;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Session;
use Codedge\Fpdf\Fpdf\Fpdf;
/*modelos*/
use App\Models\Mantenimiento\Orden;
use App\Models\Mantenimiento\Empresa;
use App\Models\Mantenimiento\OrdenPrioridad;
use App\Models\Mantenimiento\OrdenEstado;
use App\Models\Mantenimiento\OrdenPuntaje;
use App\Models\Mantenimiento\OrdenNota;
use App\Models\Mantenimiento\OrdenNotaImagen;
use App\Models\Admin\Sector;
use App\Models\Admin\Log;

class OrdenController extends Controller
{
    public function __construct()
    {
        $this->fpdf = new Fpdf;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {


       /* if(isset($request->desde)){
            $desde = $request->desde;
            $hasta = $request->hasta;
        }else{
            $desde = Carbon::now()->subDays(30)->Format('Y-m-d');
            $hasta = Carbon::now()->Format('Y-m-d');
        }*/

        //return($desde."-".$hasta);
        $desde = '2022-01-01';
        $hasta = '2023-12-31';

        /* indicador de ordenes estado */
        $query = "SELECT e.`name`, count(o.id) as cant
                  FROM mnt_ordenes_estado e
                  LEFT JOIN mnt_ordenes o ON e.id = o.estado_id
                  GROUP BY e.`name` ORDER BY e.`name`";
        $indicadores = DB::select(DB::raw($query));

        $estados = OrdenEstado::All();

        $query ="SELECT  o.id, o.nombreCorto, o.fechaIni, o.fechaVto, s.Nombre AS sector,
            e.name AS estado, e.sigal, e.colorFondo, e.colorTexto, cant.cant  AS notas,
            p.`name` AS prioridad, emp.`name` AS empresa, u.`name` as usuario
            FROM mnt_ordenes o
            LEFT JOIN (SELECT orden_id, COUNT(*) as cant FROM mnt_ordenes_notas  GROUP BY orden_id) AS cant ON o.id = cant.orden_id
            INNER JOIN sectores s ON s.id = o.sector_id
            INNER JOIN mnt_ordenes_estado e ON e.id = o.estado_id
            INNER JOIN mnt_ordenes_prioridad p ON p.id = o.prioridad_id
            INNER JOIN mnt_empresas	emp ON emp.id = o.empresa_id
            INNER JOIN users u ON u.id = o.user_id
            WHERE o.fechaIni BETWEEN '".$desde."' AND '".$hasta."' ORDER BY e.id DESC";
        $listado = DB::select(DB::raw($query));



        return view('mantenimiento.ordenes.index', compact('indicadores','listado', 'estados', 'desde', 'hasta'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $sectores = $this->ordenSector();
        $empresas = $this->ordenEmpresa();
        $prioridad = $this->ordenPrioridad();
        $estado = $this->ordenEstado();
        $puntaje = $this->ordenPuntaje();
        return view('mantenimiento.ordenes.create', compact('empresas','sectores', 'prioridad', 'estado', 'puntaje'));

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
            'fechaIni' => ['required', 'date'],
            'empresa_id' => ['required'],
            'sector_id' =>['required'],
            'nombreCorto' => ['required','min:3', 'max:100'],
            'tarea' => 'required',
            'prioridad_id' => 'required',
            'estado_id' => 'required',
            'fechaVto' => ['required', 'date']
        ]);

        $orden = Orden::create($request->all());

        //inserto log
        $log = new Log;
        $log->user_id = auth()->user()->id;
        $log->ip = $request->ip();
        $log->table_id = $orden->id;
        $log->log_accion_id = 58;
        $log->save();
        //mensje
        Session::flash('message','Orden Creada con Exito');
        //retorno
        return redirect()->route('mnt.ordenes.index');

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
        $sectores = $this->ordenSector();
        $empresas = $this->ordenEmpresa();
        $prioridad = $this->ordenPrioridad();
        $estado = $this->ordenEstado();
        $puntaje = $this->ordenPuntaje();
        $orden = Orden::findOrFail($id);
        return view('mantenimiento.ordenes.edit', compact('orden', 'empresas','sectores', 'prioridad', 'estado', 'puntaje'));
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
        $orden = Orden::findOrFail($id);

        $request->validate([
            'fechaIni' => ['required', 'date'],
            'empresa_id' => ['required'],
            'sector_id' =>['required'],
            'nombreCorto' => ['required','min:3', 'max:100'],
            'tarea' => 'required',
            'prioridad_id' => 'required',
            'estado_id' => 'required',
            'fechaVto' => ['required', 'date']
        ]);

        $orden->update($request->all());

        //inserto log
        $log = new Log;
        $log->user_id = auth()->user()->id;
        $log->ip = $request->ip();
        $log->table_id = $orden->id;
        $log->log_accion_id = 59;
        $log->save();
        //mensje
        Session::flash('message','Orden Actualizada con Exito');
        //retorno
        return redirect()->route('mnt.ordenes.index');
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
    public function ordenAgregarNota(Request $request){

        //inserto nota
        $orden = new OrdenNota;
        $orden->orden_id = $request->id;
        $orden->user_id = auth()->user()->id;
        $orden->nota = $request->nota;
        $orden->save();
        //si hay imagenes las grabo en bd y realizo el upload
        //una sola imagen
            //$file = $request->file('image');
            //$nombre = $file->getClientOriginalName();
            //$file->move(public_path('img/mnt_ordenes_imagenes'), $nombre);
        //multiples imagenes
        $files = $request->file('image');
        foreach($files as $photo){
            $nombre = $photo->getClientOriginalName();
            $nombre_clean = Str::replace(' ', '_', $nombre);
            $photo->move(public_path('img/mnt_ordenes_imagenes'), $nombre_clean);
            //inserto en la base de datos
            $ordenImg = New OrdenNotaImagen;
            $ordenImg->nota_id = $orden->id;
            $ordenImg->imagen = $nombre_clean;
            $ordenImg->save();
        }
        //mensje
        Session::flash('message','Nota Agregada  con Exito');
        //retorno
        return redirect()->route('mnt.ordenes.index');
    }

    public function imprimirOrdenbyId($id)
    {


        $this->fpdf->SetFont('Arial', 'B', 15);
        $this->fpdf->AddPage("L", ['100', '100']);
        $this->fpdf->Text(10, 10, "Hello World!");

        $this->fpdf->Output();

        exit;
    }


    public function mntListarNotas($id){
        $orden = Orden::findOrFail($id);
        $notas = OrdenNota::where('orden_id', '=', $id)->orderBy('id', 'DESC')->get();
        return view('mantenimiento.ordenes.listarNotas', compact('orden', 'notas'));
    }

    public function ordenSector()
    {
        $sectores = Sector::where('Activo', '=', 1)->orderBy('Nombre', 'asc')->get()->pluck('Nombre','id');
        return $sectores;
    }

    public function ordenEmpresa()
    {
        $empresas = Empresa::where('activa', '=', 1)->orderBy('name', 'asc')->get()->pluck('name','id');
        return $empresas;
    }
    public function ordenPrioridad()
    {
        $prioridad = OrdenPrioridad::where('activo', '=', 1)->orderBy('id', 'asc')->get()->pluck('name','id');
        return $prioridad;
    }
    public function ordenEstado()
    {
        $estado = OrdenEstado::orderBy('id', 'desc')->get()->pluck('name','id');
        return $estado;
    }
    public function ordenPuntaje()
    {
        $puntaje = OrdenPuntaje::orderBy('id', 'desc')->get()->pluck('name','id');
        return $puntaje;
    }
}
