<div class="mb-6">
    <label class="block text-sm font-semibold text-slate-700 mb-2">
        Categoría
        <span class="text-red-500">*</span>
    </label>

    <select name="category_id"
        class="w-full px-4 py-3 text-sm border rounded-xl outline-none focus:ring-2 bg-white
                        @error('category_id')
                            border-red-300 focus:ring-red-100 focus:border-red-400
                        @else
                            border-slate-200 focus:ring-primary-100 focus:border-primary-300
                        @enderror">

        <option value="">Selecciona una categoría</option>

        @foreach ($categories as $parent)
            @if ($parent->children->count())
                <optgroup label="{{ $parent->name }}">
                    @foreach ($parent->children as $child)
                        <option value="{{ $child->id }}" @selected(old('category_id', $employment->category?->id) == $child->id)>
                            {{ $child->name }}
                        </option>
                    @endforeach
                </optgroup>
            @else
                <option value="{{ $parent->id }}" @selected(old('category_id') == $parent->id)>
                    {{ $parent->name }}
                </option>
            @endif
        @endforeach

    </select>

    @error('category_id')
        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>
