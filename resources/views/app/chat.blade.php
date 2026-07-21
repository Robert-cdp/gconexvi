@auth

<div class="relative" x-data="{ openChat: false }">

    <button 
        @click="openChat = !openChat"
        class="relative p-2 rounded-full hover:bg-slate-100 transition"
    >

        <x-heroicon-o-chat-bubble-left-right class="size-6 text-slate-600" />


        @if(auth()->user()->chatUnreadCount() > 0)

            <span 
                class="absolute -top-1 -right-1 bg-red-500 text-white text-[10px] px-1.5 rounded-full"
            >
                {{ auth()->user()->chatUnreadCount() > 99 ? '99+' : auth()->user()->chatUnreadCount() }}
            </span>

        @endif

    </button>



    <div 
        x-show="openChat"
        x-cloak
        @click.away="openChat = false"
        x-transition
        class="absolute right-0 mt-2 w-80 bg-white border border-slate-200 rounded-xl shadow-lg z-50"
    >


        <div class="p-3 border-b text-sm font-semibold text-slate-700 flex justify-between items-center">

            <span>
                Mensajes
            </span>


            <a 
                href="{{ route('chat.index') }}"
                class="text-xs text-primary-600 hover:underline"
            >
                Ver todo
            </a>

        </div>



        <div class="max-h-80 overflow-y-auto">


            @forelse(auth()->user()->chatMenuConversations() as $conversation)

                <a 
                    href="{{ route('chat.conversations.show', $conversation) }}"
                    class="flex items-start gap-3 px-3 py-2 hover:bg-slate-50 transition"
                >


                    <img 
                        src="{{ $conversation->participantAvatarFor(auth()->user()) }}"
                        alt="{{ $conversation->participantNameFor(auth()->user()) }}"
                        class="w-10 h-10 rounded-full object-cover bg-slate-100 shrink-0"
                    >



                    <div class="min-w-0 flex-1">


                        <p class="text-sm font-medium text-slate-800 truncate">
                            {{ $conversation->participantNameFor(auth()->user()) }}
                        </p>


                        <p class="text-xs text-slate-500 truncate">
                            {{ $conversation->lastMessagePreview() ?? 'Sin mensajes' }}
                        </p>


                    </div>


                </a>


            @empty

                <div class="p-4 text-sm text-slate-500 text-center">
                    Sin conversaciones
                </div>

            @endforelse


        </div>


    </div>

</div>

@endauth