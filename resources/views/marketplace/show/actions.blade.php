<div class="mt-6 space-y-3">

    @can('create', [App\Models\Chat\Conversation::class, $product])

        <form action="{{ route('chat.conversations.store') }}" method="POST">
            @csrf

            <input type="hidden" name="type" value="product">
            <input type="hidden" name="id" value="{{ $product->id }}">

            <button
                class="flex items-center justify-center w-full py-3 bg-primary-600 text-white font-semibold rounded-xl hover:bg-primary-700 active:scale-[.98] transition-all shadow-lg shadow-primary-200">

                Contactar vendedor

            </button>

        </form>

    @endcan


    @can('update', $product)

        <a
            href="{{ route('marketplace.edit', $product) }}"
            class="flex items-center justify-center w-full py-3 border border-slate-300 text-slate-700 font-semibold rounded-xl hover:bg-slate-50 hover:border-slate-400 active:scale-[.98] transition-all">

            Editar publicación

        </a>

    @endcan


    @can('create', [App\Models\Reviews\Review::class, $product])

        <a
            href="{{ route('reviews.create', ['type' => 'product', 'id' => $product->id]) }}"
            class="flex items-center justify-center w-full py-3 border border-slate-300 text-slate-700 font-semibold rounded-xl hover:bg-slate-50 hover:border-slate-400 active:scale-[.98] transition-all">

            Dejar review

        </a>

    @endcan

</div>