<div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6 sm:p-8">

    <div class="mb-6">
        <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-900">
            {{ $employment->title }}
        </h1>

        <div class="flex flex-wrap items-center gap-2 mt-4">

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

            <span class="text-slate-300">•</span>

            <span class="text-sm text-slate-500">
                Publicado {{ $employment->created_at->diffForHumans() }}
            </span>

        </div>
    </div>

    {{-- Salario --}}
    <div class="bg-emerald-50 border border-emerald-100 rounded-xl px-5 py-4 flex items-center justify-between mb-8">
        <span class="text-sm font-semibold text-emerald-700">
            Salario
        </span>

        <span class="text-xl sm:text-2xl font-extrabold text-emerald-700">
            @if ($employment->salary_min && $employment->salary_max)
                ${{ number_format($employment->salary_min, 0) }}
                -
                ${{ number_format($employment->salary_max, 0) }}
                USD
            @elseif($employment->salary_min)
                Desde ${{ number_format($employment->salary_min, 0) }} USD
            @elseif($employment->salary_max)
                Hasta ${{ number_format($employment->salary_max, 0) }} USD
            @else
                A convenir
            @endif
        </span>
    </div>

    {{-- Descripción --}}
    <div class="prose prose-slate max-w-none">

        <h2 class="text-xl font-bold text-slate-800 mb-4">
            Descripción del puesto
        </h2>

        {!! $employment->description !!}

    </div>

</div>
