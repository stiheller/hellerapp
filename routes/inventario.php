<?php

/* use App\Http\Controllers\Admin\ConmutadorController;
use App\Http\Controllers\Admin\CpuController;
use App\Http\Controllers\Admin\EquipamientoController; */

use App\Http\Controllers\Inventario\ConmutadorController;
use App\Http\Controllers\Inventario\CpuController;
use App\Http\Controllers\Inventario\EquipamientoController;
use App\Http\Controllers\Inventario\HomeController;
use App\Http\Controllers\Inventario\ImagenConmutadorController;
use App\Http\Controllers\Inventario\ImagenCpuController;
use App\Http\Controllers\Inventario\ImagenImpresoraController;
use App\Http\Controllers\Inventario\ImagenMonitorController;
use App\Http\Controllers\Inventario\ImagenPuestoController;
use App\Http\Controllers\Inventario\ImagenRackController;
use App\Http\Controllers\Inventario\ImagenScannerController;
use App\Http\Controllers\Inventario\ImpresoraController;
use App\Http\Controllers\Inventario\InventarioController;
use App\Http\Controllers\Inventario\IpController;
use App\Http\Controllers\Inventario\MonitorController;
use App\Http\Controllers\Inventario\PuestoController;
use App\Http\Controllers\Inventario\RackController;
use App\Http\Controllers\Inventario\ScannerController;
use App\Http\Controllers\Inventario\SectorController;
/* use App\Http\Controllers\Admin\ImagenConmutadorController;
use App\Http\Controllers\Admin\ImagenCpuController;
use App\Http\Controllers\Admin\ImagenImpresoraController;
use App\Http\Controllers\Admin\ImagenMonitorController;
use App\Http\Controllers\Admin\ImagenPuestoController;
use App\Http\Controllers\Admin\ImagenRackController;
use App\Http\Controllers\Admin\ImagenScannerController; */
use Illuminate\Support\Facades\Route;
/* use App\Http\Controllers\Admin\SectorController;
use App\Models\ImagenCpu; */

/* use App\Models\ImagenMonitor; */

//Como tienen el prefijo Admin en "RouteServiceProvider", no necesita nada en el get
Route::get('', [HomeController::class, 'principal'])->name('inventario.principal');

Route::resource('sectores', SectorController::class)->names('inventario.sectores');

Route::resource('racks', RackController::class)->names('inventario.racks');
//Imagenes de Rack:
Route::get('racks/imagenes/{rack}', [RackController::class, 'imagenes'])->name('inventario.racks.imagenes');
Route::get('imagenRacks/create/{rack}', [ImagenRackController::class, 'create'])->name('inventario.imagenRacks.create');
Route::post('imagenRacks/store/{rack}', [ImagenRackController::class, 'store'])->name('inventario.imagenRacks.store');
Route::delete('imagenRacks/destroy/{imagenRack}', [ImagenRackController::class, 'destroy'])->name('inventario.imagenRacks.destroy');

Route::resource('ips', IpController::class)->names('inventario.ips');

Route::resource('conmutadores', ConmutadorController::class)->names('inventario.conmutadores');
//Imagenes del Switch:
Route::get('conmutadores/imagenes/{conmutador}', [ConmutadorController::class, 'imagenes'])->name('inventario.conmutadores.imagenes');
Route::get('imagenConmutadores/create/{id}', [ImagenConmutadorController::class, 'create'])->name('inventario.imagenConmutadores.create');
Route::post('imagenConmutadores/store/{id}', [ImagenConmutadorController::class, 'store'])->name('inventario.imagenConmutadores.store');
Route::delete('imagenConmutadores/destroy/{imagenConmutador}', [ImagenConmutadorController::class, 'destroy'])->name('inventario.imagenConmutadores.destroy');


Route::resource('monitores', MonitorController::class)->names('inventario.monitores');
//Imagenes Monitores
Route::get('monitores/imagenes/{monitor}', [MonitorController::class, 'imagenes'])->name('inventario.monitores.imagenes');
Route::get('imagenMonitores/create/{id}', [ImagenMonitorController::class, 'create'])->name('inventario.imagenMonitores.create');
Route::post('imagenMonitores/store/{id}', [ImagenMonitorController::class, 'store'])->name('inventario.imagenMonitores.store');
Route::delete('imagenMonitores/destroy/{imagenMonitor}', [ImagenMonitorController::class, 'destroy'])->name('inventario.imagenMonitores.destroy');

