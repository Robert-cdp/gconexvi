@extends('user.settings')

@section('content-settings')
    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6">
        <h2 class="text-lg font-bold text-slate-800 mb-4">Información básica</h2>
        <form action="{{ route('user.settings.general.update') }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">
                    Nombre completo
                </label>

                <input type="text" name="name" value="{{ old('name', $user->name) }}"
                    class="w-full px-4 py-2.5 text-sm border rounded-xl outline-none focus:ring-2
                    @error('name')
                        border-red-300 focus:ring-red-100 focus:border-red-400
                    @else
                        border-slate-200 focus:ring-primary-100 focus:border-primary-300
                    @enderror">

                @error('name')
                    <p class="mt-1 text-sm text-red-600">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">
                    Correo electrónico
                </label>

                <input type="email" name="email" value="{{ old('email', $user->email) }}"
                    class="w-full px-4 py-2.5 text-sm border rounded-xl outline-none focus:ring-2
                    @error('email')
                        border-red-300 focus:ring-red-100 focus:border-red-400
                    @else
                        border-slate-200 focus:ring-primary-100 focus:border-primary-300
                    @enderror">

                @error('email')
                    <p class="mt-1 text-sm text-red-600">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <button type="submit"
                class="px-6 py-2.5 bg-primary-600 text-white text-sm font-semibold rounded-xl hover:bg-primary-700 shadow-sm transition-all">
                Guardar cambios
            </button>
        </form>
    </div>
@endsection
