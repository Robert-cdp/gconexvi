@extends('main')

@section('title', 'Marketplace')

@section('content')

    @include('marketplace.index.head')

    <section class="py-10">
        <div class="max-w-7xl mx-auto px-6 grid lg:grid-cols-4 gap-8">

            @include('marketplace.index.aside')

            <div class="lg:col-span-3">
                @include('marketplace.index.products')
                {{ $products->links('components.pagination') }}
            </div>
            
        </div>
    </section>

@endsection
