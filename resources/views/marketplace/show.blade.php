@extends('main')

@section('content')

<div class="relative h-64 sm:h-80 lg:h-96 bg-slate-200 overflow-hidden">
    @if ($product->image)
        <div class="absolute inset-0 bg-cover bg-center bg-no-repeat" style="background-image: url('{{ Storage::url($product->image) }}')"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-black/20 to-transparent"></div>
    @else
        <div class="absolute inset-0 flex flex-col items-center justify-center gap-2 text-slate-400">
            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                      d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14M6 6h.01M4 6h16v12H4V6z"/>
            </svg>
            <span class="text-sm font-medium">Sin imagen disponible</span>
        </div>
    @endif

    @php
        $types = [
            'sale'     => ['Venta',       'bg-emerald-100 text-emerald-800'],
            'exchange' => ['Intercambio', 'bg-sky-100 text-sky-800'],
            'wanted'   => ['Busco',       'bg-rose-100 text-rose-800'],
        ];
    @endphp

    <div class="absolute bottom-4 left-4 sm:bottom-6 sm:left-6 flex flex-wrap gap-2">
        @if ($product->category)
            <span class="bg-white/90 text-slate-800 text-xs font-semibold px-3 py-1.5 rounded-full backdrop-blur-sm">
                {{ $product->category->name }}
            </span>
        @endif
        <span class="text-xs font-semibold px-3 py-1.5 rounded-full {{ $types[$product->type][1] }}">
            {{ $types[$product->type][0] }}
        </span>
    </div>

    @if ($product->price)
        <div class="absolute bottom-4 right-4 sm:bottom-6 sm:right-6">
            <span class="bg-black/50 backdrop-blur-sm text-white text-lg font-semibold px-4 py-1.5 rounded-lg">
                ${{ number_format($product->price, 2) }}
            </span>
        </div>
    @endif
</div>

<div class="max-w-7xl mx-auto px-6 py-12 grid lg:grid-cols-3 gap-10">

    {{-- Contenido principal --}}
    <div class="lg:col-span-2 space-y-10">

        {{-- Título --}}
        <div class="bg-white rounded-2xl p-6 md:p-8">
            <h1 class="text-3xl md:text-4xl font-bold text-slate-900 leading-tight">
                {{ $product->title }}
            </h1>

            @if ($product->price)
                <p class="mt-3 text-3xl font-extrabold text-primary-600">
                    ${{ number_format($product->price, 2) }}
                </p>
            @else
                <p class="mt-3 text-lg font-medium text-slate-400">Sin precio</p>
            @endif

            <div class="mt-4 flex flex-wrap gap-2">
                @if ($product->category)
                    <span class="text-xs font-semibold px-3 py-1 rounded-full bg-slate-100 text-slate-700">
                        {{ $product->category->name }}
                    </span>
                @endif
                <span class="text-xs font-semibold px-3 py-1 rounded-full {{ $types[$product->type][1] }}">
                    {{ $types[$product->type][0] }}
                </span>
            </div>

            @if ($product->location)
                <div class="mt-4 flex items-center gap-1.5 text-sm text-slate-500">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M17.657 16.657L13.414 20.9a2 2 0 01-2.828 0l-4.243-4.243a8 8 0 1111.314 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                    {{ $product->location }}
                </div>
            @endif
        </div>

        {{-- Descripción --}}
        <div class="bg-white rounded-2xl p-6 md:p-8">
            <h2 class="text-xs font-bold uppercase tracking-widest text-slate-400 mb-4">
                Descripción
            </h2>
            <div class="prose prose-slate max-w-none text-slate-700 leading-relaxed">
                {!! nl2br(e($product->description)) !!}
            </div>
        </div>

    </div>

    {{-- Sidebar --}}
    <div>
        <div class="sticky top-24 space-y-10">

            {{-- Detalles + CTA --}}
            <div class="bg-white rounded-2xl p-6">
                <h2 class="text-xs font-bold uppercase tracking-widest text-slate-400 mb-4">
                    Detalles
                </h2>
                <dl class="divide-y divide-slate-100 text-sm">
                    <div class="flex justify-between py-3">
                        <dt class="text-slate-500">Tipo</dt>
                        <dd class="font-semibold text-slate-900">{{ $types[$product->type][0] }}</dd>
                    </div>
                    <div class="flex justify-between py-3">
                        <dt class="text-slate-500">Categoría</dt>
                        <dd class="font-semibold text-slate-900">{{ $product->category?->name ?? 'Sin categoría' }}</dd>
                    </div>
                    @if ($product->location)
                        <div class="flex justify-between py-3">
                            <dt class="text-slate-500">Ubicación</dt>
                            <dd class="font-semibold text-slate-900">{{ $product->location }}</dd>
                        </div>
                    @endif
                    <div class="flex justify-between py-3">
                        <dt class="text-slate-500">Publicado</dt>
                        <dd class="font-semibold text-slate-900">{{ $product->created_at->format('d/m/Y') }}</dd>
                    </div>
                </dl>

                <div class="mt-6">
                    @auth
                        @if (auth()->id() !== $product->user_id)
                            <a href="#"
                               class="w-full inline-flex justify-center items-center py-3 px-6 rounded-xl bg-primary-600 hover:bg-primary-700 text-white font-semibold transition">
                                Contactar vendedor
                            </a>
                        @else
                            <a href="{{ route('marketplace.edit', $product) }}"
                               class="w-full inline-flex justify-center items-center py-3 px-6 rounded-xl border border-slate-300 hover:bg-slate-50 text-slate-700 font-semibold transition">
                                Editar publicación
                            </a>
                        @endif
                    @else
                        <a href="{{ route('login') }}"
                           class="w-full inline-flex justify-center items-center py-3 px-6 rounded-xl bg-primary-600 hover:bg-primary-700 text-white font-semibold transition">
                            Inicia sesión para contactar
                        </a>
                    @endauth
                </div>
            </div>

            {{-- Publicado por --}}
            <div class="bg-white rounded-2xl p-6">
                <h2 class="text-xs font-bold uppercase tracking-widest text-slate-400 mb-4">
                    Publicado por
                </h2>
                <div class="flex items-center gap-4">
                    <img src="{{ $product->user->avatar_url }}"
                         class="w-12 h-12 rounded-full object-cover ring-2 ring-slate-200"
                         alt="{{ $product->user->name }}">
                    <div class="min-w-0">
                        <a href="{{ route('user.profile', $product->user) }}"
                           class="font-semibold text-slate-900 hover:text-primary-600 transition text-sm truncate block">
                            {{ $product->user->name }}
                        </a>
                        <p class="text-xs text-slate-500 mt-0.5">
                            Publicado {{ $product->created_at->diffForHumans() }}
                        </p>
                        @if ($product->location)
                            <p class="text-xs text-slate-500">{{ $product->location }}</p>
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>
<x-tabler-home class="w-5 h-5" />
@endsection