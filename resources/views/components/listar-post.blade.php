@props(['posts', 'layout' => 'grid'])

<div>
    @if ($posts->count())

        @if ($layout === 'grid')
            <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @foreach ($posts as $post)
                    <div>
                        <a href="{{ route('posts.show', ['post' => $post, 'user' => $post->user]) }}">
                            <img 
                                src="{{ asset('uploads/' . $post->imagen) }}" 
                                alt="Imagen del post {{ $post->titulo }}"
                                class="w-full object-cover"
                            >
                        </a>
                    </div>
                @endforeach
            </div>

        @else
        <div class="max-w-2xl mx-auto flex flex-col gap-6">
        @foreach ($posts as $post)
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
           
                <div class="flex items-center gap-3 p-4">
                    <div class="w-9 h-9 rounded-full overflow-hidden shrink-0">
                        <img 
                            src="{{ $post->user->imagen ? asset('perfiles/' . $post->user->imagen) : asset('img/UserLogo.png') }}" 
                            alt="{{ $post->user->username }}"
                            class="w-full h-full object-cover"
                        >
                    </div>
                     <a 
                    href="{{ route('posts.index',  $post->user) }}" 
                    class="text-sm text-gray-500 hover:text-gray-800 transition"
                    >
                    <span class="font-bold text-gray-800 text-sm">{{ $post->user->username }}</span>
                     </a>
                </div>

                {{-- Imagen --}}
                <a href="{{ route('posts.show', ['post' => $post, 'user' => $post->user]) }}">
                    <img 
                        src="{{ asset('uploads/' . $post->imagen) }}" 
                        alt="Imagen del post {{ $post->titulo }}"
                        class="w-full object-cover max-h-96"
                    >
                </a>

                {{-- Título --}}
                <div class="p-4">
                  @auth

                    

                    <livewire:like-post :post="$post"/>


                @endauth

                    <p class="font-bold text-gray-800">{{ $post->titulo }}</p>
                </div>
            </div>
        @endforeach
    </div>
        @endif

        <div class="my-10">
            {{ $posts->links('pagination::tailwind') }}
        </div>

    @else
        <p class="text-gray-600 uppercase text-sm text-center font-bold">No hay publicaciones</p>
    @endif
</div>

