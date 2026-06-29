@extends('main')

@section('content')
    <main>
        <!-- Encabezado de página -->
        <section class="bg-white border-b border-slate-100 py-12">
            <div class="max-w-7xl mx-auto px-6">
                <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-4">
                    <div>
                        <h1 class="text-3xl lg:text-4xl font-extrabold text-slate-900">💼 Trabajos</h1>
                        <p class="mt-2 text-slate-500">Encuentra la oportunidad laboral ideal para tu perfil profesional.</p>
                    </div>
                    <button class="self-start inline-flex items-center gap-2 px-5 py-2.5 bg-primary-600 text-white font-semibold rounded-xl hover:bg-primary-700 shadow-md shadow-primary-200 transition-all">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                        Publicar vacante
                    </button>
                </div>
            </div>
        </section>

        <!-- Contenido: filtros + listado -->
        <section class="py-10">
            <div class="max-w-7xl mx-auto px-6 grid lg:grid-cols-4 gap-8">

                <!-- Sidebar de filtros -->
                <aside class="lg:col-span-1 space-y-6">
                    <div class="bg-white rounded-2xl border border-slate-200 p-5 shadow-sm">
                        <h3 class="font-bold text-slate-800 mb-4">🔍 Filtrar por</h3>

                        <!-- Buscador -->
                        <div class="relative mb-5">
                            <input type="text" placeholder="Buscar trabajo..." class="w-full pl-9 pr-4 py-2.5 text-sm border border-slate-200 rounded-xl focus:ring-2 focus:ring-primary-100 focus:border-primary-300 outline-none">
                            <svg class="absolute left-3 top-2.5 w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                        </div>

                        <!-- Categorías -->
                        <div class="mb-5">
                            <h4 class="text-sm font-semibold text-slate-500 uppercase tracking-wide mb-3">Área</h4>
                            <div class="space-y-2">
                                <label class="flex items-center gap-2 text-sm text-slate-700 cursor-pointer">
                                    <input type="checkbox" class="rounded border-slate-300 text-primary-600 focus:ring-primary-500" checked> Desarrollo
                                </label>
                                <label class="flex items-center gap-2 text-sm text-slate-700 cursor-pointer">
                                    <input type="checkbox" class="rounded border-slate-300 text-primary-600 focus:ring-primary-500"> Diseño
                                </label>
                                <label class="flex items-center gap-2 text-sm text-slate-700 cursor-pointer">
                                    <input type="checkbox" class="rounded border-slate-300 text-primary-600 focus:ring-primary-500"> Marketing
                                </label>
                                <label class="flex items-center gap-2 text-sm text-slate-700 cursor-pointer">
                                    <input type="checkbox" class="rounded border-slate-300 text-primary-600 focus:ring-primary-500"> Soporte
                                </label>
                                <label class="flex items-center gap-2 text-sm text-slate-700 cursor-pointer">
                                    <input type="checkbox" class="rounded border-slate-300 text-primary-600 focus:ring-primary-500"> Ventas
                                </label>
                            </div>
                        </div>

                        <!-- Tipo de empleo -->
                        <div class="mb-5">
                            <h4 class="text-sm font-semibold text-slate-500 uppercase tracking-wide mb-3">Tipo</h4>
                            <div class="space-y-2">
                                <label class="flex items-center gap-2 text-sm text-slate-700 cursor-pointer">
                                    <input type="checkbox" class="rounded border-slate-300 text-primary-600 focus:ring-primary-500"> Remoto
                                </label>
                                <label class="flex items-center gap-2 text-sm text-slate-700 cursor-pointer">
                                    <input type="checkbox" class="rounded border-slate-300 text-primary-600 focus:ring-primary-500"> Híbrido
                                </label>
                                <label class="flex items-center gap-2 text-sm text-slate-700 cursor-pointer">
                                    <input type="checkbox" class="rounded border-slate-300 text-primary-600 focus:ring-primary-500"> Presencial
                                </label>
                            </div>
                        </div>

                        <!-- Rango salarial -->
                        <div class="mb-5">
                            <h4 class="text-sm font-semibold text-slate-500 uppercase tracking-wide mb-3">Salario (Q)</h4>
                            <div class="flex items-center gap-2">
                                <input type="number" placeholder="Min" class="w-full px-3 py-2 text-sm border border-slate-200 rounded-xl outline-none focus:ring-2 focus:ring-primary-100">
                                <span class="text-slate-400">—</span>
                                <input type="number" placeholder="Max" class="w-full px-3 py-2 text-sm border border-slate-200 rounded-xl outline-none focus:ring-2 focus:ring-primary-100">
                            </div>
                        </div>

                        <!-- Ubicación -->
                        <div class="mb-5">
                            <h4 class="text-sm font-semibold text-slate-500 uppercase tracking-wide mb-3">Ubicación</h4>
                            <select class="w-full px-3 py-2.5 text-sm border border-slate-200 rounded-xl outline-none focus:ring-2 focus:ring-primary-100 bg-white">
                                <option>Todas</option>
                                <option>Guatemala</option>
                                <option>Antigua</option>
                                <option>Xela</option>
                                <option>Remoto</option>
                            </select>
                        </div>

                        <button class="w-full mt-2 py-2.5 bg-primary-600 text-white font-semibold rounded-xl hover:bg-primary-700 transition-all shadow-sm">
                            Aplicar filtros
                        </button>
                    </div>
                </aside>

                <!-- Listado de trabajos -->
                <div class="lg:col-span-3">
                    <!-- Ordenar + resultados -->
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-6">
                        <p class="text-sm text-slate-500"><span class="font-semibold text-slate-700">18 vacantes</span> encontradas</p>
                        <select class="px-4 py-2 text-sm border border-slate-200 rounded-xl bg-white outline-none focus:ring-2 focus:ring-primary-100">
                            <option>Ordenar por: Más recientes</option>
                            <option>Salario: menor a mayor</option>
                            <option>Salario: mayor a menor</option>
                            <option>Nombre de empresa</option>
                        </select>
                    </div>

                    <!-- Grid de tarjetas de empleo -->
                    <div class="grid sm:grid-cols-2 xl:grid-cols-3 gap-5">
                        <!-- Empleo 1 -->
                        <article class="bg-white rounded-2xl overflow-hidden border border-slate-200 card-hover shadow-sm flex flex-col">
                            <div class="p-5 flex flex-col flex-1">
                                <div class="flex items-start gap-4 mb-3">
                                    <div class="w-12 h-12 bg-primary-100 text-primary-700 rounded-xl flex items-center justify-center font-bold text-lg shrink-0">TS</div>
                                    <div>
                                        <h3 class="font-bold text-slate-800">Backend Laravel Developer</h3>
                                        <p class="text-sm text-slate-500">Tech Solutions</p>
                                    </div>
                                </div>
                                <div class="flex flex-wrap gap-1.5 mb-3">
                                    <span class="text-xs bg-slate-100 text-slate-600 px-2 py-0.5 rounded-full">PHP</span>
                                    <span class="text-xs bg-slate-100 text-slate-600 px-2 py-0.5 rounded-full">Laravel</span>
                                    <span class="text-xs bg-slate-100 text-slate-600 px-2 py-0.5 rounded-full">MySQL</span>
                                    <span class="text-xs bg-slate-100 text-slate-600 px-2 py-0.5 rounded-full">Docker</span>
                                </div>
                                <p class="text-sm text-slate-500 flex-1 line-clamp-2">Buscamos desarrollador backend con experiencia en Laravel 11, APIs REST y testing. Remoto, horario flexible.</p>
                                <div class="mt-4 flex items-center justify-between">
                                    <span class="text-xs text-slate-400 flex items-center gap-1">📍 Remoto</span>
                                    <span class="font-bold text-emerald-600">Q8,000</span>
                                </div>
                                <button class="mt-4 w-full py-2.5 bg-primary-600 text-white text-sm font-semibold rounded-lg hover:bg-primary-700 transition-all shadow-sm">
                                    Aplicar ahora
                                </button>
                            </div>
                        </article>

                        <!-- Empleo 2 -->
                        <article class="bg-white rounded-2xl overflow-hidden border border-slate-200 card-hover shadow-sm flex flex-col">
                            <div class="p-5 flex flex-col flex-1">
                                <div class="flex items-start gap-4 mb-3">
                                    <div class="w-12 h-12 bg-emerald-100 text-emerald-700 rounded-xl flex items-center justify-center font-bold text-lg shrink-0">DS</div>
                                    <div>
                                        <h3 class="font-bold text-slate-800">Frontend React Developer</h3>
                                        <p class="text-sm text-slate-500">Digital Studio</p>
                                    </div>
                                </div>
                                <div class="flex flex-wrap gap-1.5 mb-3">
                                    <span class="text-xs bg-slate-100 text-slate-600 px-2 py-0.5 rounded-full">React</span>
                                    <span class="text-xs bg-slate-100 text-slate-600 px-2 py-0.5 rounded-full">TypeScript</span>
                                    <span class="text-xs bg-slate-100 text-slate-600 px-2 py-0.5 rounded-full">Tailwind</span>
                                </div>
                                <p class="text-sm text-slate-500 flex-1 line-clamp-2">Únete a nuestro equipo para crear interfaces modernas y accesibles. Híbrido, 3 días oficina.</p>
                                <div class="mt-4 flex items-center justify-between">
                                    <span class="text-xs text-slate-400 flex items-center gap-1">📍 Híbrido</span>
                                    <span class="font-bold text-emerald-600">Q7,500</span>
                                </div>
                                <button class="mt-4 w-full py-2.5 bg-primary-600 text-white text-sm font-semibold rounded-lg hover:bg-primary-700 transition-all shadow-sm">
                                    Aplicar ahora
                                </button>
                            </div>
                        </article>

                        <!-- Empleo 3 -->
                        <article class="bg-white rounded-2xl overflow-hidden border border-slate-200 card-hover shadow-sm flex flex-col">
                            <div class="p-5 flex flex-col flex-1">
                                <div class="flex items-start gap-4 mb-3">
                                    <div class="w-12 h-12 bg-warm-100 text-warm-700 rounded-xl flex items-center justify-center font-bold text-lg shrink-0">MP</div>
                                    <div>
                                        <h3 class="font-bold text-slate-800">Especialista en Marketing Digital</h3>
                                        <p class="text-sm text-slate-500">Marketing Pro</p>
                                    </div>
                                </div>
                                <div class="flex flex-wrap gap-1.5 mb-3">
                                    <span class="text-xs bg-slate-100 text-slate-600 px-2 py-0.5 rounded-full">SEO</span>
                                    <span class="text-xs bg-slate-100 text-slate-600 px-2 py-0.5 rounded-full">Google Ads</span>
                                    <span class="text-xs bg-slate-100 text-slate-600 px-2 py-0.5 rounded-full">Analytics</span>
                                </div>
                                <p class="text-sm text-slate-500 flex-1 line-clamp-2">Crea y gestiona campañas de alto impacto. Experiencia comprobable en e-commerce deseable.</p>
                                <div class="mt-4 flex items-center justify-between">
                                    <span class="text-xs text-slate-400 flex items-center gap-1">📍 Remoto</span>
                                    <span class="font-bold text-emerald-600">Q6,200</span>
                                </div>
                                <button class="mt-4 w-full py-2.5 bg-primary-600 text-white text-sm font-semibold rounded-lg hover:bg-primary-700 transition-all shadow-sm">
                                    Aplicar ahora
                                </button>
                            </div>
                        </article>

                        <!-- Empleo 4 -->
                        <article class="bg-white rounded-2xl overflow-hidden border border-slate-200 card-hover shadow-sm flex flex-col">
                            <div class="p-5 flex flex-col flex-1">
                                <div class="flex items-start gap-4 mb-3">
                                    <div class="w-12 h-12 bg-accent-100 text-accent-700 rounded-xl flex items-center justify-center font-bold text-lg shrink-0">UX</div>
                                    <div>
                                        <h3 class="font-bold text-slate-800">UI/UX Designer Senior</h3>
                                        <p class="text-sm text-slate-500">Creative Labs</p>
                                    </div>
                                </div>
                                <div class="flex flex-wrap gap-1.5 mb-3">
                                    <span class="text-xs bg-slate-100 text-slate-600 px-2 py-0.5 rounded-full">Figma</span>
                                    <span class="text-xs bg-slate-100 text-slate-600 px-2 py-0.5 rounded-full">Prototyping</span>
                                    <span class="text-xs bg-slate-100 text-slate-600 px-2 py-0.5 rounded-full">Design Systems</span>
                                </div>
                                <p class="text-sm text-slate-500 flex-1 line-clamp-2">Lidera la experiencia de usuario para productos digitales. Presencial en Antigua Guatemala.</p>
                                <div class="mt-4 flex items-center justify-between">
                                    <span class="text-xs text-slate-400 flex items-center gap-1">📍 Presencial</span>
                                    <span class="font-bold text-emerald-600">Q9,000</span>
                                </div>
                                <button class="mt-4 w-full py-2.5 bg-primary-600 text-white text-sm font-semibold rounded-lg hover:bg-primary-700 transition-all shadow-sm">
                                    Aplicar ahora
                                </button>
                            </div>
                        </article>

                        <!-- Empleo 5 -->
                        <article class="bg-white rounded-2xl overflow-hidden border border-slate-200 card-hover shadow-sm flex flex-col">
                            <div class="p-5 flex flex-col flex-1">
                                <div class="flex items-start gap-4 mb-3">
                                    <div class="w-12 h-12 bg-primary-100 text-primary-700 rounded-xl flex items-center justify-center font-bold text-lg shrink-0">TC</div>
                                    <div>
                                        <h3 class="font-bold text-slate-800">Soporte Técnico Nivel 2</h3>
                                        <p class="text-sm text-slate-500">HelpDesk Pro</p>
                                    </div>
                                </div>
                                <div class="flex flex-wrap gap-1.5 mb-3">
                                    <span class="text-xs bg-slate-100 text-slate-600 px-2 py-0.5 rounded-full">Windows</span>
                                    <span class="text-xs bg-slate-100 text-slate-600 px-2 py-0.5 rounded-full">Redes</span>
                                    <span class="text-xs bg-slate-100 text-slate-600 px-2 py-0.5 rounded-full">Active Directory</span>
                                </div>
                                <p class="text-sm text-slate-500 flex-1 line-clamp-2">Resolución de tickets complejos, configuración de equipos y soporte a usuarios VIP. Presencial.</p>
                                <div class="mt-4 flex items-center justify-between">
                                    <span class="text-xs text-slate-400 flex items-center gap-1">📍 Ciudad de Guatemala</span>
                                    <span class="font-bold text-emerald-600">Q5,500</span>
                                </div>
                                <button class="mt-4 w-full py-2.5 bg-primary-600 text-white text-sm font-semibold rounded-lg hover:bg-primary-700 transition-all shadow-sm">
                                    Aplicar ahora
                                </button>
                            </div>
                        </article>

                        <!-- Empleo 6 -->
                        <article class="bg-white rounded-2xl overflow-hidden border border-slate-200 card-hover shadow-sm flex flex-col">
                            <div class="p-5 flex flex-col flex-1">
                                <div class="flex items-start gap-4 mb-3">
                                    <div class="w-12 h-12 bg-emerald-100 text-emerald-700 rounded-xl flex items-center justify-center font-bold text-lg shrink-0">VT</div>
                                    <div>
                                        <h3 class="font-bold text-slate-800">Ejecutivo de Ventas B2B</h3>
                                        <p class="text-sm text-slate-500">Soluciones Corp.</p>
                                    </div>
                                </div>
                                <div class="flex flex-wrap gap-1.5 mb-3">
                                    <span class="text-xs bg-slate-100 text-slate-600 px-2 py-0.5 rounded-full">CRM</span>
                                    <span class="text-xs bg-slate-100 text-slate-600 px-2 py-0.5 rounded-full">Negociación</span>
                                    <span class="text-xs bg-slate-100 text-slate-600 px-2 py-0.5 rounded-full">Inglés</span>
                                </div>
                                <p class="text-sm text-slate-500 flex-1 line-clamp-2">Responsable de cuenta clave, prospección y cierre de contratos. Comisiones atractivas.</p>
                                <div class="mt-4 flex items-center justify-between">
                                    <span class="text-xs text-slate-400 flex items-center gap-1">📍 Híbrido</span>
                                    <span class="font-bold text-emerald-600">Q7,200 + comisiones</span>
                                </div>
                                <button class="mt-4 w-full py-2.5 bg-primary-600 text-white text-sm font-semibold rounded-lg hover:bg-primary-700 transition-all shadow-sm">
                                    Aplicar ahora
                                </button>
                            </div>
                        </article>
                    </div>

                    <!-- Paginación -->
                    <div class="mt-10 flex justify-center">
                        <nav class="flex items-center gap-1 bg-white border border-slate-200 rounded-xl p-1 shadow-sm">
                            <button class="px-3 py-2 text-sm text-slate-400 hover:text-slate-600 transition-colors">← Anterior</button>
                            <button class="px-4 py-2 text-sm font-semibold bg-primary-600 text-white rounded-lg shadow">1</button>
                            <button class="px-4 py-2 text-sm text-slate-600 hover:bg-slate-100 rounded-lg transition-colors">2</button>
                            <button class="px-4 py-2 text-sm text-slate-600 hover:bg-slate-100 rounded-lg transition-colors">3</button>
                            <span class="px-2 text-slate-400">…</span>
                            <button class="px-4 py-2 text-sm text-slate-600 hover:bg-slate-100 rounded-lg transition-colors">6</button>
                            <button class="px-3 py-2 text-sm text-slate-600 hover:text-slate-800 transition-colors">Siguiente →</button>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection