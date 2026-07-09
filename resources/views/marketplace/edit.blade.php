@extends('main')

@section('Editar Producto')

@section('content')
<div x-data="{
    imagePreview: '{{ $product->image ? Storage::url($product->image) : '' }}',

    preview(event) {
        const file = event.target.files[0];

        if (!file) {
            return;
        }

        this.imagePreview = URL.createObjectURL(file);
    }
}">
    <section class="bg-white border-b border-slate-100 py-10">
        <div class="max-w-3xl mx-auto px-6">
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

    <section class="py-10">
        <div class="max-w-7xl mx-auto px-6">

            <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6 sm:p-8">

                <form
                    action="{{ route('marketplace.update', $product) }}"
                    method="POST"
                    enctype="multipart/form-data"
                    class="space-y-6">

                    @csrf
                    @method('PUT')

                    {{-- Título --}}
                    <div>

                        <label class="block text-sm font-semibold text-slate-700 mb-2">
                            Título
                            <span class="text-red-500">*</span>
                        </label>

                        <input
                            type="text"
                            name="title"
                            value="{{ old('title', $product->title) }}"
                            placeholder="Ej. Curso de Laravel"

                            class="w-full px-4 py-3 text-sm border rounded-xl outline-none
                            @error('title')
                                border-red-300
                            @else
                                border-slate-200
                            @enderror">

                        @error('title')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror

                    </div>

                    {{-- Categoría --}}
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">
                            Categoría
                            <span class="text-red-500">*</span>
                        </label>

                        <select
                            name="category_id"
                            class="w-full px-4 py-3 text-sm border rounded-xl outline-none bg-white
                            @error('category_id')
                                border-red-300 focus:ring-red-100 focus:border-red-400
                            @else
                                border-slate-200 focus:ring-2 focus:ring-primary-100 focus:border-primary-300
                            @enderror">

                            <option value="">Selecciona una categoría</option>

                            @foreach ($categories as $parent)

                                @if ($parent->children->count())

                                    <optgroup label="{{ $parent->name }}">

                                        @foreach ($parent->children as $child)

                                            <option
                                                value="{{ $child->id }}"
                                                @selected(old('category_id', optional($product->category)->id) == $child->id)>

                                                {{ $child->name }}

                                            </option>

                                        @endforeach

                                    </optgroup>

                                @else

                                    <option
                                        value="{{ $parent->id }}"
                                        @selected(old('category_id', optional($product->category)->id) == $parent->id)>

                                        {{ $parent->name }}

                                    </option>

                                @endif

                            @endforeach

                        </select>

                        @error('category_id')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror

                    </div>

                    {{-- Descripción --}}
                    <div>

                        <x-rich-text-editor
                            name="description"
                            label="Contenido"
                            placeholder="Escribe aquí..."
                            :value="old('description', $product->description)"
                            :required="true"
                            height="300px" />

                    </div>

                    <div class="grid gap-6 md:grid-cols-2">

                        {{-- Precio --}}
                        <div>

                            <label class="block text-sm font-semibold text-slate-700 mb-2">
                                Precio
                            </label>

                            <input
                                type="number"
                                name="price"
                                value="{{ old('price', $product->price) }}"
                                step="0.01"
                                min="0"

                                class="w-full px-4 py-3 text-sm border border-slate-200 rounded-xl">

                        </div>

                        {{-- Tipo --}}
                        <div>

                            <label class="block text-sm font-semibold text-slate-700 mb-2">
                                Tipo
                            </label>

                            <select
                                name="type"
                                class="w-full px-4 py-3 text-sm border border-slate-200 rounded-xl">

                                <option value="sale" @selected(old('type', $product->type) == 'sale')>
                                    Venta
                                </option>

                                <option value="exchange" @selected(old('type', $product->type) == 'exchange')>
                                    Intercambio
                                </option>

                                <option value="wanted" @selected(old('type', $product->type) == 'wanted')>
                                    Busco
                                </option>

                            </select>

                        </div>

                    </div>

                    {{-- Ubicación --}}
                    <div>

                        <label class="block text-sm font-semibold text-slate-700 mb-2">
                            Ubicación
                        </label>

                        <input
                            type="text"
                            name="location"
                            value="{{ old('location', $product->location) }}"
                            class="w-full px-4 py-3 text-sm border border-slate-200 rounded-xl">

                    </div>

                    {{-- Imagen --}}
                    <div>

                        <label class="block text-sm font-semibold text-slate-700 mb-2">
                            Imagen
                        </label>

                        <input
                            type="file"
                            name="image"
                            accept=".jpg,.jpeg,.png,.webp"
                            @change="preview($event)"
                            class="block w-full text-sm">

                        @error('image')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror

                        <template x-if="imagePreview">
                            <img
                                :src="imagePreview"
                                class="mt-4 rounded-xl border max-h-72 object-cover">
                        </template>

                    </div>

                    <div class="rounded-xl bg-slate-50 border border-slate-200 p-4">

                        <p class="text-sm text-slate-600">
                            Guarda los cambios cuando hayas terminado de actualizar tu publicación.
                        </p>

                    </div>

                    <div class="flex justify-end gap-3">

                        <a
                            href="{{ route('marketplace.show', $product) }}"
                            class="px-6 py-3 text-sm font-semibold border border-slate-300 rounded-xl hover:bg-slate-100">

                            Cancelar

                        </a>

                        <button
                            type="submit"
                            class="px-8 py-3 bg-primary-600 hover:bg-primary-700 text-white rounded-xl font-semibold">

                            Guardar cambios

                        </button>

                    </div>

                </form>

            </div>

        </div>
    </section>
</div>
@endsection