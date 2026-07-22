@props(['item', 'category', 'categoryRoute'])
<div x-data="{
    open: {{ $category && ($category->id === $item->id || $category->parent_id === $item->id) ? 'true' : 'false' }}
}">
    <div class="flex items-center rounded-xl hover:bg-slate-50 transition">
        {{-- Link categoría --}}
        <a href="{{ route($categoryRoute, $item) }}" class="flex-1 flex items-center gap-2 px-3 py-2.5 text-sm">

            <x-heroicon-o-folder class="w-4 h-4 text-slate-400" />

            <span class="{{ $category?->is($item) ? 'text-primary-600 font-semibold' : 'text-slate-700' }}">
                {{ $item->name }}
            </span>
        </a>
        {{-- Botón expandir --}}
        @if ($item->children->isNotEmpty())
            <button type="button" @click="open=!open" class="p-2 mr-2 rounded-lg hover:bg-slate-100">
                <x-heroicon-o-chevron-right class="w-4 h-4 text-slate-400 transition-transform"
                    x-bind:class="open ? 'rotate-90' : ''" />
            </button>
        @endif
    </div>
    {{-- Hijos --}}
    @if ($item->children->isNotEmpty())
        <div x-show="open" x-collapse class="ml-5 mt-1 border-l border-slate-200 pl-4 space-y-1">
            @foreach ($item->children as $child)
                <x-category-sidebar-item :item="$child" :category="$category" :category-route="$categoryRoute" />
            @endforeach
        </div>
    @endif
</div>
