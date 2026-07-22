<aside class="lg:col-span-1 space-y-6">

    <x-category-sidebar :categories="$categories" :category="$category" index-route="community.index" category-route="community.category" />

    <div class="bg-white rounded-2xl border border-slate-200 p-5 shadow-sm">
        <h4 class="text-sm font-semibold text-slate-500 uppercase tracking-wide mb-3">
            Miembros activos
        </h4>

        <div class="space-y-3">
            @foreach ($activeUsers as $user)
                <div class="flex items-center gap-3">
                    <img src="{{ Storage::url($user->avatar ?? 'images/default-avatar.webp') }}"
                        class="w-9 h-9 rounded-full ring-2 ring-primary-100" alt="{{ $user->name }}">

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
