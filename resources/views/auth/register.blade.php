@extends('main')

@include('auth.register.meta')

@section('content')
    <div class="min-h-[80vh] flex items-center justify-center py-12 px-4">
        <div class="w-full max-w-md">
            <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-8">
                <div class="text-center mb-6">
                    <h2 class="text-2xl font-extrabold text-slate-900">Crear cuenta</h2>
                    <p class="text-sm text-slate-500 mt-1">Únete a la comunidad de {{ config('app.name') }}</p>
                </div>

                <form action="{{ route('register') }}" method="post" class="space-y-5">
                    @csrf

                    @include('auth.register.form-name')

                    @include('auth.register.form-email')

                    @include('auth.register.form-password')
                   
                    @include('auth.register.form-confirm_password')

                    @include('auth.register.terms')

                    <button type="submit"
                        class="w-full py-3 text-sm font-bold text-white bg-primary-600 rounded-xl hover:bg-primary-700 shadow-md shadow-primary-200 transition-all">
                        Crear cuenta
                    </button>
                </form>

                <p class="mt-6 text-center text-sm text-slate-500">
                    ¿Ya tienes cuenta?
                    <a href="{{ route('login') }}" class="text-primary-600 font-semibold hover:text-primary-700">
                        Inicia sesión
                    </a>
                </p>
            </div>
        </div>
    </div>
@endsection
