<section class="bg-white border-b border-slate-100 py-12">
    <div class="max-w-7xl mx-auto px-6">
        <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-4">
            <div>
                <h1 class="text-3xl lg:text-4xl font-extrabold text-slate-900">Servicios</h1>
                <p class="mt-2 text-slate-500">
                    Encuentra profesionales verificados y contrata el servicio ideal para
                    tu proyecto.
                </p>
            </div>
            @auth
                <a href="{{ route('services.create') }}"
                    class="self-start inline-flex items-center gap-2 px-5 py-2.5 bg-primary-600 text-white font-semibold rounded-xl hover:bg-primary-700 shadow-md shadow-primary-200 transition-all">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Publicar servicio
                </a>
            @endauth
        </div>
    </div>
</section>
