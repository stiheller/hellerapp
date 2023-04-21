<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Notifications\UserMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
// del controlador
use App\Models\User;
use App\Models\Admin\Log;
use App\Models\Admin\Sector;
use App\Models\Admin\Message;
use App\Models\Insumos\GrupoUSuario;
use Spatie\Permission\Models\Role;
use App\Http\Requests\Admin\UserRequest;
use App\Listeners\UserMessageListener;



class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:admin.users.index')->only('index');
        $this->middleware('can:admin.users.create')->only('create', 'store');
        $this->middleware('can:admin.users.edit')->only('edit', 'update');
        $this->middleware('can:admin.users.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        $sectores = Sector::pluck('Nombre', 'id');
        return view('admin.users.create', compact('roles', 'sectores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //subir image
        if($request->hasFile('image')){


            $fileName = $request->input('username').'.'.$request->image->extension();

            if(file_exists($fileName)){
                unlink($fileName);
            }

            $path = $request->image->move(public_path('avatar'), $fileName);

        }else{
            $fileName = $request->input('username');
        }

        //creo el usuario
        $usuario = User::create($request->only('name','username', 'email','sector_id', 'changepassword', 'activo')
                + [
                    'password' => bcrypt($request->input('username')),
                    'image' => $fileName,

                ]);

        //sincronizo los roles
        $usuario->roles()->sync($request->roles);

        //inserto log
        $log = new Log;
        $log->user_id = auth()->user()->id;
        $log->ip = $request->ip();
        $log->table_id = $usuario->id;
        $log->log_accion_id = 1;
        $log->save();

        //retorno a la grilla
        return redirect()->route('admin.users.index')->withSuccessMessage('Usuario Creado con Exito');
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
    public function edit(User $user)
    {
        $roles = Role::all();
        $sectores = Sector::pluck('Nombre', 'id');
        return view('admin.users.edit', compact('user', 'roles', 'sectores'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $user)
    {
        //subir image
        if($request->hasFile('image')){


            $fileName = $user->username.'.'.$request->image->extension();

            if(file_exists($fileName)){
                unlink($fileName);
            }

            $path = $request->image->move(public_path('avatar'), $fileName);

        }else{
            $fileName = $user->image;
        }
        //actualizo la informacion del usuario sin foto
        $user->update($request->only('name','username', 'email','sector_id', 'changepassword', 'activo')
                + [
                    'image' => $fileName,
                ]);
        //sincromizo los roes
        $user->roles()->sync($request->roles);

        //inserto log
        $log = new Log;
        $log->user_id = auth()->user()->id;
        $log->ip = $request->ip();
        $log->table_id = $user->id;
        $log->log_accion_id = 2;
        $log->save();


        //redirecciono a menu principal
        return redirect()->route('admin.users.index')->withSuccessMessage('Usuario Actualizado con Exito');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, User $user)
    {
        $user->delete();
         //inserto log
         $log = new Log;
         $log->user_id = auth()->user()->id;
         $log->ip = $request->ip();
         $log->table_id = $user->id;
         $log->log_accion_id = 4;
         $log->save();

        return redirect()->route('admin.users.index')->withSuccessMessage('Usuario Eliminado con Exito');

    }

    public function profile(Request $request){
        $user = Auth::user();
        $ip = $request->ip();
        $roles = Role::all();
        $logs = DB::table('logs')
                    ->join('logs_accion', 'logs_accion.id', '=', 'logs.log_accion_id')
                    ->where('user_id', $user->id)
                    ->select('logs.ip', 'logs.created_at', 'logs_accion.log_accion')
                    ->orderBy('created_at', 'desc')
                    ->get();

        return view('admin.users.profile',compact('user','ip','roles', 'logs'));

    }

    public function resetpassword(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->password = bcrypt($user->username);
        $user->changepassword = 1;
        $user->update();
        //inserto log
        $log = new Log;
        $log->user_id = auth()->user()->id;
        $log->ip = $request->ip();
        $log->table_id = $user->id;
        $log->log_accion_id = 5;
        $log->save();
        //redirecciono a menu principal
        return redirect()->route('admin.users.index')->withSuccessMessage('Password Reseteada con Exito');

    }

    public function sendmessage()
    {
        $users = User::where('id', '!=',auth()->user()->id )
                        ->orderBy('name', 'asc')
                        ->get();
        //$notificaciones = Auth()->user()->notifications;
        $notificaciones = auth()->user()->unreadNotifications;
        $notificacionesLeidas = Auth()->user()->readNotifications;

        return view('admin.users.sendmessage', compact('users','notificaciones', 'notificacionesLeidas'));
    }

    public function savemessage(Request $request)
    {

        $request->validate([
            'para' => 'required',
            'asunto' => 'required|min:3|max:255',
            'compose' => 'required|min:3|max:255'

        ]);

        //inserto el mensaje
        $mensaje = new Message;
        $mensaje->de = auth()->user()->id;
        $mensaje->para = $request->para;
        $mensaje->asunto = $request->asunto;
        $mensaje->mensaje = $request->compose;
        $mensaje->save();

        //Busco el usuario a notificar
        $user = User::findOrFail($request->para);
        //envio la notificacion
        $user->notify(new UserMessage($mensaje));

        //para multiples usuarios agregar un foreach con la lista de usuarios
        return redirect()->route('admin.users.sendmessage');
    }

    public function markNotification(Request $request)
    {
        auth()->user()->unreadNotifications
                      ->when($request->input('id'), function($query) use($request){
                          return $query->where('id', $request->input('id'));
                      })->markAsRead();
        return response()->noContent();
    }
}
