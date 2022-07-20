<x-guest-layout>
    <div class="w-full h-16"></div>
    <div class="text-3xl text-center pt-10 pb-10 bg-white">
        <p class="mb-5">Comprar entradas:</p>
        {{-- Obtener el nombre y la localidad del cine --}}
        <p class="mb-5 pb-5 text-2xl"><b>{{ $proyeccion->cine->nombre }}</b> en
            <b>{{ $proyeccion->cine->localidad->nombre }} ({{$proyeccion->hora_inicio}})</b>
        </p>
        <div class="flex justify-between mt-20 pb-12 mb-10">
            <div class="h-96 ml-40">
                <img class="h-96 w-full" src="{{ URL($proyeccion->pelicula->url) }}" alt="imagen de la pelicula">
            </div>

            <div class="h-96 w-1/2 mr-44 ml-16 text-xl text-left">
                <p class="text-3xl pb-3"><b>{{ $proyeccion->pelicula->titulo }}</b></p>
                {{ $proyeccion->pelicula->sinopsis }}
                <br> <br>
                Sala {{$proyeccion->sala}}

            </div>
        </div>
        <div class="mt-16">
            <p>Seleccione su asiento:</p>
            @php
            $asientos = $proyeccion->cine->asientos;
            @endphp
            <form action="" id="sitios" onsubmit="event.preventDefault()">
            @for ($i = 1; $i < $asientos; $i++)
            @if (gettype($i / 16) == "integer")
                <br>
            @endif
            <label class="container" for="{{$i}}">
                <input type="checkbox" value="{{$i}}" name="{{$i}}" id="{{$i}}">
                <span class="checkmark"></span>
              </label>
            @endfor
            <div class="flex justify-center">
                <div class="border-2 border-black mt-10 mb-5 h-8 w-40 text-xl">Pantalla</div>
            </div>
            <script>
                function mostrar(){
                    asientos = [];
                    sitios = document.forms["sitios"].elements.length;
                    for (let i = 0; i < sitios; i++) {
                        document.forms["sitios"].elements[i].disabled = true;
                        if (document.forms["sitios"].elements[i].checked) {
                            asientos.push(i);
                        }
                    }
                    if (asientos.length == 0) {
                        document.getElementById("precio").innerHTML= "no hay asientos seleccionados"
                    }
                    else{
                        document.getElementById("comprar").style.display = "none";
                        document.getElementById("pagar").style.display = "block";
                        filas = [];
                        columnas = [];
                        for (let i = 0; i < asientos.length; i++) {
                            filas.push(Math.floor(asientos[i] / 16))
                            columnas.push(asientos[i] % 16)
                        }
                        document.getElementById("asientosSelec").innerHTML= `Ha seleccionado ${asientos.length} asientos.`
                        document.getElementById("sitioSelec").innerHTML+= `Sus sitios son:`
                        for (let i = 0; i < filas.length; i++) {
                            document.getElementById("sitioSelec").innerHTML+= `<br> Fila: ${filas[i]} `
                            document.getElementById("sitioSelec").innerHTML+= ` Columna: ${columnas[i]}`

                        }
                        document.getElementById("precio").innerHTML= `Precio: ${asientos.length * 7}&euro;`
                    }
                    document.getElementById("asientosPOST").value = asientos
                }
        </script>
            <div>{{-- Boton de comprar --}}
                <input id="comprar" onclick="mostrar()" type="submit" value="Comprar" class="bg-blue-800 hover:bg-blue-900 text-white font-bold py-1 px-2 rounded-full my-5">
            </div>
        </form>
    <div id="asientosSelec" class="mt-10"></div>
    <div id="sitioSelec" class="mt-2 text-xl"></div>
    <div id="precio" class="mt-10 "></div>
    <div class="flex justify-center">
        <form class="py-4" action="{{ route('reservar') }}" method="POST">
            @method('POST')
            @csrf
            <input hidden type="text" value="" id="asientosPOST" name="asientos">
            <input hidden type="text" value="{{$proyeccion->pelicula->id}}" name="pel_id">
            <input hidden type="text" value="{{$proyeccion->cine->id}}" name="cine_id">
            <input hidden type="text" value="{{$proyeccion->sala}}" name="sala">
        <input id="pagar" value="Pagar" style="display: none" type="submit" class="bg-blue-800 hover:bg-blue-900 text-white font-bold py-1 px-2 rounded-full my-5">
        </form>
    </div>
    </div>
    </div>

</x-guest-layout>
