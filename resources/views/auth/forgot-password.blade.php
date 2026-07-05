@extends('main')

@include('auth.forgot.meta')

@section('content')
<main class="min-h-[80vh] flex items-center justify-center py-12 px-4">
    <div class="w-full max-w-md">
        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-8">

            <div class="text-center mb-6">
                <h2 class="text-2xl font-extrabold text-slate-900">Recuperar contraseña</h2>
                <p class="text-sm text-slate-500 mt-1">
                    Ingresa tu correo y te enviaremos un enlace
                </p>
            </div>

            @if (session('status'))
                <div class="mb-5 rounded-xl bg-green-50 border border-green-200 p-4 text-sm text-green-700">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}" class="space-y-5">
                @csrf

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1">
                        Correo electrónico
                    </label>

                    <input type="email" name="email" value="{{ old('email') }}"
                        class="w-full px-4 py-3 text-sm border rounded-xl outline-none
                        {{ $errors->has('email') ? 'border-red-500 focus:ring-red-200 focus:border-red-500' : 'border-slate-200 focus:ring-primary-100 focus:border-primary-300' }}"
                        placeholder="tu@email.com">

                    @error('email')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit"
                    class="w-full py-3 text-sm font-bold text-white bg-primary-600 rounded-xl hover:bg-primary-700">
                    Enviar enlace
                </button>
            </form>
        </div>
    </div>
</main>
@endsection