@extends('main')

@section('content')
    <main>
        <!-- Encabezado de página -->
        <section class="bg-white border-b border-slate-100 py-12">
            <div class="max-w-7xl mx-auto px-6">
                <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-4">
                    <div>
                        <h1 class="text-3xl lg:text-4xl font-extrabold text-slate-900">💬 Comunidad</h1>
                        <p class="mt-2 text-slate-500">Participa en debates, comparte conocimiento y resuelve dudas con miles
                            de profesionales.</p>
                    </div>
                    <button
                        class="self-start inline-flex items-center gap-2 px-5 py-2.5 bg-primary-600 text-white font-semibold rounded-xl hover:bg-primary-700 shadow-md shadow-primary-200 transition-all">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        Crear nuevo tema
                    </button>
                </div>
            </div>
        </section>

        <!-- Contenido: filtros + listado -->
        <section class="py-10">
            <div class="max-w-7xl mx-auto px-6 grid lg:grid-cols-4 gap-8">

                <!-- Sidebar de categorías y filtros -->
                <aside class="lg:col-span-1 space-y-6">
                    <div class="bg-white rounded-2xl border border-slate-200 p-5 shadow-sm">
                        <h3 class="font-bold text-slate-800 mb-4">🔍 Buscar temas</h3>
                        <div class="relative mb-5">
                            <input type="text" placeholder="Buscar discusión..."
                                class="w-full pl-9 pr-4 py-2.5 text-sm border border-slate-200 rounded-xl focus:ring-2 focus:ring-primary-100 focus:border-primary-300 outline-none">
                            <svg class="absolute left-3 top-2.5 w-4 h-4 text-slate-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>

                        <h4 class="text-sm font-semibold text-slate-500 uppercase tracking-wide mb-3">Categorías</h4>
                        <div class="space-y-1">
                            <a href="#"
                                class="flex items-center justify-between px-3 py-2 rounded-lg text-sm font-medium bg-primary-50 text-primary-700">
                                Todos los temas
                                <span class="text-xs bg-primary-200 text-primary-800 px-2 py-0.5 rounded-full">128</span>
                            </a>
                            <a href="#"
                                class="flex items-center justify-between px-3 py-2 rounded-lg text-sm text-slate-600 hover:bg-slate-50 transition-colors">
                                Desarrollo Web
                                <span class="text-xs bg-slate-100 text-slate-500 px-2 py-0.5 rounded-full">42</span>
                            </a>
                            <a href="#"
                                class="flex items-center justify-between px-3 py-2 rounded-lg text-sm text-slate-600 hover:bg-slate-50 transition-colors">
                                Diseño UI/UX
                                <span class="text-xs bg-slate-100 text-slate-500 px-2 py-0.5 rounded-full">28</span>
                            </a>
                            <a href="#"
                                class="flex items-center justify-between px-3 py-2 rounded-lg text-sm text-slate-600 hover:bg-slate-50 transition-colors">
                                Freelance
                                <span class="text-xs bg-slate-100 text-slate-500 px-2 py-0.5 rounded-full">35</span>
                            </a>
                            <a href="#"
                                class="flex items-center justify-between px-3 py-2 rounded-lg text-sm text-slate-600 hover:bg-slate-50 transition-colors">
                                Tecnología
                                <span class="text-xs bg-slate-100 text-slate-500 px-2 py-0.5 rounded-full">19</span>
                            </a>
                            <a href="#"
                                class="flex items-center justify-between px-3 py-2 rounded-lg text-sm text-slate-600 hover:bg-slate-50 transition-colors">
                                Off-topic
                                <span class="text-xs bg-slate-100 text-slate-500 px-2 py-0.5 rounded-full">14</span>
                            </a>
                        </div>
                    </div>

                    <!-- Miembros destacados -->
                    <div class="bg-white rounded-2xl border border-slate-200 p-5 shadow-sm">
                        <h4 class="text-sm font-semibold text-slate-500 uppercase tracking-wide mb-3">Miembros activos</h4>
                        <div class="space-y-3">
                            <div class="flex items-center gap-3">
                                <img src="https://i.pravatar.cc/40?img=11"
                                    class="w-9 h-9 rounded-full ring-2 ring-primary-100" alt="Roberto">
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-slate-800 truncate">Roberto Calel</p>
                                    <p class="text-xs text-slate-400">128 aportes</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-3">
                                <img src="https://i.pravatar.cc/40?img=16"
                                    class="w-9 h-9 rounded-full ring-2 ring-primary-100" alt="María">
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-slate-800 truncate">María García</p>
                                    <p class="text-xs text-slate-400">94 aportes</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-3">
                                <img src="https://i.pravatar.cc/40?img=22"
                                    class="w-9 h-9 rounded-full ring-2 ring-primary-100" alt="Carlos">
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-slate-800 truncate">Carlos López</p>
                                    <p class="text-xs text-slate-400">87 aportes</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-3">
                                <img src="https://i.pravatar.cc/40?img=33"
                                    class="w-9 h-9 rounded-full ring-2 ring-primary-100" alt="Juan">
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-slate-800 truncate">Juan Pérez</p>
                                    <p class="text-xs text-slate-400">76 aportes</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </aside>

                <!-- Listado de discusiones -->
                <div class="lg:col-span-3">
                    <!-- Ordenar + resultados -->
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-6">
                        <p class="text-sm text-slate-500"><span class="font-semibold text-slate-700">128 temas</span> en la
                            comunidad</p>
                        <select
                            class="px-4 py-2 text-sm border border-slate-200 rounded-xl bg-white outline-none focus:ring-2 focus:ring-primary-100">
                            <option>Ordenar por: Más recientes</option>
                            <option>Más respondidos</option>
                            <option>Sin respuesta</option>
                            <option>Mejor valorados</option>
                        </select>
                    </div>

                    <!-- Grid de tarjetas de discusión -->
                    <div class="grid sm:grid-cols-2 gap-5">
                        <!-- Tema 1 -->
                        <div class="bg-white rounded-2xl border border-slate-200 p-5 card-hover shadow-sm">
                            <div class="flex items-start gap-4">
                                <img src="https://i.pravatar.cc/48?img=33"
                                    class="w-11 h-11 rounded-full ring-2 ring-primary-100 shrink-0" alt="Juan">
                                <div class="flex-1 min-w-0">
                                    <h3 class="font-semibold text-slate-800">¿Laravel 12 con Livewire 3 o Inertia.js + Vue?
                                    </h3>
                                    <p class="text-sm text-slate-500 mt-1 line-clamp-2">Estoy iniciando un proyecto nuevo y
                                        quisiera saber cuál stack recomiendan para un dashboard administrativo con tiempo
                                        real. ¿Alguien ha probado ambos?</p>
                                    <div class="flex flex-wrap items-center gap-3 mt-3 text-xs text-slate-400">
                                        <span class="flex items-center gap-1">👤 Juan Pérez</span>
                                        <span class="flex items-center gap-1">💬 34 respuestas</span>
                                        <span class="flex items-center gap-1">🕐 hace 3 horas</span>
                                    </div>
                                    <div class="flex gap-2 mt-3">
                                        <span
                                            class="text-xs bg-primary-50 text-primary-700 px-2 py-0.5 rounded-full">Laravel</span>
                                        <span
                                            class="text-xs bg-primary-50 text-primary-700 px-2 py-0.5 rounded-full">Livewire</span>
                                        <span
                                            class="text-xs bg-slate-100 text-slate-600 px-2 py-0.5 rounded-full">Inertia.js</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Tema 2 -->
                        <div class="bg-white rounded-2xl border border-slate-200 p-5 card-hover shadow-sm">
                            <div class="flex items-start gap-4">
                                <img src="https://i.pravatar.cc/48?img=41"
                                    class="w-11 h-11 rounded-full ring-2 ring-primary-100 shrink-0" alt="Ana">
                                <div class="flex-1 min-w-0">
                                    <h3 class="font-semibold text-slate-800">Consejos para conseguir el primer cliente
                                        freelance</h3>
                                    <p class="text-sm text-slate-500 mt-1 line-clamp-2">Comparto mi experiencia después de
                                        6 meses como freelance. ¿Qué estrategias les han funcionado a ustedes para encontrar
                                        proyectos?</p>
                                    <div class="flex flex-wrap items-center gap-3 mt-3 text-xs text-slate-400">
                                        <span class="flex items-center gap-1">👤 Ana Martínez</span>
                                        <span class="flex items-center gap-1">💬 52 respuestas</span>
                                        <span class="flex items-center gap-1">🕐 hace 1 día</span>
                                    </div>
                                    <div class="flex gap-2 mt-3">
                                        <span
                                            class="text-xs bg-warm-50 text-warm-700 px-2 py-0.5 rounded-full">Freelance</span>
                                        <span
                                            class="text-xs bg-warm-50 text-warm-700 px-2 py-0.5 rounded-full">Consejos</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Tema 3 -->
                        <div class="bg-white rounded-2xl border border-slate-200 p-5 card-hover shadow-sm">
                            <div class="flex items-start gap-4">
                                <img src="https://i.pravatar.cc/48?img=55"
                                    class="w-11 h-11 rounded-full ring-2 ring-primary-100 shrink-0" alt="Diego">
                                <div class="flex-1 min-w-0">
                                    <h3 class="font-semibold text-slate-800">Mejores prácticas para APIs RESTful en 2026
                                    </h3>
                                    <p class="text-sm text-slate-500 mt-1 line-clamp-2">Discutamos sobre versionado,
                                        documentación con OpenAPI, rate limiting y seguridad en APIs modernas.</p>
                                    <div class="flex flex-wrap items-center gap-3 mt-3 text-xs text-slate-400">
                                        <span class="flex items-center gap-1">👤 Diego Ramírez</span>
                                        <span class="flex items-center gap-1">💬 18 respuestas</span>
                                        <span class="flex items-center gap-1">🕐 hace 6 horas</span>
                                    </div>
                                    <div class="flex gap-2 mt-3">
                                        <span
                                            class="text-xs bg-emerald-50 text-emerald-700 px-2 py-0.5 rounded-full">API</span>
                                        <span
                                            class="text-xs bg-emerald-50 text-emerald-700 px-2 py-0.5 rounded-full">REST</span>
                                        <span
                                            class="text-xs bg-slate-100 text-slate-600 px-2 py-0.5 rounded-full">Seguridad</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Tema 4 -->
                        <div class="bg-white rounded-2xl border border-slate-200 p-5 card-hover shadow-sm">
                            <div class="flex items-start gap-4">
                                <img src="https://i.pravatar.cc/48?img=60"
                                    class="w-11 h-11 rounded-full ring-2 ring-primary-100 shrink-0" alt="Laura">
                                <div class="flex-1 min-w-0">
                                    <h3 class="font-semibold text-slate-800">¿Cuánto cobrar por un sitio web en 2026?</h3>
                                    <p class="text-sm text-slate-500 mt-1 line-clamp-2">Precios de referencia para landing
                                        pages, ecommerce y aplicaciones web personalizadas en el mercado actual.</p>
                                    <div class="flex flex-wrap items-center gap-3 mt-3 text-xs text-slate-400">
                                        <span class="flex items-center gap-1">👤 Laura Castillo</span>
                                        <span class="flex items-center gap-1">💬 41 respuestas</span>
                                        <span class="flex items-center gap-1">🕐 hace 12 horas</span>
                                    </div>
                                    <div class="flex gap-2 mt-3">
                                        <span
                                            class="text-xs bg-accent-50 text-accent-700 px-2 py-0.5 rounded-full">Precios</span>
                                        <span
                                            class="text-xs bg-accent-50 text-accent-700 px-2 py-0.5 rounded-full">Web</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Tema 5 -->
                        <div class="bg-white rounded-2xl border border-slate-200 p-5 card-hover shadow-sm">
                            <div class="flex items-start gap-4">
                                <img src="https://i.pravatar.cc/48?img=12"
                                    class="w-11 h-11 rounded-full ring-2 ring-primary-100 shrink-0" alt="Pedro">
                                <div class="flex-1 min-w-0">
                                    <h3 class="font-semibold text-slate-800">Tailwind CSS vs Bootstrap en proyectos grandes
                                    </h3>
                                    <p class="text-sm text-slate-500 mt-1 line-clamp-2">¿Cuál prefieren para escalar un
                                        design system? Ventajas y desventajas de cada enfoque.</p>
                                    <div class="flex flex-wrap items-center gap-3 mt-3 text-xs text-slate-400">
                                        <span class="flex items-center gap-1">👤 Pedro Alvarado</span>
                                        <span class="flex items-center gap-1">💬 27 respuestas</span>
                                        <span class="flex items-center gap-1">🕐 hace 2 días</span>
                                    </div>
                                    <div class="flex gap-2 mt-3">
                                        <span
                                            class="text-xs bg-primary-50 text-primary-700 px-2 py-0.5 rounded-full">CSS</span>
                                        <span
                                            class="text-xs bg-primary-50 text-primary-700 px-2 py-0.5 rounded-full">Tailwind</span>
                                        <span
                                            class="text-xs bg-slate-100 text-slate-600 px-2 py-0.5 rounded-full">Bootstrap</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Tema 6 -->
                        <div class="bg-white rounded-2xl border border-slate-200 p-5 card-hover shadow-sm">
                            <div class="flex items-start gap-4">
                                <img src="https://i.pravatar.cc/48?img=8"
                                    class="w-11 h-11 rounded-full ring-2 ring-primary-100 shrink-0" alt="Carmen">
                                <div class="flex-1 min-w-0">
                                    <h3 class="font-semibold text-slate-800">Experiencias trabajando remoto desde Guatemala
                                    </h3>
                                    <p class="text-sm text-slate-500 mt-1 line-clamp-2">Compartan sus experiencias,
                                        salarios, herramientas y consejos para trabajar remotamente para empresas
                                        extranjeras.</p>
                                    <div class="flex flex-wrap items-center gap-3 mt-3 text-xs text-slate-400">
                                        <span class="flex items-center gap-1">👤 Carmen López</span>
                                        <span class="flex items-center gap-1">💬 63 respuestas</span>
                                        <span class="flex items-center gap-1">🕐 hace 8 horas</span>
                                    </div>
                                    <div class="flex gap-2 mt-3">
                                        <span
                                            class="text-xs bg-warm-50 text-warm-700 px-2 py-0.5 rounded-full">Remoto</span>
                                        <span
                                            class="text-xs bg-warm-50 text-warm-700 px-2 py-0.5 rounded-full">Guatemala</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Tema 7 -->
                        <div class="bg-white rounded-2xl border border-slate-200 p-5 card-hover shadow-sm">
                            <div class="flex items-start gap-4">
                                <img src="https://i.pravatar.cc/48?img=44"
                                    class="w-11 h-11 rounded-full ring-2 ring-primary-100 shrink-0" alt="Andrea">
                                <div class="flex-1 min-w-0">
                                    <h3 class="font-semibold text-slate-800">Recursos gratuitos para aprender diseño UI/UX
                                    </h3>
                                    <p class="text-sm text-slate-500 mt-1 line-clamp-2">Lista curada de cursos, canales de
                                        YouTube, blogs y herramientas gratuitas para iniciar en diseño.</p>
                                    <div class="flex flex-wrap items-center gap-3 mt-3 text-xs text-slate-400">
                                        <span class="flex items-center gap-1">👤 Andrea Méndez</span>
                                        <span class="flex items-center gap-1">💬 39 respuestas</span>
                                        <span class="flex items-center gap-1">🕐 hace 4 horas</span>
                                    </div>
                                    <div class="flex gap-2 mt-3">
                                        <span
                                            class="text-xs bg-accent-50 text-accent-700 px-2 py-0.5 rounded-full">Diseño</span>
                                        <span
                                            class="text-xs bg-accent-50 text-accent-700 px-2 py-0.5 rounded-full">Recursos</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Tema 8 -->
                        <div class="bg-white rounded-2xl border border-slate-200 p-5 card-hover shadow-sm">
                            <div class="flex items-start gap-4">
                                <img src="https://i.pravatar.cc/48?img=68"
                                    class="w-11 h-11 rounded-full ring-2 ring-primary-100 shrink-0" alt="Sofía">
                                <div class="flex-1 min-w-0">
                                    <h3 class="font-semibold text-slate-800">¿Vale la pena certificarse en AWS en 2026?
                                    </h3>
                                    <p class="text-sm text-slate-500 mt-1 line-clamp-2">Debate sobre el retorno de
                                        inversión de las certificaciones cloud. ¿Solutions Architect o Developer?</p>
                                    <div class="flex flex-wrap items-center gap-3 mt-3 text-xs text-slate-400">
                                        <span class="flex items-center gap-1">👤 Sofía Ramírez</span>
                                        <span class="flex items-center gap-1">💬 22 respuestas</span>
                                        <span class="flex items-center gap-1">🕐 hace 1 día</span>
                                    </div>
                                    <div class="flex gap-2 mt-3">
                                        <span
                                            class="text-xs bg-emerald-50 text-emerald-700 px-2 py-0.5 rounded-full">Cloud</span>
                                        <span
                                            class="text-xs bg-emerald-50 text-emerald-700 px-2 py-0.5 rounded-full">AWS</span>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                            <span class="px-2 text-slate-400">…</span>
                            <button
                                class="px-4 py-2 text-sm text-slate-600 hover:bg-slate-100 rounded-lg transition-colors">16</button>
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
