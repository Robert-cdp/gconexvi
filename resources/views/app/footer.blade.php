<footer class="bg-slate-900 text-slate-300 pt-16 pb-8">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-10 mb-12">
            <div>
                <h3 class="text-white font-bold text-lg mb-4 flex items-center gap-2">
                    <svg class="w-6 h-6 text-primary-400" fill="currentColor" viewBox="0 0 24 24">
                        <circle cx="12" cy="6" r="4" />
                        <circle cx="6" cy="18" r="4" />
                        <circle cx="18" cy="18" r="4" />
                    </svg>
                    {{ config('app.name') }}
                </h3>
                <p class="text-sm text-slate-400 leading-relaxed">
                    Plataforma comunitaria para encontrar servicios,
                    trabajos, y realizar intercambios P2P de forma segura.
                </p>
            </div>
            <div>
                <h4 class="text-white font-semibold mb-4">Explorar</h4>
                <ul class="space-y-2 text-sm">
                    <li><a href="{{ route('services.index') }}" class="hover:text-white transition-colors">Servicios</a></li>
                    <li><a href="{{ route('employments.index') }}" class="hover:text-white transition-colors">Trabajos</a></li>
                    <li><a href="{{ route('community.index') }}" class="hover:text-white transition-colors">Comunidad</a></li>
                </ul>
            </div>
            <div>
                <h4 class="text-white font-semibold mb-4">Soporte</h4>
                <ul class="space-y-2 text-sm">
                    <li><a href="#" class="hover:text-white transition-colors">Centro de ayuda</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">Términos de servicio</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">Política de privacidad</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">Contacto</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">Reportar problema</a></li>
                </ul>
            </div>
            <div>
                <h4 class="text-white font-semibold mb-4">Contacto</h4>
                <ul class="space-y-2 text-sm">
                    <li class="flex items-center gap-2">Guatemala, Centroamérica</li>
                    <li class="flex items-center gap-2">hola@conecta.com</li>
                    <li class="flex items-center gap-2">+502 2222-3333</li>
                    <li class="flex items-center gap-2">Lun-Vie 8am-6pm</li>
                </ul>
            </div>
        </div>
        <div
            class="border-t border-slate-800 pt-6 flex flex-col sm:flex-row justify-between items-center gap-4 text-sm text-slate-500">
            <p>© 2026 {{ config('app.name') }}. Todos los derechos reservados.</p>
            <div class="flex gap-4">
                <a href="#" class="hover:text-white transition-colors">Privacidad</a>
                <a href="#" class="hover:text-white transition-colors">Términos</a>
                <a href="#" class="hover:text-white transition-colors">Cookies</a>
            </div>
        </div>
    </div>
</footer>
