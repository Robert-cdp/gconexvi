<div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6">
    <h2 class="text-lg font-bold text-slate-800 mb-4">
        Ofertas similares
    </h2>

    <div class="space-y-3">

        @forelse($similarEmployments as $item)
            <a href="{{ route('employments.show', $item) }}"
                class="block p-4 rounded-xl border border-slate-100 hover:border-primary-200 hover:bg-slate-50 transition">

                <h3 class="font-semibold text-slate-800 line-clamp-1">
                    {{ $item->title }}
                </h3>

                <div class="mt-2 flex flex-wrap items-center gap-2 text-xs text-slate-500">

                    <span>
                        {{ match ($item->type) {
                            'remote' => 'Remoto',
                            'hybrid' => 'Híbrido',
                            'onsite' => 'Presencial',
                        } }}
                    </span>

                    @if ($item->location)
                        <span>•</span>
                        <span>{{ $item->location }}</span>
                    @endif

                    @if ($item->salary_min)
                        <span>•</span>
                        <span>
                            Desde ${{ number_format($item->salary_min, 0) }} USD
                        </span>
                    @endif

                </div>

            </a>

        @empty
            <p class="text-sm text-slate-500">
                No hay ofertas similares por el momento.
            </p>
        @endforelse

    </div>
</div>
