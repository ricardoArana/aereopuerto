<x-layout>
@foreach ($peliculas as $pelicula)
    <ul>
        <li>{{$pelicula->titulo}}</li>
        <li>{{$pelicula->duracion}}</li>
    </ul>
@endforeach
</x-layout>
