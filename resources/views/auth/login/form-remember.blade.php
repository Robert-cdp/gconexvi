<div class="flex items-center justify-between text-sm">
    <label class="flex items-center gap-2 cursor-pointer">
        <input type="checkbox" name="remember"
            class="rounded border-slate-300 text-primary-600 focus:ring-primary-500">
        <span class="text-slate-600">Recordarme</span>
    </label>

    <a href="{{ route('password.request') }}"
        class="text-primary-600 hover:text-primary-700 font-medium">
        ¿Olvidaste tu contraseña?
    </a>
</div>
