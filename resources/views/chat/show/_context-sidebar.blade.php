@php
    $model = $conversation->conversationable;
    $type = method_exists($conversation, 'contextType') ? $conversation->contextType() : class_basename($model);
@endphp

<div class="space-y-6">
    {{-- Encabezado con tipo de recurso --}}
    <div>
        <span class="inline-flex items-center gap-1.5 text-[11px] font-semibold tracking-widest text-primary-600 uppercase mb-3 bg-primary-50 px-2.5 py-1 rounded-full">
            @if($type === 'Service')
                <x-heroicon-o-wrench-screwdriver class="w-3.5 h-3.5" />
                Servicio
            @elseif($type === 'Employment')
                <x-heroicon-o-briefcase class="w-3.5 h-3.5" />
                Empleo
            @else
                <x-heroicon-o-shopping-bag class="w-3.5 h-3.5" />
                Producto
            @endif
        </span>
        <h3 class="text-lg font-semibold text-gray-900 leading-snug break-words mt-2">
            {{ $conversation->contextTitle() ?? $model->title ?? 'Sin título' }}
        </h3>
    </div>

    {{-- Separador sutil --}}
    <div class="border-t border-gray-200/80"></div>

    {{-- Detalles dinámicos --}}
    <div class="space-y-4">
        @if($type === 'Service')
            @if(isset($model->price))
                <div class="flex items-center gap-3 text-sm">
                    <div class="w-8 h-8 rounded-lg bg-primary-50 flex items-center justify-center flex-shrink-0">
                        <x-heroicon-o-currency-dollar class="w-4 h-4 text-primary-500" />
                    </div>
                    <div>
                        <p class="text-xs text-gray-400 font-medium">Precio</p>
                        <p class="text-sm font-semibold text-gray-800">{{ number_format($model->price, 2) }} USD</p>
                    </div>
                </div>
            @endif

            @if(isset($model->categories) && count($model->categories))
                <div class="flex items-start gap-3 text-sm">
                    <div class="w-8 h-8 rounded-lg bg-accent-50 flex items-center justify-center flex-shrink-0">
                        <x-heroicon-o-tag class="w-4 h-4 text-accent-500" />
                    </div>
                    <div>
                        <p class="text-xs text-gray-400 font-medium mb-2">Categorías</p>
                        <div class="flex flex-wrap gap-1.5">
                            @foreach($model->categories as $category)
                                <span class="inline-block bg-gray-100 text-gray-600 text-[11px] font-medium px-2.5 py-1 rounded-full">
                                    {{ $category->name }}
                                </span>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif

            @if(isset($model->location))
                <div class="flex items-center gap-3 text-sm">
                    <div class="w-8 h-8 rounded-lg bg-warm-50 flex items-center justify-center flex-shrink-0">
                        <x-heroicon-o-map-pin class="w-4 h-4 text-warm-500" />
                    </div>
                    <div>
                        <p class="text-xs text-gray-400 font-medium">Ubicación</p>
                        <p class="text-sm font-semibold text-gray-800">{{ $model->location }}</p>
                    </div>
                </div>
            @endif

        @elseif($type === 'Employment')
            @if(isset($model->company))
                <div class="flex items-center gap-3 text-sm">
                    <div class="w-8 h-8 rounded-lg bg-primary-50 flex items-center justify-center flex-shrink-0">
                        <x-heroicon-o-building-office class="w-4 h-4 text-primary-500" />
                    </div>
                    <div>
                        <p class="text-xs text-gray-400 font-medium">Empresa</p>
                        <p class="text-sm font-semibold text-gray-800">{{ $model->company }}</p>
                    </div>
                </div>
            @endif

            @if(isset($model->salary))
                <div class="flex items-center gap-3 text-sm">
                    <div class="w-8 h-8 rounded-lg bg-accent-50 flex items-center justify-center flex-shrink-0">
                        <x-heroicon-o-banknotes class="w-4 h-4 text-accent-500" />
                    </div>
                    <div>
                        <p class="text-xs text-gray-400 font-medium">Salario</p>
                        <p class="text-sm font-semibold text-gray-800">{{ $model->salary }}</p>
                    </div>
                </div>
            @endif

            @if(isset($model->modality))
                <div class="flex items-center gap-3 text-sm">
                    <div class="w-8 h-8 rounded-lg bg-warm-50 flex items-center justify-center flex-shrink-0">
                        <x-heroicon-o-clock class="w-4 h-4 text-warm-500" />
                    </div>
                    <div>
                        <p class="text-xs text-gray-400 font-medium">Modalidad</p>
                        <p class="text-sm font-semibold text-gray-800">{{ $model->modality }}</p>
                    </div>
                </div>
            @endif

        @elseif($type === 'Product')
            @if(isset($model->price))
                <div class="flex items-center gap-3 text-sm">
                    <div class="w-8 h-8 rounded-lg bg-primary-50 flex items-center justify-center flex-shrink-0">
                        <x-heroicon-o-currency-dollar class="w-4 h-4 text-primary-500" />
                    </div>
                    <div>
                        <p class="text-xs text-gray-400 font-medium">Precio</p>
                        <p class="text-sm font-semibold text-gray-800">{{ number_format($model->price, 2) }} USD</p>
                    </div>
                </div>
            @endif
        @endif
    </div>

    {{-- Botón de acción --}}
    <div class="pt-2">
        <a href="{{ $model->url ?? '#' }}"
           class="inline-flex items-center justify-center gap-2 w-full text-sm font-semibold text-primary-600 hover:text-primary-700 hover:bg-primary-50 transition-all duration-200 py-2.5 px-4 rounded-xl">
            <x-heroicon-o-arrow-top-right-on-square class="w-4 h-4" />
            Ver recurso completo
        </a>
    </div>
</div>