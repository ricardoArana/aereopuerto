<x-layout>

    <table class="border-collapse border border-gray-400">
        <thead>
          <tr>
            <th class="border border-gray-300">C. de vuelo</th>
            <th class="border border-gray-300">Origen</th>
            <th class="border border-gray-300">Destino</th>
            <th class="border border-gray-300">Compañía</th>
            <th class="border border-gray-300 w-100">Hora de salida</th>
            <th class="border border-gray-300">Hora de llegada</th>
            <th class="border border-gray-300">Plazas</th>
            <th class="border border-gray-300">Precio</th>
            <th class="border border-gray-300"></th>
          </tr>
        </thead>
        <tbody>
            @php
            $vuelos = DB::table('vuelos')->get();
            @endphp
            @foreach ($vuelos as $vuelo)
            <tr>
                <td class="border border-gray-300">{{$vuelo->codigo}}</td>
                <td class="border border-gray-300">{{$vuelo->origen_id}}</td>
                <td class="border border-gray-300">{{$vuelo->destino_id}}</td>
                <td class="border border-gray-300">{{$vuelo->compania_id}}</td>
                <td class="border border-gray-300">{{$vuelo->salida}}</td>
                <td class="border border-gray-300">{{$vuelo->llegada}}</td>
                <td class="border border-gray-300">{{$vuelo->plazas}}</td>
                <td class="border border-gray-300">{{$vuelo->precio}}</td>
                <td><button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded" type="submit">Reservar</button></td>
            </tr>
            @endforeach
        </tbody>
    </table>

</x-layout>
