@extends('main')

@section('title', 'Inicio')

@section('content')
    <main>
        {{-- <!-- ========== HERO ========== --> --}}
        @include('home.hero')

        {{-- <!-- ========== ESTADÍSTICAS ========== --> --}}
        @include('home.statistics')

        {{-- <!-- ========== SERVICIOS DESTACADOS ========== --> --}}
        @include('home.services')

        {{-- <!-- ========== EMPLEOS RECIENTES ========== --> --}}
        @include('home.employment')

        {{-- <!-- ========== FORO ========== --> --}}
        @include('home.forum')

        {{-- <!-- ========== MARKETPLACE P2P ========== --> --}}
        @include('home.p2p')

        {{-- <!-- ========== CTA FINAL ========== --> --}}
        @include('home.cta')
    </main>
@endsection
