<x-layout>
    <p class="text-2xl">Tus reservas:</p>
    <table class="border-collapse border border-gray-400">
        <thead>
          <tr>
            <th class="border border-gray-300">Asiento</th>
            <th class="border border-gray-300">Origen</th>
            <th class="border border-gray-300">Destino</th>
            <th class="border border-gray-300">Compañía</th>
            <th class="border border-gray-300 w-100">Hora de salida</th>
            <th class="border border-gray-300">Hora de llegada</th>
            <th class="border border-gray-300">Precio</th>
            <th class="border border-gray-300"></th>
          </tr>
        </thead>
        <tbody>
            @foreach ($reservas as $reserva)

            <tr>
                <td class="border border-gray-300">{{$reserva->asiento}}</td>
                <td class="border border-gray-300">{{$reserva->origen}}</td>
                <td class="border border-gray-300">{{$reserva->destino}}</td>
                <td class="border border-gray-300">{{$reserva->compania}}</td>
                <td class="border border-gray-300">{{$reserva->salida}}</td>
                <td class="border border-gray-300">{{$reserva->llegada}}</td>
                <td class="border border-gray-300">{{$reserva->precio}}</td>
                <td>
                    <a href="/reservas/borrar/{{$reserva->id}}">
                        <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded" type="submit">Borrar</button>
                    </a>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
</x-layout>
