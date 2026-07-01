@extends('main')

@section('title', 'Servicios')

@section('content')
    @include('services.index.hero')
    <div class="max-w-7xl mx-auto px-6 py-10">
        <div class="grid lg:grid-cols-4 gap-8">
            {{-- <!-- Sidebar de filtros --> --}}
            <div class="lg:col-span-4">
                {{-- <!-- Ordenar + resultados --> --}}
                <div class="grid sm:grid-cols-2 xl:grid-cols-4 gap-5">
                    @include('services.index.article')
                </div>
                {{ $services->links('components.pagination') }}
                {{-- @include('services.index.pagination') --}}
            </div>
        </div>
    </div>
@endsection
