<x-layout>
@foreach ($peliculas as $pelicula)
<h1>Peliculas:</h1>
    <ul>
        <li>{{$pelicula->titulo}}</li>
        <li>{{$pelicula->duracion}}</li>
    </ul>
@endforeach
</x-layout>
