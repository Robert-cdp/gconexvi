<header x-data="{ open: false }"
    class="sticky top-0 z-50 bg-white/90 backdrop-blur-md border-b border-slate-200 shadow-sm">

    <div class="max-w-7xl mx-auto px-6">

        <div class="flex items-center justify-between h-16">

            {{-- Logo --}}
            <a href="{{ route('index') }}"
                class="flex items-center gap-2 text-2xl font-bold text-primary-600 hover:text-primary-700 transition">
                {{ config('app.name') }}
            </a>

            {{-- Navegación escritorio --}}
            @include('app.header-nav')

            {{-- Acciones --}}
            <div class="flex items-center gap-3">

                @include('app.chat')

                @include('app.user')

                @guest
                    <div class="hidden sm:flex items-center gap-3">
                        <a href="{{ route('login') }}"
                            class="px-4 py-2 rounded-xl text-sm font-semibold border border-slate-300 text-slate-700 hover:bg-slate-100 transition">
                            Ingresar
                        </a>
                        <a href="{{ route('register') }}"
                            class="px-4 py-2 rounded-xl text-sm font-semibold bg-primary-600 text-white hover:bg-primary-700 shadow-md shadow-primary-200 transition">
                            Registrarse
                        </a>
                    </div>
                @endguest

                {{-- Botón móvil --}}
                <button @click="open = !open" class="md:hidden p-2 rounded-xl hover:bg-slate-100 transition" aria-label="Abrir menú">
                    <div x-show="!open" x-cloak>
                    </div>
                    <div x-show="open" x-cloak>
                    </div>
                </button>
            </div>
        </div>

        {{-- Menú móvil --}}
        @include('app.header-nav-mobile')

    </div>

</header>
