<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Utilidades\CentrexController;
use App\Http\Controllers\Utilidades\InternoController;
use App\Http\Controllers\Utilidades\PagUtilController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Homeintranet\IndexController;
use App\Http\Controllers\Homeintranet\CalendarioController;
use App\Http\Controllers\Personal\PersonalController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//habilitar esta ruta para home
/*Route::get('/', function () {
    return view('welcome');
});*/


Route::get('/', [IndexController::class, 'index'] );
/*Route::get('/', function () {
    return view('homeintranet.index');
});*/



/*Route::get('/', function () {
    return view('login.login');
});*/
Route::get('/alt', function () {
    return view('auth.login');
})->name('login_alt');
//pantalla de login
Route::get('/loginSistemas', [HomeController::class, 'loginSistemas'] )->name('loginSistemas');
//dash del usuario
Route::get('/dash', [HomeController::class, 'index'] )->name('dash');
Route::post('/cp', [HomeController::class, 'changePassword'] )->name('dashcp');
/*AUTENTIFICACION */
Route::middleware(['auth:sanctum', 'verified'])->get('/errorhabilitacion', function () {
    return view('layouts.habilitacionerror');
})->name('errorhabilitacion');
/*Route::middleware(['auth:sanctum', 'verified'])->get('/dash', function () {
    return view('dash.index');
})->name('dash');*/
/*utilidades */
Route::get('centex', [CentrexController::class, 'index'] )->name('centrex');
/*internos */
Route::get('internos', [InternoController::class, 'index'] )->name('internos');
/*paginas utiles */
Route::get('pagutil', [PagUtilController::class, 'index'] )->name('pagutil');
/* perfil del usuario */
Route::get('profile', [UserController::class, 'profile'] )->name('profile');
/* calendario */
Route::get('/calendario', [CalendarioController::class, 'index'] )->name('calendario');
/* index */
Route::post('/link/{id}', [IndexController::class, 'linkseg'])->name('linkseg');
/*formularios personal*/
Route::get('/f80', [PersonalController::class, 'f80'] )->name('f80');
