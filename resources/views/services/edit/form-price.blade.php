 <div class="grid md:grid-cols-2 gap-5 mb-6">

     <div>

         <label class="block text-sm font-semibold text-slate-700 mb-2">
             Precio (USD)
         </label>

         <input type="number" name="price" min="0" step="0.01" value="{{ old('price', $service->price) }}"
             class="w-full px-4 py-3 text-sm border rounded-xl outline-none focus:ring-2
                            @error('price')
                                border-red-300 focus:ring-red-100 focus:border-red-400
                            @else
                                border-slate-200 focus:ring-primary-100 focus:border-primary-300
                            @enderror">

         @error('price')
             <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
         @enderror

     </div>

     <div>

         <label class="block text-sm font-semibold text-slate-700 mb-2">
             Tipo de precio
         </label>

         <select name="price_type" class="w-full px-4 py-3 text-sm border rounded-xl bg-white outline-none">
             <option value="fixed" @selected(old('price_type', $service->price_type) == 'fixed')>Precio fijo</option>
             <option value="hourly" @selected(old('price_type', $service->price_type) == 'hourly')>Por hora</option>
             <option value="quote" @selected(old('price_type', $service->price_type) == 'quote')>A convenir</option>
         </select>

     </div>

 </div>
