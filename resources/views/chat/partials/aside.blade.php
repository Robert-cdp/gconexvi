<aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
    class="fixed lg:relative inset-y-0 left-0 z-30 w-80 lg:w-96 bg-white border-r border-gray-200 shadow-xl lg:shadow-none transform transition-transform duration-300 ease-in-out lg:translate-x-0 lg:flex lg:flex-col">
    <div class="p-6 border-b border-gray-100">
        <h3 class="text-sm font-semibold text-gray-400 uppercase tracking-wide">Detalles</h3>
    </div>

    <div class="flex-1 overflow-y-auto p-6 space-y-6">
        {{-- Imagen o placeholder --}}
        {{-- <div class="aspect-[4/3] rounded-2xl bg-gray-100 overflow-hidden flex items-center justify-center">
            @if ($conversation->conversationable->cover ?? false)
                <img src="{{ Storage::url($conversation->conversationable->cover) }}"
                    alt="{{ $conversation->conversationable->title ?? '' }}" class="w-full h-full object-cover">
            @else
                <svg class="w-12 h-12 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
            @endif
        </div> --}}

        {{-- Información según tipo polimórfico --}}
        @php
            $type = strtolower(class_basename($conversation->conversationable));
            $item = $conversation->conversationable;
        @endphp

        <div class="space-y-3">
            <h2 class="text-xl font-semibold text-gray-900 leading-tight">
                {{ $item->title ?? 'Sin título' }}
            </h2>

            @if ($item->price ?? false)
                <p class="text-lg font-medium text-emerald-600">
                    {{ number_format($item->price, 2) }} usd
                </p>
            @endif

            {{-- Campos específicos de Service --}}
            @if ($type === 'service' && $item->categories->isNotEmpty())
                <div class="flex items-center gap-2 text-sm text-gray-500">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                    </svg>

                    <span>{{ $item->categories->pluck('name')->join(', ') }}</span>
                </div>
            @endif
            @if ($type === 'service' && ($item->location ?? false))
                <div class="flex items-center gap-2 text-sm text-gray-500">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <span>{{ $item->location }}</span>
                </div>
            @endif

            {{-- Campos específicos de Employment --}}
            @if ($type === 'employment' && ($item->company ?? false))
                <p class="text-sm text-gray-700 font-medium">{{ $item->company }}</p>
            @endif
            @if ($type === 'employment' && ($item->salary ?? false))
                <p class="text-sm text-gray-500">{{ $item->salary }}</p>
            @endif
            @if ($type === 'employment' && ($item->modality ?? false))
                <p class="text-sm text-gray-500 capitalize">{{ $item->modality }}</p>
            @endif
        </div>

        {{-- Botón de acción --}}
        @if ($type === 'service')
            <a href="{{ route('services.show', $item) }}"
                class="block w-full text-center px-4 py-2.5 border border-gray-200 rounded-xl text-sm font-medium text-blue-600 hover:bg-blue-50 hover:border-blue-200 transition focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                Ver servicio
            </a>
        @elseif($type === 'product')
            <a href="#"
                class="block w-full text-center px-4 py-2.5 border border-gray-200 rounded-xl text-sm font-medium text-blue-600 hover:bg-blue-50 hover:border-blue-200 transition focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                Ver producto
            </a>
        @elseif($type === 'employment')
            <a href="#"
                class="block w-full text-center px-4 py-2.5 border border-gray-200 rounded-xl text-sm font-medium text-blue-600 hover:bg-blue-50 hover:border-blue-200 transition focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                Ver empleo
            </a>
        @endif
    </div>
</aside>
