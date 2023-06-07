<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('titulo')</title>        
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />        
        @vite('resources/js/app.js')
        @vite('resources/css/app.css')
    </head>
    <body class="antialiased bg-gray-100">
        @if ($_SERVER["REQUEST_URI"] != '/login' && $_SERVER["REQUEST_URI"] != '/register')
            <header class="p-5 border-b bg-white shadow ">
                <div class="container mx-auto px-10 flex justify-between items-center">
                <h1 class="text-3xl font-black fa-solid fa-flip" style="--fa-animation-duration: 3s; --fa-animation-iteration-count: 1;"><a href="{{route('home')}}">CloudLib</a></h1>
                    @auth
                    <nav class="flex gap-2 items-center">                                     

                        <button id="dropdownHoverButton" data-dropdown-toggle="dropdownHover" data-dropdown-trigger="hover" class="font-medium hover:text-gray-600 text-lg text-center inline-flex items-center " type="button">{{auth()->user()->username}}</button>

                        <!-- Dropdown menu -->
                        <div id="dropdownHover" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                            <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
                                <div>{{auth()->user()->name}}</div>
                                <div class="font-medium truncate">{{auth()->user()->email}}</div>
                            </div>
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownHoverButton">
                                <li>
                                    {{-- <a href="{{route('posts.index', auth()->user()->username)}}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Mi perfil</a> --}}
                                </li>
                                <li>
                                    <a href="{{route('profile.index', auth()->user()->username)}}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Editar perfil</a>
                                </li>
                                <li>
                                    <a href="{{route('loan.index', auth()->user()->username)}}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Prestamos</a>
                                </li>                         
                            </ul>
                            <div class="py-2">
                                <form action="{{route('logout')}}" method="POST" class="block hover:bg-gray-100  dark:hover:bg-gray-600">
                                    @csrf
                                    <button type="submite" class="px-4 py-2 text-red-500  dark:hover:text-white " href="{{ route('logout') }}">Cerrar Sesion</button>
                                </form>
                            </div>
                        </div>
                                                                    
                    </nav> 
                    @endauth                     
                </div>        
            </header>    
        @endif
    

    <main class="container mx-auto mt-5">        
        @yield('contenido')
    </main>

    <footer class="text-center  p-5 text-gray-500 font-bold uppercase mt-10">
        CloudLib - Todos los derechos reservados {{now()->year}} <br>        
        Proyecto desarrollado por <br>
        <a href="" class="text-neutral-800 italic hover:text-blue-600 ">Andrei Chiorian</a> 
    </footer>
    
    <script src="https://unpkg.com/flowbite@1.5.1/dist/flowbite.js"></script>
    </body>
</html>
