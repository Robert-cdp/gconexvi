@extends('main')

@section('Editar Producto')

@section('content')
    <div x-data="{
        imagePreview: '{{ $product->image ? Storage::url($product->image) : '' }}',
    
        preview(event) {
            const file = event.target.files[0];
    
            if (!file) {
                return;
            }
    
            this.imagePreview = URL.createObjectURL(file);
        }
    }">

        @include('marketplace.edit.head')

        <section class="py-10">
            <div class="max-w-7xl mx-auto px-6">

                <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6 sm:p-8">

                    <form action="{{ route('marketplace.update', $product) }}" method="POST" enctype="multipart/form-data" class="space-y-6">

                        @csrf
                        @method('PUT')

                        {{-- Título --}}
                        @include('marketplace.edit.title')

                        {{-- Categoría --}}
                        @include('marketplace.edit.category')

                        {{-- Descripción --}}
                        @include('marketplace.edit.description')

                        {{-- Precio y Tipo --}}
                        @include('marketplace.edit.price-type')

                        {{-- Ubicación --}}
                        @include('marketplace.edit.location')

                        {{-- Imagen --}}
                        @include('marketplace.edit.image')

                        {{-- Alerta --}}
                        @include('marketplace.edit.alert')

                        {{-- Acciones --}}
                        @include('marketplace.edit.actions')

                    </form>

                </div>

            </div>
        </section>
    </div>
@endsection