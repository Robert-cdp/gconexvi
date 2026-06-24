@extends('main')

@section('title', 'Crear Servicio')

@section('content')
    <!-- Encabezado de página -->
    <section class="bg-white border-b border-slate-100 py-12">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div>
                    <h1 class="text-3xl lg:text-4xl font-extrabold text-slate-900">Crear nuevo servicio</h1>
                    <p class="mt-2 text-slate-500">Completa el formulario para publicar tu servicio profesional en la
                        plataforma.</p>
                </div>
                <a href="servicios.html"
                    class="self-start inline-flex items-center gap-2 px-4 py-2 text-sm font-semibold text-slate-600 border border-slate-300 rounded-xl hover:bg-slate-100 transition-all">
                    ← Volver a servicios
                </a>
            </div>
        </div>
    </section>

    <!-- Formulario -->
    <section class="py-12">
        <div class="max-w-5xl mx-auto px-6">
            <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6 sm:p-8">
                <form>
                    <!-- Título del servicio -->
                    <div class="mb-6">
                        <label for="titulo" class="block text-sm font-semibold text-slate-700 mb-2">Título del servicio
                            <span class="text-red-500">*</span></label>
                        <input type="text" id="titulo" placeholder="Ej: Desarrollo de APIs REST con Laravel"
                            class="w-full px-4 py-3 text-sm border border-slate-200 rounded-xl outline-none focus:ring-2 focus:ring-primary-100 focus:border-primary-300 transition-all">
                    </div>

                    <!-- Categoría -->
                    <div class="mb-6">
                        <label for="categoria" class="block text-sm font-semibold text-slate-700 mb-2">Categoría <span
                                class="text-red-500">*</span></label>
                        <select id="categoria"
                            class="w-full px-4 py-3 text-sm border border-slate-200 rounded-xl outline-none focus:ring-2 focus:ring-primary-100 focus:border-primary-300 transition-all bg-white">
                            <option value="" disabled selected>Selecciona una categoría</option>
                            <option>Desarrollo Web</option>
                            <option>Diseño UI/UX</option>
                            <option>Marketing Digital</option>
                            <option>Soporte Técnico</option>
                            <option>Consultoría</option>
                            <option>Redacción / Traducción</option>
                            <option>Otros</option>
                        </select>
                    </div>

                    <!-- Descripción -->
                    <div class="mb-6">
                        <label for="descripcion" class="block text-sm font-semibold text-slate-700 mb-2">Descripción <span
                                class="text-red-500">*</span></label>
                        <textarea id="descripcion" rows="5"
                            placeholder="Describe detalladamente tu servicio, experiencia, entregables y tiempo de entrega..."
                            class="w-full px-4 py-3 text-sm border border-slate-200 rounded-xl outline-none focus:ring-2 focus:ring-primary-100 focus:border-primary-300 transition-all resize-y"></textarea>
                        <p class="text-xs text-slate-400 mt-1">Mínimo 50 caracteres. Sé claro y específico para atraer más
                            clientes.</p>
                    </div>

                    <!-- Precio -->
                    <div class="grid sm:grid-cols-2 gap-4 mb-6">
                        <div>
                            <label for="precio" class="block text-sm font-semibold text-slate-700 mb-2">Precio (Q) <span
                                    class="text-red-500">*</span></label>
                            <input type="number" id="precio" placeholder="0.00" min="1" step="0.01"
                                class="w-full px-4 py-3 text-sm border border-slate-200 rounded-xl outline-none focus:ring-2 focus:ring-primary-100 focus:border-primary-300 transition-all">
                        </div>
                        <div>
                            <label for="tipo_precio" class="block text-sm font-semibold text-slate-700 mb-2">Tipo de
                                precio</label>
                            <select id="tipo_precio"
                                class="w-full px-4 py-3 text-sm border border-slate-200 rounded-xl outline-none focus:ring-2 focus:ring-primary-100 focus:border-primary-300 transition-all bg-white">
                                <option>Precio fijo</option>
                                <option>Por hora</option>
                                <option>A convenir</option>
                            </select>
                        </div>
                    </div>

                    <!-- Imagen del servicio -->
                    <div class="mb-6">
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Imagen del servicio</label>
                        <div
                            class="border-2 border-dashed border-slate-300 rounded-xl p-6 text-center hover:border-primary-400 transition-colors cursor-pointer bg-slate-50/50">
                            <div class="flex flex-col items-center">
                                <svg class="w-10 h-10 text-slate-400 mb-2" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <p class="text-sm text-slate-500">Arrastra una imagen o <span
                                        class="text-primary-600 font-medium">haz clic para seleccionar</span></p>
                                <p class="text-xs text-slate-400 mt-1">PNG, JPG o WEBP. Tamaño recomendado: 1200x600px</p>
                            </div>
                            <input type="file" class="hidden" accept="image/*">
                        </div>
                    </div>

                    <!-- Etiquetas -->
                    <div class="mb-6">
                        <label for="etiquetas" class="block text-sm font-semibold text-slate-700 mb-2">Etiquetas</label>
                        <input type="text" id="etiquetas" placeholder="Ej: Laravel, PHP, API, MySQL (separadas por coma)"
                            class="w-full px-4 py-3 text-sm border border-slate-200 rounded-xl outline-none focus:ring-2 focus:ring-primary-100 focus:border-primary-300 transition-all">
                        <p class="text-xs text-slate-400 mt-1">Agrega hasta 5 etiquetas para que los clientes encuentren tu
                            servicio fácilmente.</p>
                    </div>

                    <!-- Disponibilidad -->
                    <div class="grid sm:grid-cols-2 gap-4 mb-6">
                        <div>
                            <label for="entrega" class="block text-sm font-semibold text-slate-700 mb-2">Tiempo de entrega
                                estimado</label>
                            <select id="entrega"
                                class="w-full px-4 py-3 text-sm border border-slate-200 rounded-xl outline-none focus:ring-2 focus:ring-primary-100 focus:border-primary-300 transition-all bg-white">
                                <option>Menos de 24 horas</option>
                                <option>1-2 días</option>
                                <option>3-5 días</option>
                                <option>1 semana</option>
                                <option>Más de 1 semana</option>
                                <option>A definir con el cliente</option>
                            </select>
                        </div>
                        <div>
                            <label for="revisiones" class="block text-sm font-semibold text-slate-700 mb-2">Revisiones
                                incluidas</label>
                            <select id="revisiones"
                                class="w-full px-4 py-3 text-sm border border-slate-200 rounded-xl outline-none focus:ring-2 focus:ring-primary-100 focus:border-primary-300 transition-all bg-white">
                                <option>1 revisión</option>
                                <option>2 revisiones</option>
                                <option>3 revisiones</option>
                                <option>Ilimitadas</option>
                                <option>No incluye revisiones</option>
                            </select>
                        </div>
                    </div>

                    <!-- Contacto -->
                    <div class="mb-6">
                        <label class="flex items-start gap-2 cursor-pointer">
                            <input type="checkbox"
                                class="mt-0.5 rounded border-slate-300 text-primary-600 focus:ring-primary-500">
                            <span class="text-sm text-slate-600">Mostrar mi correo electrónico público para consultas
                                rápidas</span>
                        </label>
                    </div>

                    <!-- Nota de verificación -->
                    <div class="mb-6 p-4 bg-primary-50 rounded-xl border border-primary-100">
                        <div class="flex gap-3">
                            <div class="text-primary-600 mt-0.5">ℹ️</div>
                            <div class="text-sm text-primary-800">
                                <p class="font-medium mb-1">Antes de publicar</p>
                                <p class="text-primary-700">Tu servicio será revisado por nuestro equipo. Asegúrate de
                                    cumplir con los <a href="#" class="underline font-medium">Términos de servicio</a>
                                    y las <a href="#" class="underline font-medium">Políticas de publicación</a>. Los
                                    servicios que infrinjan las normas serán eliminados.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Botones -->
                    <div class="flex flex-wrap justify-end gap-3 pt-2">
                        <a href="servicios.html"
                            class="px-6 py-3 text-sm font-semibold text-slate-600 border border-slate-300 rounded-xl hover:bg-slate-100 transition-all">
                            Cancelar
                        </a>
                        <button type="button"
                            class="px-6 py-3 text-sm font-semibold text-slate-600 border border-slate-300 rounded-xl hover:bg-slate-100 transition-all">
                            Guardar borrador
                        </button>
                        <button type="submit"
                            class="px-8 py-3 text-sm font-bold text-white bg-primary-600 rounded-xl hover:bg-primary-700 shadow-md shadow-primary-200 transition-all">
                            Publicar servicio
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
