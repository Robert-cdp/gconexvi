<div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6">
    <div class="flex items-center justify-between mb-4">
        <span class="text-3xl font-extrabold text-primary-700">{{ $service->price }} usd</span>
        <span class="text-sm text-slate-500 bg-slate-100 px-3 py-1 rounded-full">{{ $service->price_type }}</span>
    </div>
    <p class="text-sm text-slate-500 mb-4">Entrega en {{ $service->delivery_time }} · {{ $service->revisions }}
        revisiones incluidas</p>
    <button
        class="w-full py-3 bg-primary-600 text-white font-bold rounded-xl hover:bg-primary-700 shadow-md shadow-primary-200 transition-all text-sm">
        Contratar ahora
    </button>
</div>
