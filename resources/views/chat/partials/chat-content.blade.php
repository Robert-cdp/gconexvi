<div class="flex-1 overflow-y-auto px-4 lg:px-6 py-6 space-y-8" id="messages-container">
    @if ($conversation->messages->isEmpty())
        {{-- Estado vacío --}}
        <div class="flex flex-col items-center justify-center h-full text-gray-300 select-none">
            <svg class="w-16 h-16 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                    d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
            </svg>
            <p class="text-base font-medium text-gray-400">Aún no hay mensajes</p>
            <p class="text-sm text-gray-300 mt-1">Inicia la conversación.</p>
        </div>
    @else
        @foreach ($conversation->messages as $message)
            @php
                $isOwn = $message->user->id === auth()->id();
            @endphp
            <div class="flex {{ $isOwn ? 'justify-end' : 'justify-start' }} gap-x-3">
                {{-- Avatar del otro usuario --}}
                @if (!$isOwn)
                    <div class="flex-shrink-0 w-8 h-8 rounded-full bg-gray-200 overflow-hidden mt-1">
                        @if ($message->user->avatar ?? false)
                            <img src="{{ $message->user->avatar }}" alt="{{ $message->user->name }}"
                                class="w-full h-full object-cover">
                        @else
                            <div
                                class="w-full h-full flex items-center justify-center text-xs text-gray-400 font-medium">
                                {{ strtoupper(substr($message->user->name, 0, 2)) }}
                            </div>
                        @endif
                    </div>
                @endif

                <div class="max-w-[80%] lg:max-w-[70%]">
                    {{-- Nombre del otro usuario --}}
                    @if (!$isOwn)
                        <p class="text-xs font-medium text-gray-500 ml-1 mb-1">
                            {{ $message->user->name }}
                        </p>
                    @endif

                    {{-- Burbuja del mensaje --}}
                    <div
                        class="relative px-4 py-2.5 text-sm leading-relaxed shadow-sm
                                {{ $isOwn
                                    ? 'bg-blue-600 text-white rounded-2xl rounded-br-md'
                                    : 'bg-gray-100 text-gray-800 rounded-2xl rounded-bl-md' }}">
                        <p class="whitespace-pre-wrap break-words">{{ $message->message }}</p>
                    </div>

                    {{-- Hora --}}
                    <p class="text-xs text-gray-400 mt-1 {{ $isOwn ? 'text-right mr-1' : 'text-left ml-1' }}">
                        {{ $message->created_at->diffForHumans() }}
                    </p>
                </div>

                {{-- Avatar propio (opcional, no se muestra para mantener minimalismo) --}}
            </div>
        @endforeach
    @endif
</div>
