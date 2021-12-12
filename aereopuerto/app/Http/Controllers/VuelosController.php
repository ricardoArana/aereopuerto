<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VuelosController extends Controller
{
    public function index(){
        $vuelos = DB::table('vuelos', 'v')
        ->join('aereopuertos AS a', 'origen_id', '=', 'a.id')
        ->join('aereopuertos AS ae', 'destino_id', '=', 'ae.id')
        ->join('companias AS c', 'compania_id', '=', 'c.id')
        ->select('v.*', 'a.denominacion as origen', 'ae.denominacion as destino', 'c.denominacion as compania' );

        $paginador = $vuelos->paginate(2);
        return view('vuelo', [
            'vuelos' => $paginador,
        ]);
    }
    public static function asientosOcupados($id)
    {
        $reservados = DB::table('vuelos', 'v')
        ->join('reservas AS r', 'v.id', '=', 'r.vuelo_id')
        ->select('v.id', 'r.asiento')
        ->get();
        $ocupado = [];

        foreach ($reservados as $reserva) {
            if ($reserva->id == $id) {
                array_push($ocupado, $reserva->asiento);
            }
        }
        return $ocupado;
    }
    public function reservas($id){
        $plazas = DB::table('vuelos')
        ->where('id', $id)
        ->select('plazas')
        ->get();
        $reserva = DB::table('reservas')->where('vuelo_id', '=', $id)->select('id', 'asiento')->get();
        return view('reservas', ['reservas' => $reserva, 'plazas' => $plazas, 'id' => $id]);

    }
    static function reservar($id){
        if(!session()->has('usuario')){
            return redirect('/')->with('error','tienes que estar logeado');
        }

        $user = DB::table('users')
        ->where('email', '=', session()->get('usuario'))
        ->select('id')
        ->get();

        $validados = request()->validate([
            'asiento' => 'required|integer',
        ]);
        $ocupado = new VuelosController;
        $ocupado = $ocupado->asientosOcupados($user[0]->id);
        if (in_array($validados['asiento'], (array)$ocupado)){
            return redirect('/')->with('error','ese asiento ya está reservado');
        }


        $fecha = new DateTime();
        DB::table('reservas')
        ->insert([
            'usuario_id' => ($id),
            'vuelo_id' => $id,
            'asiento' => $validados['asiento'],
            'fecha_hora' => ($fecha->format('d-m-Y H:i:s'))
        ]);
        return redirect()->back()->with('success','reserva hecha con éxito');

    }
}
