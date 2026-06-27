@extends('user.settings')

@section('content-settings')
    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6">
        <h2 class="text-lg font-bold text-slate-800 mb-4">Cambiar contraseña</h2>

        <form action="{{ route('user.settings.password.update') }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">
                    Contraseña actual
                </label>

                <input type="password" name="current_password"
                    class="w-full px-4 py-2.5 text-sm border rounded-xl outline-none focus:ring-2
                    @error('current_password')
                        border-red-300 focus:ring-red-100 focus:border-red-400
                    @else
                        border-slate-200 focus:ring-primary-100 focus:border-primary-300
                    @enderror">

                @error('current_password')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">
                    Nueva contraseña
                </label>

                <input type="password" name="password"
                    class="w-full px-4 py-2.5 text-sm border rounded-xl outline-none focus:ring-2
                    @error('password')
                        border-red-300 focus:ring-red-100 focus:border-red-400
                    @else
                        border-slate-200 focus:ring-primary-100 focus:border-primary-300
                    @enderror">

                @error('password')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">
                    Confirmar nueva contraseña
                </label>

                <input type="password" name="password_confirmation"
                    class="w-full px-4 py-2.5 text-sm border border-slate-200 rounded-xl outline-none focus:ring-2 focus:ring-primary-100 focus:border-primary-300">
            </div>

            <button type="submit"
                class="px-6 py-2.5 bg-primary-600 text-white text-sm font-semibold rounded-xl hover:bg-primary-700 shadow-sm transition-all">
                Actualizar contraseña
            </button>
        </form>
    </div>
@endsection
