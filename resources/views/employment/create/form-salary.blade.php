<div class="grid sm:grid-cols-2 gap-4">
    <div>
        <label for="salary_min" class="block text-sm font-semibold text-slate-700 mb-2">
            Salario mínimo (USD)
        </label>

        <input
            type="number"
            id="salary_min"
            name="salary_min"
            x-model="salaryMin"
            value="{{ old('salary_min') }}"
            placeholder="Ej: 5000"
            min="0"
            class="w-full px-4 py-3 text-sm border rounded-xl outline-none transition-all focus:ring-2 focus:ring-primary-100 focus:border-primary-300 {{ $errors->has('salary_min') ? 'border-red-500' : 'border-slate-200' }}">

        @error('salary_min')
            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="salary_max" class="block text-sm font-semibold text-slate-700 mb-2">
            Salario máximo (USD)
        </label>

        <input
            type="number"
            id="salary_max"
            name="salary_max"
            x-model="salaryMax"
            value="{{ old('salary_max') }}"
            placeholder="Ej: 8000"
            min="0"
            class="w-full px-4 py-3 text-sm border rounded-xl outline-none transition-all focus:ring-2 focus:ring-primary-100 focus:border-primary-300 {{ $errors->has('salary_max') ? 'border-red-500' : 'border-slate-200' }}">

        @error('salary_max')
            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
        @enderror
    </div>
</div>