<?php
/* sti */
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\ImpresionController;
use App\Http\Controllers\Admin\SectorController;
/* administracion */
use App\Http\Controllers\Administracion\BancoController;
use App\Http\Controllers\Administracion\ProveedorController;
use App\Http\Controllers\Administracion\FacturaController;
use App\Http\Controllers\Administracion\CompraController;
use App\Http\Controllers\Administracion\RubroController;
/* homeintranet */
use App\Http\Controllers\Homeintranet\NoticiaController;
/* comunicacion */
use App\Http\Controllers\Comunicacion\CalendarioController;
/* mantenimiento */
use App\Http\Controllers\Mantenimiento\EmpresaController;
use App\Http\Controllers\Mantenimiento\OrdenController;
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
/* bancos */
Route::resource('bancos', BancoController::class)->names('administracion.bancos')->middleware('auth');
Route::get('bancos/{id}/chequera',[BancoController::class, 'chequeras'])->name('administracion.bancos.chequeras')->middleware('auth');
Route::post('bancos/chequeraCreate', [BancoController::class, 'chequerasCreate'] )->name('administracion.bancos.chequerasCreate')->middleware('auth');
Route::get('bancos/{id}/transferencia',[BancoController::class, 'transferencia'])->name('administracion.bancos.transferencia')->middleware('auth');
Route::post('bancos/{id}/transferenciaUpdate', [BancoController::class, 'transferenciaUpdate'] )->name('administracion.bancos.transferenciaUpdate')->middleware('auth');
Route::get('bancos/{id}/extracto',[BancoController::class, 'extracto'])->name('administracion.bancos.extracto');
/* rubros */
Route::resource('rubros', RubroController::class)->names('administracion.rubro')->middleware('auth');
/* proveedores */
Route::resource('proveedores', ProveedorController::class)->names('administracion.proveedores')->middleware('auth');
Route::get('rptProveedor',[ProveedorController::class, 'rptProveedor'])->name('administracion.proveedores.rptProveedor')->middleware('auth');
/* facturas */
Route::resource('facturas', FacturaController::class)->names('administracion.facturas')->middleware('auth');
Route::get('facturas/{id}/pagar',[FacturaController::class, 'pagarFactura'])->name('administracion.facturas.pagar')->middleware('auth');
Route::get('facturas/{id}/imprimir',[FacturaController::class, 'imprimirFactura'])->name('administracion.facturas.imprimir')->middleware('auth');
Route::post('facturas/agregarPagoFactura',[FacturaController::class, 'agregarPagoFactura'])->name('administracion.facturas.agregarPagoFactura')->middleware('auth');
Route::delete('facturas/{id}/eliminarPagoFactura',[FacturaController::class, 'eliminarPagoFactura'])->name('administracion.facturas.eliminarPagoFactura')->middleware('auth');
Route::get('facturas/{id}/procesarPagoFactura',[FacturaController::class, 'procesarPagoFactura'])->name('administracion.facturas.procesarPagoFactura')->middleware('auth');
Route::get('facturas/{id}/anularPagoFactura',[FacturaController::class, 'anularPagoFactura'])->name('administracion.facturas.anularPagoFactura')->middleware('auth');
/* compras */
Route::resource('compras', CompraController::class)->names('administracion.compras')->middleware('auth');
/* home intranet Noticias */
Route::resource('/noticias', NoticiaController::class)->names('homeintranet.noticias')->middleware('auth');
/* comunicacion calendario espacios institucionales */
Route::resource('/espaciosI', CalendarioController::class)->names('comunicacion.calendario')->middleware('auth');
/* sectores */
Route::resource('sectores', SectorController::class)->names('admin.sector')->middleware('auth');
/* mantenimiento empresas */
Route::resource('empresas', EmpresaController::class)->names('mnt.empresa')->middleware('auth');
/* mantenimiento ordenes */
Route::resource('mntOrdenes', OrdenController::class)->names('mnt.ordenes');
Route::post('mntOrdenes/agregarNota',[OrdenController::class, 'ordenAgregarNota'])->name('mnt.ordenes.agregarNota');
Route::get('mntOrdenes/{id}/mntListarNotas',[OrdenController::class, 'mntListarNotas'])->name('mnt.ordenes.listarNotas');
Route::get('mntOrdenes/{id}/imprimirOrdenbyId',[OrdenController::class, 'imprimirOrdenbyId'])->name('mnt.ordenes.imprimirOrdenbyId');
/* reportes */
Route::get('sti/impresiones',[ImpresionController::class, 'index'])->name('admin.impresiones')->middleware('auth');
Route::get('sti/segIntranet',[SegIntranetController::class, 'index'])->name('sti.segIntranet')->middleware('auth');
