<div class="lg:col-span-1 space-y-6">
    <div class="bg-white rounded-2xl border border-slate-200 p-5 shadow-sm">
        <h3 class="font-bold text-slate-800 mb-3">Sobre mí</h3>
        <p class="text-sm text-slate-600 leading-relaxed">
            {{ $user->bio }}
        </p>
    </div>
    {{-- <div class="bg-white rounded-2xl border border-slate-200 p-5 shadow-sm">
        <h3 class="font-bold text-slate-800 mb-3">Habilidades</h3>
        <div class="flex flex-wrap gap-2">
            <span class="text-xs bg-primary-50 text-primary-700 px-2.5 py-1 rounded-full">Laravel</span>
            <span class="text-xs bg-primary-50 text-primary-700 px-2.5 py-1 rounded-full">PHP</span>
            <span class="text-xs bg-primary-50 text-primary-700 px-2.5 py-1 rounded-full">MySQL</span>
            <span class="text-xs bg-primary-50 text-primary-700 px-2.5 py-1 rounded-full">Docker</span>
            <span class="text-xs bg-primary-50 text-primary-700 px-2.5 py-1 rounded-full">REST APIs</span>
            <span class="text-xs bg-primary-50 text-primary-700 px-2.5 py-1 rounded-full">Git</span>
        </div>
    </div> --}}
    <div class="bg-white rounded-2xl border border-slate-200 p-5 shadow-sm">
        <h3 class="font-bold text-slate-800 mb-3">Miembro desde</h3>
        <p class="text-sm text-slate-500">{{ $user->created_at->diffForHumans() }}</p>
    </div>
</div>
