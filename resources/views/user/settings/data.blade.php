@extends('user.settings')

@section('content-settings')
    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6">
        <h2 class="text-lg font-bold text-slate-800 mb-4">Información básica</h2>
        <form action="{{ route('user.settings.general.update') }}" method="post" class="space-y-4">
            @csrf
            @method('PUT')
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">Nombre completo</label>
                <input type="text" value="{{ $user->name }}" name="name" class="w-full px-4 py-2.5 text-sm border border-slate-200 rounded-xl outline-none focus:ring-2 focus:ring-primary-100 focus:border-primary-300">
            </div>
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">Correo electrónico</label>
                <input type="email" value="{{ $user->email }}" name="email" class="w-full px-4 py-2.5 text-sm border border-slate-200 rounded-xl outline-none focus:ring-2 focus:ring-primary-100 focus:border-primary-300">
            </div>

            <button type="submit" class="px-6 py-2.5 bg-primary-600 text-white text-sm font-semibold rounded-xl hover:bg-primary-700 shadow-sm transition-all">
                Guardar cambios
            </button>
        </form>
    </div>
@endsection
