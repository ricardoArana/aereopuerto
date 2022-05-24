<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    @livewireStyles
</head>

<body>
    <div class="font-sans text-gray-900 antialiased">
        <header class="w-full h-10">
            <div class="flex justify-between mx-36 my-10 p-1 border-b-2 border-y-blue-900">
                <a class="text-3xl mr-24 ml-4 hover:animate-waving hover:text-blue-800" href="{{route('inicio')}}">Logo</a>
                <a class="text-3xl hover:animate-waving hover:text-blue-800" href="#">Cines</a>
                <a class="text-3xl hover:animate-waving hover:text-blue-800" href="{{route('peliculas')}}">Películas</a>
                <a class="text-3xl mr-4 hover:animate-waving hover:text-blue-800" href="#">FQ</a>
            </div>
        </header>
        <main class="mx-1 h-auto mt-4 pb-10 bg-contain" style="background-image: url({{ URL('img/cineFondo.jpg') }})">
            {{ $slot }}
        </main>
        <footer class="flex justify-center bg-gray-900   w-full h-96 mt-1">
            <div class="bg-gray-100 mt-4 w-full mx-10 h-5/6">
                <div class="grid grid-rows-3 grid-flow-col gap-4 bg-gray-100 h-4/5">
                    <div class="absolute mt-6">
                        <p class="ml-44 text-2xl">cines.arana@gmail.com</p>
                    </div>
                    <div class="inline-flex mt-14 ml-44 col-span-full">
                        <a href="https://www.facebook.com/"><img class="mt-3 mr-1 w-8 h-8"
                                src="{{ URL('img/facebook.png') }}" alt="facebook"></a>
                        <a href="https://www.instagram.com/"><img class="mt-1 mr-1 w-12 h-12"
                                src="{{ URL('img/instagram.png') }}" alt="instagram"></a>
                        <a href="https://www.twitter.com/"><img class="mt-3 mr-1 w-8 h-8"
                                src="{{ URL('img/twitter.png') }}" alt="twitter"></a>
                        <a href="https://www.youtube.com/"><img class="mt-3 mr-1 w-11 h-8"
                                src="{{ URL('img/youtube.png') }}" alt="youtube"></a>
                    </div>
                    <div class="col-span-2 row-span-4 text-right mr-44 mt-6">
                        <p class="text-2xl">¿Tiene algún problema?</p>
                        <p class="text-xl mr-3 mt-2"> <a class="text-blue-600" href="#">Contacte</a> con nosotros</p>
                    </div>
                </div>
            </div>
            <div class="w-full absolute mt-32">
                <p class="text-center text-3xl"> Nuestros Cines:</p>
                <div class="mt-12 ml-32 mr-32">
                <a class="ml-20 text-xl hover:text-blue-800" href="#">Cine1</a>
                <a class="ml-20 text-xl hover:text-blue-800" href="#">Cine2</a>
                <a class="ml-20 text-xl hover:text-blue-800" href="#">Cine3</a>
                <a class="ml-20 text-xl hover:text-blue-800" href="#">Cine4</a>
                <a class="ml-20 text-xl hover:text-blue-800" href="#">Cine5</a>
                <a class="ml-20 text-xl hover:text-blue-800" href="#">Cine6</a>
            </div>
        </div>
        </footer>
    </div>
    @livewireScripts
</body>

</html>
