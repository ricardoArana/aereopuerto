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

/* Route::get('/{localidad}', [CineController::class, 'getByLocalidad'])
->name('localidad'); */

Route::get('/dashboard', [CineController::class, 'index'])
->middleware(['auth'])->name('dashboard');




Route::get('/livewire', ['render'])
->name('inicio');


require __DIR__.'/auth.php';
