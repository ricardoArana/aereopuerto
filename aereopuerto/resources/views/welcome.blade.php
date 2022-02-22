<x-layout>

                    @foreach ($peliculas as $pelicula)
                    <ul>
                        <li>{{$pelicula->titulo}}</li>
                    </ul>
                    @endforeach

</x-layout>
