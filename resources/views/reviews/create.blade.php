@extends('main')

@section('title', 'Dejar reseña')

@section('content')
    <section class="max-w-3xl mx-auto px-6 py-10">

        <div class="mb-8">
            <h1 class="text-3xl font-bold text-slate-900">
                Dejar una reseña
            </h1>
            <p class="mt-2 text-slate-600">
                Comparte tu experiencia con este servicio. Tu opinión ayudará a otros usuarios.
            </p>
        </div>

        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6 sm:p-8">
            <form action="{{ route('services.reviews.store', $service) }}" method="POST" class="space-y-8">
                @csrf

                <div x-data="{ rating: {{ old('rating', 0) }} }">
                    <label class="block text-sm font-medium text-slate-700 mb-3">
                        Calificación <span class="text-red-500">*</span>
                    </label>

                    <input type="hidden" name="rating" x-model="rating">

                    <div class="flex items-center gap-2">
                        @for ($i = 1; $i <= 5; $i++)
                            <button type="button" @click="rating = {{ $i }}" class="focus:outline-none"
                                :title="'{{ $i }} estrella{{ $i > 1 ? 's' : '' }}'">
                                <svg class="w-9 h-9 transition duration-150"
                                    :class="rating >= {{ $i }} ?
                                        'text-yellow-400' :
                                        'text-slate-300 hover:text-yellow-300'"
                                    fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.176 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81H7.03a1 1 0 00.95-.69l1.07-3.292z" />
                                </svg>
                            </button>
                        @endfor
                    </div>

                    <p class="mt-3 text-sm text-slate-500" x-show="rating > 0">
                        Has seleccionado
                        <span class="font-semibold" x-text="rating"></span>
                        <span x-text="rating == 1 ? 'estrella' : 'estrellas'"></span>.
                    </p>

                    @error('rating')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="comment" class="block text-sm font-medium text-slate-700 mb-2">
                        Comentario
                    </label>

                    <textarea id="comment" name="comment" rows="6"
                        placeholder="Cuéntanos cómo fue tu experiencia con este servicio..."
                        class="block w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-700 placeholder:text-slate-400 shadow-sm resize-none transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 focus:outline-none">{{ old('comment') }}</textarea>

                    @error('comment')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-end gap-3 border-t border-slate-200 pt-6">
                    <a href="{{ route('services.show', $service) }}"
                        class="px-5 py-2.5 rounded-xl border border-slate-300 text-slate-700 hover:bg-slate-50 transition">
                        Cancelar
                    </a>

                    <button type="submit"
                        class="px-6 py-2.5 rounded-xl bg-indigo-600 text-white hover:bg-indigo-700 transition">
                        Publicar reseña
                    </button>
                </div>
            </form>
        </div>

    </section>
@endsection
