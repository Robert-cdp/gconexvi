@extends('main')

@section('title', 'Publicar un nuevo trabajo')

@section('content')
    <!-- Encabezado de página -->
    <section class="bg-white border-b border-slate-100 py-10">
        <div class="max-w-3xl mx-auto px-6">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-extrabold text-slate-900">💼 Crear oferta de trabajo</h1>
                    <p class="mt-1 text-slate-500">Publica una nueva vacante para encontrar al candidato ideal</p>
                </div>
                <a href="trabajos.html"
                    class="hidden sm:inline-flex items-center gap-2 px-4 py-2 text-sm font-semibold text-slate-600 border border-slate-300 rounded-xl hover:bg-slate-100 transition-all">
                    ← Volver a trabajos
                </a>
            </div>
        </div>
    </section>

    <!-- Formulario -->
    <section class="py-10">
        <div class="max-w-3xl mx-auto px-6">
            <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6 sm:p-8" x-data="formularioOferta()">
                <form action="/trabajos" method="POST" @submit.prevent="publicar" class="space-y-6">
                    <!-- CSRF Token (Laravel) -->
                    <!-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> -->

                    <!-- Título del puesto -->
                    <div>
                        <label for="titulo" class="block text-sm font-semibold text-slate-700 mb-2">
                            Título del puesto <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="titulo" name="titulo" x-model="titulo" required
                            placeholder="Ej: Backend Laravel Developer"
                            class="w-full px-4 py-3 text-sm border border-slate-200 rounded-xl outline-none focus:ring-2 focus:ring-primary-100 focus:border-primary-300 transition-all">
                    </div>

                    <!-- Empresa -->
                    <div>
                        <label for="empresa" class="block text-sm font-semibold text-slate-700 mb-2">
                            Empresa <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="empresa" name="empresa" x-model="empresa" required
                            placeholder="Ej: Tech Solutions"
                            class="w-full px-4 py-3 text-sm border border-slate-200 rounded-xl outline-none focus:ring-2 focus:ring-primary-100 focus:border-primary-300 transition-all">
                    </div>

                    <!-- Ubicación y Tipo -->
                    <div class="grid sm:grid-cols-2 gap-4">
                        <div>
                            <label for="ubicacion" class="block text-sm font-semibold text-slate-700 mb-2">
                                Ubicación <span class="text-red-500">*</span>
                            </label>
                            <input type="text" id="ubicacion" name="ubicacion" x-model="ubicacion" required
                                placeholder="Ej: Remoto, Guatemala"
                                class="w-full px-4 py-3 text-sm border border-slate-200 rounded-xl outline-none focus:ring-2 focus:ring-primary-100 focus:border-primary-300 transition-all">
                        </div>
                        <div>
                            <label for="tipo" class="block text-sm font-semibold text-slate-700 mb-2">
                                Tipo de empleo <span class="text-red-500">*</span>
                            </label>
                            <select id="tipo" name="tipo" x-model="tipo" required
                                class="w-full px-4 py-3 text-sm border border-slate-200 rounded-xl outline-none focus:ring-2 focus:ring-primary-100 focus:border-primary-300 transition-all bg-white">
                                <option value="" disabled>Selecciona tipo</option>
                                <option>Remoto</option>
                                <option>Híbrido</option>
                                <option>Presencial</option>
                            </select>
                        </div>
                    </div>

                    <!-- Salario -->
                    <div class="grid sm:grid-cols-2 gap-4">
                        <div>
                            <label for="salario_min" class="block text-sm font-semibold text-slate-700 mb-2">
                                Salario mínimo (Q)
                            </label>
                            <input type="number" id="salario_min" name="salario_min" x-model="salarioMin"
                                placeholder="Ej: 5000" min="0"
                                class="w-full px-4 py-3 text-sm border border-slate-200 rounded-xl outline-none focus:ring-2 focus:ring-primary-100 focus:border-primary-300 transition-all">
                        </div>
                        <div>
                            <label for="salario_max" class="block text-sm font-semibold text-slate-700 mb-2">
                                Salario máximo (Q)
                            </label>
                            <input type="number" id="salario_max" name="salario_max" x-model="salarioMax"
                                placeholder="Ej: 8000" min="0"
                                class="w-full px-4 py-3 text-sm border border-slate-200 rounded-xl outline-none focus:ring-2 focus:ring-primary-100 focus:border-primary-300 transition-all">
                        </div>
                    </div>

                    <!-- Descripción -->
                    <div>
                        <label for="descripcion" class="block text-sm font-semibold text-slate-700 mb-2">
                            Descripción <span class="text-red-500">*</span>
                        </label>
                        <textarea id="descripcion" name="descripcion" x-model="descripcion" required rows="5"
                            placeholder="Describe las responsabilidades, requisitos y beneficios del puesto..."
                            class="w-full px-4 py-3 text-sm border border-slate-200 rounded-xl outline-none focus:ring-2 focus:ring-primary-100 focus:border-primary-300 transition-all resize-y"></textarea>
                        <p class="text-xs text-slate-400 mt-1">Mínimo 50 caracteres. Sé específico para atraer a los mejores
                            candidatos.</p>
                    </div>

                    <!-- Habilidades / Etiquetas -->
                    <div>
                        <label for="habilidades" class="block text-sm font-semibold text-slate-700 mb-2">
                            Habilidades requeridas
                        </label>
                        <input type="text" id="habilidades" name="habilidades" x-model="habilidades"
                            placeholder="Ej: PHP, Laravel, MySQL, Docker (separadas por coma)"
                            class="w-full px-4 py-3 text-sm border border-slate-200 rounded-xl outline-none focus:ring-2 focus:ring-primary-100 focus:border-primary-300 transition-all">
                        <p class="text-xs text-slate-400 mt-1">Agrega las tecnologías o competencias necesarias.</p>
                    </div>

                    <!-- Destacado (opcional) -->
                    <div class="flex items-start gap-2">
                        <input type="checkbox" id="destacado" name="destacado" x-model="destacado"
                            class="mt-0.5 rounded border-slate-300 text-primary-600 focus:ring-primary-500">
                        <label for="destacado" class="text-sm text-slate-600">
                            Destacar esta oferta (aparecerá primero en los listados)
                        </label>
                    </div>

                    <!-- Aviso -->
                    <div class="p-4 bg-primary-50 rounded-xl border border-primary-100 flex gap-3">
                        <span class="text-primary-600">ℹ️</span>
                        <p class="text-sm text-primary-800">
                            <span class="font-medium">Revisión:</span> La oferta será revisada por nuestro equipo antes de
                            publicarse. Asegúrate de cumplir con las <a href="#" class="underline">políticas de
                                publicación</a>.
                        </p>
                    </div>

                    <!-- Botones -->
                    <div class="flex flex-wrap justify-end gap-3 pt-2">
                        <a href="trabajos.html"
                            class="px-6 py-3 text-sm font-semibold text-slate-600 border border-slate-300 rounded-xl hover:bg-slate-100 transition-all">
                            Cancelar
                        </a>
                        <button type="submit"
                            class="px-8 py-3 text-sm font-bold text-white bg-primary-600 rounded-xl hover:bg-primary-700 shadow-md shadow-primary-200 transition-all">
                            🚀 Publicar oferta
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
