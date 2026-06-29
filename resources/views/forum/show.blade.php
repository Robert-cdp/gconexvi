@extends('main')

@section('title', $topic->title)

@section('content')
    <div class="max-w-5xl mx-auto px-6 py-10">

        @include('forum.show.topic')

        <h2 class="text-lg font-bold text-slate-800 mb-4">Respuestas ({{ $topic->replies->count() }})</h2>

        <div class="space-y-4" x-data="{ likes: [8, 5, 12], dioLike: [false, false, false] }">
            @include('forum.show.replies')
        </div>


        <div class="mt-8 bg-white rounded-2xl border border-slate-200 shadow-sm p-5 sm:p-6" x-data="respuestaForm()">
            <form action="{{ route('reply.store', $topic) }}" method="POST">
                @csrf
                <x-rich-text-editor name="content" label="Tu Respuesta" placeholder="Escribe aquí..." :value="old('content', $post->content ?? '')"
                    :required="true" height="300px" />

                <div class="flex justify-end gap-3 mt-3">
                    <button type="submit"
                        class="px-6 py-2.5 bg-primary-600 text-white text-sm font-bold rounded-xl hover:bg-primary-700 shadow-md shadow-primary-200 transition-all">
                        Publicar respuesta
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
