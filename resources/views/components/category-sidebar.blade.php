@props(['categories', 'category' => null, 'indexRoute', 'categoryRoute'])
<aside>

    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
        {{-- Header --}}
        <div class="px-5 py-4 border-b border-slate-100">
            <div class="flex items-center gap-2">
                <x-heroicon-o-squares-2x2 class="w-5 h-5 text-slate-500" />
                <h3 class="font-semibold text-slate-800">
                    Categorías
                </h3>
            </div>
        </div>

        <nav class="p-3 space-y-1">
            {{-- Todas --}}
            <a href="{{ route($indexRoute) }}"
                class="flex items-center justify-between rounded-xl px-3 py-2.5 text-sm transition
                {{ !$category ? 'bg-primary-50 text-primary-600 font-semibold' : 'text-slate-700 hover:bg-slate-50' }}">

                <div class="flex items-center gap-2">
                    <x-heroicon-o-squares-2x2 class="w-4 h-4" />
                    <span>
                        Todas
                    </span>
                </div>
            </a>
            {{-- Categorías principales --}}
            @foreach ($categories as $item)
                <x-category-sidebar-item :item="$item" :category="$category" :category-route="$categoryRoute" />
            @endforeach
        </nav>
        
    </div>

</aside>