Route::resource('cpus', CpuController::class)->names('inventario.cpus');
//Imagenes de CPU:
Route::get('cpus/imagenes/{cpu}', [CpuController::class, 'imagenes'])->name('inventario.cpus.imagenes');
Route::get('imagenCpus/create/{id}', [ImagenCpuController::class, 'create'])->name('inventario.imagenCpus.create');
Route::post('imagenCpus/store/{id}', [ImagenCpuController::class, 'store'])->name('inventario.imagenCpus.store');
Route::delete('imagenCpus/destroy/{imagenCpu}', [ImagenCpuController::class, 'destroy'])->name('inventario.imagenCpus.destroy');

Route::resource('impresoras', ImpresoraController::class)->names('inventario.impresoras');
//Imagenes de Impresora:
Route::get('impresoras/imagenes/{impresora}', [ImpresoraController::class, 'imagenes'])->name('inventario.impresoras.imagenes');
Route::get('imagenImpresoras/create/{impresora}', [ImagenImpresoraController::class, 'create'])->name('inventario.imagenImpresoras.create');
Route::post('imagenImpresoras/store/{impresora}', [ImagenImpresoraController::class, 'store'])->name('inventario.imagenImpresoras.store');
Route::delete('imagenImpresoras/destroy/{imagenImpresora}', [ImagenImpresoraController::class, 'destroy'])->name('inventario.imagenImpresoras.destroy');


Route::resource('scanners', ScannerController::class)->names('inventario.scanners');
//Imagenes de Scanner:
Route::get('scanners/imagenes/{scanner}', [ScannerController::class, 'imagenes'])->name('inventario.scanners.imagenes');
Route::get('imagenScanners/create/{scanner}', [ImagenScannerController::class, 'create'])->name('inventario.imagenScanners.create');
Route::post('imagenScanners/store/{scanner}', [ImagenScannerController::class, 'store'])->name('inventario.imagenScanners.store');
Route::delete('imagenScanners/destroy/{imagenScanner}', [ImagenScannerController::class, 'destroy'])->name('inventario.imagenScanners.destroy');


Route::resource('equipamientos', EquipamientoController::class)->names('inventario.equipamientos');

Route::resource('puestos', PuestoController::class)->names('inventario.puestos'); 
//Imagenes de Puesto:
Route::get('puestos/imagenes/{puesto}', [PuestoController::class, 'imagenes'])->name('inventario.puestos.imagenes');
Route::get('imagenPuestos/create/{puesto}', [ImagenPuestoController::class, 'create'])->name('inventario.imagenPuestos.create');
Route::post('imagenPuestos/store/{puesto}', [ImagenPuestoController::class, 'store'])->name('inventario.imagenPuestos.store');
Route::delete('imagenPuestos/destroy/{imagenPuesto}', [ImagenPuestoController::class, 'destroy'])->name('inventario.imagenPuestos.destroy');


Route::get('puestos/desconectar/{conexion}', [PuestoController::class, 'desconectar'])->name('inventario.puestos.desconectar');

Route::get('ips/liberar/{conexion}', [IpController::class, 'liberar'])->name('inventario.ips.liberar');


Route::get('inventario/{id}', [InventarioController::class, 'show'])->name('inventario.inventario.show');


//Create particulares de Switchs NO LOS USO.. 
/* Route::get('admin/conmutadores/create2', [ConmutadorController::class, 'create2'])->name('admin.conmutadores.createSwitchSector');
Route::get('admin/conmutadores/create3', [ConmutadorController::class, 'create3'])->name('admin.conmutadores.createSwitchRack');

Route::post('admin/conmutadores/store2', [ConmutadorController::class, 'store2'])->name('admin.conmutadores.storeSwitchSector');
Route::post('admin/conmutadores/store3', [ConmutadorController::class, 'store3'])->name('admin.conmutadores.storeSwitchRack'); */