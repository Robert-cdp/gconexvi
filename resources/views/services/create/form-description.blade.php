<div class="mb-6">
    <label class="block text-sm font-semibold text-slate-700 mb-2">
        Descripción
        <span class="text-red-500">*</span>
    </label>

    <textarea name="description" rows="6" placeholder="Describe detalladamente tu servicio..."
        class="w-full px-4 py-3 text-sm border rounded-xl outline-none resize-y focus:ring-2 transition
                        @error('description')
                            border-red-300 focus:ring-red-100 focus:border-red-400
                        @else
                            border-slate-200 focus:ring-primary-100 focus:border-primary-300
                        @enderror">{{ old('description') }}</textarea>

    <p class="text-xs text-slate-400 mt-2">
        Mínimo 50 caracteres.
    </p>

    @error('description')
        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>
