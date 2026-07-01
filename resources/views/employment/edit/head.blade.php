<section class="bg-white border-b border-slate-100 py-12">
    <div class="max-w-7xl mx-auto px-6">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <h1 class="text-3xl lg:text-4xl font-extrabold text-slate-900">
                    Editar oferta laboral
                </h1>
                <p class="mt-2 text-slate-500">
                    Actualiza la información de tu oferta laboral para mantenerla al día y atraer a los candidatos adecuados.
                </p>
            </div>

            <a href="{{ route('employments.show', $employment) }}"
                class="self-start inline-flex items-center gap-2 px-4 py-2 text-sm font-semibold text-slate-600 border border-slate-300 rounded-xl hover:bg-slate-100 transition-all">
                Regresar
            </a>
        </div>
    </div>
</section>