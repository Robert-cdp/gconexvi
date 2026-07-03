<div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6 space-y-3">

    @can('create', [App\Models\Conversation::class, $employment])
        <form action="{{ route('chat.conversations.store') }}" method="POST">
            @csrf

            <input type="hidden" name="type" value="employment">
            <input type="hidden" name="id" value="{{ $employment->id }}">

            <button
                class="w-full py-3.5 bg-primary-600 text-white font-bold rounded-xl hover:bg-primary-700 shadow-md shadow-primary-200 transition-all text-sm">
                Aplicar ahora
            </button>
        </form>
    @endcan

    @can('update', $employment)
        <a href="{{ route('employments.edit', $employment->slug) }}"
            class="w-full flex items-center justify-center py-3 border border-slate-300 text-slate-700 font-semibold rounded-xl hover:bg-slate-50 hover:border-slate-400 active:scale-[.98] transition-all text-sm rounded-xl">
            Editar empleo
        </a>
    @endcan

</div>