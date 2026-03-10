@extends('layouts.app')

@section('titulo')
    Perfil: {{ $user->username }}
@endsection


@section('contenido')
        <div class="flex justify-center">
        <div class="w-full md:w-8/12 lg:w-6/12 flex items-center md:justify-center md:items-start flex-col md:flex-row">
            <div class="md:w-8/12 lg:w-6/12 px-5">
                <img src="{{$user->imagen ? asset('perfiles/' . $user->imagen) : asset('img/UserLogo.png')}}" alt='imagen usuario' class="rounded-full"/>
            </div>
            <div class="md:w-8/12 lg:w-6/12 px-5 flex flex-col items-center md:justify-center md:items-start py-10 md:py-10">
              <div class="flex items-center gap-2">
              <p class='text-gray-700 text-2xl'>{{ $user->username }}</p>
              
              @auth
                @if ($user->id === Auth::user()->id)
                  <a href="{{ route('perfil.index') }}" 
                  class="text-gray-500 hover:text-gray-600 cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                    <path d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32L19.513 8.2Z" />
                    </svg>


                  </a>
                @endif
              @endauth
              </div>
              <p class="text-gray-800 text-sm font-bold mt-5">
                {{ $user->followers()->count() }}
                <span class="font-normal ">@choice('Seguidor|Seguidores', $user->followers()->count())</span>
              </p>

              <p class="text-gray-800 text-sm font-bold">
              {{ $user->following()->count() }}
                <span class="font-normal ">@choice('siguiendo', $user->following()->count())</span>
              </p>

              <p class="text-gray-800 text-sm font-bold">
                {{ $posts->count() }}
                <span class="font-normal"> Post</span>
              </p>

              @auth
                @if ($user->id !== Auth::user()->id)
                  @if (!$user->siguiendo(Auth::user()))
                    
                  <form action="{{ route('users.follow', $user) }}" method="POST" class="mt-10">
                    @csrf
                    <input type="submit" value="Seguir" class="bg-blue-600 hover:bg-blue-700 transition-colors cursor-pointer 
                    uppercase font-bold w-full p-3 py-2 text-white rounded-lg text-xs"/>
                  </form>
                  
                
                  @else
              <form action="{{ route('users.unfollow', ['user' => $user]) }}" method="POST" class="mt-2">
                @csrf
                <input type="submit" value="Dejar de seguir" class="bg-red-600 hover:bg-red-700 transition-colors cursor-pointer 
                uppercase font-bold w-full p-3 py-2 text-white rounded-lg text-xs"/>
              </form>
              @endif
                @endif
                @endauth
            </div>
        </div>
        </div>

        <section class="container mx-auto mt-10">
            <h2 class="text-4xl text-center font-black my-10">Publicaciones</h2>

            <x-listar-post :posts="$posts"/>
        </section>
@endsection