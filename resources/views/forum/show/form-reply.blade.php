@auth
<div class="mt-8 bg-white rounded-xl border border-slate-200 shadow-sm p-5 sm:p-6">
    <form action="{{ route('reply.store', $topic) }}" method="POST">
        @csrf
        <x-rich-text-editor name="content" label="Tu Respuesta" placeholder="Escribe aquí..." :value="old('content', $post->content ?? '')"
            :required="true" height="280px" />

        <div class="flex justify-end gap-3 mt-3">
            <button type="submit"
                class="px-6 py-2.5 bg-primary-600 text-white text-sm font-bold rounded-lg hover:bg-primary-700 shadow-sm transition-all">
                Publicar respuesta
            </button>
        </div>
    </form>
</div>
@endauth