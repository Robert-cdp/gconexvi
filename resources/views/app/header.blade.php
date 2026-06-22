<header class="bg-white/90 backdrop-blur-md border-b border-slate-200 sticky top-0 z-50 shadow-sm">
    <div class="max-w-7xl mx-auto px-6">
        <div class="flex items-center justify-between h-16">
            <a href="{{ route('index') }}" class="flex items-center gap-2 text-2xl font-bold text-primary-600">
                <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
                    <circle cx="12" cy="6" r="4" />
                    <circle cx="6" cy="18" r="4" />
                    <circle cx="18" cy="18" r="4" />
                    <line x1="9.5" y1="8.5" x2="7.5" y2="15.5" stroke="currentColor"
                        stroke-width="2" />
                    <line x1="14.5" y1="8.5" x2="16.5" y2="15.5" stroke="currentColor"
                        stroke-width="2" />
                </svg>
                {{ config('app.name') }}
            </a>
            <nav class="hidden md:flex items-center gap-1">
                <a href="{{ route('index') }}" class="px-4 py-2 rounded-lg text-sm font-medium text-slate-700 hover:bg-primary-50 hover:text-primary-600 transition-colors">
                    Inicio
                </a>
                <a href="servicios.html"
                    class="px-4 py-2 rounded-lg text-sm font-medium bg-primary-50 text-primary-700 transition-colors">Servicios</a>
                <a href="#"
                    class="px-4 py-2 rounded-lg text-sm font-medium text-slate-700 hover:bg-primary-50 hover:text-primary-600 transition-colors">Trabajos</a>
                <a href="#"
                    class="px-4 py-2 rounded-lg text-sm font-medium text-slate-700 hover:bg-primary-50 hover:text-primary-600 transition-colors">Comunidad</a>
                <a href="#"
                    class="px-4 py-2 rounded-lg text-sm font-medium text-slate-700 hover:bg-primary-50 hover:text-primary-600 transition-colors">Marketplace</a>
            </nav>
            <div class="flex items-center gap-3">
                <button
                    class="hidden sm:inline-flex px-4 py-2 rounded-lg text-sm font-semibold text-slate-700 border border-slate-300 hover:bg-slate-100 transition-all">Ingresar</button>
                <button
                    class="px-4 py-2 rounded-lg text-sm font-semibold text-white bg-primary-600 hover:bg-primary-700 shadow-md shadow-primary-200 transition-all">Registrarse</button>
            </div>
        </div>
    </div>
</header>
