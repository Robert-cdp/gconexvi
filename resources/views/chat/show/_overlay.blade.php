<div x-show="sidebarOpen" class="fixed inset-0 z-50 lg:hidden" x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0" @click.self="sidebarOpen = false">
    <div class="absolute inset-0 bg-black/40 backdrop-blur-sm"></div>
    <div class="relative w-80 max-w-[85vw] h-full bg-white shadow-2xl border-r border-gray-200 overflow-y-auto"
        @click.outside="sidebarOpen = false">
        <div class="flex items-center justify-between p-4 border-b border-gray-100">
            <h2 class="font-semibold text-gray-800">Detalles</h2>
            <button @click="sidebarOpen = false" class="p-1.5 rounded-lg hover:bg-gray-100 transition">
                <x-heroicon-o-x-mark class="w-5 h-5 text-gray-400" />
            </button>
        </div>
        <div class="p-5">
            @include('chat.show._context-sidebar')
        </div>
    </div>
</div>
