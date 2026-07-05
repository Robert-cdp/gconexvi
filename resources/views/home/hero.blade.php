<section class="relative py-20 lg:py-28 bg-gradient-to-br from-slate-50 via-white to-primary-50/30">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid lg:grid-cols-2 gap-16 items-center">

            <!-- Texto -->
            <div>
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
                    <a href="{{ route('services.index') }}" class="px-6 py-3.5 bg-primary-600 text-white font-semibold rounded-xl hover:bg-primary-700 shadow-lg shadow-primary-200 transition-all">
                        Ver Servicios
                    </a>
                    <a href="{{ route('community.index') }}" class="px-6 py-3.5 border-2 border-slate-300 text-slate-700 font-semibold rounded-xl hover:border-primary-300 hover:text-primary-600 hover:bg-white transition-all">
                        Ver Comunidad
                    </a>
                </div>

                {{-- <div class="mt-8 flex items-center gap-4">
                    <div class="flex -space-x-3">
                        <img src="https://i.pravatar.cc/40?img=1" class="w-10 h-10 rounded-full border-2 border-white"
                            alt="Usuario">
                        <img src="https://i.pravatar.cc/40?img=5" class="w-10 h-10 rounded-full border-2 border-white"
                            alt="Usuario">
                        <img src="https://i.pravatar.cc/40?img=8" class="w-10 h-10 rounded-full border-2 border-white"
                            alt="Usuario">
                        <img src="https://i.pravatar.cc/40?img=12" class="w-10 h-10 rounded-full border-2 border-white"
                            alt="Usuario">
                    </div>
                    <p class="text-sm text-slate-500"><strong class="text-slate-700">+500</strong> nuevos miembros
                        esta semana</p>
                </div> --}}
            </div>

            <!-- Tarjetas visuales -->
            <div class="relative">
                <div class="bg-white rounded-3xl shadow-xl border border-slate-100 p-6 lg:p-8">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">

                        <div
                            class="relative bg-white border border-slate-200 rounded-2xl p-6 shadow-sm hover:shadow-md transition">
                            <div class="flex items-center justify-between">
                                <h3 class="font-bold text-slate-800">Servicios</h3>
                                <span class="w-2.5 h-2.5 rounded-full bg-emerald-500"></span>
                            </div>
                            <p class="text-xs text-slate-500 mt-2">Módulo en producción</p>
                            <div class="mt-4 h-1.5 bg-slate-100 rounded-full overflow-hidden">
                                <div class="h-full w-full bg-emerald-500 rounded-full"></div>
                            </div>
                            <p class="text-[11px] text-slate-400 mt-2">100% activo</p>
                        </div>

                        <div
                            class="relative bg-white border border-slate-200 rounded-2xl p-6 shadow-sm hover:shadow-md transition">
                            <div class="flex items-center justify-between">
                                <h3 class="font-bold text-slate-800">Trabajos</h3>
                                <span class="w-2.5 h-2.5 rounded-full bg-emerald-500"></span>
                            </div>
                            <p class="text-xs text-slate-500 mt-2">Sistema estable</p>
                            <div class="mt-4 h-1.5 bg-slate-100 rounded-full overflow-hidden">
                                <div class="h-full w-4/5 bg-emerald-500 rounded-full"></div>
                            </div>
                            <p class="text-[11px] text-slate-400 mt-2">80% completado</p>
                        </div>

                        <div
                            class="relative bg-white border border-slate-200 rounded-2xl p-6 shadow-sm hover:shadow-md transition">
                            <div class="flex items-center justify-between">
                                <h3 class="font-bold text-slate-800">Comunidad</h3>
                                <span class="w-2.5 h-2.5 rounded-full bg-amber-400"></span>
                            </div>
                            <p class="text-xs text-slate-500 mt-2">Creciendo activamente</p>
                            <div class="mt-4 h-1.5 bg-slate-100 rounded-full overflow-hidden">
                                <div class="h-full w-2/3 bg-amber-400 rounded-full"></div>
                            </div>
                            <p class="text-[11px] text-slate-400 mt-2">En expansión</p>
                        </div>

                        <div
                            class="relative bg-white border border-slate-200 rounded-2xl p-6 shadow-sm hover:shadow-md transition">
                            <div class="flex items-center justify-between">
                                <h3 class="font-bold text-slate-800">P2P</h3>
                                <span class="w-2.5 h-2.5 rounded-full bg-blue-400 animate-pulse"></span>
                            </div>
                            <p class="text-xs text-slate-500 mt-2">En desarrollo activo</p>
                            <div class="mt-4 h-1.5 bg-slate-100 rounded-full overflow-hidden">
                                <div class="h-full w-1/3 bg-blue-400 rounded-full"></div>
                            </div>
                            <p class="text-[11px] text-slate-400 mt-2">33% progreso</p>
                        </div>

                    </div>
                    {{-- <div
                        class="mt-6 pt-4 border-t border-slate-100 flex items-center justify-between text-sm text-slate-500">
                        <span>247 usuarios en línea</span>
                        <span>4.8 de calificación</span>
                    </div> --}}
                </div>
                <div class="absolute -z-10 -top-10 -right-10 w-64 h-64 bg-primary-100 rounded-full blur-3xl opacity-60">
                </div>
                <div class="absolute -z-10 -bottom-8 -left-8 w-48 h-48 bg-accent-100 rounded-full blur-3xl opacity-50">
                </div>
            </div>
        </div>
    </div>
</section>
