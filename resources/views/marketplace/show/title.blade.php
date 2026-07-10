{{-- Título --}}
<div class="bg-white rounded-2xl p-6 md:p-8">

    <h1 class="text-3xl md:text-4xl font-bold text-slate-900 leading-tight">
        {{ $product->title }}
    </h1>

    @if ($product->formatted_price)
        <p class="mt-3 text-3xl font-extrabold text-primary-600">
            {{ $product->formatted_price }}
        </p>
    @endif

    <div class="mt-4 flex flex-wrap gap-2">

        @if ($product->category)
            <span class="text-xs font-semibold px-3 py-1 rounded-full bg-slate-100 text-slate-700">
                {{ $product->category->name }}
            </span>
        @endif

        <span class="text-xs font-semibold px-3 py-1 rounded-full text-white {{ $product->type_badge }}">
            {{ $product->type_label }}
        </span>

    </div>

    @if ($product->location)
        <p class="mt-4 text-sm text-slate-500">
            {{ $product->location }}
        </p>
    @endif

</div>
