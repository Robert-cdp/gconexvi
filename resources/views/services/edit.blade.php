@extends('main')

@section('title', 'Editar Servicio')

@section('content')

    @include('services.edit.header')

    <div class="max-w-7xl mx-auto px-6 py-12">
        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6 sm:p-8">
            <form action="{{ route('services.update', $service->slug) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <input type="hidden" id="status" name="status" value="{{ old('status', 'pending') }}">

                {{-- Titulo --}}
                @include('services.edit.form-title')

                {{-- Categoría --}}
                @include('services.edit.form-category')
                <x-rich-text-editor name="description" label="Descripción" placeholder="Escribe aquí..." :value="old('description', $service->description)" :required="true" height="300px" />
                
                {{-- Precio --}}
                @include('services.edit.form-price')

                {{-- Imagen --}}
                @include('services.edit.form-image')

                {{-- Entrega / Revisiones --}}
                @include('services.edit.form-delivery')

                {{-- Nota --}}
                @include('services.edit.note')

                {{-- Botones --}}
                @include('services.edit.form-buttons')

            </form>

        </div>
    </div>
@endsection
