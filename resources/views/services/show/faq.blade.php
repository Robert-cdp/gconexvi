<div class="bg-white rounded-2xl border border-slate-200 p-6 shadow-sm" x-data="{ faq1: false, faq2: false, faq3: false }">
    <h2 class="text-xl font-bold text-slate-800 mb-4">Preguntas frecuentes</h2>
    <div class="divide-y border-t border-b">
        <div class="py-3">
            <button @click="faq1 = !faq1"
                class="flex justify-between items-center w-full text-left font-medium text-slate-700 text-sm">
                ¿Cuánto tiempo toma el desarrollo?
                <svg class="w-4 h-4 transition-transform" :class="faq1 ? 'rotate-180' : ''" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>
            <p x-show="faq1" class="text-sm text-slate-500 mt-2">Depende del alcance. Un CRUD básico con
                autenticación toma de 2 a 4 días. Proyectos más complejos pueden tomar hasta 2 semanas.</p>
        </div>
        <div class="py-3">
            <button @click="faq2 = !faq2"
                class="flex justify-between items-center w-full text-left font-medium text-slate-700 text-sm">
                ¿Ofreces soporte después de la entrega?
                <svg class="w-4 h-4 transition-transform" :class="faq2 ? 'rotate-180' : ''" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>
            <p x-show="faq2" class="text-sm text-slate-500 mt-2">Sí, incluye 30 días de soporte para
                corrección de errores. También ofrezco mantenimiento continuo por separado.</p>
        </div>
        <div class="py-3">
            <button @click="faq3 = !faq3"
                class="flex justify-between items-center w-full text-left font-medium text-slate-700 text-sm">
                ¿Puedo solicitar una demo antes de comprar?
                <svg class="w-4 h-4 transition-transform" :class="faq3 ? 'rotate-180' : ''" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>
            <p x-show="faq3" class="text-sm text-slate-500 mt-2">Claro, puedo mostrarte proyectos similares
                que he desarrollado. Contáctame para coordinar una videollamada.</p>
        </div>
    </div>
</div>
