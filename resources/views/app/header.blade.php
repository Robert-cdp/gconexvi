<header x-data="{ open: false }"
    class="bg-white/90 backdrop-blur-md border-b border-slate-200 sticky top-0 z-50 shadow-sm">

    <div class="max-w-7xl mx-auto px-6">

        <div class="flex items-center justify-between h-16">

            <a href="{{ route('index') }}" class="flex items-center gap-2 text-2xl font-bold text-primary-600">
                {{ config('app.name') }}
            </a>

            {{-- Desktop --}}
            <div class="hidden md:block">
                @include('app.nav')
            </div>

            <div class="flex items-center gap-2">

                @include('app.chat')
                @include('app.user')

                {{-- Botón móvil --}}
                <button @click="open=!open" class="md:hidden p-2 rounded-lg hover:bg-slate-100 transition">

                    <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">

                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>

                    <svg x-show="open" x-cloak xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">

                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>

                </button>

            </div>

        </div>

        {{-- Menú móvil --}}
        <div x-show="open" x-transition @click.outside="open=false" class="md:hidden py-4 border-t border-slate-200">

            @include('app.nav-mobile')

            @guest
                <div class="mt-4 flex flex-col gap-2">

                    <a href="{{ route('login') }}"
                        class="w-full text-center px-4 py-3 rounded-lg border border-slate-300 font-medium">
                        Ingresar
                    </a>

                    <a href="{{ route('register') }}"
                        class="w-full text-center px-4 py-3 rounded-lg bg-primary-600 text-white font-medium">
                        Registrarse
                    </a>

                </div>
            @endguest

        </div>

    </div>

</header>
