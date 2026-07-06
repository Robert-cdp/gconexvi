<div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6 mb-5">
    <div class="flex items-center gap-4">
        <img src="{{ Storage::url($employment->user->avatar ?? 'images/default-avatar.webp') }}"
            alt="{{ $employment->user->name }}" class="w-14 h-14 rounded-full object-cover">

        <div class="min-w-0">
            <h3 class="font-bold text-slate-900 truncate">
                {{ $employment->user->name }}
            </h3>

            <p class="text-sm text-slate-500">
                Publicó este empleo
            </p>

            <p class="text-xs text-slate-400 mt-1">
                Miembro desde {{ $employment->user->created_at->format('M Y') }}
            </p>
        </div>
    </div>

    <a href="{{ route('user.profile', $employment->user->slug) }}"
        class="mt-4 inline-flex w-full justify-center rounded-xl border border-slate-300 py-2.5 text-sm font-semibold text-slate-700 hover:bg-slate-50 transition">
        Ver perfil
    </a>
</div>