@extends('main')

@section('title', $product->title)

@section('content')
    {{-- Head --}}
    @include('marketplace.show.head')
    <div class="max-w-7xl mx-auto px-6 py-12 grid lg:grid-cols-3 gap-10">
        {{-- Contenido principal --}}
        <div class="lg:col-span-2 space-y-10">
            {{-- Titulo --}}
            @include('marketplace.show.title')
            {{-- Descripción --}}
            @include('marketplace.show.description')
            {{-- Reviews --}}
            @include('marketplace.show.reviews ')
        </div>
        {{-- Sidebar --}}
        <div>
            <div class="sticky top-24 space-y-10">
                <div class="bg-white rounded-2xl p-6">
                    {{-- Detalles --}}
                    @include('marketplace.show.details')
                    {{-- Acciones --}}
                    @include('marketplace.show.actions')
                </div>
                {{-- Publicado por --}}
                @include('marketplace.show.user')
            </div>
        </div>
    </div>
@endsection
