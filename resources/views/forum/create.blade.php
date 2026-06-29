@extends('main')

@section('title', 'Crear Tema')

@section('content')

    @include('forum.create.head')

    <section class="py-10">
        <div class="max-w-4xl mx-auto px-6">
            <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6 sm:p-8">

                <form action="{{ route('community.store') }}" method="POST" class="space-y-6">

                    @csrf

                    @include('forum.create.form-title')

                    @include('forum.create.form-category')

                    <x-rich-text-editor name="content" label="Contenido" placeholder="Escribe aquí..." :value="old('content', $post->content ?? '')"
                        :required="true" height="300px" />

                    @include('forum.create.alert')

                    @include('forum.create.form-actions')
                </form>
            </div>
        </div>
    </section>
@endsection
