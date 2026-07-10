 <div class="relative h-64 sm:h-80 lg:h-96 bg-slate-200 overflow-hidden">
     @if ($product->image)
         <div class="absolute inset-0 bg-cover bg-center bg-no-repeat"
             style="background-image: url('{{ Storage::url($product->image) }}')"></div>
         <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-black/20 to-transparent"></div>
     @else
         <div class="absolute inset-0 flex flex-col items-center justify-center gap-2 text-slate-400">
             <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                     d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14M6 6h.01M4 6h16v12H4V6z" />
             </svg>
             <span class="text-sm font-medium">Sin imagen disponible</span>
         </div>
     @endif
 </div>
