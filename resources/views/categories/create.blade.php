@extends('main')

@section('Crear Categoria')

@section('content')

<div class="max-w-3xl mx-auto bg-white rounded-2xl border border-slate-200 p-6">

    <h1 class="text-xl font-bold mb-6">
        Crear categoría
    </h1>

    <form action="{{ route('categories.store') }}" method="POST" class="space-y-5">

        @csrf

        <div>

            <label class="block mb-1 font-medium">
                Nombre
            </label>

            <input
                type="text"
                name="name"
                value="{{ old('name') }}"
                class="w-full border rounded-xl px-4 py-2">

            @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror

        </div>

        <div>

            <label class="block mb-1 font-medium">
                Categoría padre
            </label>

            <select
                name="parent_id"
                class="w-full border rounded-xl px-4 py-2">

                <option value="">Ninguna</option>

                @foreach($categories as $parent)

                    <option
                        value="{{ $parent->id }}"
                        @selected(old('parent_id') == $parent->id)>
                        {{ $parent->name }}
                    </option>

                @endforeach

            </select>

        </div>

        <button class="px-6 py-2 bg-primary-600 text-white rounded-xl">
            Guardar
        </button>

    </form>

</div>

@endsection