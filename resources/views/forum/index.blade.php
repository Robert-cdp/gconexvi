@extends('main')

@section('title', 'Comunidad')

@section('content')

    @include('forum.index.head')

    <section class="py-10">
        <div class="max-w-7xl mx-auto px-6 grid lg:grid-cols-4 gap-8">

            @include('forum.index.aside')

            <div class="lg:col-span-3">
                {{-- @include('forum.index.order')  --}}

                <div class="grid sm:grid-cols-2 gap-5">
                    @include('forum.index.topics')
                </div>
                <div class="mt-8">
                    {{ $topics->links('components.pagination') }}
                </div>
            </div>
        </div>
    </section>

@endsection
