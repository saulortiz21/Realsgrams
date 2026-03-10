<?php

use Livewire\Component;
use App\Models\User;
new class extends Component
{
  public $search = '';

    public function with(): array
    {
        $users = User::search($this->search)
                    ->when($this->search, fn($q) => $q->limit(10))
                    ->get();

        return ['users' => $users];
    }
}
?>

<div class="relative">
        <input 
        type="text" 
        wire:model.live.debounce.300ms="search"
        placeholder="Buscar usuarios..."
        class="pl-9 pr-4 py-2 text-sm border border-gray-200 rounded-lg bg-gray-50 w-56 focus:outline-none focus:ring-2 focus:ring-indigo-300"
    >

    {{-- Icono --}}
    <span class="absolute inset-y-0 left-3 flex items-center text-gray-400 pointer-events-none">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
            <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25Zm-1.125 4.5a4.125 4.125 0 1 0 2.338 7.524l2.007 2.006a.75.75 0 1 0 1.06-1.06l-2.006-2.007a4.125 4.125 0 0 0-3.399-6.463Z" clip-rule="evenodd" />
        </svg>
    </span>

    {{-- Resultados --}}
    @if ($search)
        <div class="absolute top-10 left-0 w-56 bg-white border border-gray-100 rounded-lg shadow-lg z-50">
            @forelse ($users as $user)
                <a 
                    href="{{ route('posts.index', $user) }}"
                    class="flex items-center gap-3 p-3 hover:bg-gray-50 transition"
                >
                    <img 
                        src="{{ $user->imagen ? asset('perfiles/' . $user->imagen) : asset('img/UserLogo.png') }}"
                        alt="{{ $user->username }}"
                        class="w-8 h-8 rounded-full object-cover"
                    >
                    <div>
                        <p class="text-sm font-semibold text-gray-800">{{ $user->username }}</p>
                        <p class="text-xs text-gray-400">{{ $user->name }}</p>
                    </div>
                </a>
            @empty
                <p class="text-sm text-gray-400 text-center p-4">No se encontraron usuarios</p>
            @endforelse
        </div>
    @endif
</div>