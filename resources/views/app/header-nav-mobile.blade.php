<div
    x-show="open"
    x-cloak
    x-transition:enter="transition ease-out duration-200"
    x-transition:enter-start="opacity-0 -translate-y-2"
    x-transition:enter-end="opacity-100 translate-y-0"
    x-transition:leave="transition ease-in duration-150"
    x-transition:leave-start="opacity-100 translate-y-0"
    x-transition:leave-end="opacity-0 -translate-y-2"
    @click.outside="open = false"
    class="md:hidden border-t border-slate-200 py-4">

    <nav class="flex flex-col gap-1">

        <a href="{{ route('index') }}"
            @class([
                'flex items-center gap-3 px-4 py-3 rounded-xl transition',
                'bg-primary-100 text-primary-700 font-semibold' => request()->routeIs('index'),
                'hover:bg-primary-50 hover:text-primary-600' => !request()->routeIs('index'),
            ])>

            <x-heroicon-o-home class="size-5"/>

            <span>Inicio</span>

        </a>

        <a href="{{ route('services.index') }}"
            @class([
                'flex items-center gap-3 px-4 py-3 rounded-xl transition',
                'bg-primary-100 text-primary-700 font-semibold' => request()->routeIs('services.*'),
                'hover:bg-primary-50 hover:text-primary-600' => !request()->routeIs('services.*'),
            ])>

            <x-heroicon-o-briefcase class="size-5"/>

            <span>Servicios</span>

        </a>

        <a href="{{ route('employments.index') }}"
            @class([
                'flex items-center gap-3 px-4 py-3 rounded-xl transition',
                'bg-primary-100 text-primary-700 font-semibold' => request()->routeIs('employments.*'),
                'hover:bg-primary-50 hover:text-primary-600' => !request()->routeIs('employments.*'),
            ])>

            <x-heroicon-o-briefcase class="size-5"/>

            <span>Trabajos</span>

        </a>

        <a href="{{ route('community.index') }}"
            @class([
                'flex items-center gap-3 px-4 py-3 rounded-xl transition',
                'bg-primary-100 text-primary-700 font-semibold' => request()->routeIs('community.*'),
                'hover:bg-primary-50 hover:text-primary-600' => !request()->routeIs('community.*'),
            ])>

            <x-heroicon-o-users class="size-5"/>

            <span>Comunidad</span>

        </a>

        <a href="{{ route('marketplace.index') }}"
            @class([
                'flex items-center gap-3 px-4 py-3 rounded-xl transition',
                'bg-primary-100 text-primary-700 font-semibold' => request()->routeIs('marketplace.*'),
                'hover:bg-primary-50 hover:text-primary-600' => !request()->routeIs('marketplace.*'),
            ])>

            <x-heroicon-o-shopping-bag class="size-5"/>

            <span>Marketplace</span>

        </a>

    </nav>

    @guest

        <div class="mt-4 flex flex-col gap-2">

            <a href="{{ route('login') }}"
                class="flex items-center justify-center gap-2 px-4 py-3 rounded-xl border border-slate-300 font-medium hover:bg-slate-100 transition">

                <x-heroicon-o-arrow-right-on-rectangle class="size-5"/>

                <span>Ingresar</span>

            </a>

            <a href="{{ route('register') }}"
                class="flex items-center justify-center gap-2 px-4 py-3 rounded-xl bg-primary-600 text-white font-medium hover:bg-primary-700 transition">

                <x-heroicon-o-user-plus class="size-5"/>

                <span>Registrarse</span>

            </a>

        </div>

    @endguest

</div>