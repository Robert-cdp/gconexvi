 <div class="flex flex-wrap justify-end gap-3">

    <a href="{{ route('services.index') }}" class="px-6 py-3 text-sm font-semibold border border-slate-300 rounded-xl hover:bg-slate-100 transition">
        Cancelar
    </a>

    <button type="submit" onclick="document.getElementById('status').value='draft'" class="px-6 py-3 text-sm font-semibold border border-slate-300 rounded-xl hover:bg-slate-100 transition">
        Guardar borrador
    </button>

    <button type="submit" onclick="document.getElementById('status').value='pending'" class="px-8 py-3 text-sm font-bold text-white bg-primary-600 rounded-xl hover:bg-primary-700 shadow-md transition">
        Actualizar servicio
    </button>

 </div>
