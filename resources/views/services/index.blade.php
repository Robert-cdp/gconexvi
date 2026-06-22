@extends('main')

@section('content')
    <main>
        <!-- Encabezado de página -->
        <section class="bg-white border-b border-slate-100 py-12">
            <div class="max-w-7xl mx-auto px-6">
                <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-4">
                    <div>
                        <h1 class="text-3xl lg:text-4xl font-extrabold text-slate-900">Servicios</h1>
                        <p class="mt-2 text-slate-500">Encuentra profesionales verificados y contrata el servicio ideal para
                            tu proyecto.</p>
                    </div>
                    <button
                        class="self-start inline-flex items-center gap-2 px-5 py-2.5 bg-primary-600 text-white font-semibold rounded-xl hover:bg-primary-700 shadow-md shadow-primary-200 transition-all">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        Publicar servicio
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
                                    <input type="checkbox"
                                        class="rounded border-slate-300 text-primary-600 focus:ring-primary-500" checked>
                                    Desarrollo Web
                                </label>
                                <label class="flex items-center gap-2 text-sm text-slate-700 cursor-pointer">
                                    <input type="checkbox"
                                        class="rounded border-slate-300 text-primary-600 focus:ring-primary-500"> Diseño
                                    UI/UX
                                </label>
                                <label class="flex items-center gap-2 text-sm text-slate-700 cursor-pointer">
                                    <input type="checkbox"
                                        class="rounded border-slate-300 text-primary-600 focus:ring-primary-500"> Marketing
                                    Digital
                                </label>
                                <label class="flex items-center gap-2 text-sm text-slate-700 cursor-pointer">
                                    <input type="checkbox"
                                        class="rounded border-slate-300 text-primary-600 focus:ring-primary-500"> Soporte
                                    Técnico
                                </label>
                                <label class="flex items-center gap-2 text-sm text-slate-700 cursor-pointer">
                                    <input type="checkbox"
                                        class="rounded border-slate-300 text-primary-600 focus:ring-primary-500">
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

                <!-- Listado de servicios -->
                <div class="lg:col-span-3">
                    <!-- Ordenar + resultados -->
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-6">
                        <p class="text-sm text-slate-500"><span class="font-semibold text-slate-700">24 servicios</span>
                            encontrados</p>
                        <select
                            class="px-4 py-2 text-sm border border-slate-200 rounded-xl bg-white outline-none focus:ring-2 focus:ring-primary-100">
                            <option>Ordenar por: Más relevantes</option>
                            <option>Precio: menor a mayor</option>
                            <option>Precio: mayor a menor</option>
                            <option>Mejor calificados</option>
                        </select>
                    </div>

                    <!-- Grid de tarjetas -->
                    <div class="grid sm:grid-cols-2 xl:grid-cols-3 gap-5">
                        <!-- Tarjeta 1 -->
                        <article
                            class="bg-white rounded-2xl overflow-hidden border border-slate-200 card-hover shadow-sm flex flex-col">
                            <div class="relative">
                                <img src="https://picsum.photos/600/300?1" class="h-44 w-full object-cover" alt="Laravel">
                                <span
                                    class="absolute top-3 left-3 bg-primary-600 text-white text-xs px-2.5 py-0.5 rounded-full shadow">Destacado</span>
                            </div>
                            <div class="p-5 flex flex-col flex-1">
                                <div class="flex items-center gap-3 mb-3">
                                    <img src="https://i.pravatar.cc/44?img=11"
                                        class="w-10 h-10 rounded-full ring-2 ring-primary-100" alt="Roberto">
                                    <div>
                                        <p class="font-semibold text-slate-800 text-sm">Roberto Calel</p>
                                        <p class="text-xs text-slate-500">Laravel Developer</p>
                                    </div>
                                </div>
                                <h3 class="font-bold text-slate-800">Desarrollo de APIs REST con Laravel 11</h3>
                                <p class="text-sm text-slate-500 mt-1 line-clamp-2 flex-1">Backend robusto con
                                    autenticación, pruebas automatizadas y despliegue en producción.</p>
                                <div class="mt-4 flex items-center justify-between">
                                    <span class="flex items-center gap-1 text-yellow-500 font-semibold text-sm">⭐ 4.9 <span
                                            class="text-slate-400 font-normal">(128)</span></span>
                                    <span class="font-bold text-primary-700">Q500</span>
                                </div>
                                <button
                                    class="mt-3 w-full py-2 text-sm font-semibold text-primary-700 border border-primary-200 rounded-lg hover:bg-primary-50 transition-colors">
                                    Ver servicio
                                </button>
                            </div>
                        </article>

                        <!-- Tarjeta 2 -->
                        <article
                            class="bg-white rounded-2xl overflow-hidden border border-slate-200 card-hover shadow-sm flex flex-col">
                            <div class="relative">
                                <img src="https://picsum.photos/600/300?10" class="h-44 w-full object-cover"
                                    alt="UI Design">
                                <span
                                    class="absolute top-3 left-3 bg-emerald-500 text-white text-xs px-2.5 py-0.5 rounded-full shadow">Popular</span>
                            </div>
                            <div class="p-5 flex flex-col flex-1">
                                <div class="flex items-center gap-3 mb-3">
                                    <img src="https://i.pravatar.cc/44?img=16"
                                        class="w-10 h-10 rounded-full ring-2 ring-primary-100" alt="María">
                                    <div>
                                        <p class="font-semibold text-slate-800 text-sm">María García</p>
                                        <p class="text-xs text-slate-500">UI/UX Designer</p>
                                    </div>
                                </div>
                                <h3 class="font-bold text-slate-800">Diseño de interfaces modernas Figma</h3>
                                <p class="text-sm text-slate-500 mt-1 line-clamp-2 flex-1">Prototipos interactivos,
                                    sistemas de diseño completos y handoff para desarrollo.</p>
                                <div class="mt-4 flex items-center justify-between">
                                    <span class="flex items-center gap-1 text-yellow-500 font-semibold text-sm">⭐ 4.8 <span
                                            class="text-slate-400 font-normal">(94)</span></span>
                                    <span class="font-bold text-primary-700">Q350</span>
                                </div>
                                <button
                                    class="mt-3 w-full py-2 text-sm font-semibold text-primary-700 border border-primary-200 rounded-lg hover:bg-primary-50 transition-colors">
                                    Ver servicio
                                </button>
                            </div>
                        </article>

                        <!-- Tarjeta 3 -->
                        <article
                            class="bg-white rounded-2xl overflow-hidden border border-slate-200 card-hover shadow-sm flex flex-col">
                            <div class="relative">
                                <img src="https://picsum.photos/600/300?20" class="h-44 w-full object-cover"
                                    alt="Marketing">
                                <span
                                    class="absolute top-3 left-3 bg-warm-500 text-white text-xs px-2.5 py-0.5 rounded-full shadow">Oferta</span>
                            </div>
                            <div class="p-5 flex flex-col flex-1">
                                <div class="flex items-center gap-3 mb-3">
                                    <img src="https://i.pravatar.cc/44?img=22"
                                        class="w-10 h-10 rounded-full ring-2 ring-primary-100" alt="Carlos">
                                    <div>
                                        <p class="font-semibold text-slate-800 text-sm">Carlos López</p>
                                        <p class="text-xs text-slate-500">Marketing Digital</p>
                                    </div>
                                </div>
                                <h3 class="font-bold text-slate-800">Estrategia de marketing en redes sociales</h3>
                                <p class="text-sm text-slate-500 mt-1 line-clamp-2 flex-1">Creación de contenido,
                                    calendario editorial y análisis de métricas mensuales.</p>
                                <div class="mt-4 flex items-center justify-between">
                                    <span class="flex items-center gap-1 text-yellow-500 font-semibold text-sm">⭐ 4.7 <span
                                            class="text-slate-400 font-normal">(56)</span></span>
                                    <span class="font-bold text-primary-700">Q280</span>
                                </div>
                                <button
                                    class="mt-3 w-full py-2 text-sm font-semibold text-primary-700 border border-primary-200 rounded-lg hover:bg-primary-50 transition-colors">
                                    Ver servicio
                                </button>
                            </div>
                        </article>

                        <!-- Tarjeta 4 -->
                        <article
                            class="bg-white rounded-2xl overflow-hidden border border-slate-200 card-hover shadow-sm flex flex-col">
                            <div class="relative">
                                <img src="https://picsum.photos/600/300?25" class="h-44 w-full object-cover"
                                    alt="Frontend">
                                <span
                                    class="absolute top-3 left-3 bg-accent-500 text-white text-xs px-2.5 py-0.5 rounded-full shadow">Nuevo</span>
                            </div>
                            <div class="p-5 flex flex-col flex-1">
                                <div class="flex items-center gap-3 mb-3">
                                    <img src="https://i.pravatar.cc/44?img=44"
                                        class="w-10 h-10 rounded-full ring-2 ring-primary-100" alt="Andrea">
                                    <div>
                                        <p class="font-semibold text-slate-800 text-sm">Andrea Méndez</p>
                                        <p class="text-xs text-slate-500">Frontend Developer</p>
                                    </div>
                                </div>
                                <h3 class="font-bold text-slate-800">Landing page con React + Tailwind</h3>
                                <p class="text-sm text-slate-500 mt-1 line-clamp-2 flex-1">Diseño responsive, animaciones
                                    sutiles y optimización SEO en 3 días de entrega.</p>
                                <div class="mt-4 flex items-center justify-between">
                                    <span class="flex items-center gap-1 text-yellow-500 font-semibold text-sm">⭐ 4.6 <span
                                            class="text-slate-400 font-normal">(32)</span></span>
                                    <span class="font-bold text-primary-700">Q400</span>
                                </div>
                                <button
                                    class="mt-3 w-full py-2 text-sm font-semibold text-primary-700 border border-primary-200 rounded-lg hover:bg-primary-50 transition-colors">
                                    Ver servicio
                                </button>
                            </div>
                        </article>

                        <!-- Tarjeta 5 -->
                        <article
                            class="bg-white rounded-2xl overflow-hidden border border-slate-200 card-hover shadow-sm flex flex-col">
                            <div class="relative">
                                <img src="https://picsum.photos/600/300?30" class="h-44 w-full object-cover"
                                    alt="Soporte">
                            </div>
                            <div class="p-5 flex flex-col flex-1">
                                <div class="flex items-center gap-3 mb-3">
                                    <img src="https://i.pravatar.cc/44?img=55"
                                        class="w-10 h-10 rounded-full ring-2 ring-primary-100" alt="Luis">
                                    <div>
                                        <p class="font-semibold text-slate-800 text-sm">Luis Gómez</p>
                                        <p class="text-xs text-slate-500">Soporte Técnico</p>
                                    </div>
                                </div>
                                <h3 class="font-bold text-slate-800">Mantenimiento y reparación de PC</h3>
                                <p class="text-sm text-slate-500 mt-1 line-clamp-2 flex-1">Diagnóstico, limpieza, cambio de
                                    pasta térmica y optimización de sistemas Windows/Mac.</p>
                                <div class="mt-4 flex items-center justify-between">
                                    <span class="flex items-center gap-1 text-yellow-500 font-semibold text-sm">⭐ 4.9 <span
                                            class="text-slate-400 font-normal">(87)</span></span>
                                    <span class="font-bold text-primary-700">Q150</span>
                                </div>
                                <button
                                    class="mt-3 w-full py-2 text-sm font-semibold text-primary-700 border border-primary-200 rounded-lg hover:bg-primary-50 transition-colors">
                                    Ver servicio
                                </button>
                            </div>
                        </article>

                        <!-- Tarjeta 6 -->
                        <article
                            class="bg-white rounded-2xl overflow-hidden border border-slate-200 card-hover shadow-sm flex flex-col">
                            <div class="relative">
                                <img src="https://picsum.photos/600/300?35" class="h-44 w-full object-cover"
                                    alt="Consultoría">
                                <span
                                    class="absolute top-3 left-3 bg-primary-600 text-white text-xs px-2.5 py-0.5 rounded-full shadow">Premium</span>
                            </div>
                            <div class="p-5 flex flex-col flex-1">
                                <div class="flex items-center gap-3 mb-3">
                                    <img src="https://i.pravatar.cc/44?img=68"
                                        class="w-10 h-10 rounded-full ring-2 ring-primary-100" alt="Sofía">
                                    <div>
                                        <p class="font-semibold text-slate-800 text-sm">Sofía Ramírez</p>
                                        <p class="text-xs text-slate-500">Consultora Tech</p>
                                    </div>
                                </div>
                                <h3 class="font-bold text-slate-800">Consultoría de arquitectura cloud</h3>
                                <p class="text-sm text-slate-500 mt-1 line-clamp-2 flex-1">Evaluación de infraestructura,
                                    migración a AWS/GCP y estrategia de escalabilidad.</p>
                                <div class="mt-4 flex items-center justify-between">
                                    <span class="flex items-center gap-1 text-yellow-500 font-semibold text-sm">⭐ 5.0 <span
                                            class="text-slate-400 font-normal">(44)</span></span>
                                    <span class="font-bold text-primary-700">Q950</span>
                                </div>
                                <button
                                    class="mt-3 w-full py-2 text-sm font-semibold text-primary-700 border border-primary-200 rounded-lg hover:bg-primary-50 transition-colors">
                                    Ver servicio
                                </button>
                            </div>
                        </article>
                    </div>

                    <!-- Paginación -->
                    <div class="mt-10 flex justify-center">
                        <nav class="flex items-center gap-1 bg-white border border-slate-200 rounded-xl p-1 shadow-sm">
                            <button class="px-3 py-2 text-sm text-slate-400 hover:text-slate-600 transition-colors">←
                                Anterior</button>
                            <button
                                class="px-4 py-2 text-sm font-semibold bg-primary-600 text-white rounded-lg shadow">1</button>
                            <button
                                class="px-4 py-2 text-sm text-slate-600 hover:bg-slate-100 rounded-lg transition-colors">2</button>
                            <button
                                class="px-4 py-2 text-sm text-slate-600 hover:bg-slate-100 rounded-lg transition-colors">3</button>
                            <span class="px-2 text-slate-400">…</span>
                            <button
                                class="px-4 py-2 text-sm text-slate-600 hover:bg-slate-100 rounded-lg transition-colors">8</button>
                            <button
                                class="px-3 py-2 text-sm text-slate-600 hover:text-slate-800 transition-colors">Siguiente
                                →</button>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
