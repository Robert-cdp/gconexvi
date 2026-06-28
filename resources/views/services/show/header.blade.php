<div class="relative h-64 sm:h-80 lg:h-96 bg-slate-200 overflow-hidden">
    <img src="{{ Storage::url($service->cover->path) }}" alt="{{ $service->title }}" class="w-full h-full object-cover">
    <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent"></div>
    <div class="absolute bottom-4 left-4 sm:bottom-6 sm:left-6 flex gap-2">
        <span class="bg-primary-600 text-white text-xs px-3 py-1 rounded-full shadow">Destacado</span>
        <span class="bg-emerald-500 text-white text-xs px-3 py-1 rounded-full">Verificado</span>
    </div>
</div>
