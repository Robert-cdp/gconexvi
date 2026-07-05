<div>
    <label for="password" class="block text-sm font-semibold text-slate-700 mb-1">
        Contraseña
    </label>

    <input type="password" id="password" name="password"
        class="w-full px-4 py-3 text-sm border rounded-xl outline-none transition-all {{ $errors->has('password') ? 'border-red-500 focus:ring-red-200 focus:border-red-500' : 'border-slate-200 focus:ring-primary-100 focus:border-primary-300' }}"
        placeholder="••••••••">

    @if ($errors->has('password'))
        <p class="mt-1 text-sm text-red-600">
            {{ $errors->first('password') }}
        </p>
    @endif
</div>
