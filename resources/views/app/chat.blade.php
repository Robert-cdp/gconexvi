@auth
@php
    $user = auth()->user();

    $conversations = \App\Models\Chat\Conversation::query()
        ->where(function ($q) use ($user) {
            $q->where('owner_id', $user->id)
              ->orWhere('user_id', $user->id);
        })
        ->with(['conversationable', 'lastMessage.user'])
        ->withMax('messages', 'created_at')
        ->orderByDesc('messages_max_created_at')
        ->take(3)
        ->get();

    $unreadCount = \App\Models\Chat\Message::query()
        ->whereHas('conversation', function ($q) use ($user) {
            $q->where('owner_id', $user->id)
              ->orWhere('user_id', $user->id);
        })
        ->where('user_id', '!=', $user->id)
        ->whereNull('read_at')
        ->count();
@endphp

<div class="relative" x-data="{ openChat: false }">

    <button @click="openChat = !openChat"
        class="relative p-2 rounded-full hover:bg-slate-100 transition">

        {{-- ICONO NOTIFICACION CHAT --}}
        <svg class="w-6 h-6 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M7 8h10M7 12h6m-6 4h10M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4-.8L3 20l1.2-3.6C3.45 15.2 3 13.65 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
        </svg>

        {{-- BADGE --}}
        @if($unreadCount > 0)
            <span class="absolute -top-1 -right-1 bg-red-500 text-white text-[10px] px-1.5 rounded-full">
                {{ $unreadCount > 99 ? '99+' : $unreadCount }}
            </span>
        @endif
    </button>

    {{-- DROPDOWN --}}
    <div x-show="openChat"
         x-cloak
         @click.away="openChat = false"
         x-transition
         class="absolute right-0 mt-2 w-80 bg-white border border-slate-200 rounded-xl shadow-lg z-50">

        <div class="p-3 border-b text-sm font-semibold text-slate-700 flex justify-between items-center">
            <span>Mensajes</span>

            <a href="{{ route('chat.index') }}"
               class="text-xs text-primary-600 hover:underline">
                Ver todo
            </a>
        </div>

        <div class="max-h-80 overflow-y-auto">

            @forelse($conversations as $conversation)
                @php
                    $entity = $conversation->conversationable;
                    $last = $conversation->lastMessage;
                @endphp

                <a href="{{ route('chat.conversations.show', $conversation) }}"
                   class="flex items-start gap-3 px-3 py-2 hover:bg-slate-50 transition">

                    <div class="w-10 h-10 rounded-full bg-slate-100 overflow-hidden flex items-center justify-center shrink-0">
                        @if($entity?->cover)
                            <img src="{{ Storage::url($entity->cover) }}" class="w-full h-full object-cover">
                        @else
                            <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5.121 17.804A4 4 0 0112 15h0a4 4 0 016.879 2.804M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        @endif
                    </div>

                    <div class="min-w-0 flex-1">
                        <p class="text-sm font-medium text-slate-800 truncate">
                            {{ $entity->title ?? 'Conversación' }}
                        </p>

                        <p class="text-xs text-slate-500 truncate">
                            {{ $last?->message ?? 'Sin mensajes' }}
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