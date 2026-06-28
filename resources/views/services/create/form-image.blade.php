<div class="mb-6">

    <label class="block text-sm font-semibold text-slate-700 mb-2">
        Imágenes del servicio
    </label>

    <input type="file" name="images[]" multiple accept=".jpg,.jpeg,.png,.webp"
        class="block w-full text-sm border border-slate-200 rounded-xl p-3 file:mr-4 file:px-4 file:py-2 file:border-0 file:bg-primary-100 file:text-primary-700 file:rounded-lg file:cursor-pointer">

    <p class="text-xs text-slate-400 mt-2">
        Puedes subir hasta 5 imágenes.
    </p>

    @error('images')
        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
    @enderror

    @error('images.*')
        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
    @enderror

</div>
