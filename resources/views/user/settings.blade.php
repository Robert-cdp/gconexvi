@extends('main')

@section('title', 'Configuración')

@section('content')
    <main>
        <section class="bg-white border-b border-slate-100 py-10">
            <div class="max-w-5xl mx-auto px-6">
                <h1 class="text-3xl font-extrabold text-slate-900">Configuración</h1>
                <p class="mt-2 text-slate-500">Administra tu información personal y preferencias de cuenta.</p>
            </div>
        </section>

        <section class="py-10">
            <div class="max-w-5xl mx-auto px-6 grid lg:grid-cols-3 gap-8">

                <div class="lg:col-span-1">
                    @include('user.settings.nav')
                </div>

                <div class="lg:col-span-2 space-y-6">

                    @if (session('success'))
                        <div class="mb-4 rounded-xl border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-700">
                            {{ session('success') }}
                        </div>
                    @endif

                    @yield('content-settings')
                </div>
            </div>
        </section>
    </main>
@endsection
