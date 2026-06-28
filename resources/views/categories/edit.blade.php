@extends('main')

@section('Editar Categoria')

@section('content')
    <div class="max-w-6xl mx-auto  py-10 bg-white rounded-2xl border border-slate-200 shadow-sm p-6">

        <h2 class="text-xl font-bold text-slate-800 mb-6">
            Editar categoría
        </h2>

        <form action="{{ route('categories.update', $category->slug) }}" method="POST" class="space-y-5">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">
                    Nombre
                </label>

                <input type="text" name="name" value="{{ old('name', $category->name) }}"
                    class="w-full px-4 py-2.5 text-sm border rounded-xl outline-none focus:ring-2
                    @error('name')
                        border-red-300 focus:ring-red-100 focus:border-red-400
                    @else
                        border-slate-200 focus:ring-primary-100 focus:border-primary-300
                    @enderror">

                @error('name')
                    <p class="mt-1 text-sm text-red-600">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">
                    Categoría padre
                </label>

                <select name="parent_id"
                    class="w-full px-4 py-2.5 text-sm border rounded-xl outline-none focus:ring-2
                    @error('parent_id')
                        border-red-300 focus:ring-red-100 focus:border-red-400
                    @else
                        border-slate-200 focus:ring-primary-100 focus:border-primary-300
                    @enderror">

                    <option value="">Sin categoría padre</option>

                    @foreach ($categories as $parent)
                        <option value="{{ $parent->id }}" @selected(old('parent_id', $category->parent_id) == $parent->id)>
                            {{ $parent->name }}
                        </option>
                    @endforeach

                </select>

                @error('parent_id')
                    <p class="mt-1 text-sm text-red-600">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div class="flex items-center gap-3 pt-2">

                <button type="submit"
                    class="px-6 py-2.5 bg-primary-600 text-white text-sm font-semibold rounded-xl hover:bg-primary-700 shadow-sm transition-all">
                    Guardar cambios
                </button>

                <a href="{{ route('categories.index') }}"
                    class="px-6 py-2.5 border border-slate-300 text-slate-700 text-sm font-semibold rounded-xl hover:bg-slate-100 transition-all">
                    Cancelar
                </a>

            </div>

        </form>

    </div>
@endsection
