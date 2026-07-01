@extends('main')

@section('title', 'Trabajos')

@section('content')
    <main>

        @include('employment.index.head')

        <section class="py-10">
            <div class="max-w-7xl mx-auto px-6 grid lg:grid-cols-4 gap-8">

                {{-- <!-- Sidebar de filtros --> --}}
                {{-- @include('employment.index.sidebar') --}}

                <div class="lg:col-span-4">
                    {{-- <!-- Ordenar + resultados --> --}}
                    {{-- @include('employment.index.order') --}}
                    <div class="grid sm:grid-cols-2 xl:grid-cols-3 gap-5">
                        @include('employment.index.articles')
                    </div>
                    {{-- <!-- Paginación --> --}}

                </div>
            </div>
        </section>
    </main>
@endsection
