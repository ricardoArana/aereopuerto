<x-layout>

    <p>Selecciona la reserva que quieras hacer:</p>
    <form id="reservas" action="/reservar/{{$id}}" method="post">
        <input type="submit" value="Reservar">
        @csrf
        <p>Asientos disponibles: </p>
        <select name="asiento" form="reservas">
            @for ($i = 1; $i<=($plazas[0]->plazas); ++$i){
                    @if(in_array($i, App\Http\Controllers\VuelosController::asientosOcupados($id)))
                        @continue
                    @else

                    <option value="{{$i}}">{{$i}}</option>
                    @endif
            }
            @endfor
        </select>
    </form>

</x-layout>
