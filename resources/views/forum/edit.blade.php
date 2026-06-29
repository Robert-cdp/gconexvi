@extends('main')

@section('title', 'Editar Tema')

@section('content')

    @include('forum.edit.head')

    <section class="py-10">
        <div class="max-w-4xl mx-auto px-6">
            <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6 sm:p-8">

                <form action="{{ route('community.update', $topic->slug) }}" method="POST" class="space-y-6">

                    @csrf

                    @method('PUT')

                    @include('forum.edit.form-title')

                    @include('forum.edit.form-category')

                    <x-rich-text-editor name="content" label="Contenido" placeholder="Escribe aquí..." :value="old('content', $topic->content ?? '')"
                        :required="true" height="300px" />

                    @include('forum.edit.alert')

                    @include('forum.edit.form-actions')
                </form>
            </div>
        </div>
    </section>
@endsection
