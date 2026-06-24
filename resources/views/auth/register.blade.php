@extends('main')

@section('title', 'Crear Cuenta')
    
@section('content')
    <main class="min-h-[80vh] flex items-center justify-center py-12 px-4">
        <div class="w-full max-w-md">
            <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-8">
                <div class="text-center mb-6">
                    <h2 class="text-2xl font-extrabold text-slate-900">Crear cuenta</h2>
                    <p class="text-sm text-slate-500 mt-1">Únete a la comunidad de {{ config('app.name') }}</p>
                </div>

                <form action="{{ route('register') }}" method="post" class="space-y-5">
                    @csrf
                    <!-- Nombre -->
                    <div>
                        <label for="name" class="block text-sm font-semibold text-slate-700 mb-1">Nombre completo</label>
                        <input type="text" id="name" name="name" placeholder="Tu nombre" class="w-full px-4 py-3 text-sm border border-slate-200 rounded-xl outline-none focus:ring-2 focus:ring-primary-100 focus:border-primary-300 transition-all">
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-semibold text-slate-700 mb-1">Correo electrónico</label>
                        <input type="email" id="email" name="email" placeholder="tu@email.com" class="w-full px-4 py-3 text-sm border border-slate-200 rounded-xl outline-none focus:ring-2 focus:ring-primary-100 focus:border-primary-300 transition-all">
                    </div>

                    <!-- Password -->
                    <div>
                        <label for="password" class="block text-sm font-semibold text-slate-700 mb-1">Contraseña</label>
                        <input type="password" id="password" name="password" placeholder="Mínimo 8 caracteres" class="w-full px-4 py-3 text-sm border border-slate-200 rounded-xl outline-none focus:ring-2 focus:ring-primary-100 focus:border-primary-300 transition-all">
                    </div>

                    <div>
                        <label for="password_confirmation" class="block text-sm font-semibold text-slate-700 mb-1">Confirmar Contraseña</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Mínimo 8 caracteres" class="w-full px-4 py-3 text-sm border border-slate-200 rounded-xl outline-none focus:ring-2 focus:ring-primary-100 focus:border-primary-300 transition-all">
                    </div>

                    <!-- Términos -->
                    <div class="flex items-start gap-2 text-sm">
                        <input type="checkbox" id="terminos" class="mt-0.5 rounded border-slate-300 text-primary-600 focus:ring-primary-500">
                        <label for="terminos" class="text-slate-600">Acepto los <a href="#" class="text-primary-600 hover:text-primary-700 font-medium">Términos de servicio</a> y la <a href="#" class="text-primary-600 hover:text-primary-700 font-medium">Política de privacidad</a></label>
                    </div>

                    <!-- Botón -->
                    <button type="submit" class="w-full py-3 text-sm font-bold text-white bg-primary-600 rounded-xl hover:bg-primary-700 shadow-md shadow-primary-200 transition-all">
                        Crear cuenta
                    </button>
                </form>

                <p class="mt-6 text-center text-sm text-slate-500">
                    ¿Ya tienes cuenta?
                    <a href="{{ route('login') }}" class="text-primary-600 font-semibold hover:text-primary-700">Inicia sesión</a>
                </p>
            </div>
        </div>
    </main>
@endsection