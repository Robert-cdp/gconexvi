<nav class="hidden md:flex items-center gap-2">

    <a href="{{ route('index') }}" @class([
        'flex items-center gap-2 px-4 py-2 rounded-xl text-sm font-medium transition-all duration-200',
        'bg-primary-100 text-primary-700 shadow-sm' => request()->routeIs('index'),
        'text-slate-700 hover:bg-primary-50 hover:text-primary-600 hover:-translate-y-0.5' => !request()->routeIs(
            'index'),
    ])>

        <x-heroicon-o-home class="size-5" />

        <span>Inicio</span>

    </a>

    <a href="{{ route('services.index') }}" @class([
        'flex items-center gap-2 px-4 py-2 rounded-xl text-sm font-medium transition-all duration-200',
        'bg-primary-100 text-primary-700 shadow-sm' => request()->routeIs(
            'services.*'),
        'text-slate-700 hover:bg-primary-50 hover:text-primary-600 hover:-translate-y-0.5' => !request()->routeIs(
            'services.*'),
    ])>

        <x-heroicon-o-briefcase class="size-5" />

        <span>Servicios</span>

    </a>

    <a href="{{ route('employments.index') }}" @class([
        'flex items-center gap-2 px-4 py-2 rounded-xl text-sm font-medium transition-all duration-200',
        'bg-primary-100 text-primary-700 shadow-sm' => request()->routeIs(
            'employments.*'),
        'text-slate-700 hover:bg-primary-50 hover:text-primary-600 hover:-translate-y-0.5' => !request()->routeIs(
            'employments.*'),
    ])>

        <x-heroicon-o-briefcase class="size-5" />

        <span>Trabajos</span>

    </a>

    <a href="{{ route('community.index') }}" @class([
        'flex items-center gap-2 px-4 py-2 rounded-xl text-sm font-medium transition-all duration-200',
        'bg-primary-100 text-primary-700 shadow-sm' => request()->routeIs(
            'community.*'),
        'text-slate-700 hover:bg-primary-50 hover:text-primary-600 hover:-translate-y-0.5' => !request()->routeIs(
            'community.*'),
    ])>

        <x-heroicon-o-users class="size-5" />

        <span>Comunidad</span>

    </a>

    <a href="{{ route('marketplace.index') }}" @class([
        'flex items-center gap-2 px-4 py-2 rounded-xl text-sm font-medium transition-all duration-200',
        'bg-primary-100 text-primary-700 shadow-sm' => request()->routeIs(
            'marketplace.*'),
        'text-slate-700 hover:bg-primary-50 hover:text-primary-600 hover:-translate-y-0.5' => !request()->routeIs(
            'marketplace.*'),
    ])>

        <x-heroicon-o-shopping-bag class="size-5" />

        <span>Marketplace</span>

    </a>

</nav>
