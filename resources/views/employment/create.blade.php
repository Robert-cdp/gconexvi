@extends('main')

@section('title', 'Publicar un nuevo trabajo')

@section('content')

    @include('employment.create.head')

    <section class="py-10">
        <div class="max-w-3xl mx-auto px-6">
            <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6 sm:p-8" x-data="formularioOferta()">
                <form action="{{ route('employments.store') }}" method="POST" class="space-y-6">
                    @csrf
                    @include('employment.create.form-title')

                    @include('employment.create.form-category')

                    @include('employment.create.form-location-type')

                    @include('employment.create.form-salary')

                    <x-rich-text-editor name="description" label="Descripcion" placeholder="Escribe aquí..." :value="old('content', $post->content ?? '')"
                        :required="true" height="300px" />

                    @include('employment.create.form-skills')

                    @include('employment.create.form-alert')

                    @include('employment.create.form-actions')
                </form>
            </div>
        </div>
    </section>
@endsection
