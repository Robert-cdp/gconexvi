@extends('main')

@section('title', $topic->title)

@section('content')
    <div class="max-w-5xl mx-auto px-6 py-10">

        @include('forum.show.topic')

        <h2 class="text-lg font-bold text-slate-800 mb-4">
            Respuestas ({{ $topic->replies->count() }})
        </h2>

        <div class="space-y-4">
            @include('forum.show.replies')
        </div>

        @include('forum.show.form-reply')
    </div>
@endsection
