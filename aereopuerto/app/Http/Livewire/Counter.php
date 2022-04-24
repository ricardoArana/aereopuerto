<?php

namespace App\Http\Livewire;

use App\Models\Cine;
use App\Models\Localidad;
use Livewire\Component;

class Counter extends Component
{

    public $localidadLive = 'Jerez de la Frontera';
    public $cineLive = 'cine5';

    public function render()
    {
        $cines = Localidad::where('nombre', $this->localidadLive)->get()[0]->cines;
        $proyecciones = Cine::where('nombre', $this->cineLive)->get()[0]->proyecciones;

        return view('livewire.counter', [
            'localidads' => Localidad::all(),
            'cines' => $cines,
            'proyecciones' => $proyecciones,
        ]);
    }
}
