
    <div class="text-2xl flex h-20 bg-white mx-12">
        <div class="w-full  ml-28 flex justify-center">
            <!-- Div donde se pregunta la ciudad-->
            <p class=" mt-7">Ciudad:</p>
            <div class="mt-5 w-full ">
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
            <p class=" mt-7">Cine:</p>
            <div class="mt-5 w-1/2 ">
                <select wire:model="cineLive"
                    class="block appearance-none ml-10 w-72 text-2xl  rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                    <option selected="true" disabled="disabled" value="">Seleccione el cine</option>
                    @foreach ($cines as $cine)
                        <option value="{{ $cine->nombre }}">{{ $cine->nombre }} </option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="w-full bg-blue-900 h-16"></div>
    <div class="bg-white mx-12 h-auto">
        <p class="text-center text-7xl mb-10">Cartelera</p>
        <p class="text-center text-2xl">
            @php
                $fecha = date('d-m-Y');
                echo "$fecha";
            @endphp
        </p>

        <div class="flex justify-between mt-20 pb-12">
            <div class="h-96 ml-56">
                <img class="h-96"
                src="{{ URL('img/spiderman3.png') }}" alt="youtube">
            </div>
            <div class="h-96 w-1/2 mr-44 text-left">Tras descubrirse la identidad secreta de Peter Parker como Spider-Man, la vida del joven se vuelve una locura. Peter decide pedirle ayuda al Doctor Extraño para recuperar su vida. Pero algo sale mal y provoca una fractura en el multiverso.
            @foreach ($proyecciones as $proyeccion)

            <p>{{$proyeccion->hora_inicio}}</p>
            @endforeach
        </div>
        </div>
