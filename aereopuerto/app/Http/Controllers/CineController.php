<?php

namespace App\Http\Controllers;

use App\Http\Livewire\Reserva;
use App\Http\Requests\StoreCineRequest;
use App\Http\Requests\UpdateCineRequest;
use App\Models\Cine;
use App\Models\Localidad;
use App\Models\Pelicula;
use App\Models\Proyeccion;
use Illuminate\Support\Facades\Auth;

class CineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard', [
            'localidads' => Localidad::all(),
            'cines' => Cine::all(),
        ]);
    }

    public function peliculas()
    {
        return view('peliculas', [
            'peliculas' => Pelicula::all(),
        ]);
    }

    public function cines()
    {
        return view('cines', [
            'cines' => Cine::all(),
        ]);
    }

    public function reserva(Proyeccion $proyeccion)
    {
        return view('reserva', [
            'peliculas' => Pelicula::all(),
            'proyeccion' => $proyeccion,
        ]);
    }

    public function reservar()
    {
        if(empty(Auth::user())){
            return redirect('/')->with('error','Para reservar debes iniciar sesión');
        }

        $validado = request()->validate([
            'sala' => 'required|string',
            'pel_id' => 'required|string',
            'cube_id' => 'required|string',
            'asientos' => 'required|array'
        ]);



        //selecciono el usuario actual
        $user = Auth::user();
        //Hago tantas reservas como asientos haya
        for ($i=0; $i < sizeof($validado['asientos']); $i++) {
             $reserva = Reserva::create([
                'user_id' => $user->id,
                'cine_id' => $validado['cine_id'],
                'pelicula_id' => $validado['pelicula_id'],
                'sala' => $validado['sala'],
                'asientos' => $validado['asientos']
            ]);
            $reserva->save();
        }
        return redirect('/')->with('success','Reserva realizada con éxito');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCineRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCineRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cine  $cine
     * @return \Illuminate\Http\Response
     */
    public function show(Cine $cine)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cine  $cine
     * @return \Illuminate\Http\Response
     */
    public function edit(Cine $cine)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCineRequest  $request
     * @param  \App\Models\Cine  $cine
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCineRequest $request, Cine $cine)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cine  $cine
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cine $cine)
    {
        //
    }
}
