@extends('layouts.app')

@section('titulo')
    Registro Realsgram
@endsection


@section('contenido')
    <div class="md:flex md:justify-center">
        <div class="md:w-4/12">
            <p>Imagen aqui</p>
        </div>
        <div class="md:w-4/12 bg-white rounded-lg  p-6 shadow-xl">
            <form action="{{ route('Registrate')}}" method="POST" novalidate>
                @csrf
                <div class="mb-5">
                    <label for="name" class="mb-2 block uppercase text-gray-500 font-bold sha">
                     Nombre</label>   
                     <input 
                        id="name"
                        name="name"
                        type="text"
                        placeholder="tu nombre"
                        class="border shadow p-3 w-full rounded-lg @error('name') border-red-500 
                        @enderror"
                        value="{{ old('name')}}"
                     />

                     @error('name')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                    {{ $message }}
                    </p>
                    @enderror
                </div>
                 <div class="mb-5">
                    <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">
                     Nombre de usuario:</label>   
                     <input 
                        id="username"
                        name="username"
                        type="text"
                        placeholder="Nombre de usuario"
                        class="border p-3 w-full rounded-lg @error('username') border-red-500 
                        @enderror"
                        value="{{ old('username')}}"
                     />
                       @error('username')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                    {{ $message }}
                    </p>
                    @enderror
                </div>
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
                    <label for="password_confirmation" class="mb-2 block uppercase text-gray-500 font-bold">
                     Repetir contraseña</label>   
                     <input 
                        id="password_confirmation"
                        name="password_confirmation"
                        type="password"
                        placeholder="Repite tu Contraseña"
                        class="border p-3 w-full rounded-lg"
                     />
                
                </div>
                    <input type="submit"
                    value="Crear Cuenta"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer 
                    uppercase font-bold w-full p-3 text-white rounded-lg"
                    />
            </form>
        </div>
    </div>

   @endsection 