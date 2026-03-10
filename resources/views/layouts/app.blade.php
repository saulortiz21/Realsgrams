<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @stack('styles')
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <!-- Dropzone styles -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.css">
        

        <title>Realsgram - @yield('titulo')</title>
        @livewireStyles
    </head>
    <body class="bg-gray-100">
        <header class="p-5 border-b bg-white shadow">
            <div class="container mx-auto flex justify-between items-center">
               
              <a href="{{ route('home') }}" class=" text-3xl font-black">
                Realsgram
               </a>
                

             @auth
             <div class="flex items-center gap-4">

                   
                    <livewire:search-post />
                    {{-- Create Post --}}
                   <a 
                    href="{{ route('posts.create') }}" 
                    class="inline-flex items-center gap-2 px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-semibold rounded-lg transition shadow-sm"
                    >
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                    </svg>
                    Crear Post
                    </a>

                    {{-- User greeting --}}
                    <a 
                    href="{{ route('posts.index', auth()->user()) }}" 
                    class="text-sm text-gray-500 hover:text-gray-800 transition"
                    >
                    Hola, <span class="font-semibold text-gray-800">{{ auth()->user()->username }}</span>
                    </a>

                    {{-- Logout --}}
                    <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button 
                    type="submit" 
                    class="inline-flex items-center gap-1.5 px-3 py-2 text-sm font-medium text-gray-500 hover:text-red-600 hover:bg-red-50 rounded-lg border border-transparent hover:border-red-100 transition"
                    >
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15M12 9l3 3m0 0-3 3m3-3H2.25" />
                    </svg>
                    Cerrar Sesión
                    </button>
                    </form>

                </div>
                @endauth


                 @guest
                   <nav class="flex gap-2 items-center">
                        <a class="flex items-center gap-2 bg-white border p-2 text-gray-600 rounded text-sm uppercase font-bold cursor-pointer"
                        href="/Crear-Cuenta">
                            Crear Cuenta
                        </a>
                        <a class="font-bold text-gray-600 text-sm" href="{{ route('login') }}">
                            Login    
                        </a> 
                    </nav>
                    
                 @endguest
                    
                    

            </div>
        </header>

        <main class="container mx-auto mt-10">
            <h2 class="font-black text-center text-3xl mb-10">
                @yield('titulo')
            </h2>
            @yield('contenido')
        </main>

        <footer class="mt-10 text-center p-5 text-gray-500 font-bold uppercase">
            Realsgram - Todos los derechos reservados 
            {{ now()->year }}
        </footer>
        @livewireScripts
    </body>
</html>