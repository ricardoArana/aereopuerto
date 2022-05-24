<div>
    <div class="text-2xl flex h-36 bg-gray-100 mx-12 border-black border-2">
        <div class="w-full  ml-28 flex justify-center">
            <!-- Div donde se pregunta la ciudad-->
            <p class=" mt-10">Ciudad:</p>
            <div class="mt-8 w-full ">
                <form action="">
                    @csrf
                    <select id="ciudad" wire:model="localidadLive"
                        class="block appearance-none ml-10 w-72 text-2xl rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                        <option selected="true" disabled="disabled" value="">Seleccione la ciudad</option>
                        @foreach ($localidads as $localidad)
                            <option value="{{ $localidad->nombre }}"> {{ $localidad->nombre }}</option>
                        @endforeach
                    </select>
            </div>
        </div>

        <div class="w-full mr-28 flex justify-center">
            <!-- Div donde se pregunta el cine-->
            <p class=" mt-10">Cine:</p>
            <div class="mt-8 w-1/2 ">
                <select wire:model="cineLive"
                    class="block appearance-none ml-10 w-72 text-2xl  rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                    <option selected="true" value="cine1">Seleccione el cine</option>
                    @foreach ($cines as $cine)
                        <option value="{{ $cine->nombre }}">{{ $cine->nombre }} </option>
                    @endforeach
                </select>
            </div>
        </div>
        </form>
    </div>
    <div class="w-max h-16"></div>
    <div class="bg-white mx-12 h-auto border-black border-2">
        <p class="text-center text-7xl mb-10 pt-5">Cartelera</p>
        <p class="text-center text-2xl">
            @php
                $fecha = date('d-m-Y');
                $localidadMostrar = $cineSelect->localidad;
                echo "<b>$cineSelect->nombre</b> en <b>$localidadMostrar->nombre </b> a <b>$fecha</b>";
            @endphp
        </p>
        @if ($peliculas->isEmpty())
            <p class="text-center text-2xl h-60 mt-32">
                Lo sentimos, parece que no hay películas disponibles para este cine</p>
        @endif
        @foreach ($peliculas as $pelicula)
        @php
            $pel_id = $pelicula->id;
        @endphp
            <div class="flex justify-between mt-20 pb-12 mb-10">
                <div class="h-96 ml-40">
                    <img class="h-96 w-full" src="{{ URL($pelicula->url) }}" alt="imagen de la pelicula">
                </div>
                <div class="h-96 w-1/2 mr-44 ml-16 text-xl text-left">
                    <p class="text-3xl pb-3"><b>{{$pelicula->titulo}}</b></p>
                    {{$pelicula->sinopsis}}
                    @foreach ($proyecciones as $proyeccion)
                        <p>{{ $proyeccion->hora_inicio }}</p>
                    @endforeach

                </div>
            </div>
        @endforeach

    </div>
