<h2 class="text-xs font-bold uppercase tracking-widest text-slate-400 mb-4">
    Detalles
</h2>

<dl class="divide-y divide-slate-100 text-sm">

    <div class="flex justify-between py-3">
        <dt class="text-slate-500">Tipo</dt>
        <dd class="font-semibold text-slate-900">
            {{ $product->type_label }}
        </dd>
    </div>

    <div class="flex justify-between py-3">
        <dt class="text-slate-500">Categoría</dt>
        <dd class="font-semibold text-slate-900">
            {{ $product->category?->name ?? 'Sin categoría' }}
        </dd>
    </div>

    @if ($product->location)
        <div class="flex justify-between py-3">
            <dt class="text-slate-500">Ubicación</dt>
            <dd class="font-semibold text-slate-900">
                {{ $product->location }}
            </dd>
        </div>
    @endif

    @if ($product->formatted_price)
        <div class="flex justify-between py-3">
            <dt class="text-slate-500">Precio</dt>
            <dd class="font-semibold text-slate-900">
                {{ $product->formatted_price }}
            </dd>
        </div>
    @endif

    <div class="flex justify-between py-3">
        <dt class="text-slate-500">Publicado</dt>
        <dd class="font-semibold text-slate-900">
            {{ $product->created_at->format('d/m/Y') }}
        </dd>
    </div>

</dl>
