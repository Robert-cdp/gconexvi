@extends('main')

@section('title', 'Crear Servicio')

@section('content')

    @include('services.create.header')

    <section class="max-w-7xl mx-auto px-6 py-10">

            <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6 sm:p-8">
                <form action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" id="status" name="status" value="{{ old('status', 'pending') }}">

                    {{-- Titulo --}}
                    @include('services.create.form-title')

                    {{-- Categoría --}}
                    @include('services.create.form-category')

                    {{-- Descripción --}}
                    <x-rich-text-editor name="description" label="Contenido" placeholder="Escribe aquí..." :value="old('description')"
                        :required="true" height="300px" />

                    {{-- Precio --}}
                    @include('services.create.form-price')

                    {{-- Imagen --}}
                    @include('services.create.form-image')

                    {{-- Entrega / Revisiones --}}
                    @include('services.create.form-delivery')

                    {{-- Nota --}}
                    @include('services.create.note')

                    {{-- Botones --}}
                    @include('services.create.form-buttons')

                </form>

            </div>
    </section>
@endsection
