@extends('main')

@section('title', 'Servicios')

@section('content')
    @include('services.index.hero')
    <div class="max-w-7xl mx-auto px-6 py-10">
        <div class="grid lg:grid-cols-4 gap-8">
            @include('services.index.filter')

            <div class="lg:col-span-3">
                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
                    @include('services.index.article')
                </div>

                {{ $services->links('components.pagination') }}
            </div>
        </div>
    </div>
@endsection
