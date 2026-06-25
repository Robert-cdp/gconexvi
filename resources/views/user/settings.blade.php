@extends('main')

@section('title', 'Configuraciones')

@section('content')
    <main>
        <section class="bg-white border-b border-slate-100 py-10">
            <div class="max-w-5xl mx-auto px-6">
                <h1 class="text-3xl font-extrabold text-slate-900">Configuración</h1>
                <p class="mt-2 text-slate-500">Administra tu información personal y preferencias de cuenta.</p>
            </div>
        </section>

        <section class="py-10">
            <div class="max-w-5xl mx-auto px-6 grid lg:grid-cols-3 gap-8">

                <div class="lg:col-span-1">
                    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-3 space-y-1">
                        <a href="#" class="block px-3 py-2 text-sm text-slate-600 rounded-lg hover:bg-slate-50 transition-colors">
                            Información Personal
                        </a>
                        <a href="#" class="block px-3 py-2 text-sm text-slate-600 rounded-lg hover:bg-slate-50 transition-colors">
                            Contraseña
                        </a>
                    </div>
                </div>

                <!-- Contenido de configuración -->
                <div class="lg:col-span-2 space-y-6">
                    <!-- Foto de perfil -->
                    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6">
                        <h2 class="text-lg font-bold text-slate-800 mb-4">Foto de perfil</h2>
                        <div class="flex items-center gap-4">
                            <img src="https://i.pravatar.cc/80?img=11" alt="Avatar"
                                class="w-16 h-16 rounded-full border-2 border-primary-100 object-cover">
                            <div>
                                <button
                                    class="px-4 py-2 text-sm font-semibold text-primary-700 border border-primary-200 rounded-lg hover:bg-primary-50 transition-colors">Subir
                                    nueva foto</button>
                                <p class="text-xs text-slate-400 mt-1">JPG, PNG o WEBP. Máx. 2MB.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Información básica -->
                    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6">
                        <h2 class="text-lg font-bold text-slate-800 mb-4">Información básica</h2>
                        <form class="space-y-4">
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-1">Nombre completo</label>
                                <input type="text" value="Roberto Calel"
                                    class="w-full px-4 py-2.5 text-sm border border-slate-200 rounded-xl outline-none focus:ring-2 focus:ring-primary-100 focus:border-primary-300">
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-1">Correo electrónico</label>
                                <input type="email" value="roberto@email.com"
                                    class="w-full px-4 py-2.5 text-sm border border-slate-200 rounded-xl outline-none focus:ring-2 focus:ring-primary-100 focus:border-primary-300">
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-1">Biografía</label>
                                <textarea rows="3"
                                    class="w-full px-4 py-2.5 text-sm border border-slate-200 rounded-xl outline-none focus:ring-2 focus:ring-primary-100 focus:border-primary-300 resize-y">Desarrollador backend con más de 5 años de experiencia en Laravel...</textarea>
                            </div>
                            <button type="button"
                                class="px-6 py-2.5 bg-primary-600 text-white text-sm font-semibold rounded-xl hover:bg-primary-700 shadow-sm transition-all">Guardar
                                cambios</button>
                        </form>
                    </div>

                    <!-- Cambiar contraseña -->
                    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6">
                        <h2 class="text-lg font-bold text-slate-800 mb-4">Cambiar contraseña</h2>
                        <form class="space-y-4">
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-1">Contraseña actual</label>
                                <input type="password"
                                    class="w-full px-4 py-2.5 text-sm border border-slate-200 rounded-xl outline-none focus:ring-2 focus:ring-primary-100 focus:border-primary-300">
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-1">Nueva contraseña</label>
                                <input type="password"
                                    class="w-full px-4 py-2.5 text-sm border border-slate-200 rounded-xl outline-none focus:ring-2 focus:ring-primary-100 focus:border-primary-300">
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-1">Confirmar nueva
                                    contraseña</label>
                                <input type="password"
                                    class="w-full px-4 py-2.5 text-sm border border-slate-200 rounded-xl outline-none focus:ring-2 focus:ring-primary-100 focus:border-primary-300">
                            </div>
                            <button type="button"
                                class="px-6 py-2.5 bg-primary-600 text-white text-sm font-semibold rounded-xl hover:bg-primary-700 shadow-sm transition-all">Actualizar
                                contraseña</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
