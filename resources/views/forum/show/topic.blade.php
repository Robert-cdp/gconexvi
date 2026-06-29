<article class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden mb-3">

    {{-- Encabezado --}}
    <header class="px-6 py-5 bg-slate-50 border-b border-slate-200">
        <div class="flex items-start gap-4">

            <img src="{{ Storage::url($topic->user->avatar) }}" alt="{{ $topic->user->name }}"
                class="w-14 h-14 rounded-full object-cover ring-2 ring-primary-100 shrink-0">

            <div class="flex-1 min-w-0">

                <div class="flex flex-wrap items-center gap-2 mb-2">

                    @if ($topic->status === 'active')
                        <span class="px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-700">
                            Activo
                        </span>
                    @else
                        <span class="px-2 py-1 rounded-full text-xs font-medium bg-red-100 text-red-700">
                            Cerrado
                        </span>
                    @endif

                </div>

                <h1 class="text-2xl font-bold text-slate-900 leading-tight">
                    {{ $topic->title }}
                </h1>

                <div class="flex flex-wrap items-center gap-2 mt-2 text-sm text-slate-500">
                    <span class="font-medium text-slate-700">
                        {{ $topic->user->name }}
                    </span>

                    <span>•</span>

                    <time title="{{ $topic->created_at->format('d/m/Y H:i') }}">
                        {{ $topic->created_at->diffForHumans() }}
                    </time>
                </div>

            </div>

        </div>
        @can('update', $topic)
    <a href="{{ route('community.edit', $topic->slug) }}"
       class="inline-flex items-center gap-2 px-3 py-2 text-sm font-medium rounded-lg border border-slate-200 hover:bg-slate-50">
        Editar
    </a>
@endcan
    </header>

    {{-- Contenido --}}
    <div class="px-6 py-6">
        <div class="prose prose-slate max-w-none leading-7">
            {!! $topic->content !!}
        </div>
    </div>
</article>
