@foreach ($services as $service)
    <article class="bg-white rounded-2xl overflow-hidden border border-slate-200 card-hover shadow-sm flex flex-col">

        <div class="relative">
            <img src="{{ Storage::url($service->cover->path) }}" class="h-44 w-full object-cover"
                alt="{{ $service->title }}">
            <span class="absolute top-3 left-3 bg-primary-600 text-white text-xs px-2.5 py-0.5 rounded-full shadow">
                @foreach ($service->categories as $category)
                    {{ $category->name }}
                @endforeach
            </span>
        </div>
        <div class="p-5 flex flex-col flex-1">
            <div class="flex items-center gap-3 mb-3">
                <img src="{{ $service->user->avatar ? Storage::url($service->user->avatar) : Storage::url('images/default-avatar.webp') }}"
                    class="w-10 h-10 rounded-full ring-2 ring-primary-100" alt="{{ $service->user->name }}">
                <div>
                    <p class="font-semibold text-slate-800 text-sm">{{ $service->user->name }}</p>
                    {{-- <p class="text-xs text-slate-500">Laravel Developer</p> --}}
                </div>
            </div>
            <h3 class="font-bold text-slate-800">{{ $service->title }}</h3>
            <p class="text-sm text-slate-500 mt-1 line-clamp-2 flex-1">
                {{ strip_tags($service->description) }}
            </p>
            {{-- <div class="mt-4 flex items-center justify-between">
            <span class="flex items-center gap-1 text-yellow-500 font-semibold text-sm">⭐ 4.9 <span
                    class="text-slate-400 font-normal">(128)</span></span>
            <span class="font-bold text-primary-700">{{ $service->price }} usd</span>
        </div> --}}

            <a href="{{ route('services.show', $service->slug) }}"
                class="mt-3 inline-flex w-full items-center justify-center py-2 text-sm font-semibold text-primary-700 border border-primary-200 rounded-lg hover:bg-primary-50 transition-colors">
                Ver servicio
            </a>
        </div>
    </article>
@endforeach
