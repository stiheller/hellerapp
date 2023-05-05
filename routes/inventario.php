<?php

/* use App\Http\Controllers\Admin\ConmutadorController;
use App\Http\Controllers\Admin\CpuController;
use App\Http\Controllers\Admin\EquipamientoController; */
use App\Http\Controllers\Inventario\HomeController;
use App\Http\Controllers\Inventario\RackController;
use App\Http\Controllers\Inventario\SectorController;
/* use App\Http\Controllers\Admin\ImagenConmutadorController;
use App\Http\Controllers\Admin\ImagenCpuController;
use App\Http\Controllers\Admin\ImagenImpresoraController;
use App\Http\Controllers\Admin\ImagenMonitorController;
use App\Http\Controllers\Admin\ImagenPuestoController;
use App\Http\Controllers\Admin\ImagenRackController;
use App\Http\Controllers\Admin\ImagenScannerController;
use App\Http\Controllers\Admin\ImpresoraController;
use App\Http\Controllers\Admin\InventarioController;
use App\Http\Controllers\Admin\IpController;
use App\Http\Controllers\Admin\MonitorController;
use App\Http\Controllers\Admin\PuestoController;
use App\Http\Controllers\Admin\RackController;
use App\Http\Controllers\Admin\ScannerController; */
use Illuminate\Support\Facades\Route;
/* use App\Http\Controllers\Admin\SectorController;
use App\Models\ImagenCpu; */

/* use App\Models\ImagenMonitor; */

//Como tienen el prefijo Admin en "RouteServiceProvider", no necesita nada en el get
Route::get('', [HomeController::class, 'principal'])->name('inventario.principal');

Route::resource('sectores', SectorController::class)->names('inventario.sectores');

Route::resource('racks', RackController::class)->names('inventario.racks');
//Imagenes de Rack:
/* Route::get('racks/imagenes/{rack}', [RackController::class, 'imagenes'])->name('admin.racks.imagenes');
Route::get('imagenRacks/create/{rack}', [ImagenRackController::class, 'create'])->name('admin.imagenRacks.create');
Route::post('imagenRacks/store/{rack}', [ImagenRackController::class, 'store'])->name('admin.imagenRacks.store');
Route::delete('imagenRacks/destroy/{imagenRack}', [ImagenRackController::class, 'destroy'])->name('admin.imagenRacks.destroy');

Route::resource('ips', IpController::class)->names('admin.ips');

Route::resource('conmutadores', ConmutadorController::class)->names('admin.conmutadores'); */
//Imagenes de CPU:
/* Route::get('conmutadores/imagenes/{conmutador}', [ConmutadorController::class, 'imagenes'])->name('admin.conmutadores.imagenes');
Route::get('imagenConmutadores/create/{id}', [ImagenConmutadorController::class, 'create'])->name('admin.imagenConmutadores.create');
Route::post('imagenConmutadores/store/{id}', [ImagenConmutadorController::class, 'store'])->name('admin.imagenConmutadores.store');
Route::delete('imagenConmutadores/destroy/{imagenConmutador}', [ImagenConmutadorController::class, 'destroy'])->name('admin.imagenConmutadores.destroy');


Route::resource('monitores', MonitorController::class)->names('admin.monitores');
Route::get('monitores/imagenes/{monitor}', [MonitorController::class, 'imagenes'])->name('admin.monitores.imagenes');

Route::resource('imagenMonitores', ImagenMonitorController::class)->names('admin.imagenMonitores');
Route::post('imagenMonitores/store2/{id}', [ImagenMonitorController::class, 'store2'])->name('admin.imagenMonitores.store2');
Route::get('imagenMonitores/create2/{id}', [ImagenMonitorController::class, 'create2'])->name('admin.imagenMonitores.create2');

Route::resource('cpus', CpuController::class)->names('admin.cpus'); */
//Imagenes de CPU:
/* Route::get('cpus/imagenes/{cpu}', [CpuController::class, 'imagenes'])->name('admin.cpus.imagenes');
Route::get('imagenCpus/create/{id}', [ImagenCpuController::class, 'create'])->name('admin.imagenCpus.create');
Route::post('imagenCpus/store/{id}', [ImagenCpuController::class, 'store'])->name('admin.imagenCpus.store');
Route::delete('imagenCpus/destroy/{imagenCpu}', [ImagenCpuController::class, 'destroy'])->name('admin.imagenCpus.destroy');

Route::resource('impresoras', ImpresoraController::class)->names('admin.impresoras'); */
//Imagenes de Impresora:
/* Route::get('impresoras/imagenes/{impresora}', [ImpresoraController::class, 'imagenes'])->name('admin.impresoras.imagenes');
Route::get('imagenImpresoras/create/{impresora}', [ImagenImpresoraController::class, 'create'])->name('admin.imagenImpresoras.create');
Route::post('imagenImpresoras/store/{impresora}', [ImagenImpresoraController::class, 'store'])->name('admin.imagenImpresoras.store');
Route::delete('imagenImpresoras/destroy/{imagenImpresora}', [ImagenImpresoraController::class, 'destroy'])->name('admin.imagenImpresoras.destroy');


Route::resource('scanners', ScannerController::class)->names('admin.scanners'); */
//Imagenes de Scanner:
/* Route::get('scanners/imagenes/{scanner}', [ScannerController::class, 'imagenes'])->name('admin.scanners.imagenes');
Route::get('imagenScanners/create/{scanner}', [ImagenScannerController::class, 'create'])->name('admin.imagenScanners.create');
Route::post('imagenScanners/store/{scanner}', [ImagenScannerController::class, 'store'])->name('admin.imagenScanners.store');
Route::delete('imagenScanners/destroy/{imagenScanner}', [ImagenScannerController::class, 'destroy'])->name('admin.imagenScanners.destroy');


Route::resource('equipamientos', EquipamientoController::class)->names('admin.equipamientos');

Route::resource('puestos', PuestoController::class)->names('admin.puestos'); */
//Imagenes de Puesto:
/* Route::get('puestos/imagenes/{puesto}', [PuestoController::class, 'imagenes'])->name('admin.puestos.imagenes');
Route::get('imagenPuestos/create/{puesto}', [ImagenPuestoController::class, 'create'])->name('admin.imagenPuestos.create');
Route::post('imagenPuestos/store/{puesto}', [ImagenPuestoController::class, 'store'])->name('admin.imagenPuestos.store');
Route::delete('imagenPuestos/destroy/{imagenPuesto}', [ImagenPuestoController::class, 'destroy'])->name('admin.imagenPuestos.destroy');


Route::get('puestos/desconectar/{conexion}', [PuestoController::class, 'desconectar'])->name('admin.puestos.desconectar');

Route::get('ips/liberar/{conexion}', [IpController::class, 'liberar'])->name('admin.ips.liberar');

Route::get('inventario/{id}', [InventarioController::class, 'show'])->name('admin.inventario.show'); */


//Create particulares de Switchs NO LOS USO.. 
/* Route::get('admin/conmutadores/create2', [ConmutadorController::class, 'create2'])->name('admin.conmutadores.createSwitchSector');
Route::get('admin/conmutadores/create3', [ConmutadorController::class, 'create3'])->name('admin.conmutadores.createSwitchRack');

Route::post('admin/conmutadores/store2', [ConmutadorController::class, 'store2'])->name('admin.conmutadores.storeSwitchSector');
Route::post('admin/conmutadores/store3', [ConmutadorController::class, 'store3'])->name('admin.conmutadores.storeSwitchRack'); */