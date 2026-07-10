<div class="grid sm:grid-cols-2 xl:grid-cols-3 gap-5">
    @foreach ($products as $product)
        <article class="bg-white rounded-2xl overflow-hidden border border-slate-200 card-hover shadow-sm flex flex-col">
            <div class="relative">
                <img src="{{ $product->image_url }}" class="h-44 w-full object-cover" alt="{{ $product->title }}">
                <span
                    class="absolute top-3 right-3 {{ $product->type_badge }} text-white text-xs px-2 py-1 rounded-full">
                    {{ $product->type_label }}
                </span>
            </div>
            <div class="p-5 flex flex-col flex-1">
                <div class="flex items-center gap-3 mb-3">
                    <img src="{{ Storage::url($product->user->avatar ?? 'images/default-avatar.webp') }}"
                        class="w-8 h-8 rounded-full ring-2 ring-primary-100" alt="{{ $product->user->name }}">
                    <div>
                        <p class="text-sm font-semibold text-slate-800">{{ $product->user->name }}</p>
                    </div>
                </div>
                <h3 class="font-bold text-slate-800">{{ $product->title }}</h3>
                <p class="text-sm text-slate-500 mt-1 line-clamp-2 flex-1">
                    {!! $product->description !!}
                </p>
                <div class="mt-4 flex items-center justify-between">
                    {{-- <span class="flex items-center gap-1 text-yellow-500 font-semibold text-sm">⭐ 4.9 <span
                            class="text-slate-400 font-normal">(87)</span></span> --}}
                    @if ($product->formatted_price)
                        <span class="font-bold text-primary-700">
                            {{ $product->formatted_price }}
                        </span>
                    @else
                        <span class="text-sm text-slate-400">
                            Sin precio
                        </span>
                    @endif
                </div>
                <a href="{{ route('marketplace.show', $product) }}"
                    class="mt-4 block w-full py-2 text-center text-sm font-semibold text-white bg-primary-600 rounded-lg hover:bg-primary-700">
                    {{ $product->action_label }}
                </a>
            </div>
        </article>
    @endforeach
</div>
