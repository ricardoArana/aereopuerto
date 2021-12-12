<?php

use App\Http\Controllers\ReservasController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\VuelosController;
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

Route::get('/', [VuelosController::class, 'index']);
Route::get('/{id}/reservas', [VuelosController::class, 'reservas']);
Route::post('/reservar/{id}', [VuelosController::class, 'reservar']);

Route::get('/reservas', [ReservasController::class, 'index']); //Muestra las reservas

Route::get('/login', [UsuariosController::class, 'loginForm']);
Route::post('/login', [UsuariosController::class, 'login']);
Route::post('/logout', [UsuariosController::class, 'logout']);



