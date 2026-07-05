<header
    x-data="{ open: false }"
    class="bg-white/90 backdrop-blur-md border-b border-slate-200 sticky top-0 z-50 shadow-sm">

    <div class="max-w-7xl mx-auto px-6">

        <div class="flex items-center justify-between h-16">

            {{-- Logo --}}
            <a href="{{ route('index') }}"
               class="flex items-center gap-2 text-2xl font-bold text-primary-600">
                {{ config('app.name') }}
            </a>

            {{-- Navegación escritorio --}}
            <div class="hidden md:block p-2">
                @include('app.nav')
            </div>

            {{-- Acciones --}}
            <div class="flex items-center gap-2">

                @include('app.chat')

                @include('app.user')

                @guest
                    <div class="hidden sm:flex items-center gap-3">

                        <a href="{{ route('login') }}"
                            class="px-4 py-2 rounded-lg text-sm font-semibold text-slate-700 border border-slate-300 hover:bg-slate-100 transition-all">
                            Ingresar
                        </a>

                        <a href="{{ route('register') }}"
                            class="px-4 py-2 rounded-lg text-sm font-semibold text-white bg-primary-600 hover:bg-primary-700 shadow-md shadow-primary-200 transition-all">
                            Registrarse
                        </a>

                    </div>
                @endguest

                {{-- Botón hamburguesa (solo móvil) --}}
                <button
                    @click="open = !open"
                    class="md:hidden p-2 rounded-lg hover:bg-slate-100 transition"
                    aria-label="Abrir menú">

                    {{-- Abrir --}}
                    <svg x-show="!open"
                        xmlns="http://www.w3.org/2000/svg"
                        class="w-6 h-6"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor">

                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>

                    {{-- Cerrar --}}
                    <svg x-show="open"
                        x-cloak
                        xmlns="http://www.w3.org/2000/svg"
                        class="w-6 h-6"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor">

                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M6 18L18 6M6 6l12 12"/>
                    </svg>

                </button>

            </div>

        </div>

        {{-- Menú móvil --}}
        <div
            x-show="open"
            x-transition.origin.top
            @click.outside="open = false"
            x-cloak
            class="md:hidden border-t border-slate-200 py-4">

            <nav class="flex flex-col">

                <a href="{{ route('index') }}"
                    class="px-4 py-3 rounded-lg hover:bg-primary-50 hover:text-primary-600">
                    Inicio
                </a>

                <a href="{{ route('services.index') }}"
                    class="px-4 py-3 rounded-lg hover:bg-primary-50 hover:text-primary-600">
                    Servicios
                </a>

                <a href="{{ route('employments.index') }}"
                    class="px-4 py-3 rounded-lg hover:bg-primary-50 hover:text-primary-600">
                    Trabajos
                </a>

                <a href="{{ route('community.index') }}"
                    class="px-4 py-3 rounded-lg hover:bg-primary-50 hover:text-primary-600">
                    Comunidad
                </a>

            </nav>

            @guest
                <div class="mt-4 flex flex-col gap-2 sm:hidden">

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

