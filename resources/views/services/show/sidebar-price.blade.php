<div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6">
    <div class="flex items-center justify-between mb-4">
        <span class="text-3xl font-extrabold text-primary-700">
            {{ $service->price }} USD
        </span>

        <span class="text-sm text-slate-500 bg-slate-100 px-3 py-1 rounded-full">
            {{ match ($service->price_type) {
                'fixed' => 'Precio fijo',
                'hourly' => 'Por hora',
                'quote' => 'Cotización',
            } }}
        </span>
    </div>

    <p class="text-sm text-slate-500 mb-6">
        Entrega en {{ $service->delivery_time }} · {{ $service->revisions }} revisiones incluidas
    </p>

    <div class="space-y-3">
        @can('create', [App\Models\Conversation::class, $service])
            <form action="{{ route('chat.conversations.store') }}" method="POST">
                @csrf

                <input type="hidden" name="type" value="service">
                <input type="hidden" name="id" value="{{ $service->id }}">

                <button
                    class="flex items-center justify-center w-full py-3 bg-primary-600 text-white font-semibold rounded-xl hover:bg-primary-700 active:scale-[.98] transition-all shadow-lg shadow-primary-200">
                    Contactar
                </button>
            </form>
        @endcan

        @can('update', $service)
            <a href="{{ route('services.edit', $service->slug) }}"
                class="flex items-center justify-center w-full py-3 border border-slate-300 text-slate-700 font-semibold rounded-xl hover:bg-slate-50 hover:border-slate-400 active:scale-[.98] transition-all">
                Editar servicio
            </a>
        @endcan
        @can('create', [App\Models\Review::class, $service])
            <a href="{{ route('services.reviews.create', $service) }}"
                class="flex items-center justify-center w-full py-3 border border-slate-300 text-slate-700 font-semibold rounded-xl hover:bg-slate-50 hover:border-slate-400 active:scale-[.98] transition-all">
                Dejar Review
            </a>
        @endcan

    </div>
</div>
