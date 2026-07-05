<div>
    <label for="email" class="block text-sm font-semibold text-slate-700 mb-1">
        Correo electrónico
    </label>

    <input type="email" id="email" name="email" value="{{ old('email') }}"
        class="w-full px-4 py-3 text-sm border rounded-xl outline-none transition-all {{ $errors->has('email') ? 'border-red-500 focus:ring-red-200 focus:border-red-500' : 'border-slate-200 focus:ring-primary-100 focus:border-primary-300' }}"
        placeholder="tu@email.com">

    @if ($errors->has('email'))
        <p class="mt-1 text-sm text-red-600">
            {{ $errors->first('email') }}
        </p>
    @endif
</div>
