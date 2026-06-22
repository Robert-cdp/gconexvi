@extends('main')

@section('content')
    <main>
        <!-- Encabezado de página -->
        <section class="bg-white border-b border-slate-100 py-12">
            <div class="max-w-7xl mx-auto px-6">
                <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-4">
                    <div>
                        <h1 class="text-3xl lg:text-4xl font-extrabold text-slate-900">🔄 Marketplace P2P</h1>
                        <p class="mt-2 text-slate-500">Compra, vende o intercambia productos digitales directamente con otros
                            miembros.</p>
                    </div>
                    <button
                        class="self-start inline-flex items-center gap-2 px-5 py-2.5 bg-primary-600 text-white font-semibold rounded-xl hover:bg-primary-700 shadow-md shadow-primary-200 transition-all">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        Publicar producto
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
                        <h3 class="font-bold text-slate-800 mb-4">🔍 Filtrar productos</h3>
                        <div class="relative mb-5">
                            <input type="text" placeholder="Buscar producto..."
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
                                    Cursos
                                </label>
                                <label class="flex items-center gap-2 text-sm text-slate-700 cursor-pointer">
                                    <input type="checkbox"
                                        class="rounded border-slate-300 text-primary-600 focus:ring-primary-500"> Cuentas
                                    Streaming
                                </label>
                                <label class="flex items-center gap-2 text-sm text-slate-700 cursor-pointer">
                                    <input type="checkbox"
                                        class="rounded border-slate-300 text-primary-600 focus:ring-primary-500"> Plantillas
                                    / Themes
                                </label>
                                <label class="flex items-center gap-2 text-sm text-slate-700 cursor-pointer">
                                    <input type="checkbox"
                                        class="rounded border-slate-300 text-primary-600 focus:ring-primary-500"> Software /
                                    Sistemas
                                </label>
                                <label class="flex items-center gap-2 text-sm text-slate-700 cursor-pointer">
                                    <input type="checkbox"
                                        class="rounded border-slate-300 text-primary-600 focus:ring-primary-500"> Métodos /
                                    Estrategias
                                </label>
                                <label class="flex items-center gap-2 text-sm text-slate-700 cursor-pointer">
                                    <input type="checkbox"
                                        class="rounded border-slate-300 text-primary-600 focus:ring-primary-500"> Diseño /
                                    Recursos
                                </label>
                            </div>
                        </div>

                        <!-- Tipo de transacción -->
                        <div class="mb-5">
                            <h4 class="text-sm font-semibold text-slate-500 uppercase tracking-wide mb-3">Tipo</h4>
                            <div class="space-y-2">
                                <label class="flex items-center gap-2 text-sm text-slate-700 cursor-pointer">
                                    <input type="checkbox"
                                        class="rounded border-slate-300 text-primary-600 focus:ring-primary-500" checked>
                                    Venta
                                </label>
                                <label class="flex items-center gap-2 text-sm text-slate-700 cursor-pointer">
                                    <input type="checkbox"
                                        class="rounded border-slate-300 text-primary-600 focus:ring-primary-500">
                                    Intercambio
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

                        <!-- Calificación vendedor -->
                        <div class="mb-5">
                            <h4 class="text-sm font-semibold text-slate-500 uppercase tracking-wide mb-3">Reputación del
                                vendedor</h4>
                            <select
                                class="w-full px-3 py-2.5 text-sm border border-slate-200 rounded-xl outline-none focus:ring-2 focus:ring-primary-100 bg-white">
                                <option>Todos</option>
                                <option>⭐ 4.5+</option>
                                <option>⭐ 4.0+</option>
                                <option>⭐ 3.0+</option>
                            </select>
                        </div>

                        <button
                            class="w-full mt-2 py-2.5 bg-primary-600 text-white font-semibold rounded-xl hover:bg-primary-700 transition-all shadow-sm">
                            Aplicar filtros
                        </button>
                    </div>

                    <!-- Vendedores destacados -->
                    <div class="bg-white rounded-2xl border border-slate-200 p-5 shadow-sm">
                        <h4 class="text-sm font-semibold text-slate-500 uppercase tracking-wide mb-3">Vendedores top</h4>
                        <div class="space-y-3">
                            <div class="flex items-center gap-3">
                                <img src="https://i.pravatar.cc/40?img=11"
                                    class="w-9 h-9 rounded-full ring-2 ring-primary-100" alt="Luis">
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-slate-800 truncate">Luis Pérez</p>
                                    <p class="text-xs text-slate-400">45 ventas</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-3">
                                <img src="https://i.pravatar.cc/40?img=16"
                                    class="w-9 h-9 rounded-full ring-2 ring-primary-100" alt="Ana">
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-slate-800 truncate">Ana López</p>
                                    <p class="text-xs text-slate-400">32 ventas</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-3">
                                <img src="https://i.pravatar.cc/40?img=22"
                                    class="w-9 h-9 rounded-full ring-2 ring-primary-100" alt="Carlos">
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-slate-800 truncate">Carlos Ruiz</p>
                                    <p class="text-xs text-slate-400">28 ventas</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </aside>

                <!-- Listado de productos digitales -->
                <div class="lg:col-span-3">
                    <!-- Ordenar + resultados -->
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-6">
                        <p class="text-sm text-slate-500"><span class="font-semibold text-slate-700">24 productos</span>
                            listados</p>
                        <select
                            class="px-4 py-2 text-sm border border-slate-200 rounded-xl bg-white outline-none focus:ring-2 focus:ring-primary-100">
                            <option>Ordenar por: Más recientes</option>
                            <option>Precio: menor a mayor</option>
                            <option>Precio: mayor a menor</option>
                            <option>Mejor calificados</option>
                        </select>
                    </div>

                    <!-- Grid de tarjetas -->
                    <div class="grid sm:grid-cols-2 xl:grid-cols-3 gap-5">
                        <!-- Producto 1 -->
                        <article
                            class="bg-white rounded-2xl overflow-hidden border border-slate-200 card-hover shadow-sm flex flex-col">
                            <div class="relative">
                                <img src="https://picsum.photos/400/250?21" class="h-44 w-full object-cover"
                                    alt="Curso React">
                                <span
                                    class="absolute top-3 left-3 bg-primary-600 text-white text-xs px-2.5 py-0.5 rounded-full shadow">Curso</span>
                                <span
                                    class="absolute top-3 right-3 bg-emerald-500 text-white text-xs px-2 py-0.5 rounded-full">Venta</span>
                            </div>
                            <div class="p-5 flex flex-col flex-1">
                                <div class="flex items-center gap-3 mb-3">
                                    <img src="https://i.pravatar.cc/40?img=11"
                                        class="w-8 h-8 rounded-full ring-2 ring-primary-100" alt="Luis">
                                    <div>
                                        <p class="text-sm font-semibold text-slate-800">Luis Pérez</p>
                                        <p class="text-xs text-slate-500">Instructor</p>
                                    </div>
                                </div>
                                <h3 class="font-bold text-slate-800">Curso Completo de React Avanzado 2026</h3>
                                <p class="text-sm text-slate-500 mt-1 line-clamp-2 flex-1">Hooks, Context API, Testing y
                                    despliegue. Incluye 12 proyectos reales.</p>
                                <div class="mt-4 flex items-center justify-between">
                                    <span class="flex items-center gap-1 text-yellow-500 font-semibold text-sm">⭐ 4.9 <span
                                            class="text-slate-400 font-normal">(87)</span></span>
                                    <span class="font-bold text-primary-700">Q150</span>
                                </div>
                                <button
                                    class="mt-3 w-full py-2 text-sm font-semibold text-white bg-primary-600 rounded-lg hover:bg-primary-700 transition-all">
                                    Comprar ahora
                                </button>
                            </div>
                        </article>

                        <!-- Producto 2 -->
                        <article
                            class="bg-white rounded-2xl overflow-hidden border border-slate-200 card-hover shadow-sm flex flex-col">
                            <div class="relative">
                                <img src="https://picsum.photos/400/250?22" class="h-44 w-full object-cover"
                                    alt="Netflix">
                                <span
                                    class="absolute top-3 left-3 bg-accent-500 text-white text-xs px-2.5 py-0.5 rounded-full shadow">Cuenta</span>
                                <span
                                    class="absolute top-3 right-3 bg-emerald-500 text-white text-xs px-2 py-0.5 rounded-full">Venta</span>
                            </div>
                            <div class="p-5 flex flex-col flex-1">
                                <div class="flex items-center gap-3 mb-3">
                                    <img src="https://i.pravatar.cc/40?img=16"
                                        class="w-8 h-8 rounded-full ring-2 ring-primary-100" alt="Ana">
                                    <div>
                                        <p class="text-sm font-semibold text-slate-800">Ana López</p>
                                        <p class="text-xs text-slate-500">Vendedora verificada</p>
                                    </div>
                                </div>
                                <h3 class="font-bold text-slate-800">Cuenta Netflix Premium 1 año</h3>
                                <p class="text-sm text-slate-500 mt-1 line-clamp-2 flex-1">Perfil personal, 4 pantallas
                                    simultáneas, garantía de 6 meses.</p>
                                <div class="mt-4 flex items-center justify-between">
                                    <span class="flex items-center gap-1 text-yellow-500 font-semibold text-sm">⭐ 4.7 <span
                                            class="text-slate-400 font-normal">(53)</span></span>
                                    <span class="font-bold text-primary-700">Q200</span>
                                </div>
                                <button
                                    class="mt-3 w-full py-2 text-sm font-semibold text-white bg-primary-600 rounded-lg hover:bg-primary-700 transition-all">
                                    Comprar ahora
                                </button>
                            </div>
                        </article>

                        <!-- Producto 3 -->
                        <article
                            class="bg-white rounded-2xl overflow-hidden border border-slate-200 card-hover shadow-sm flex flex-col">
                            <div class="relative">
                                <img src="https://picsum.photos/400/250?23" class="h-44 w-full object-cover"
                                    alt="Dashboard">
                                <span
                                    class="absolute top-3 left-3 bg-warm-500 text-white text-xs px-2.5 py-0.5 rounded-full shadow">Plantilla</span>
                                <span
                                    class="absolute top-3 right-3 bg-emerald-500 text-white text-xs px-2 py-0.5 rounded-full">Venta</span>
                            </div>
                            <div class="p-5 flex flex-col flex-1">
                                <div class="flex items-center gap-3 mb-3">
                                    <img src="https://i.pravatar.cc/40?img=22"
                                        class="w-8 h-8 rounded-full ring-2 ring-primary-100" alt="Carlos">
                                    <div>
                                        <p class="text-sm font-semibold text-slate-800">Carlos Ruiz</p>
                                        <p class="text-xs text-slate-500">Desarrollador</p>
                                    </div>
                                </div>
                                <h3 class="font-bold text-slate-800">Admin Dashboard Laravel + Vue3</h3>
                                <p class="text-sm text-slate-500 mt-1 line-clamp-2 flex-1">Panel completo con roles,
                                    permisos, gráficos y tema oscuro.</p>
                                <div class="mt-4 flex items-center justify-between">
                                    <span class="flex items-center gap-1 text-yellow-500 font-semibold text-sm">⭐ 4.8 <span
                                            class="text-slate-400 font-normal">(34)</span></span>
                                    <span class="font-bold text-primary-700">Q80</span>
                                </div>
                                <button
                                    class="mt-3 w-full py-2 text-sm font-semibold text-white bg-primary-600 rounded-lg hover:bg-primary-700 transition-all">
                                    Comprar ahora
                                </button>
                            </div>
                        </article>

                        <!-- Producto 4 -->
                        <article
                            class="bg-white rounded-2xl overflow-hidden border border-slate-200 card-hover shadow-sm flex flex-col">
                            <div class="relative">
                                <img src="https://picsum.photos/400/250?24" class="h-44 w-full object-cover"
                                    alt="Marketing">
                                <span
                                    class="absolute top-3 left-3 bg-primary-600 text-white text-xs px-2.5 py-0.5 rounded-full shadow">Método</span>
                                <span
                                    class="absolute top-3 right-3 bg-accent-500 text-white text-xs px-2 py-0.5 rounded-full">Intercambio</span>
                            </div>
                            <div class="p-5 flex flex-col flex-1">
                                <div class="flex items-center gap-3 mb-3">
                                    <img src="https://i.pravatar.cc/40?img=44"
                                        class="w-8 h-8 rounded-full ring-2 ring-primary-100" alt="Sofía">
                                    <div>
                                        <p class="text-sm font-semibold text-slate-800">Sofía Gómez</p>
                                        <p class="text-xs text-slate-500">Marketer</p>
                                    </div>
                                </div>
                                <h3 class="font-bold text-slate-800">Método de marketing en Instagram 2026</h3>
                                <p class="text-sm text-slate-500 mt-1 line-clamp-2 flex-1">Estrategia probada para crecer
                                    de 0 a 10k seguidores en 3 meses.</p>
                                <div class="mt-4 flex items-center justify-between">
                                    <span class="flex items-center gap-1 text-yellow-500 font-semibold text-sm">⭐ 4.9 <span
                                            class="text-slate-400 font-normal">(19)</span></span>
                                    <span class="font-bold text-primary-700">Q120</span>
                                </div>
                                <button
                                    class="mt-3 w-full py-2 text-sm font-semibold text-primary-700 border border-primary-200 rounded-lg hover:bg-primary-50 transition-colors">
                                    Ofrecer intercambio
                                </button>
                            </div>
                        </article>

                        <!-- Producto 5 -->
                        <article
                            class="bg-white rounded-2xl overflow-hidden border border-slate-200 card-hover shadow-sm flex flex-col">
                            <div class="relative">
                                <img src="https://picsum.photos/400/250?25" class="h-44 w-full object-cover"
                                    alt="Sistema">
                                <span
                                    class="absolute top-3 left-3 bg-emerald-500 text-white text-xs px-2.5 py-0.5 rounded-full shadow">Sistema</span>
                                <span
                                    class="absolute top-3 right-3 bg-emerald-500 text-white text-xs px-2 py-0.5 rounded-full">Venta</span>
                            </div>
                            <div class="p-5 flex flex-col flex-1">
                                <div class="flex items-center gap-3 mb-3">
                                    <img src="https://i.pravatar.cc/40?img=55"
                                        class="w-8 h-8 rounded-full ring-2 ring-primary-100" alt="Diego">
                                    <div>
                                        <p class="text-sm font-semibold text-slate-800">Diego Martínez</p>
                                        <p class="text-xs text-slate-500">Full Stack</p>
                                    </div>
                                </div>
                                <h3 class="font-bold text-slate-800">Sistema de Facturación Web PHP + MySQL</h3>
                                <p class="text-sm text-slate-500 mt-1 line-clamp-2 flex-1">CFDI, inventario, clientes,
                                    reportes PDF. Código fuente completo.</p>
                                <div class="mt-4 flex items-center justify-between">
                                    <span class="flex items-center gap-1 text-yellow-500 font-semibold text-sm">⭐ 4.8 <span
                                            class="text-slate-400 font-normal">(41)</span></span>
                                    <span class="font-bold text-primary-700">Q350</span>
                                </div>
                                <button
                                    class="mt-3 w-full py-2 text-sm font-semibold text-white bg-primary-600 rounded-lg hover:bg-primary-700 transition-all">
                                    Comprar ahora
                                </button>
                            </div>
                        </article>

                        <!-- Producto 6 -->
                        <article
                            class="bg-white rounded-2xl overflow-hidden border border-slate-200 card-hover shadow-sm flex flex-col">
                            <div class="relative">
                                <img src="https://picsum.photos/400/250?26" class="h-44 w-full object-cover"
                                    alt="Iconos">
                                <span
                                    class="absolute top-3 left-3 bg-accent-500 text-white text-xs px-2.5 py-0.5 rounded-full shadow">Diseño</span>
                                <span
                                    class="absolute top-3 right-3 bg-emerald-500 text-white text-xs px-2 py-0.5 rounded-full">Venta</span>
                            </div>
                            <div class="p-5 flex flex-col flex-1">
                                <div class="flex items-center gap-3 mb-3">
                                    <img src="https://i.pravatar.cc/40?img=68"
                                        class="w-8 h-8 rounded-full ring-2 ring-primary-100" alt="Andrea">
                                    <div>
                                        <p class="text-sm font-semibold text-slate-800">Andrea Hernández</p>
                                        <p class="text-xs text-slate-500">Diseñadora UI</p>
                                    </div>
                                </div>
                                <h3 class="font-bold text-slate-800">Pack de 100 iconos personalizados Figma</h3>
                                <p class="text-sm text-slate-500 mt-1 line-clamp-2 flex-1">Estilo outline y solid,
                                    organizados por categorías. SVG y PNG incluidos.</p>
                                <div class="mt-4 flex items-center justify-between">
                                    <span class="flex items-center gap-1 text-yellow-500 font-semibold text-sm">⭐ 4.9 <span
                                            class="text-slate-400 font-normal">(62)</span></span>
                                    <span class="font-bold text-primary-700">Q45</span>
                                </div>
                                <button
                                    class="mt-3 w-full py-2 text-sm font-semibold text-white bg-primary-600 rounded-lg hover:bg-primary-700 transition-all">
                                    Comprar ahora
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
                            <button
                                class="px-4 py-2 text-sm text-slate-600 hover:bg-slate-100 rounded-lg transition-colors">4</button>
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
