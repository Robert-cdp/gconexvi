@extends('main')

@section('title', $service->title)

@section('content')

    @include('services.show.header')

    <section class="py-10">

        <div class="max-w-7xl mx-auto px-6 grid lg:grid-cols-3 gap-10">

            <div class="lg:col-span-2 space-y-8">
                {{-- Título y precio --}}
                @include('services.show.meta')

                {{--  Vendedor --}}
                @include('services.show.seller-info')

                {{--  Descripción --}}
                @include('services.show.description')

                {{-- Preguntas frecuentes  --}}
                @include('services.show.faq')

                {{--  Reseñas --}}
                @include('services.show.reviews')
            </div>

            <div class="lg:col-span-1">
                <div class="sticky top-24 space-y-6">

                    @include('services.show.sidebar-price')

                    @include('services.show.sidebar-services')
                    
                </div>
            </div>
        </div>
    </section>
@endsection
