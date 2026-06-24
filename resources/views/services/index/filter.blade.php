<aside class="lg:col-span-1 space-y-6">
    <div class="bg-white rounded-2xl border border-slate-200 p-5 shadow-sm">
        <h3 class="font-bold text-slate-800 mb-4">Filtrar por</h3>

        <!-- Buscador -->
        <div class="relative mb-5">
            <input type="text" placeholder="Buscar servicio..."
                class="w-full pl-9 pr-4 py-2.5 text-sm border border-slate-200 rounded-xl focus:ring-2 focus:ring-primary-100 focus:border-primary-300 outline-none">
            <svg class="absolute left-3 top-2.5 w-4 h-4 text-slate-400" fill="none" stroke="currentColor"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
        </div>

        <!-- Categorías -->
        <div class="mb-5">
            <h4 class="text-sm font-semibold text-slate-500 uppercase tracking-wide mb-3">Categoría</h4>
            <div class="space-y-2">
                <label class="flex items-center gap-2 text-sm text-slate-700 cursor-pointer">
                    <input type="checkbox" class="rounded border-slate-300 text-primary-600 focus:ring-primary-500"
                        checked>
                    Desarrollo Web
                </label>
                <label class="flex items-center gap-2 text-sm text-slate-700 cursor-pointer">
                    <input type="checkbox" class="rounded border-slate-300 text-primary-600 focus:ring-primary-500">
                    Diseño
                    UI/UX
                </label>
                <label class="flex items-center gap-2 text-sm text-slate-700 cursor-pointer">
                    <input type="checkbox" class="rounded border-slate-300 text-primary-600 focus:ring-primary-500">
                    Marketing
                    Digital
                </label>
                <label class="flex items-center gap-2 text-sm text-slate-700 cursor-pointer">
                    <input type="checkbox" class="rounded border-slate-300 text-primary-600 focus:ring-primary-500">
                    Soporte
                    Técnico
                </label>
                <label class="flex items-center gap-2 text-sm text-slate-700 cursor-pointer">
                    <input type="checkbox" class="rounded border-slate-300 text-primary-600 focus:ring-primary-500">
                    Consultoría
                </label>
            </div>
        </div>

        <!-- Rango de precio -->
        <div class="mb-5">
            <h4 class="text-sm font-semibold text-slate-500 uppercase tracking-wide mb-3">Precio (Q)</h4>
            <div class="flex items-center gap-2">
                <input type="number" placeholder="Min"
                    class="w-full px-3 py-2 text-sm border border-slate-200 rounded-xl outline-none focus:ring-2 focus:ring-primary-100">
                <span class="text-slate-400">—</span>
                <input type="number" placeholder="Max"
                    class="w-full px-3 py-2 text-sm border border-slate-200 rounded-xl outline-none focus:ring-2 focus:ring-primary-100">
            </div>
        </div>

        <!-- Calificación -->
        <div class="mb-5">
            <h4 class="text-sm font-semibold text-slate-500 uppercase tracking-wide mb-3">Calificación
                mínima</h4>
            <div class="flex items-center gap-2">
                <input type="range" min="3" max="5" step="0.5" value="4"
                    class="w-full accent-primary-600">
                <span class="text-sm font-medium text-yellow-500">⭐ 4.0</span>
            </div>
        </div>

        <button
            class="w-full mt-2 py-2.5 bg-primary-600 text-white font-semibold rounded-xl hover:bg-primary-700 transition-all shadow-sm">
            Aplicar filtros
        </button>
    </div>
</aside>
