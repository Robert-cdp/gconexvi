@extends('main')

@section('title', 'Editar Trabajo')

@section('content')

    @include('employment.edit.head')

    <div class="max-w-7xl mx-auto py-10 px-6">
        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6 sm:p-8" x-data="formularioOferta()">
            <form action="{{ route('employments.update', $employment) }}" method="POST" class="space-y-6">
                @csrf

                @method('PUT')

                @include('employment.edit.form-title')

                @include('employment.edit.form-category')

                @include('employment.edit.form-location-type')

                @include('employment.edit.form-salary')

                <x-rich-text-editor name="description" label="Descripcion" placeholder="Escribe aquí..." :value="old('content', $employment->description ?? '')"
                    :required="true" height="300px" />

                @include('employment.edit.form-skills')

                @include('employment.edit.form-alert')

                @include('employment.edit.form-actions')
            </form>
        </div>
    </div>
@endsection
