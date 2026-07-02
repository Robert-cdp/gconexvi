<h2 class="text-xl font-bold text-slate-900">Servicios publicados</h2>
<div class="grid sm:grid-cols-2 gap-5">
    @foreach ($user->services as $service)
    <article class="bg-white rounded-2xl overflow-hidden border border-slate-200 card-hover shadow-sm">
        <img src="{{ Storage::url($service->cover->path) }}" class="h-40 w-full object-cover" alt="{{ $service->title }}">
        <div class="p-4">
            <h3 class="font-bold text-slate-800">{{ $service->title }}</h3>
            <p class="text-sm text-slate-500 mt-1 line-clamp-2">
                {{ strip_tags($service->description) }}
            </p>
            <div class="mt-3 flex items-center justify-between">
                <span class="font-bold text-primary-700">{{ $service->price }} usd</span>
                {{-- <span class="text-xs text-slate-400">4.9 (128)</span> --}}
            </div>
        </div>
    </article>    
    @endforeach
</div>
