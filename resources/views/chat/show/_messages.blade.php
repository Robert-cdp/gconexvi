<div class="flex-1 overflow-y-auto px-5 py-4 space-y-0.5 scrollbar-thin scrollbar-thumb-gray-200 scrollbar-track-transparent"
    id="chat-messages">
    @php
        $previousSenderId = null;
        $previousDate = null;
    @endphp
    @foreach ($conversation->messagesForChat() as $message)
        @php
            $currentSenderId = $message->sender()->id;
            $currentDate = $message->sentAt()->format('Y-m-d');
            $showDateSeparator = $currentDate !== $previousDate;
            $isConsecutive = $currentSenderId === $previousSenderId && !$showDateSeparator;
            $previousSenderId = $currentSenderId;
            $previousDate = $currentDate;
        @endphp

        {{-- Separador de fecha --}}
        @if ($showDateSeparator)
            <div class="flex items-center justify-center py-3">
                <div class="bg-gray-200/80 text-gray-500 text-[11px] font-medium px-3 py-1 rounded-full tracking-wide">
                    {{ \Carbon\Carbon::parse($currentDate)->translatedFormat('d \d\e F, Y') }}
                </div>
            </div>
        @endif

        <div
            class="flex {{ $message->isMine() ? 'justify-end' : 'justify-start' }} {{ $isConsecutive ? 'mt-0.5' : 'mt-2.5' }}">
            <div class="flex items-end gap-2 max-w-[72%] {{ $message->isMine() ? 'flex-row-reverse' : '' }}">

                {{-- Avatar solo en mensajes recibidos y no consecutivos --}}
                @if (!$message->isMine() && !$isConsecutive)
                    <div class="flex-shrink-0 mb-1">
                        @if ($message->senderAvatar())
                            <img src="{{ $message->senderAvatar() }}" alt="{{ $message->senderName() }}"
                                class="w-6 h-6 rounded-full object-cover shadow-sm">
                        @else
                            <div
                                class="w-6 h-6 rounded-full bg-gray-200 flex items-center justify-center text-[10px] text-gray-500 font-medium">
                                {{ $message->senderInitials() }}
                            </div>
                        @endif
                    </div>
                @elseif(!$message->isMine() && $isConsecutive)
                    {{-- Espacio reservado para alinear cuando no hay avatar --}}
                    <div class="w-6 h-6 flex-shrink-0"></div>
                @endif

                {{-- Burbuja --}}
                <div class="group relative">
                    <div
                        class="px-3.5 py-2 rounded-2xl text-sm leading-relaxed
                                      {{ $message->isMine()
                                          ? 'bg-primary-500 text-white rounded-br-md shadow-sm'
                                          : 'bg-white text-gray-800 rounded-bl-md shadow-sm border border-gray-200/60' }}">
                        <p class="whitespace-pre-wrap break-words">{{ $message->body() }}</p>
                        <div class="flex items-center justify-end gap-1.5 mt-0.5">
                            <span
                                class="text-[10px] opacity-60 font-medium tracking-tight">{{ $message->sentAt()->format('H:i') }}</span>
                            @if ($message->isMine())
                                @if ($message->isRead())
                                    <x-heroicon-o-check class="w-3 h-3 opacity-60 text-white" />
                                @else
                                    <x-heroicon-o-check class="w-3 h-3 opacity-40 text-white" />
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
