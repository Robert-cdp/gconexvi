@extends('main')

@include('auth.reset.meta')

@section('content')
<main class="min-h-[80vh] flex items-center justify-center py-12 px-4">
    <div class="w-full max-w-md">
        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-8">

            <div class="text-center mb-6">
                <h2 class="text-2xl font-extrabold text-slate-900">Nueva contraseña</h2>
            </div>

            <form method="POST" action="{{ route('password.update') }}" class="space-y-5">
                @csrf

                <input type="hidden" name="token" value="{{ request()->route('token') }}">

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1">Correo electrónico</label>

                    <input type="email" name="email" value="{{ old('email', request()->email) }}"
                        class="w-full px-4 py-3 text-sm border rounded-xl outline-none
                        {{ $errors->has('email') ? 'border-red-500' : 'border-slate-200' }}">
                    
                    @error('email')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1">Nueva contraseña</label>

                    <input type="password" name="password"
                        class="w-full px-4 py-3 text-sm border rounded-xl outline-none
                        {{ $errors->has('password') ? 'border-red-500' : 'border-slate-200' }}">

                    @error('password')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1">Confirmar contraseña</label>

                    <input type="password" name="password_confirmation"
                        class="w-full px-4 py-3 text-sm border rounded-xl outline-none border-slate-200">
                </div>

                <button type="submit"
                    class="w-full py-3 text-sm font-bold text-white bg-primary-600 rounded-xl hover:bg-primary-700">
                    Cambiar contraseña
                </button>
            </form>
        </div>
    </div>
</main>
@endsection