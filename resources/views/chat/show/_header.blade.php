<header
    class="flex items-center gap-3 px-5 py-3 border-b border-gray-100 bg-white/95 backdrop-blur-sm sticky top-0 z-10">
    {{-- Botón hamburguesa (solo móvil) --}}
    <button @click="sidebarOpen = true" class="lg:hidden p-1.5 -ml-1 rounded-lg hover:bg-gray-100 transition">
        <x-heroicon-o-bars-3 class="w-5 h-5 text-gray-500" />
    </button>

    {{-- Avatar del otro participante --}}
    <div class="relative flex-shrink-0">
        @if ($conversation->participantAvatarFor(auth()->user()))
            <img src="{{ $conversation->participantAvatarFor(auth()->user()) }}"
                alt="{{ $conversation->participantNameFor(auth()->user()) }}"
                class="w-10 h-10 rounded-full object-cover ring-2 ring-white shadow-sm">
        @else
            <div
                class="w-10 h-10 rounded-full bg-primary-100 flex items-center justify-center text-sm font-semibold text-primary-600 shadow-sm">
                {{ Str::substr($conversation->participantNameFor(auth()->user()), 0, 1) }}
            </div>
        @endif
        {{-- Indicador de actividad --}}
        {{-- <span class="absolute bottom-0 right-0 w-2.5 h-2.5 bg-green-500 border-2 border-white rounded-full"></span> --}}
    </div>

    <div class="flex-1 min-w-0">
        <h1 class="font-semibold text-gray-900 truncate tracking-tight">
            {{ $conversation->participantNameFor(auth()->user()) }}
        </h1>
        {{-- <div class="flex items-center gap-1.5">
                    <span class="w-1 h-1 bg-green-500 rounded-full"></span>
                    <p class="text-xs text-gray-500">En línea</p>
                </div> --}}
    </div>
</header>
