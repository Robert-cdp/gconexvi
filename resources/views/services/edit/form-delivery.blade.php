<div class="grid md:grid-cols-2 gap-5 mb-8">

    <div>
        <label class="block text-sm font-semibold text-slate-700 mb-2">Tiempo de entrega</label>
        <select name="delivery_time" class="w-full px-4 py-3 text-sm border border-slate-200 rounded-xl bg-white">
            <option value="24h" @selected(old('delivery_time', $service->delivery_time) == '24h')>Menos de 24 horas</option>
            <option value="2d" @selected(old('delivery_time', $service->delivery_time) == '2d')>1-2 días</option>
            <option value="5d" @selected(old('delivery_time', $service->delivery_time) == '5d')>3-5 días</option>
            <option value="1w" @selected(old('delivery_time', $service->delivery_time) == '1w')>1 semana</option>
            <option value="more" @selected(old('delivery_time', $service->delivery_time) == 'more')>Más de una semana</option>
            <option value="custom" @selected(old('delivery_time', $service->delivery_time) == 'custom')>A definir</option>
        </select>
    </div>

    <div>
        <label class="block text-sm font-semibold text-slate-700 mb-2">Revisiones</label>
        <select name="revisions" class="w-full px-4 py-3 text-sm border border-slate-200 rounded-xl bg-white">
            <option value="0" @selected(old('revisions', $service->revisions) == '0')>Sin revisiones</option>
            <option value="1" @selected(old('revisions', $service->revisions) == '1')>1 revisión</option>
            <option value="2" @selected(old('revisions', $service->revisions) == '2')>2 revisiones</option>
            <option value="3" @selected(old('revisions', $service->revisions) == '3')>3 revisiones</option>
            <option value="unlimited" @selected(old('revisions', $service->revisions) == 'unlimited')>Ilimitadas</option>
        </select>
    </div>

</div>
