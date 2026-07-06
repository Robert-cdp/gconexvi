<div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6">
    @guest
        <div class="space-y-3">
            <div class="rounded-xl border border-amber-200 bg-amber-50 p-4">
                <p class="text-sm text-amber-800">
                    Debes iniciar sesión para poder aplicar a esta oferta de empleo.
                </p>
            </div>

            <a href="{{ route('login') }}"
                class="flex w-full items-center justify-center rounded-xl bg-primary-600 px-4 py-3 text-sm font-semibold text-white transition hover:bg-primary-700">
                Iniciar sesión
            </a>

            <a href="{{ route('register') }}"
                class="flex w-full items-center justify-center rounded-xl border border-slate-300 px-4 py-3 text-sm font-semibold text-slate-700 transition hover:bg-slate-50">
                Crear cuenta
            </a>
        </div>
    @endguest
    @auth

        @can('update', $employment)
            <div class="space-y-3">

                <div class="rounded-xl border border-blue-200 bg-blue-50 p-4">
                    <p class="font-semibold text-blue-800">
                        Este empleo te pertenece.
                    </p>

                    <p class="mt-1 text-sm text-blue-700">
                        Puedes editar la información o administrar las solicitudes recibidas.
                    </p>
                </div>

                <a href="{{ route('employments.edit', $employment->slug) }}"
                    class="flex w-full items-center justify-center rounded-xl border border-slate-300 px-4 py-3 text-sm font-semibold text-slate-700 transition hover:bg-slate-50">
                    Editar empleo
                </a>

            </div>
        @else
            @can('create', [App\Models\Conversation::class, $employment])
                <form action="{{ route('chat.conversations.store') }}" method="POST">
                    @csrf

                    <input type="hidden" name="type" value="employment">
                    <input type="hidden" name="id" value="{{ $employment->id }}">

                    <button
                        class="w-full rounded-xl bg-primary-600 px-4 py-3.5 text-sm font-bold text-white shadow-md shadow-primary-200 transition hover:bg-primary-700">
                        Aplicar ahora
                    </button>
                </form>
            @else
                <div class="rounded-xl border border-green-200 bg-green-50 p-4">
                    <p class="font-semibold text-green-800">
                        ✓ Ya aplicaste a esta oferta.
                    </p>

                    <p class="mt-1 text-sm text-green-700">
                        Tu solicitud fue enviada correctamente. Si el empleador está interesado, podrá continuar la conversación
                        contigo.
                    </p>
                </div>
            @endcan
        @endcan
    @endauth
</div>
