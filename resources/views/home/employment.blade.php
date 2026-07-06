<section class="py-20 bg-slate-50">
    <div class="max-w-7xl mx-auto px-6">
        <div class="flex flex-col sm:flex-row sm:justify-between sm:items-end gap-4 mb-10">
            <div>
                <h2 class="text-3xl lg:text-4xl font-extrabold text-slate-900">Empleos recientes</h2>
                <p class="text-slate-500 mt-2">Oportunidades laborales actualizadas diariamente</p>
            </div>
            <a href="{{ route('employments.index') }}"
                class="inline-flex items-center gap-1 text-primary-600 font-semibold hover:text-primary-700 transition-colors">
                Ver todas las vacantes
            </a>
        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($employments as $employment)
                    <article
                        class="bg-white rounded-2xl border border-slate-200 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 overflow-hidden">

                        <div class="p-6 flex flex-col h-full">

                            {{-- Título --}}
                            <h3 class="text-lg font-bold text-slate-800 leading-6 line-clamp-2">
                                {{ $employment->title }}
                            </h3>

                            {{-- Modalidad y ubicación --}}
                            <div class="flex flex-wrap items-center gap-2 mt-3">

                                <span @class([
                                    'inline-flex items-center rounded-full px-3 py-1 text-xs font-semibold',
                                    'bg-emerald-50 text-emerald-700 ring-1 ring-emerald-200' =>
                                        $employment->type === 'remote',
                                    'bg-amber-50 text-amber-700 ring-1 ring-amber-200' =>
                                        $employment->type === 'hybrid',
                                    'bg-blue-50 text-blue-700 ring-1 ring-blue-200' =>
                                        $employment->type === 'onsite',
                                ])>

                                    {{ match ($employment->type) {
                                        'remote' => 'Remoto',
                                        'hybrid' => 'Híbrido',
                                        'onsite' => 'Presencial',
                                    } }}
                                </span>

                                @if ($employment->location)
                                    <span class="text-sm text-slate-500">
                                        {{ $employment->location }}
                                    </span>
                                @endif

                            </div>

                            {{-- Descripción --}}
                            <p class="mt-4 text-sm leading-6 text-slate-600 line-clamp-3 flex-1">
                                {{ html_entity_decode(strip_tags($employment->description)) }}
                            </p>

                            {{-- Información --}}
                            <div class="mt-5 pt-5 border-t border-slate-100 space-y-2">

                                <div class="flex justify-between items-center">

                                    <span class="text-sm text-slate-500">
                                        Salario
                                    </span>

                                    <span class="font-bold text-emerald-600">
                                        @if ($employment->salary_min && $employment->salary_max)
                                            ${{ number_format($employment->salary_min, 0) }}
                                            -
                                            ${{ number_format($employment->salary_max, 0) }}
                                        @elseif($employment->salary_min)
                                            Desde ${{ number_format($employment->salary_min, 0) }}
                                        @elseif($employment->salary_max)
                                            Hasta ${{ number_format($employment->salary_max, 0) }}
                                        @else
                                            A convenir
                                        @endif
                                    </span>

                                </div>

                                <div class="flex justify-between items-center text-xs text-slate-400">
                                    <span>Publicado</span>
                                    <span>{{ $employment->created_at->diffForHumans() }}</span>
                                </div>

                            </div>

                            <a href="{{ route('employments.show', $employment) }}"
                                class="mt-6 w-full rounded-xl bg-primary-600 py-3 text-center text-sm font-semibold text-white transition hover:bg-primary-700">
                                Ver oferta
                            </a>

                        </div>

                    </article>
                @endforeach
            </div>
    </div>
</section>
