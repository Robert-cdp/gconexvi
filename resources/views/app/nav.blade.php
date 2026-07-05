<nav class="flex items-center gap-1">
    <a href="{{ route('index') }}"
        class="px-4 py-2 rounded-lg text-sm font-medium text-slate-700 hover:bg-primary-50 hover:text-primary-600 transition-colors">
        Inicio
    </a>

    <a href="{{ route('services.index') }}"
        class="px-4 py-2 rounded-lg text-sm font-medium text-slate-700 hover:bg-primary-50 hover:text-primary-600 transition-colors">
        Servicios
    </a>

    <a href="{{ route('employments.index') }}"
        class="px-4 py-2 rounded-lg text-sm font-medium text-slate-700 hover:bg-primary-50 hover:text-primary-600 transition-colors">
        Trabajos
    </a>

    <a href="{{ route('community.index') }}"
        class="px-4 py-2 rounded-lg text-sm font-medium text-slate-700 hover:bg-primary-50 hover:text-primary-600 transition-colors">
        Comunidad
    </a>
</nav>