@if ($paginator->hasPages())
    <div class="mt-10 flex justify-center">
        <nav class="flex items-center gap-1 bg-white border border-slate-200 rounded-xl p-1 shadow-sm">

            {{-- Anterior --}}
            @if ($paginator->onFirstPage())
                <span class="px-3 py-2 text-sm text-slate-400 cursor-not-allowed">
                    ← Anterior
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}"
                    class="px-3 py-2 text-sm text-slate-600 hover:text-slate-800 transition">
                    ← Anterior
                </a>
            @endif

            {{-- Páginas --}}
            @foreach ($elements as $element)
                @if (is_string($element))
                    <span class="px-2 text-slate-400">{{ $element }}</span>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span
                                class="px-4 py-2 text-sm font-semibold bg-primary-600 text-white rounded-lg shadow">
                                {{ $page }}
                            </span>
                        @else
                            <a href="{{ $url }}"
                                class="px-4 py-2 text-sm text-slate-600 hover:bg-slate-100 rounded-lg transition">
                                {{ $page }}
                            </a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Siguiente --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}"
                    class="px-3 py-2 text-sm text-slate-600 hover:text-slate-800 transition">
                    Siguiente →
                </a>
            @else
                <span class="px-3 py-2 text-sm text-slate-400 cursor-not-allowed">
                    Siguiente →
                </span>
            @endif

        </nav>
    </div>
@endif