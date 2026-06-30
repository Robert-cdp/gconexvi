<aside class="lg:col-span-1 space-y-6">
    <div class="bg-white rounded-2xl border border-slate-200 p-5 shadow-sm">
        <h3 class="font-bold text-slate-800 mb-4">🔍 Filtrar por</h3>

        <!-- Buscador -->
        <div class="relative mb-5">
            <input type="text" placeholder="Buscar trabajo..."
                class="w-full pl-9 pr-4 py-2.5 text-sm border border-slate-200 rounded-xl focus:ring-2 focus:ring-primary-100 focus:border-primary-300 outline-none">
            <svg class="absolute left-3 top-2.5 w-4 h-4 text-slate-400" fill="none" stroke="currentColor"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
        </div>

        <!-- Categorías -->
        <div class="mb-5">
            <h4 class="text-sm font-semibold text-slate-500 uppercase tracking-wide mb-3">Área</h4>
            <div class="space-y-2">
                <label class="flex items-center gap-2 text-sm text-slate-700 cursor-pointer">
                    <input type="checkbox" class="rounded border-slate-300 text-primary-600 focus:ring-primary-500"
                        checked> Desarrollo
                </label>
                <label class="flex items-center gap-2 text-sm text-slate-700 cursor-pointer">
                    <input type="checkbox" class="rounded border-slate-300 text-primary-600 focus:ring-primary-500">
                    Diseño
                </label>
                <label class="flex items-center gap-2 text-sm text-slate-700 cursor-pointer">
                    <input type="checkbox" class="rounded border-slate-300 text-primary-600 focus:ring-primary-500">
                    Marketing
                </label>
                <label class="flex items-center gap-2 text-sm text-slate-700 cursor-pointer">
                    <input type="checkbox" class="rounded border-slate-300 text-primary-600 focus:ring-primary-500">
                    Soporte
                </label>
                <label class="flex items-center gap-2 text-sm text-slate-700 cursor-pointer">
                    <input type="checkbox" class="rounded border-slate-300 text-primary-600 focus:ring-primary-500">
                    Ventas
                </label>
            </div>
        </div>

        <!-- Tipo de empleo -->
        <div class="mb-5">
            <h4 class="text-sm font-semibold text-slate-500 uppercase tracking-wide mb-3">Tipo</h4>
            <div class="space-y-2">
                <label class="flex items-center gap-2 text-sm text-slate-700 cursor-pointer">
                    <input type="checkbox" class="rounded border-slate-300 text-primary-600 focus:ring-primary-500">
                    Remoto
                </label>
                <label class="flex items-center gap-2 text-sm text-slate-700 cursor-pointer">
                    <input type="checkbox" class="rounded border-slate-300 text-primary-600 focus:ring-primary-500">
                    Híbrido
                </label>
                <label class="flex items-center gap-2 text-sm text-slate-700 cursor-pointer">
                    <input type="checkbox" class="rounded border-slate-300 text-primary-600 focus:ring-primary-500">
                    Presencial
                </label>
            </div>
        </div>

        <!-- Rango salarial -->
        <div class="mb-5">
            <h4 class="text-sm font-semibold text-slate-500 uppercase tracking-wide mb-3">Salario (Q)</h4>
            <div class="flex items-center gap-2">
                <input type="number" placeholder="Min"
                    class="w-full px-3 py-2 text-sm border border-slate-200 rounded-xl outline-none focus:ring-2 focus:ring-primary-100">
                <span class="text-slate-400">—</span>
                <input type="number" placeholder="Max"
                    class="w-full px-3 py-2 text-sm border border-slate-200 rounded-xl outline-none focus:ring-2 focus:ring-primary-100">
            </div>
        </div>

        <!-- Ubicación -->
        <div class="mb-5">
            <h4 class="text-sm font-semibold text-slate-500 uppercase tracking-wide mb-3">Ubicación</h4>
            <select
                class="w-full px-3 py-2.5 text-sm border border-slate-200 rounded-xl outline-none focus:ring-2 focus:ring-primary-100 bg-white">
                <option>Todas</option>
                <option>Guatemala</option>
                <option>Antigua</option>
                <option>Xela</option>
                <option>Remoto</option>
            </select>
        </div>

        <button
            class="w-full mt-2 py-2.5 bg-primary-600 text-white font-semibold rounded-xl hover:bg-primary-700 transition-all shadow-sm">
            Aplicar filtros
        </button>
    </div>
</aside>
