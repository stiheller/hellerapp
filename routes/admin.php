<?php
/* sti */
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\ImpresionController;
use App\Http\Controllers\Admin\SectorController;
/* reportes */
use App\Http\Controllers\Reportes\SegIntranetController;
/*usuarios */
Route::resource('users', UserController::class)->middleware('can:admin.users.index')->names('admin.users');
Route::post('users/{id}/rp', [UserController::class, 'resetpassword'] )->name('admin.users.resetpassword')->middleware('auth');
/* usuarios mensajes */
Route::get('user/sendmessage',[UserController::class, 'sendmessage'])->name('admin.users.sendmessage')->middleware('auth');
Route::post('user/savemessage',[UserController::class, 'savemessage'])->name('admin.users.savemessage')->middleware('auth');
Route::get('markAsRead', function(){
    auth()->user()->unreadNotifications->markAsRead();
    return redirect()->back();
})->name('admin.user.markAllAsRead')->middleware('auth');
Route::post('/mark-as-read', [UserController::class,'markNotification'])->name('markNotification')->middleware('auth');

/* roles */
Route::resource('roles', RoleController::class)->names('admin.roles')->middleware('auth');
/* permisos */
Route::resource('permisos', PermissionController::class)->names('admin.permission')->middleware('auth');
/* reportes */
Route::get('sti/impresiones',[ImpresionController::class, 'index'])->name('admin.impresiones')->middleware('auth');
Route::get('sti/segIntranet',[SegIntranetController::class, 'index'])->name('sti.segIntranet')->middleware('auth');
