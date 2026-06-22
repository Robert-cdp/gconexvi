@extends('main')

@section('title', 'Inicio')

@section('content')
    <main>
        <!-- ========== HERO ========== -->
        <section class="relative py-20 lg:py-28 bg-gradient-to-br from-slate-50 via-white to-primary-50/30">
            <div class="max-w-7xl mx-auto px-6">
                <div class="grid lg:grid-cols-2 gap-16 items-center">

                    <!-- Texto -->
                    <div>
                        <span
                            class="inline-flex items-center gap-2 bg-primary-100 text-primary-700 px-4 py-2 rounded-full text-sm font-semibold shadow-sm">
                            <span class="w-2 h-2 bg-primary-500 rounded-full animate-pulse"></span>
                            Plataforma Comunitaria
                        </span>
                        <h1
                            class="mt-6 text-4xl lg:text-5xl xl:text-6xl font-extrabold text-slate-900 leading-tight tracking-tight">
                            Encuentra servicios, trabajos y oportunidades <span class="text-primary-600">en un solo
                                lugar.</span>
                        </h1>
                        <p class="mt-6 text-lg text-slate-600 leading-relaxed">
                            Conecta con profesionales verificados, publica ofertas laborales, participa en debates de la
                            comunidad y realiza intercambios P2P de forma segura.
                        </p>
                        <div class="mt-8 flex flex-wrap gap-4">
                            <button
                                class="px-6 py-3.5 bg-primary-600 text-white font-semibold rounded-xl hover:bg-primary-700 shadow-lg shadow-primary-200 transition-all">
                                🚀 Explorar ahora
                            </button>
                            <button
                                class="px-6 py-3.5 border-2 border-slate-300 text-slate-700 font-semibold rounded-xl hover:border-primary-300 hover:text-primary-600 hover:bg-white transition-all">
                                ▶️ Cómo funciona
                            </button>
                        </div>
                        <!-- Mini testimonios -->
                        <div class="mt-8 flex items-center gap-4">
                            <div class="flex -space-x-3">
                                <img src="https://i.pravatar.cc/40?img=1"
                                    class="w-10 h-10 rounded-full border-2 border-white" alt="Usuario">
                                <img src="https://i.pravatar.cc/40?img=5"
                                    class="w-10 h-10 rounded-full border-2 border-white" alt="Usuario">
                                <img src="https://i.pravatar.cc/40?img=8"
                                    class="w-10 h-10 rounded-full border-2 border-white" alt="Usuario">
                                <img src="https://i.pravatar.cc/40?img=12"
                                    class="w-10 h-10 rounded-full border-2 border-white" alt="Usuario">
                            </div>
                            <p class="text-sm text-slate-500"><strong class="text-slate-700">+500</strong> nuevos miembros
                                esta semana</p>
                        </div>
                    </div>

                    <!-- Tarjetas visuales -->
                    <div class="relative">
                        <div class="bg-white rounded-3xl shadow-xl border border-slate-100 p-6 lg:p-8">
                            <div class="grid grid-cols-2 gap-4">
                                <div class="bg-primary-50 rounded-2xl p-5 text-center card-hover cursor-pointer">
                                    <span class="text-3xl">💼</span>
                                    <h3 class="font-bold text-slate-800 mt-2">Servicios</h3>
                                    <p class="text-xs text-slate-500 mt-1">+120 profesionales</p>
                                    <span
                                        class="inline-block mt-2 text-xs bg-primary-100 text-primary-700 px-2 py-0.5 rounded-full">Nuevo</span>
                                </div>
                                <div class="bg-emerald-50 rounded-2xl p-5 text-center card-hover cursor-pointer">
                                    <span class="text-3xl">💻</span>
                                    <h3 class="font-bold text-slate-800 mt-2">Trabajos</h3>
                                    <p class="text-xs text-slate-500 mt-1">+85 vacantes activas</p>
                                    <span
                                        class="inline-block mt-2 text-xs bg-emerald-100 text-emerald-700 px-2 py-0.5 rounded-full">Urgente</span>
                                </div>
                                <div class="bg-warm-50 rounded-2xl p-5 text-center card-hover cursor-pointer">
                                    <span class="text-3xl">💬</span>
                                    <h3 class="font-bold text-slate-800 mt-2">Comunidad</h3>
                                    <p class="text-xs text-slate-500 mt-1">+3,200 miembros</p>
                                    <span
                                        class="inline-block mt-2 text-xs bg-warm-100 text-warm-700 px-2 py-0.5 rounded-full">Activo</span>
                                </div>
                                <div class="bg-accent-50 rounded-2xl p-5 text-center card-hover cursor-pointer">
                                    <span class="text-3xl">🔄</span>
                                    <h3 class="font-bold text-slate-800 mt-2">P2P</h3>
                                    <p class="text-xs text-slate-500 mt-1">Intercambio seguro</p>
                                    <span
                                        class="inline-block mt-2 text-xs bg-accent-100 text-accent-700 px-2 py-0.5 rounded-full">Verificado</span>
                                </div>
                            </div>
                            <!-- Indicador de actividad -->
                            <div
                                class="mt-6 pt-4 border-t border-slate-100 flex items-center justify-between text-sm text-slate-500">
                                <span>🟢 247 usuarios en línea</span>
                                <span>⭐ 4.8 de calificación</span>
                            </div>
                        </div>
                        <!-- Decoración fondo -->
                        <div
                            class="absolute -z-10 -top-10 -right-10 w-64 h-64 bg-primary-100 rounded-full blur-3xl opacity-60">
                        </div>
                        <div
                            class="absolute -z-10 -bottom-8 -left-8 w-48 h-48 bg-accent-100 rounded-full blur-3xl opacity-50">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ========== ESTADÍSTICAS ========== -->
        <section class="bg-white py-14 border-y border-slate-100">
            <div class="max-w-7xl mx-auto px-6">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                    <div class="space-y-1">
                        <h2 class="text-4xl md:text-5xl font-extrabold text-primary-600">12K+</h2>
                        <p class="text-slate-500 font-medium">Usuarios registrados</p>
                    </div>
                    <div class="space-y-1">
                        <h2 class="text-4xl md:text-5xl font-extrabold text-primary-600">6.5K+</h2>
                        <p class="text-slate-500 font-medium">Servicios ofrecidos</p>
                    </div>
                    <div class="space-y-1">
                        <h2 class="text-4xl md:text-5xl font-extrabold text-primary-600">3.2K+</h2>
                        <p class="text-slate-500 font-medium">Trabajos publicados</p>
                    </div>
                    <div class="space-y-1">
                        <h2 class="text-4xl md:text-5xl font-extrabold text-primary-600">28K+</h2>
                        <p class="text-slate-500 font-medium">Intercambios P2P</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- ========== SERVICIOS DESTACADOS ========== -->
        <section class="py-20 bg-white">
            <div class="max-w-7xl mx-auto px-6">
                <div class="flex flex-col sm:flex-row sm:justify-between sm:items-end gap-4 mb-10">
                    <div>
                        <h2 class="text-3xl lg:text-4xl font-extrabold text-slate-900">⭐ Servicios destacados</h2>
                        <p class="text-slate-500 mt-2">Profesionales verificados listos para ayudarte</p>
                    </div>
                    <a href="#"
                        class="inline-flex items-center gap-1 text-primary-600 font-semibold hover:text-primary-700 transition-colors">
                        Ver todos los servicios
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>

                <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Tarjeta 1 -->
                    <article class="bg-white rounded-2xl overflow-hidden border border-slate-200 card-hover shadow-sm">
                        <div class="relative">
                            <img src="https://picsum.photos/600/300?1" class="h-48 w-full object-cover"
                                alt="Desarrollo Laravel">
                            <span
                                class="absolute top-3 left-3 bg-primary-600 text-white text-xs px-2 py-1 rounded-full">Destacado</span>
                        </div>
                        <div class="p-5">
                            <div class="flex items-center gap-3 mb-3">
                                <img src="https://i.pravatar.cc/44?img=11"
                                    class="w-10 h-10 rounded-full ring-2 ring-primary-100" alt="Roberto">
                                <div>
                                    <p class="font-semibold text-slate-800">Roberto Calel</p>
                                    <p class="text-xs text-slate-500">Laravel Developer</p>
                                </div>
                            </div>
                            <h3 class="font-bold text-lg text-slate-800">Desarrollo de APIs REST con Laravel 11</h3>
                            <p class="text-sm text-slate-500 mt-1 line-clamp-2">Backend robusto con autenticación, pruebas
                                automatizadas y despliegue en producción.</p>
                            <div class="mt-4 flex items-center justify-between">
                                <span class="flex items-center gap-1 text-yellow-500 font-semibold text-sm">⭐ 4.9 <span
                                        class="text-slate-400 font-normal">(128)</span></span>
                                <span class="font-bold text-primary-700">Q500</span>
                            </div>
                        </div>
                    </article>

                    <!-- Tarjeta 2 -->
                    <article class="bg-white rounded-2xl overflow-hidden border border-slate-200 card-hover shadow-sm">
                        <div class="relative">
                            <img src="https://picsum.photos/600/300?10" class="h-48 w-full object-cover" alt="Diseño UI">
                            <span
                                class="absolute top-3 left-3 bg-emerald-500 text-white text-xs px-2 py-1 rounded-full">Popular</span>
                        </div>
                        <div class="p-5">
                            <div class="flex items-center gap-3 mb-3">
                                <img src="https://i.pravatar.cc/44?img=16"
                                    class="w-10 h-10 rounded-full ring-2 ring-primary-100" alt="María">
                                <div>
                                    <p class="font-semibold text-slate-800">María García</p>
                                    <p class="text-xs text-slate-500">UI/UX Designer</p>
                                </div>
                            </div>
                            <h3 class="font-bold text-lg text-slate-800">Diseño de interfaces modernas Figma</h3>
                            <p class="text-sm text-slate-500 mt-1 line-clamp-2">Prototipos interactivos, sistemas de diseño
                                completos y handoff para desarrollo.</p>
                            <div class="mt-4 flex items-center justify-between">
                                <span class="flex items-center gap-1 text-yellow-500 font-semibold text-sm">⭐ 4.8 <span
                                        class="text-slate-400 font-normal">(94)</span></span>
                                <span class="font-bold text-primary-700">Q350</span>
                            </div>
                        </div>
                    </article>

                    <!-- Tarjeta 3 -->
                    <article class="bg-white rounded-2xl overflow-hidden border border-slate-200 card-hover shadow-sm">
                        <div class="relative">
                            <img src="https://picsum.photos/600/300?20" class="h-48 w-full object-cover" alt="Marketing">
                            <span
                                class="absolute top-3 left-3 bg-warm-500 text-white text-xs px-2 py-1 rounded-full">Oferta</span>
                        </div>
                        <div class="p-5">
                            <div class="flex items-center gap-3 mb-3">
                                <img src="https://i.pravatar.cc/44?img=22"
                                    class="w-10 h-10 rounded-full ring-2 ring-primary-100" alt="Carlos">
                                <div>
                                    <p class="font-semibold text-slate-800">Carlos López</p>
                                    <p class="text-xs text-slate-500">Marketing Digital</p>
                                </div>
                            </div>
                            <h3 class="font-bold text-lg text-slate-800">Estrategia de marketing en redes sociales</h3>
                            <p class="text-sm text-slate-500 mt-1 line-clamp-2">Creación de contenido, calendario editorial
                                y análisis de métricas mensuales.</p>
                            <div class="mt-4 flex items-center justify-between">
                                <span class="flex items-center gap-1 text-yellow-500 font-semibold text-sm">⭐ 4.7 <span
                                        class="text-slate-400 font-normal">(56)</span></span>
                                <span class="font-bold text-primary-700">Q280</span>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </section>

        <!-- ========== EMPLEOS RECIENTES ========== -->
        <section class="py-20 bg-slate-50">
            <div class="max-w-7xl mx-auto px-6">
                <div class="flex flex-col sm:flex-row sm:justify-between sm:items-end gap-4 mb-10">
                    <div>
                        <h2 class="text-3xl lg:text-4xl font-extrabold text-slate-900">💼 Empleos recientes</h2>
                        <p class="text-slate-500 mt-2">Oportunidades laborales actualizadas diariamente</p>
                    </div>
                    <a href="#"
                        class="inline-flex items-center gap-1 text-primary-600 font-semibold hover:text-primary-700 transition-colors">
                        Ver todas las vacantes
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>

                <div
                    class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden divide-y divide-slate-100">
                    <!-- Empleo 1 -->
                    <div
                        class="p-5 sm:p-6 flex flex-col sm:flex-row sm:items-center justify-between gap-4 hover:bg-slate-50 transition-colors">
                        <div class="flex items-start gap-4">
                            <div
                                class="w-12 h-12 bg-primary-100 text-primary-700 rounded-xl flex items-center justify-center font-bold text-lg shrink-0">
                                TS</div>
                            <div>
                                <h3 class="font-bold text-lg text-slate-800">Backend Laravel Developer</h3>
                                <p class="text-slate-500">Tech Solutions · Remoto · Publicado hace 2 días</p>
                                <div class="flex flex-wrap gap-2 mt-2">
                                    <span class="text-xs bg-slate-100 text-slate-600 px-2 py-0.5 rounded-full">PHP</span>
                                    <span
                                        class="text-xs bg-slate-100 text-slate-600 px-2 py-0.5 rounded-full">Laravel</span>
                                    <span class="text-xs bg-slate-100 text-slate-600 px-2 py-0.5 rounded-full">MySQL</span>
                                    <span
                                        class="text-xs bg-slate-100 text-slate-600 px-2 py-0.5 rounded-full">Docker</span>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center gap-4 sm:text-right">
                            <div>
                                <p class="font-bold text-emerald-600 text-lg">Q8,000</p>
                                <p class="text-xs text-slate-400">Mensual</p>
                            </div>
                            <button
                                class="px-5 py-2.5 bg-primary-600 text-white font-semibold rounded-xl hover:bg-primary-700 transition-all shadow-sm">
                                Aplicar
                            </button>
                        </div>
                    </div>

                    <!-- Empleo 2 -->
                    <div
                        class="p-5 sm:p-6 flex flex-col sm:flex-row sm:items-center justify-between gap-4 hover:bg-slate-50 transition-colors">
                        <div class="flex items-start gap-4">
                            <div
                                class="w-12 h-12 bg-emerald-100 text-emerald-700 rounded-xl flex items-center justify-center font-bold text-lg shrink-0">
                                DS</div>
                            <div>
                                <h3 class="font-bold text-lg text-slate-800">Frontend React Developer</h3>
                                <p class="text-slate-500">Digital Studio · Híbrido · Publicado hace 5 días</p>
                                <div class="flex flex-wrap gap-2 mt-2">
                                    <span class="text-xs bg-slate-100 text-slate-600 px-2 py-0.5 rounded-full">React</span>
                                    <span
                                        class="text-xs bg-slate-100 text-slate-600 px-2 py-0.5 rounded-full">TypeScript</span>
                                    <span
                                        class="text-xs bg-slate-100 text-slate-600 px-2 py-0.5 rounded-full">Tailwind</span>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center gap-4 sm:text-right">
                            <div>
                                <p class="font-bold text-emerald-600 text-lg">Q7,500</p>
                                <p class="text-xs text-slate-400">Mensual</p>
                            </div>
                            <button
                                class="px-5 py-2.5 bg-primary-600 text-white font-semibold rounded-xl hover:bg-primary-700 transition-all shadow-sm">
                                Aplicar
                            </button>
                        </div>
                    </div>

                    <!-- Empleo 3 -->
                    <div
                        class="p-5 sm:p-6 flex flex-col sm:flex-row sm:items-center justify-between gap-4 hover:bg-slate-50 transition-colors">
                        <div class="flex items-start gap-4">
                            <div
                                class="w-12 h-12 bg-warm-100 text-warm-700 rounded-xl flex items-center justify-center font-bold text-lg shrink-0">
                                MK</div>
                            <div>
                                <h3 class="font-bold text-lg text-slate-800">Especialista en Marketing Digital</h3>
                                <p class="text-slate-500">Marketing Pro · Remoto · Publicado hace 1 día</p>
                                <div class="flex flex-wrap gap-2 mt-2">
                                    <span class="text-xs bg-slate-100 text-slate-600 px-2 py-0.5 rounded-full">SEO</span>
                                    <span class="text-xs bg-slate-100 text-slate-600 px-2 py-0.5 rounded-full">Google
                                        Ads</span>
                                    <span
                                        class="text-xs bg-slate-100 text-slate-600 px-2 py-0.5 rounded-full">Analytics</span>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center gap-4 sm:text-right">
                            <div>
                                <p class="font-bold text-emerald-600 text-lg">Q6,200</p>
                                <p class="text-xs text-slate-400">Mensual</p>
                            </div>
                            <button
                                class="px-5 py-2.5 bg-primary-600 text-white font-semibold rounded-xl hover:bg-primary-700 transition-all shadow-sm">
                                Aplicar
                            </button>
                        </div>
                    </div>

                    <!-- Empleo 4 -->
                    <div
                        class="p-5 sm:p-6 flex flex-col sm:flex-row sm:items-center justify-between gap-4 hover:bg-slate-50 transition-colors">
                        <div class="flex items-start gap-4">
                            <div
                                class="w-12 h-12 bg-accent-100 text-accent-700 rounded-xl flex items-center justify-center font-bold text-lg shrink-0">
                                UX</div>
                            <div>
                                <h3 class="font-bold text-lg text-slate-800">UI/UX Designer Senior</h3>
                                <p class="text-slate-500">Creative Labs · Presencial · Publicado hace 3 días</p>
                                <div class="flex flex-wrap gap-2 mt-2">
                                    <span class="text-xs bg-slate-100 text-slate-600 px-2 py-0.5 rounded-full">Figma</span>
                                    <span
                                        class="text-xs bg-slate-100 text-slate-600 px-2 py-0.5 rounded-full">Prototyping</span>
                                    <span class="text-xs bg-slate-100 text-slate-600 px-2 py-0.5 rounded-full">Design
                                        Systems</span>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center gap-4 sm:text-right">
                            <div>
                                <p class="font-bold text-emerald-600 text-lg">Q9,000</p>
                                <p class="text-xs text-slate-400">Mensual</p>
                            </div>
                            <button
                                class="px-5 py-2.5 bg-primary-600 text-white font-semibold rounded-xl hover:bg-primary-700 transition-all shadow-sm">
                                Aplicar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ========== COMUNIDAD ========== -->
        <section class="py-20 bg-white">
            <div class="max-w-7xl mx-auto px-6">
                <div class="flex flex-col sm:flex-row sm:justify-between sm:items-end gap-4 mb-10">
                    <div>
                        <h2 class="text-3xl lg:text-4xl font-extrabold text-slate-900">💬 Comunidad</h2>
                        <p class="text-slate-500 mt-2">Participa en debates, comparte conocimiento y resuelve dudas</p>
                    </div>
                    <button
                        class="px-5 py-3 bg-primary-600 text-white font-semibold rounded-xl hover:bg-primary-700 shadow-md shadow-primary-200 transition-all">
                        ✍️ Crear nuevo tema
                    </button>
                </div>

                <div class="grid sm:grid-cols-2 gap-5">
                    <!-- Tema 1 -->
                    <div class="border border-slate-200 rounded-2xl p-5 card-hover bg-white shadow-sm">
                        <div class="flex items-start gap-4">
                            <img src="https://i.pravatar.cc/48?img=33"
                                class="w-12 h-12 rounded-full ring-2 ring-primary-100 shrink-0" alt="Usuario">
                            <div class="flex-1 min-w-0">
                                <h3 class="font-semibold text-slate-800 truncate">¿Laravel 12 con Livewire 3 o Inertia.js +
                                    Vue?</h3>
                                <p class="text-sm text-slate-500 mt-1 line-clamp-2">Estoy iniciando un proyecto nuevo y
                                    quisiera saber cuál stack recomiendan para un dashboard administrativo con tiempo real.
                                </p>
                                <div class="flex items-center gap-4 mt-3 text-xs text-slate-400">
                                    <span>👤 Juan Pérez</span>
                                    <span>💬 34 respuestas</span>
                                    <span>🕐 hace 3 horas</span>
                                </div>
                                <div class="flex gap-2 mt-2">
                                    <span
                                        class="text-xs bg-primary-50 text-primary-700 px-2 py-0.5 rounded-full">Laravel</span>
                                    <span
                                        class="text-xs bg-primary-50 text-primary-700 px-2 py-0.5 rounded-full">Livewire</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Tema 2 -->
                    <div class="border border-slate-200 rounded-2xl p-5 card-hover bg-white shadow-sm">
                        <div class="flex items-start gap-4">
                            <img src="https://i.pravatar.cc/48?img=41"
                                class="w-12 h-12 rounded-full ring-2 ring-primary-100 shrink-0" alt="Usuario">
                            <div class="flex-1 min-w-0">
                                <h3 class="font-semibold text-slate-800 truncate">Consejos para conseguir el primer cliente
                                    freelance</h3>
                                <p class="text-sm text-slate-500 mt-1 line-clamp-2">Comparto mi experiencia después de 6
                                    meses como freelance. ¿Qué estrategias les han funcionado a ustedes?</p>
                                <div class="flex items-center gap-4 mt-3 text-xs text-slate-400">
                                    <span>👤 Ana Martínez</span>
                                    <span>💬 52 respuestas</span>
                                    <span>🕐 hace 1 día</span>
                                </div>
                                <div class="flex gap-2 mt-2">
                                    <span
                                        class="text-xs bg-warm-50 text-warm-700 px-2 py-0.5 rounded-full">Freelance</span>
                                    <span class="text-xs bg-warm-50 text-warm-700 px-2 py-0.5 rounded-full">Consejos</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Tema 3 -->
                    <div class="border border-slate-200 rounded-2xl p-5 card-hover bg-white shadow-sm">
                        <div class="flex items-start gap-4">
                            <img src="https://i.pravatar.cc/48?img=55"
                                class="w-12 h-12 rounded-full ring-2 ring-primary-100 shrink-0" alt="Usuario">
                            <div class="flex-1 min-w-0">
                                <h3 class="font-semibold text-slate-800 truncate">Mejores prácticas para APIs RESTful en
                                    2026</h3>
                                <p class="text-sm text-slate-500 mt-1 line-clamp-2">Discutamos sobre versionado,
                                    documentación con OpenAPI, rate limiting y seguridad en APIs modernas.</p>
                                <div class="flex items-center gap-4 mt-3 text-xs text-slate-400">
                                    <span>👤 Diego Ramírez</span>
                                    <span>💬 18 respuestas</span>
                                    <span>🕐 hace 6 horas</span>
                                </div>
                                <div class="flex gap-2 mt-2">
                                    <span
                                        class="text-xs bg-emerald-50 text-emerald-700 px-2 py-0.5 rounded-full">API</span>
                                    <span
                                        class="text-xs bg-emerald-50 text-emerald-700 px-2 py-0.5 rounded-full">REST</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Tema 4 -->
                    <div class="border border-slate-200 rounded-2xl p-5 card-hover bg-white shadow-sm">
                        <div class="flex items-start gap-4">
                            <img src="https://i.pravatar.cc/48?img=60"
                                class="w-12 h-12 rounded-full ring-2 ring-primary-100 shrink-0" alt="Usuario">
                            <div class="flex-1 min-w-0">
                                <h3 class="font-semibold text-slate-800 truncate">¿Cuánto cobrar por un sitio web en 2026?
                                </h3>
                                <p class="text-sm text-slate-500 mt-1 line-clamp-2">Precios de referencia para landing
                                    pages, ecommerce y aplicaciones web personalizadas en el mercado actual.</p>
                                <div class="flex items-center gap-4 mt-3 text-xs text-slate-400">
                                    <span>👤 Laura Castillo</span>
                                    <span>💬 41 respuestas</span>
                                    <span>🕐 hace 12 horas</span>
                                </div>
                                <div class="flex gap-2 mt-2">
                                    <span
                                        class="text-xs bg-accent-50 text-accent-700 px-2 py-0.5 rounded-full">Precios</span>
                                    <span class="text-xs bg-accent-50 text-accent-700 px-2 py-0.5 rounded-full">Web</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ========== MARKETPLACE P2P ========== -->
        <section class="py-20 bg-slate-50">
            <div class="max-w-7xl mx-auto px-6">
                <div class="flex flex-col sm:flex-row sm:justify-between sm:items-end gap-4 mb-10">
                    <div>
                        <h2 class="text-3xl lg:text-4xl font-extrabold text-slate-900">🔄 Marketplace P2P</h2>
                        <p class="text-slate-500 mt-2">Intercambia y vende productos entre miembros de la comunidad</p>
                    </div>
                    <a href="#"
                        class="inline-flex items-center gap-1 text-primary-600 font-semibold hover:text-primary-700 transition-colors">
                        Explorar marketplace
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>

                <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-5">
                    <!-- Producto 1 -->
                    <div class="bg-white rounded-2xl overflow-hidden border border-slate-200 card-hover shadow-sm">
                        <div class="relative">
                            <img src="https://picsum.photos/400/300?2" class="h-44 w-full object-cover" alt="Laptop">
                            <span
                                class="absolute top-2 right-2 bg-accent-500 text-white text-xs px-2 py-0.5 rounded-full">Nuevo</span>
                        </div>
                        <div class="p-4">
                            <h3 class="font-semibold text-slate-800 truncate">Laptop Dell Latitude 5520</h3>
                            <p class="text-xs text-slate-500 mt-1">📍 Mazatenango, Suchitepéquez</p>
                            <div class="mt-3 flex items-center justify-between">
                                <span class="font-bold text-lg text-primary-700">Q2,800</span>
                                <button
                                    class="px-4 py-2 bg-primary-600 text-white text-sm font-semibold rounded-lg hover:bg-primary-700 transition-all">
                                    Ver
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Producto 2 -->
                    <div class="bg-white rounded-2xl overflow-hidden border border-slate-200 card-hover shadow-sm">
                        <div class="relative">
                            <img src="https://picsum.photos/400/300?30" class="h-44 w-full object-cover" alt="Monitor">
                            <span
                                class="absolute top-2 right-2 bg-emerald-500 text-white text-xs px-2 py-0.5 rounded-full">En
                                oferta</span>
                        </div>
                        <div class="p-4">
                            <h3 class="font-semibold text-slate-800 truncate">Monitor LG 27" 4K UHD</h3>
                            <p class="text-xs text-slate-500 mt-1">📍 Quetzaltenango</p>
                            <div class="mt-3 flex items-center justify-between">
                                <span class="font-bold text-lg text-primary-700">Q1,950</span>
                                <button
                                    class="px-4 py-2 bg-primary-600 text-white text-sm font-semibold rounded-lg hover:bg-primary-700 transition-all">
                                    Ver
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Producto 3 -->
                    <div class="bg-white rounded-2xl overflow-hidden border border-slate-200 card-hover shadow-sm">
                        <div class="relative">
                            <img src="https://picsum.photos/400/300?40" class="h-44 w-full object-cover" alt="Cámara">
                            <span
                                class="absolute top-2 right-2 bg-warm-500 text-white text-xs px-2 py-0.5 rounded-full">Usado</span>
                        </div>
                        <div class="p-4">
                            <h3 class="font-semibold text-slate-800 truncate">Cámara Sony A6400 + Lente</h3>
                            <p class="text-xs text-slate-500 mt-1">📍 Ciudad de Guatemala</p>
                            <div class="mt-3 flex items-center justify-between">
                                <span class="font-bold text-lg text-primary-700">Q5,600</span>
                                <button
                                    class="px-4 py-2 bg-primary-600 text-white text-sm font-semibold rounded-lg hover:bg-primary-700 transition-all">
                                    Ver
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Producto 4 -->
                    <div class="bg-white rounded-2xl overflow-hidden border border-slate-200 card-hover shadow-sm">
                        <div class="relative">
                            <img src="https://picsum.photos/400/300?50" class="h-44 w-full object-cover"
                                alt="Escritorio">
                            <span
                                class="absolute top-2 right-2 bg-primary-500 text-white text-xs px-2 py-0.5 rounded-full">Popular</span>
                        </div>
                        <div class="p-4">
                            <h3 class="font-semibold text-slate-800 truncate">Escritorio eléctrico ajustable</h3>
                            <p class="text-xs text-slate-500 mt-1">📍 Antigua Guatemala</p>
                            <div class="mt-3 flex items-center justify-between">
                                <span class="font-bold text-lg text-primary-700">Q1,200</span>
                                <button
                                    class="px-4 py-2 bg-primary-600 text-white text-sm font-semibold rounded-lg hover:bg-primary-700 transition-all">
                                    Ver
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ========== CTA FINAL ========== -->
        <section class="py-20 bg-gradient-to-br from-primary-600 to-primary-800 text-white">
            <div class="max-w-4xl mx-auto px-6 text-center">
                <h2 class="text-3xl lg:text-4xl font-extrabold">¿Listo para ser parte de la comunidad?</h2>
                <p class="mt-4 text-lg text-primary-100 max-w-2xl mx-auto">
                    Regístrate gratis y comienza a ofrecer tus servicios, encontrar trabajo o intercambiar productos con
                    miles de personas.
                </p>
                <div class="mt-8 flex flex-wrap justify-center gap-4">
                    <button
                        class="px-8 py-4 bg-white text-primary-700 font-bold rounded-xl hover:bg-primary-50 shadow-xl transition-all">
                        🚀 Crear cuenta gratis
                    </button>
                    <button
                        class="px-8 py-4 border-2 border-white/30 text-white font-bold rounded-xl hover:bg-white/10 transition-all">
                        📞 Hablar con soporte
                    </button>
                </div>
                <p class="mt-6 text-sm text-primary-200">Sin tarjeta de crédito · Configuración en 2 minutos</p>
            </div>
        </section>
    </main>
@endsection
