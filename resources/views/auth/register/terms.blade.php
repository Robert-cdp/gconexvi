<div class="flex items-start gap-2 text-sm">
    <input type="checkbox" id="terms" name="terms"
        class="mt-0.5 rounded border-slate-300 text-primary-600 focus:ring-primary-500">

    <label for="terms" class="text-slate-600">
        Acepto los
        <a href="#" class="text-primary-600 hover:text-primary-700 font-medium">Términos de
            servicio</a>
        y la
        <a href="#" class="text-primary-600 hover:text-primary-700 font-medium">Política de
            privacidad</a>
    </label>
</div>
@error('terms')
    <p class="text-sm text-red-600">{{ $message }}</p>
@enderror
