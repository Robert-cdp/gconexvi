@extends('main')

@section('title', 'Editar Categoría')

@section('content')
    <div class="max-w-4xl mx-auto px-6 py-10">

        <div class="mb-8">
            <h1 class="text-3xl font-bold text-slate-900">
                Editar categoría
            </h1>

            <p class="mt-2 text-sm text-slate-600">
                Actualiza la información de la categoría y los módulos donde estará disponible.
            </p>
        </div>

        <form action="{{ route('categories.update', $category->slug) }}" method="POST" class="space-y-6">

            @csrf
            @method('PUT')

            <div class="bg-white border border-slate-200 rounded-2xl shadow-sm">

                <div class="border-b border-slate-200 px-6 py-4">
                    <h2 class="font-semibold text-slate-900">
                        Información general
                    </h2>
                </div>

                <div class="p-6">

                    <div class="mb-6">
                        <label for="name" class="block text-sm font-semibold text-slate-700 mb-2">
                            Nombre
                            <span class="text-red-500">*</span>
                        </label>

                        <p class="mb-3 text-sm text-slate-500">
                            Escribe un nombre descriptivo para identificar la categoría.
                        </p>

                        <input
                            id="name"
                            type="text"
                            name="name"
                            value="{{ old('name', $category->name) }}"
                            placeholder="Ej. Programación Web"
                            class="w-full px-4 py-3 text-sm border rounded-xl outline-none transition
                                @error('name')
                                    border-red-300 focus:ring-2 focus:ring-red-100 focus:border-red-400
                                @else
                                    border-slate-200 focus:ring-2 focus:ring-primary-100 focus:border-primary-300
                                @enderror">

                        @error('name')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="parent_id" class="block text-sm font-semibold text-slate-700 mb-2">
                            Categoría padre
                        </label>

                        <p class="mb-3 text-sm text-slate-500">
                            Opcional. Selecciona una categoría superior para organizar esta categoría dentro de una jerarquía.
                        </p>

                        <select
                            id="parent_id"
                            name="parent_id"
                            class="w-full px-4 py-3 text-sm border rounded-xl outline-none transition
                                @error('parent_id')
                                    border-red-300 focus:ring-2 focus:ring-red-100 focus:border-red-400
                                @else
                                    border-slate-200 focus:ring-2 focus:ring-primary-100 focus:border-primary-300
                                @enderror">

                            <option value="">Sin categoría padre</option>

                            @foreach ($categories as $parent)
                                <option
                                    value="{{ $parent->id }}"
                                    @selected(old('parent_id', $category->parent_id) == $parent->id)>
                                    {{ $parent->name }}
                                </option>
                            @endforeach

                        </select>

                        @error('parent_id')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                </div>

            </div>

            <div class="bg-white border border-slate-200 rounded-2xl shadow-sm">

                <div class="border-b border-slate-200 px-6 py-4">
                    <h2 class="font-semibold text-slate-900">
                        Módulos disponibles
                    </h2>

                    <p class="text-sm text-slate-500 mt-1">
                        Selecciona uno o varios módulos donde esta categoría podrá utilizarse.
                    </p>
                </div>

                <div class="p-6">

                    @php
                        $selectedContexts = old(
                            'contexts',
                            $category->contexts->pluck('context')->toArray(),
                        );
                    @endphp

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">

                        @foreach ($contexts as $context)
                            <label
                                class="flex items-center gap-3 rounded-xl border border-slate-200 p-4 cursor-pointer transition hover:border-primary-500 hover:bg-primary-50">

                                <input
                                    type="checkbox"
                                    name="contexts[]"
                                    value="{{ $context }}"
                                    @checked(in_array($context, $selectedContexts))
                                    class="rounded border-slate-300 text-primary-600 focus:ring-primary-500">

                                <span class="font-medium text-slate-700">
                                    {{ Str::headline($context) }}
                                </span>

                            </label>
                        @endforeach

                    </div>

                    @error('contexts')
                        <p class="mt-4 text-sm text-red-600">{{ $message }}</p>
                    @enderror

                    @error('contexts.*')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror

                </div>

            </div>

            <div class="flex items-center justify-end gap-3">

                <a href="{{ route('categories.index') }}"
                    class="px-5 py-2.5 rounded-xl border border-slate-300 text-slate-700 hover:bg-slate-50 transition">
                    Cancelar
                </a>

                <button
                    type="submit"
                    class="px-6 py-2.5 rounded-xl bg-primary-600 text-white hover:bg-primary-700 transition">
                    Actualizar categoría
                </button>

            </div>

        </form>

    </div>
@endsection