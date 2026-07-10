<div class="grid gap-6 md:grid-cols-2">

    {{-- Precio --}}
    <div>

        <label class="block text-sm font-semibold text-slate-700 mb-2">
            Precio
        </label>

        <input type="number" name="price" value="{{ old('price') }}" step="0.01" min="0"
            class="w-full px-4 py-3 text-sm border rounded-xl">

    </div>

    {{-- Tipo --}}
    <div>

        <label class="block text-sm font-semibold text-slate-700 mb-2">
            Tipo
        </label>

        <select name="type" class="w-full px-4 py-3 text-sm border border-slate-200 rounded-xl">

            <option value="sale" @selected(old('type') == 'sale')>
                Venta
            </option>

            <option value="exchange" @selected(old('type') == 'exchange')>
                Intercambio
            </option>

            <option value="wanted" @selected(old('type') == 'wanted')>
                Busco
            </option>

        </select>

    </div>

</div>
