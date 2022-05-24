<?php

namespace App\Http\Livewire;

use App\Models\Cine;
use App\Models\Localidad;
use Livewire\Component;

class Counter extends Component
{

    public $localidadLive = 'Sanlúcar de Bda';
    public $cineLive = 'cine1';
    public $pel_id;

    public function render()
    {
        $cines = Localidad::where('nombre', $this->localidadLive)->get()[0]->cines;
        $proyecciones = Cine::where('nombre', $this->cineLive, 'pelicula_id', $this->pel_id)->get()[0]->proyecciones;
        $cineSelect= Cine::where('nombre', $this->cineLive)->get()[0];
        return view('livewire.counter', [
            'localidads' => Localidad::all(),
            'cines' => $cines,
            'proyecciones' => $proyecciones,
            'cineSelect' => $cineSelect,
            'peliculas' => $this->peliculasByProyeccion(),
        ]);
    }
    public function peliculasByProyeccion()
    {
        $proyecciones = Cine::where('nombre', $this->cineLive)->get()[0]->proyecciones;
        $peliculasColl = collect([]);
        for ($i=0; $i < count($proyecciones); $i++) {
            $peliculasColl->push($proyecciones[$i]->pelicula);
        }
        return $peliculasColl->unique();
    }

}
