<?php
/* sti */
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Insumos\GrupoController;
use App\Http\Controllers\Insumos\InsumoController;
use App\Http\Controllers\Insumos\DepositoCentral;


/* insumos grupos */
Route::resource('grupos', GrupoController::class)->names('insumos.grupos')->middleware('auth');
/* insumos insumos */
Route::resource('insumos', InsumoController::class)->names('insumos.insumos');
/* ingrsos deposito central */
Route::get('/searchinsumo', [DepositoCentral::class, 'index'])->name('inngresoDC');