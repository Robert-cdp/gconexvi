{{-- Publicación principal — diseño de artículo, no de respuesta --}}
<article class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden mb-8">

    {{-- Cabecera: autor, estado, fecha, editar --}}
    <header class="px-6 pt-6 pb-4 sm:flex sm:items-start sm:justify-between">
        <div class="flex items-center gap-4">
            <img src="{{ Storage::url($topic->user->avatar ?? 'images/default-avatar.webp') }}"
                 alt="{{ $topic->user->name }}"
                 class="w-12 h-12 rounded-full object-cover ring-2 ring-slate-100 shrink-0">

            <div>
                <p class="font-semibold text-slate-900">
                    {{ $topic->user->name }}
                </p>
                <div class="flex items-center gap-2 text-sm text-slate-500">
                    <time title="{{ $topic->created_at->format('d/m/Y H:i') }}">
                        {{ $topic->created_at->diffForHumans() }}
                    </time>

                    @if ($topic->status === 'active')
                        <span class="px-2 py-0.5 rounded-full text-xs font-medium bg-green-50 text-green-700 border border-green-200">
                            Activo
                        </span>
                    @else
                        <span class="px-2 py-0.5 rounded-full text-xs font-medium bg-red-50 text-red-700 border border-red-200">
                            Cerrado
                        </span>
                    @endif
                </div>
            </div>
        </div>

        @can('update', $topic)
            <div class="mt-3 sm:mt-0">
                <a href="{{ route('community.edit', $topic->slug) }}"
                   class="inline-flex items-center gap-1.5 px-3 py-1.5 text-sm font-medium text-slate-600 bg-slate-50 hover:bg-slate-100 rounded-lg border border-slate-200 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4">
                        <path d="M2.695 14.763l-1.262 3.154a.5.5 0 0 0 .65.65l3.155-1.262a4 4 0 0 0 1.343-.885L17.5 5.5a2.121 2.121 0 0 0-3-3L3.58 13.42a4 4 0 0 0-.885 1.343Z" />
                    </svg>
                    Editar
                </a>
            </div>
        @endcan
    </header>

    {{-- Título --}}
    <div class="px-6 pb-2">
        <h1 class="text-2xl sm:text-3xl font-bold text-slate-900 leading-tight">
            {{ $topic->title }}
        </h1>
    </div>

    {{-- Contenido --}}
    <div class="px-6 pb-6">
        <div class="prose prose-slate max-w-none text-base leading-7
                    prose-a:text-primary-600 prose-a:underline hover:prose-a:no-underline
                    prose-img:rounded-lg prose-img:shadow-sm">
            {!! $topic->content !!}
        </div>
    </div>
</article>
