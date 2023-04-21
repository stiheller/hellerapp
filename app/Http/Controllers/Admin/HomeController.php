<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Admin\Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
//modelos
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class HomeController extends Controller
{
    public function index(Request $request){

        $user = Auth::user();
        $totalUsuarios = User::count();
        $totalRoles = Role::count();
        $totalPermisos = Permission::count();
        $ip =  $request->ip();

        //usuarios en linea
        $query = "SELECT U.name,U.image, S.ip_address, S.last_activity
                  FROM sessions S
                  INNER JOIN users U on U.id = S.user_id
                  ORDER BY S.last_activity DESC";
        $enlinea = DB::select(DB::raw($query));
        //llamado al dash del usuario
        if($user->changepassword == 1){
            return view ('dash.changepassword');

        }else{
            if($user->activo == 1){

                return view ('dash.index', compact('user','totalUsuarios','totalRoles','totalPermisos', 'enlinea', 'ip'));
            }else{
                return view ('dash.usuariobloqueado', compact('user'));
            }
        }


    }

    public function changePassword(Request $request){

        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);

        User::find(auth()->user()->id)->update(
            ['password'=> Hash::make($request->new_password),
             'changepassword' => 0,
            ]
        );

        Auth::logout();
        return redirect('/');


        //return('clave actualizada');
    }

    public function loginSistemas(){
        return view ('login.login');
    }

}
