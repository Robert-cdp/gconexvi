<div>

    <label class="block text-sm font-semibold text-slate-700 mb-2">
        Título
        <span class="text-red-500">*</span>
    </label>

    <input type="text" name="title" value="{{ old('title', $product->title) }}" placeholder="Ej. Curso de Laravel"
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
