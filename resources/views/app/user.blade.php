@auth
    <div class="relative" x-data="{ open: false }">

        <button @click="open = !open"
            class="flex items-center gap-2 px-3 py-2 rounded-lg hover:bg-slate-100 transition-colors">
            <img src="{{ auth()->user()->avatar ? Storage::url(auth()->user()->avatar) : asset('storage/images/default-avatar.webp') }}"
                alt="{{ auth()->user()->name }}"
                class="w-8 h-8 rounded-full object-cover border-2 border-primary-100">

            <span class="hidden sm:inline text-sm font-medium text-slate-700">
                {{ auth()->user()->name }}
            </span>

            <x-heroicon-o-chevron-down
                class="w-4 h-4 text-slate-400 transition-transform duration-200"
                x-bind:class="open ? 'rotate-180' : ''" />
        </button>

        <div x-show="open"
            x-cloak
            @click.away="open = false"
            x-transition:enter="transition ease-out duration-150"
            x-transition:enter-start="opacity-0 scale-95"
            x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-100"
            x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-95"
            class="absolute right-0 mt-2 w-56 bg-white rounded-xl border border-slate-200 shadow-lg py-1 z-50 origin-top-right">

            <div class="px-4 py-3 border-b border-slate-100">
                <p class="text-sm font-semibold text-slate-800 truncate">
                    {{ auth()->user()->name }}
                </p>
                <p class="text-xs text-slate-500 truncate">
                    {{ auth()->user()->email }}
                </p>
            </div>

            <a href="{{ route('user.profile', auth()->user()->slug) }}"
                class="flex items-center gap-3 px-4 py-2.5 text-sm text-slate-700 hover:bg-primary-50 transition-colors">
                <x-heroicon-o-user class="w-4 h-4 text-slate-400" />
                Mi perfil
            </a>

            <a href="{{ route('user.settings.general') }}"
                class="flex items-center gap-3 px-4 py-2.5 text-sm text-slate-700 hover:bg-primary-50 transition-colors">
                <x-heroicon-o-cog-6-tooth class="w-4 h-4 text-slate-400" />
                Configuración
            </a>

            <div class="border-t border-slate-100 mt-1 pt-1">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button type="submit"
                        class="flex items-center gap-3 w-full px-4 py-2.5 text-sm text-red-600 hover:bg-red-50 transition-colors">
                        <x-heroicon-o-arrow-right-on-rectangle class="w-4 h-4" />
                        Cerrar sesión
                    </button>
                </form>
            </div>

        </div>
    </div>
@endauth