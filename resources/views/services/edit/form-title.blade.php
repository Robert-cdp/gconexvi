<div class="mb-6">
    <label class="block text-sm font-semibold text-slate-700 mb-2">
        Título del servicio
        <span class="text-red-500">*</span>
    </label>

    <input type="text" name="title" value="{{ old('title', $service->title) }}" placeholder="Ej: Desarrollo de APIs REST con Laravel"
        class="w-full px-4 py-3 text-sm border rounded-xl outline-none focus:ring-2 transition
                        @error('title')
                            border-red-300 focus:ring-red-100 focus:border-red-400
                        @else
                            border-slate-200 focus:ring-primary-100 focus:border-primary-300
                        @enderror">

    @error('title')
        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>
