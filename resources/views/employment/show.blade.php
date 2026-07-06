@extends('main')

@section('title', $employment->title)

@section('content')
    <div class="max-w-7xl mx-auto py-10 px-10">
        <div class="grid lg:grid-cols-3 gap-8">
            <div class="lg:col-span-2 space-y-6">
                @include('employment.show.content')

                @include('employment.show.similar')
            </div>

            <div class="lg:col-span-1">
                <div class="sticky top-24 space-y-6">
                    @include('employment.show.sidebar-user')
                    @include('employment.show.sidebar-apply')
                </div>
            </div>
        </div>
    </div>
@endsection
