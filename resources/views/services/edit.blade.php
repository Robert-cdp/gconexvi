@extends('main')

@section('title', 'Crear Servicio')

@section('content')

    @include('services.edit.header')

    <section class="py-12">
        <div class="max-w-5xl mx-auto px-6">
            <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6 sm:p-8">
                <form action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" id="status" name="status" value="{{ old('status', 'pending') }}">

                    {{-- Titulo --}}
                    @include('services.edit.form-title')

                    {{-- Categoría --}}
                    @include('services.edit.form-category')

                    {{-- Descripción --}}
                    @include('services.edit.form-description')

                    {{-- Precio --}}
                    @include('services.edit.form-price')

                    {{-- Imagen --}}
                    @include('services.edit.form-image')

                    {{-- Entrega / Revisiones --}}
                    @include('services.edit.form-delivery')

                    {{-- Nota --}}
                    <div class="mb-8 rounded-xl border border-primary-100 bg-primary-50 p-5">
                        <p class="text-sm text-primary-800">
                            Tu servicio será revisado por nuestro equipo antes de ser publicado.
                            Asegúrate de que la información sea clara, verídica y cumpla con las políticas de la plataforma.
                        </p>
                    </div>

                    {{-- Botones --}}
                    @include('services.edit.form-buttons')

                </form>

            </div>
        </div>
    </section>
@endsection
