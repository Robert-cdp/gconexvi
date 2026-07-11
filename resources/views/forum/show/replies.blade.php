<div class="space-y-6">
    @forelse ($replies as $item)
    
        <article class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">

            {{-- Encabezado --}}
            <header class="flex items-center justify-between px-6 py-4 border-b border-slate-100 bg-slate-50">
                <div class="flex items-center gap-4">
                    <img src="{{ Storage::url($item->user->avatar ?? 'images/default-avatar.webp') }}"
                        alt="{{ $item->user->name }}"
                        class="w-12 h-12 rounded-full object-cover ring-2 ring-primary-100">

                    <div>
                        <div class="flex items-center gap-2">
                            <span class="font-semibold text-slate-800">
                                {{ $item->user->name }}
                            </span>

                            @if ($item->user_id == $topic->user_id)
                                <span
                                    class="px-2 py-0.5 text-[11px] font-medium rounded-full bg-primary-100 text-primary-700">
                                    Autor
                                </span>
                            @endif
                        </div>

                        <div class="text-sm text-slate-500">
                            <time title="{{ $item->created_at->format('d/m/Y H:i') }}">
                                {{ $item->created_at->diffForHumans() }}
                            </time>
                        </div>
                    </div>
                </div>

                <span
                    class="text-xs font-medium text-slate-500 bg-white border border-slate-200 rounded-full px-3 py-1">
                    Respuesta #{{ $replies->firstItem() + $loop->index }}
                </span>
            </header>

            {{-- Contenido --}}
            <div class="px-6 py-5">
                <div class="prose prose-slate max-w-none leading-7">
                    {!! nl2br($item->content) !!}
                </div>
            </div>

        </article>
    @empty
        <div class="bg-white border border-dashed border-slate-300 rounded-2xl p-10 text-center">
            <h3 class="text-lg font-semibold text-slate-800">
                Aún no hay respuestas
            </h3>

            <p class="text-slate-500 mt-2">
                Sé el primero en participar en esta conversación.
            </p>
        </div>
    @endforelse

    @if ($replies->hasPages())
        <div class="mt-8">
            {{ $replies->links('components.pagination') }}
        </div>
    @endif
</div>