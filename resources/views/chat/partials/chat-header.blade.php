<header class="flex items-center justify-between px-4 lg:px-6 py-3 border-b border-gray-200 bg-white shadow-sm z-10">
    <div class="flex items-center gap-3 min-w-0">
        {{-- Botón mobile para abrir sidebar --}}
        <button @click="sidebarOpen = true"
            class="lg:hidden p-2 -ml-2 text-gray-400 hover:text-gray-600 hover:bg-gray-100 rounded-xl transition">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M13 16h-1v-4h-1m1-4h.01M12 2a10 10 0 100 20 10 10 0 000-20z" />
            </svg>
        </button>

        {{-- Avatar del participante --}}
        <div class="flex-shrink-0 w-9 h-9 rounded-full bg-gray-200 overflow-hidden">
            @if ($conversation->participant->avatar ?? false)
                <img src="{{ $conversation->participant->avatar }}" alt="{{ $conversation->participant->name }}"
                    class="w-full h-full object-cover">
            @else
                <div class="w-full h-full flex items-center justify-center text-gray-400 text-sm font-medium">
                    {{ strtoupper(substr($conversation->participant->name, 0, 2)) }}
                </div>
            @endif
        </div>

        {{-- Nombre --}}
        <h1 class="text-sm font-semibold text-gray-900 truncate">
            {{ $conversation->participant->name }}
        </h1>
    </div>
</header>
