 <div class="flex items-center gap-4 p-4 bg-white border border-slate-200 rounded-2xl shadow-sm">
     <img src="{{ $service->user->avatar ? Storage::url($service->user->avatar) : asset('storage/images/default-avatar.webp') }}"
         alt="{{ $service->user->name }}" class="w-14 h-14 rounded-full ring-2 ring-primary-100 object-cover">
     <div class="flex-1">
         <p class="font-semibold text-slate-800">{{ $service->user->name }}</p>
         <p class="text-sm text-slate-500">Laravel Developer · 5 años exp.</p>
         <div class="flex items-center gap-1 text-yellow-500 text-sm mt-0.5">⭐ 4.9
             <span class="text-slate-400 font-normal">(128 servicios)</span>
         </div>
     </div>
     <a href="perfil.html"
         class="px-4 py-2 text-sm font-semibold text-primary-700 border border-primary-200 rounded-lg hover:bg-primary-50 transition-colors">Ver
         perfil</a>
 </div>
