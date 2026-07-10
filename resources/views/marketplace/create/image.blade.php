<div>

    <label class="block text-sm font-semibold text-slate-700 mb-2">
        Imagen
    </label>

    <input type="file" name="image" accept=".jpg,.jpeg,.png,.webp" @change="preview($event)"
        class="block w-full text-sm">

    @error('image')
        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
    @enderror

    <template x-if="imagePreview">

        <img :src="imagePreview" class="mt-4 rounded-xl border max-h-72 object-cover">

    </template>

</div>
