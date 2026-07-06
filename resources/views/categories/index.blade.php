@extends('main')

@section('title', 'Categorías')

@section('content')
    <div class="max-w-7xl mx-auto px-6 py-10">

        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8">

            <div>
                <h1 class="text-3xl font-bold text-slate-900">
                    Categorías
                </h1>

                <p class="mt-2 text-sm text-slate-600">
                    Administra las categorías y los módulos donde estarán disponibles.
                </p>
            </div>

            <a href="{{ route('categories.create') }}"
                class="inline-flex items-center gap-2 rounded-xl bg-primary-600 px-5 py-3 text-sm font-medium text-white transition hover:bg-primary-700">

                <i class="fa-solid fa-plus"></i>

                Nueva categoría
            </a>

        </div>

        <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

            <table class="min-w-full">

                <thead class="border-b border-slate-200 bg-slate-50">

                    <tr>

                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-slate-600">
                            Categoría
                        </th>

                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-slate-600">
                            Padre
                        </th>

                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-slate-600">
                            Módulos
                        </th>

                        <th class="px-6 py-4 text-right text-xs font-semibold uppercase tracking-wider text-slate-600">
                            Acciones
                        </th>

                    </tr>

                </thead>

                <tbody class="divide-y divide-slate-100">

                    @forelse ($categories as $category)

                        <tr class="hover:bg-slate-50 transition">

                            <td class="px-6 py-5">

                                <div class="font-semibold text-slate-900">
                                    {{ $category->name }}
                                </div>

                                <div class="mt-1 text-xs text-slate-500">
                                    {{ $category->slug }}
                                </div>

                            </td>

                            <td class="px-6 py-5">

                                @if ($category->parent)
                                    <span class="text-slate-700">
                                        {{ $category->parent->name }}
                                    </span>
                                @else
                                    <span class="text-slate-400">
                                        Sin categoría padre
                                    </span>
                                @endif

                            </td>

                            <td class="px-6 py-5">

                                <div class="flex flex-wrap gap-2">

                                    @foreach ($category->contexts as $context)

                                        <span
                                            class="inline-flex items-center rounded-full bg-primary-50 px-3 py-1 text-xs font-medium text-primary-700">

                                            {{ Str::headline($context->context) }}

                                        </span>

                                    @endforeach

                                </div>

                            </td>

                            <td class="px-6 py-5">

                                <div class="flex justify-end gap-2">

                                    <a href="{{ route('categories.edit', $category->slug) }}"
                                        class="inline-flex items-center gap-2 rounded-lg border border-slate-200 px-4 py-2 text-sm font-medium text-slate-700 transition hover:border-primary-300 hover:bg-primary-50 hover:text-primary-700">

                                        <i class="fa-solid fa-pen"></i>

                                        Editar

                                    </a>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="4" class="px-6 py-16 text-center">

                                <div class="flex flex-col items-center">

                                    <i class="fa-solid fa-folder-open text-5xl text-slate-300"></i>

                                    <h3 class="mt-4 text-lg font-semibold text-slate-800">
                                        No hay categorías registradas
                                    </h3>

                                    <p class="mt-2 text-sm text-slate-500">
                                        Crea la primera categoría para comenzar a organizar el contenido.
                                    </p>

                                </div>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>
@endsection