<section class="bg-white border-b border-slate-100 py-10">
    <div class="max-w-7xl mx-auto px-6">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-extrabold text-slate-900">
                    Editar producto
                </h1>

                <p class="mt-1 text-slate-500">
                    Actualiza la información de tu publicación.
                </p>
            </div>

            <a href="{{ route('marketplace.show', $product) }}"
                class="hidden sm:inline-flex items-center gap-2 px-4 py-2 text-sm font-semibold text-slate-600 border border-slate-300 rounded-xl hover:bg-slate-100 transition-all">

                Volver al producto
            </a>
        </div>
    </div>
</section>
