<section class="bg-white border-b border-slate-100 py-12">
    <div class="max-w-5xl mx-auto px-6">
        <div class="flex flex-col sm:flex-row items-start sm:items-center gap-6">
            <img src="{{ $user->avatar ? Storage::url($user->avatar) : asset('images/default-avatar.png') }}" alt="Roberto Calel"
                class="w-20 h-20 sm:w-24 sm:h-24 rounded-full border-4 border-primary-100 shadow-md object-cover">
            <div class="flex-1">
                <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-900">{{ $user->name }}</h1>
                <p class="text-slate-500 mt-1">Guatemala</p>
                <div class="flex items-center gap-2 mt-2">
                    <span class="flex items-center gap-1 text-yellow-500 font-semibold text-sm">⭐ {{ number_format($user->averageRating(), 1) }}</span>
                    <span class="text-slate-400 text-sm">·</span>
                    <span class="text-sm text-slate-500">128 servicios completados</span>
                </div>
            </div>
            @auth
                @if (auth()->user()->slug === $user->slug)
                    <a href="{{ route('user.settings.general') }}"
                        class="inline-flex items-center gap-2 px-5 py-2.5 border border-slate-300 text-slate-700 font-semibold rounded-xl hover:bg-slate-100 transition-all text-sm">
                        Editar perfil
                    </a>
                @endif
            @endauth
        </div>
    </div>
</section>
