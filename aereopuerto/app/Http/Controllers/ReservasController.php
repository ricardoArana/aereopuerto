<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReservasController extends Controller
{
    public function index(){
        $user = DB::table('users')
        ->where('email', '=', session()->get('usuario'))
        ->select('id')
        ->get();
        $id = $user[0]->id;

        $reservas = DB::table('reservas', 'r')
        ->join('vuelos AS v', 'r.vuelo_id', '=', 'v.id')
        ->join('aereopuertos AS a', 'origen_id', '=', 'a.id')
        ->join('aereopuertos AS ae', 'destino_id', '=', 'ae.id')
        ->join('companias AS c', 'compania_id', '=', 'c.id')
        ->where('usuario_id', '=', $id)
        ->select('v.*', 'r.*', 'a.denominacion as origen', 'ae.denominacion as destino', 'c.denominacion as compania' )
        ->get();


        return view('tusReservas', ['reservas' => $reservas]);
    }
}
