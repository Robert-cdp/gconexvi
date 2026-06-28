<div>
    <h1 class="text-3xl lg:text-4xl font-extrabold text-slate-900">{{ $service->title }}</h1>
    <div class="flex flex-wrap items-center gap-3 mt-3">
        <span class="flex items-center gap-1 text-yellow-500 font-semibold text-lg">
            ⭐ {{ number_format($service->reviews->avg('rating'), 1) }}
        </span>
        <span class="text-slate-400">·</span>
        <span class="text-slate-500 text-sm">{{ $service->reviews->count() }} reseñas</span>
    </div>
</div>
