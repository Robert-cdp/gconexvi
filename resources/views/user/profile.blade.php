@extends('main')

@section('title', $user->name)
    
@section('content')
    <main>
        @include('user.profile.header')

        <section class="py-10">

            <div class="max-w-5xl mx-auto px-6 grid lg:grid-cols-3 gap-8">

                @include('user.profile.meta')

                <div class="lg:col-span-2 space-y-6">

                    @include('user.profile.services')

                    @include('user.profile.reviews')

                </div>

            </div>

        </section>
        
    </main>
@endsection