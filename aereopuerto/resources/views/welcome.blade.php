<x-guest-layout>
    <h1>Peliculas:</h1>
    @foreach ($peliculas as $pelicula)
        <ul>
            <li>{{$pelicula->sala}}</li>
            <li>{{$pelicula->asiento}}</li>
        </ul>
    @endforeach
</x-guest-layout>


