<header class="bg-white/90 backdrop-blur-md border-b border-slate-200 sticky top-0 z-50 shadow-sm">
    <div class="max-w-7xl mx-auto px-6">
        <div class="flex items-center justify-between h-16">

            <a href="{{ route('index') }}"
               class="flex items-center gap-2 text-2xl font-bold text-primary-600">
                {{ config('app.name') }}
            </a>

            @include('app.nav')

            {{-- ICONOS AGRUPADOS --}}
            <div class="flex items-center gap-2">
                @include('app.chat')
                @include('app.user')
            </div>

            @guest
                <div class="flex items-center gap-3">
                    <a href="{{ route('login') }}"
                        class="hidden sm:inline-flex px-4 py-2 rounded-lg text-sm font-semibold text-slate-700 border border-slate-300 hover:bg-slate-100 transition-all">
                        Ingresar
                    </a>

                    <a href="{{ route('register') }}"
                        class="px-4 py-2 rounded-lg text-sm font-semibold text-white bg-primary-600 hover:bg-primary-700 shadow-md shadow-primary-200 transition-all">
                        Registrarse
                    </a>
                </div>
            @endguest

        </div>
    </div>
</header>