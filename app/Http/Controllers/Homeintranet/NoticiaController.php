<?php

namespace App\Http\Controllers\Homeintranet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Session;
use Carbon\Carbon;

/*modelos */
use App\Models\Homeintranet\Noticia;
use App\Models\Admin\Log;


class NoticiaController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:homeintranet.noticias.index')->only('index');
        $this->middleware('can:ahomeintranet.noticias.create')->only('create', 'store');
        $this->middleware('can:homeintranet.noticias.edit')->only('edit', 'update');
        $this->middleware('can:homeintranet.noticias.destroy')->only('destroy');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $desde = Carbon::now()->subDays(30)->Format('Y-m-d');
        $hasta = Carbon::now()->Format('Y-m-d');

        if(isset($request->desde)){
            $desde = $request->desde;
            $hasta = $request->hasta;
        }

        $noticias = Noticia::whereBetween('fecha', [$desde, $hasta])
                            ->orderBy('id', 'desc')
                            ->get();

       return view('homeintranet.noticias.index', compact('noticias', 'desde', 'hasta'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('homeintranet.noticias.create');
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
            'fecha' => 'required',
            'titulo' => 'required|min:3|max:255',
            'copete' => 'required|min:3',
            'urlPagWeb' => 'required',
            'urlImagen' => 'required',
            'activo' => 'required',

        ]);

        $noticia = Noticia::create($request->all());
        //inserto log
        $log = new Log;
        $log->user_id = auth()->user()->id;
        $log->ip = $request->ip();
        $log->table_id = $noticia->id;
        $log->log_accion_id = 48;
        $log->save();
        //mensje
        Session::flash('message','Noticia Creada con Exito');
        //retorno
        return redirect()->route('homeintranet.noticias.index');
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
        $noticia = Noticia::findOrFail($id);
        return view('homeintranet.noticias.edit', compact('noticia'));

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
        $noticia = Noticia::findOrFail($id);

        $request->validate([
            'fecha' => 'required',
            'titulo' => 'required|min:3|max:255',
            'copete' => 'required|min:3',
            'urlPagWeb' => 'required',
            'urlImagen' => 'required',
            'activo' => 'required',

        ]);

        $noticia->update($request->all());

        //inserto log
        $log = new Log;
        $log->user_id = auth()->user()->id;
        $log->ip = $request->ip();
        $log->table_id = $noticia->id;
        $log->log_accion_id = 49;
        $log->save();
        //mensje
        Session::flash('message','Noticia Actualizada con Exito');
        //retorno
        return redirect()->route('homeintranet.noticias.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $noticia = Noticia::findOrFail($id);
        //borro la imagen
        if(isset($noticia->urlImagen)){
            $image_path = public_path().'/img/noticias/'.$noticia->urlImagen;
            unlink($image_path);
        }
        //borro la nota
        $noticia->delete();
        //inserto log
        $log = new Log;
        $log->user_id = auth()->user()->id;
        $log->ip = $request->ip();
        $log->table_id = $noticia->id;
        $log->log_accion_id = 51;
        $log->save();
        //mensje
        Session::flash('message','Noticia Eliminada con Exito');
        //retorno
        return redirect()->route('homeintranet.noticias.index');

    }
}
