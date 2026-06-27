@extends('user.settings')

@section('content-settings')
    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6">
        <h2 class="text-lg font-bold text-slate-800 mb-4">Foto de perfil</h2>
        <div class="flex items-center gap-4">
            <img src="https://i.pravatar.cc/80?img=11" alt="Avatar"
                class="w-16 h-16 rounded-full border-2 border-primary-100 object-cover">
            <div>
                <button
                    class="px-4 py-2 text-sm font-semibold text-primary-700 border border-primary-200 rounded-lg hover:bg-primary-50 transition-colors">Subir
                    nueva foto</button>
                <p class="text-xs text-slate-400 mt-1">JPG, PNG o WEBP. Máx. 2MB.</p>
            </div>
        </div>
    </div>
@endsection
