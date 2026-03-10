@extends('layouts.app')

@section('titulo')
    Inicia Sesion en Realsgram
@endsection


@section('contenido')
    <div class="md:flex md:justify-center">
        <div class="md:w-4/12">
            <p>Imagen aqui</p>
        </div>
        <div class="md:w-4/12 bg-white rounded-lg  p-6 shadow-xl">
            <form action="{{ route('login')}}" method="POST" novalidate>
                @csrf
                
                @if (session('Mensaje'))
               
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                    {{ session('Mensaje') }}</p>
    
                    
                @endif

                      <div class="mb-5">
                    <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">
                     Correo</label>   
                     <input 
                        id="email"
                        name="email"
                        type="email"
                        placeholder="Correo electronico"
                        class="border p-3 w-full rounded-lg @error('email') border-red-500 
                        @enderror"
                        value="{{ old('email')}}"
                     />
                      @error('email')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                    {{ $message }}
                    </p>
                    @enderror
                </div>
                     <div class="mb-5">
                    <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">
                     Contraseña</label>   
                     <input 
                        id="password"
                        name="password"
                        type="password"
                        placeholder="Ingrese Contraseña"
                        class="border p-3 w-full rounded-lg"
                     />
                      @error('password')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                    {{ $message }}
                    </p>
                    @enderror
                </div>
                    <div class="mb-5">
                        <input type="checkbox" name="remember"><label class=" ml-1 text-gray-500 text-sm">Mantener sesion abierta</label>
                    </div>
                    <input type="submit"
                    value="Iniciar Sesion"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer 
                    uppercase font-bold w-full p-3 text-white rounded-lg"
                    />
            </form>
        </div>
    </div>

   @endsection 