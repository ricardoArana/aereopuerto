<?php

use App\Http\Controllers\CineController;
use App\Http\Controllers\PeliculaController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [CineController::class, 'index'])
->name('inicio');

Route::get('/peliculas', [CineController::class, 'peliculas'])
->name('peliculas');

Route::get('/cines', [CineController::class, 'cines'])
->name('cines');

Route::get('/reserva/{proyeccion}', [CineController::class, 'reserva'])
->name('reserva');

Route::post('/reservar/{sala}/{asientos}', [CineController::class, 'reservar'])
->name('reservar');

/* Route::get('/dashboard', [CineController::class, 'index'])
->middleware(['auth'])->name('dashboard'); */


require __DIR__.'/auth.php';
