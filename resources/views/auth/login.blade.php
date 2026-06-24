@extends('main')

@section('title', 'Ingresar')
    
@section('content')
    <!-- Formulario de login -->
    <main class="min-h-[80vh] flex items-center justify-center py-12 px-4">
        <div class="w-full max-w-md">
            <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-8">
                <div class="text-center mb-6">
                    <h2 class="text-2xl font-extrabold text-slate-900">Iniciar sesión</h2>
                    <p class="text-sm text-slate-500 mt-1">Accede a tu cuenta de {{ config('app.name') }}</p>
                </div>

                <form action="{{ route('login') }}" method="post" class="space-y-5" >
                    @csrf
                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-semibold text-slate-700 mb-1">Correo electrónico</label>
                        <input type="email" id="email" name="email" placeholder="tu@email.com" class="w-full px-4 py-3 text-sm border border-slate-200 rounded-xl outline-none focus:ring-2 focus:ring-primary-100 focus:border-primary-300 transition-all">
                    </div>

                    <!-- Password -->
                    <div>
                        <label for="password" class="block text-sm font-semibold text-slate-700 mb-1">Contraseña</label>
                        <input type="password" id="password" name="password" placeholder="••••••••" class="w-full px-4 py-3 text-sm border border-slate-200 rounded-xl outline-none focus:ring-2 focus:ring-primary-100 focus:border-primary-300 transition-all">
                    </div>

                    <!-- Recordar -->
                    <div class="flex items-center justify-between text-sm">
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" class="rounded border-slate-300 text-primary-600 focus:ring-primary-500">
                            <span class="text-slate-600">Recordarme</span>
                        </label>
                        <a href="#" class="text-primary-600 hover:text-primary-700 font-medium">¿Olvidaste tu contraseña?</a>
                    </div>

                    <!-- Botón -->
                    <button type="submit" class="w-full py-3 text-sm font-bold text-white bg-primary-600 rounded-xl hover:bg-primary-700 shadow-md shadow-primary-200 transition-all">
                        Ingresar
                    </button>
                </form>

                <p class="mt-6 text-center text-sm text-slate-500">
                    ¿No tienes cuenta?
                    <a href="{{ route('register') }}" class="text-primary-600 font-semibold hover:text-primary-700">Regístrate aquí</a>
                </p>
            </div>
        </div>
    </main>
@endsection