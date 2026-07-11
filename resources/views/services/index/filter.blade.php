<aside class="lg:col-span-1 space-y-6">
    <div class="bg-white rounded-2xl border border-slate-200 p-5 shadow-sm">
        <h3 class="font-bold text-slate-800 mb-4">Categorías</h3>

        <div class="space-y-1">
            <a href="{{ route('services.index') }}"
                class="flex items-center justify-between px-3 py-2 rounded-lg text-sm transition-colors
                {{ !$category ? 'bg-primary-50 text-primary-600 font-medium' : 'text-slate-600 hover:bg-slate-50' }}">
                Todas
            </a>

            @foreach ($categories as $item)
                <a href="{{ route('services.category', $item) }}"
                    class="flex items-center justify-between px-3 py-2 rounded-lg text-sm transition-colors
                    {{ $category?->is($item)
                        ? 'bg-primary-50 text-primary-600 font-medium'
                        : 'text-slate-600 hover:bg-slate-50' }}">
                    {{ $item->name }}

                    @if(isset($item->services_count))
                        <span class="text-xs bg-slate-100 text-slate-500 px-2 py-0.5 rounded-full">
                            {{ $item->services_count }}
                        </span>
                    @endif
                </a>
            @endforeach
        </div>
    </div>
</aside>