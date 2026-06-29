@forelse ($topics as $topic)
    <div class="bg-white rounded-2xl border border-slate-200 p-5 card-hover shadow-sm">
        <div class="flex items-start gap-4">
            <img src="{{ Storage::url($topic->user->avatar) }}"
                class="w-11 h-11 rounded-full ring-2 ring-primary-100 shrink-0"
                alt="{{ $topic->user->name }}">

            <div class="flex-1 min-w-0">
                <h3 class="font-semibold text-slate-800">
                    <a href="{{ route('community.show', $topic->slug) }}" class="hover:text-primary-600">
                        {{ $topic->title }}
                    </a>
                </h3>

                <p class="text-sm text-slate-500 mt-1 line-clamp-2">
                    {{ Str::limit(strip_tags($topic->content), 180) }}
                </p>

                <div class="flex flex-wrap items-center gap-3 mt-3 text-xs text-slate-400">
                    <span class="flex items-center gap-1">
                        {{ $topic->user->name }}
                    </span>

                    <span class="flex items-center gap-1">
                        {{ $topic->replies->count() }} respuestas
                    </span>

                    <span class="flex items-center gap-1">
                        {{ $topic->created_at->diffForHumans() }}
                    </span>
                </div>

                @if ($topic->categories->isNotEmpty())
                    <div class="flex flex-wrap gap-2 mt-3">
                        @foreach ($topic->categories as $category)
                            <span class="text-xs bg-primary-50 text-primary-700 px-2 py-0.5 rounded-full">
                                {{ $category->name }}
                            </span>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
@empty
    <div class="bg-white rounded-2xl border border-dashed border-slate-300 p-10 text-center">
        <h3 class="text-lg font-semibold text-slate-700">
            Aún no hay temas publicados
        </h3>

        <p class="text-slate-500 mt-2">
            Sé el primero en iniciar una discusión en el foro.
        </p>

        <a href="{{ route('community.create') }}"
            class="inline-flex items-center mt-6 px-5 py-3 bg-primary-600 text-white rounded-xl hover:bg-primary-700 transition">
            Crear tema
        </a>
    </div>
@endforelse