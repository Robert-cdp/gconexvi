@extends('main')

@section('title', 'Categorias')

@section('content')
    <div class="max-w-6xl mx-auto px-6 py-10">

        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">
                Categorías
            </h1>

            <a href="{{ route('categories.create') }}" class="px-5 py-2 bg-primary-600 text-white rounded-xl">
                Nueva categoría
            </a>
        </div>

        <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden">

            <table class="w-full">

                <thead class="bg-slate-100">

                    <tr>

                        <th class="text-left p-4">
                            Nombre
                        </th>

                        <th class="text-left p-4">
                            Padre
                        </th>

                        <th class="text-right p-4">
                            Acciones
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($categories as $category)
                        <tr class="border-t">

                            <td class="p-4">
                                {{ $category->name }}
                            </td>

                            <td class="p-4">
                                {{ $category->parent?->name ?? '-' }}
                            </td>

                            <td class="p-4 text-right">

                                <a href="{{ route('categories.edit', $category->slug) }}">
                                    Editar
                                </a>

                            </td>
                        </tr>
                    @empty
                        <tr>

                            <td colspan="3" class="p-6 text-center">
                                No hay categorías.
                            </td>

                        </tr>
                    @endforelse
                </tbody>
            </table>

        </div>

    </div>
@endsection
