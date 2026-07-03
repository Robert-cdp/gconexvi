@extends('main')

@section('title', 'Conversaciones')

@section('content')
    <div class="max-w-4xl mx-auto py-6 space-y-3">

    @forelse ($conversations as $conversation)
        @php
            $entity = $conversation->conversationable;
            $lastMessage = $conversation->lastMessage;
            $isMine = $lastMessage && $lastMessage->user_id === auth()->id();
        @endphp

        <a href="{{ route('chat.conversations.show', $conversation) }}"
           class="block bg-white border border-slate-200 rounded-2xl p-4 hover:shadow-md transition">

            <div class="flex items-center justify-between gap-4">

                <div class="flex items-center gap-3 min-w-0">

                    <div class="w-12 h-12 rounded-xl bg-slate-100 overflow-hidden flex items-center justify-center">
                        @if ($entity?->cover ?? false)
                            <img src="{{ Storage::url($entity->cover) }}"
                                 class="w-full h-full object-cover"
                                 alt="">
                        @else
                            <span class="text-slate-400 text-xs">N/A</span>
                        @endif
                    </div>

                    <div class="min-w-0">
                        <p class="text-sm font-bold text-slate-800 truncate">
                            {{ $entity->title ?? 'Conversación' }}
                        </p>

                        <p class="text-xs text-slate-500 truncate">
                            {{ $lastMessage?->message ?? 'Sin mensajes aún' }}
                        </p>
                    </div>

                </div>

                <div class="text-right shrink-0">
                    <p class="text-xs text-slate-400">
                        {{ $lastMessage?->created_at?->diffForHumans() }}
                    </p>

                    @if($lastMessage)
                        <span class="inline-block mt-1 text-[10px] px-2 py-0.5 rounded-full
                            {{ $isMine ? 'bg-primary-100 text-primary-700' : 'bg-slate-100 text-slate-600' }}">
                            {{ $isMine ? 'Tú' : $lastMessage->user->name }}
                        </span>
                    @endif
                </div>

            </div>

        </a>

    @empty
        <div class="text-center py-10 text-slate-500">
            No hay conversaciones
        </div>
    @endforelse

    <div class="mt-6">
        {{ $conversations->links() }}
    </div>

</div>
@endsection