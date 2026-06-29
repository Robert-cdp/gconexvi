<aside class="lg:col-span-1 space-y-6">
    <div class="bg-white rounded-2xl border border-slate-200 p-5 shadow-sm">
        {{-- <h3 class="font-bold text-slate-800 mb-4">Buscar temas</h3>
        <div class="relative mb-5">
            <input type="text" placeholder="Buscar discusión..."
                class="w-full pl-9 pr-4 py-2.5 text-sm border border-slate-200 rounded-xl focus:ring-2 focus:ring-primary-100 focus:border-primary-300 outline-none">
            <svg class="absolute left-3 top-2.5 w-4 h-4 text-slate-400" fill="none" stroke="currentColor"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
        </div> --}}

        <h4 class="text-sm font-semibold text-slate-500 uppercase tracking-wide mb-3">
            Categorías
        </h4>

        <div class="space-y-1">
            <a href="{{ route('community.index') }}"
                class="flex items-center justify-between px-3 py-2 rounded-lg text-sm font-medium bg-primary-50 text-primary-700">
                Todos los temas
                <span class="text-xs bg-primary-200 text-primary-800 px-2 py-0.5 rounded-full">
                    {{ $topics->count() }}
                </span>
            </a>

            @foreach ($categories as $category)
                <a href="{{ route('community.index', ['category' => $category->slug]) }}"
                    class="flex items-center justify-between px-3 py-2 rounded-lg text-sm text-slate-600 hover:bg-slate-50 transition-colors">
                    {{ $category->name }}

                    <span class="text-xs bg-slate-100 text-slate-500 px-2 py-0.5 rounded-full">
                        {{ $category->topics_count }}
                    </span>
                </a>
            @endforeach
        </div>
    </div>

    <div class="bg-white rounded-2xl border border-slate-200 p-5 shadow-sm">
        <h4 class="text-sm font-semibold text-slate-500 uppercase tracking-wide mb-3">
            Miembros activos
        </h4>

        <div class="space-y-3">
            @foreach ($activeUsers as $user)
                <div class="flex items-center gap-3">
                    <img src="{{ Storage::url($user->avatar) }}" class="w-9 h-9 rounded-full ring-2 ring-primary-100"
                        alt="{{ $user->name }}">

                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-medium text-slate-800 truncate">
                            {{ $user->name }}
                        </p>

                        <p class="text-xs text-slate-400">
                            {{ $user->contributions }} aportes
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</aside>
    