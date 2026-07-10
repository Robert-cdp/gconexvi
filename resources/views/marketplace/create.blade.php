@extends('main')

@section('title', 'Crear Producto')

@section('content')
    <div x-data="{
        imagePreview: null,
        preview(event) {
            const file = event.target.files[0];
    
            if (!file) {
                this.imagePreview = null;
                return;
            }
    
            this.imagePreview = URL.createObjectURL(file);
        }
    }">
        @include('marketplace.create.head')

        <section class="py-10">
            <div class="max-w-7xl mx-auto px-6">

                <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6 sm:p-8">

                    <form action="{{ route('marketplace.store') }}" method="POST" enctype="multipart/form-data"
                        class="space-y-6">

                        @csrf

                        {{-- Título --}}
                        @include('marketplace.create.title')

                        {{-- Categoría --}}
                        @include('marketplace.create.category')

                        {{-- Descripción --}}
                        @include('marketplace.create.description')

                        {{-- Precio y Tipo --}}
                        @include('marketplace.create.price-type')

                        {{-- Ubicación --}}
                        @include('marketplace.create.location')

                        {{-- Imagen --}}
                        @include('marketplace.create.image')

                        {{-- Alerta --}}
                        @include('marketplace.create.alert')

                        {{-- Acciones --}}
                        @include('marketplace.create.actions')

                    </form>

                </div>

            </div>
        </section>
    </div>
@endsection