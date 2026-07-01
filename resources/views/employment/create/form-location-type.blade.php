<div class="grid sm:grid-cols-2 gap-4">
    <div>
        <label for="type" class="block text-sm font-semibold text-slate-700 mb-2">
            Modalidad <span class="text-red-500">*</span>
        </label>

        <select
            id="type"
            name="type"
            x-model="type"
            required
            class="w-full px-4 py-3 text-sm border rounded-xl outline-none transition-all bg-white focus:ring-2 focus:ring-primary-100 focus:border-primary-300 {{ $errors->has('type') ? 'border-red-500' : 'border-slate-200' }}">

            <option value="" disabled {{ old('type') ? '' : 'selected' }}>Selecciona una modalidad</option>
            <option value="remote" @selected(old('type') === 'remote')>Remoto</option>
            <option value="hybrid" @selected(old('type') === 'hybrid')>Híbrido</option>
            <option value="onsite" @selected(old('type') === 'onsite')>Presencial</option>
        </select>

        @error('type')
            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="location" class="block text-sm font-semibold text-slate-700 mb-2">
            Ubicación
        </label>

        <input
            type="text"
            id="location"
            name="location"
            value="{{ old('location') }}"
            placeholder="Ej: Ciudad de Guatemala"
            class="w-full px-4 py-3 text-sm border rounded-xl outline-none transition-all focus:ring-2 focus:ring-primary-100 focus:border-primary-300 {{ $errors->has('location') ? 'border-red-500' : 'border-slate-200' }}">

        @error('location')
            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
        @enderror
    </div>
</div>