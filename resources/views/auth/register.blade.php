@extends('main')

@include('auth.register.meta')

@section('content')
    <div class="min-h-[80vh] flex items-center justify-center py-12 px-4">
        <div class="w-full max-w-md">
            <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-8">
                <div class="text-center mb-6">
                    <h2 class="text-2xl font-extrabold text-slate-900">Crear cuenta</h2>
                    <p class="text-sm text-slate-500 mt-1">
                        Únete a la comunidad de {{ config('app.name') }}
                    </p>
                </div>

                <a href="{{ route('google.redirect') }}"
                    class="w-full flex items-center justify-center gap-3 py-3 text-sm font-bold text-slate-700 bg-white border border-slate-300 rounded-xl hover:bg-slate-50 hover:border-slate-400 transition-all shadow-sm">

                    <svg class="w-5 h-5" viewBox="0 0 24 24">
                        <path fill="#4285F4"
                            d="M21.35 12.23c0-.72-.06-1.41-.2-2.08H12v3.94h5.27a4.5 4.5 0 0 1-1.95 2.95v2.46h3.16c1.85-1.7 2.87-4.2 2.87-7.27z" />
                        <path fill="#34A853"
                            d="M12 22c2.7 0 4.96-.9 6.61-2.43l-3.16-2.46c-.88.59-2 .94-3.45.94-2.65 0-4.9-1.79-5.7-4.2H3.03v2.54A10 10 0 0 0 12 22z" />
                        <path fill="#FBBC05" d="M6.3 13.85a6 6 0 0 1 0-3.7V7.61H3.03a10 10 0 0 0 0 8.78l3.27-2.54z" />
                        <path fill="#EA4335"
                            d="M12 6.04c1.47 0 2.8.51 3.84 1.5l2.88-2.88C16.95 2.99 14.7 2 12 2a10 10 0 0 0-8.97 5.61L6.3 10.15c.8-2.41 3.05-4.11 5.7-4.11z" />
                    </svg>

                    Continuar con Google
                </a>

                <div class="flex items-center gap-3 my-8">
                    <div class="flex-1 h-px bg-slate-200"></div>

                    <span class="text-xs font-semibold text-slate-400 whitespace-nowrap">
                        O INGRESA CON EMAIL
                    </span>

                    <div class="flex-1 h-px bg-slate-200"></div>
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
