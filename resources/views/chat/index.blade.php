@extends('main')

@section('title', 'Conversaciones')

@section('content')

<div class="max-w-4xl mx-auto py-6 space-y-3">

    @forelse ($conversations as $conversation)

        <a href="{{ route('chat.conversations.show', $conversation) }}"
            class="block bg-white border border-slate-200 rounded-2xl p-4 hover:border-primary-200 transition-colors">

            <div class="flex items-center justify-between gap-4">

                <div class="flex items-center gap-4 min-w-0">

                    {{-- Avatar --}}
                    <div class="relative shrink-0">

                        <img 
                            src="{{ $conversation->participantAvatarFor(auth()->user()) }}"
                            alt="{{ $conversation->participantNameFor(auth()->user()) }}"
                            class="w-12 h-12 rounded-full object-cover ring-2 ring-white shadow-sm"
                        >

                        <span
                            class="absolute bottom-0 right-0 w-3 h-3 rounded-full bg-green-500 border-2 border-white">
                        </span>

                    </div>


                    {{-- Información --}}
                    <div class="min-w-0">

                        <div class="flex items-center gap-2">

                            <p class="text-sm font-semibold text-slate-800 truncate">
                                {{ $conversation->participantNameFor(auth()->user()) }}
                            </p>


                            @if ($conversation->hasUnreadFor(auth()->user()))
                                <span class="w-2 h-2 rounded-full bg-primary-600"></span>
                            @endif

                        </div>


                        <p class="text-xs text-slate-500 truncate max-w-md">
                            {{ $conversation->lastMessagePreview() ?? 'Sin mensajes aún' }}
                        </p>

                    </div>

                </div>



                {{-- Fecha --}}
                <div class="text-right shrink-0">

                    @if ($conversation->lastMessage)

                        <p class="text-xs text-slate-400">
                            {{ $conversation->lastMessage->created_at->diffForHumans() }}
                        </p>


                        <span
                            class="inline-flex items-center gap-1 mt-1 text-[11px] px-2 py-1 rounded-full
                            {{ $conversation->lastMessageIsMine(auth()->user())
                                ? 'bg-primary-50 text-primary-700'
                                : 'bg-slate-100 text-slate-600' }}">

                            @if ($conversation->lastMessageIsMine(auth()->user()))

                                <x-heroicon-o-check class="size-3" />

                                Tú

                            @else

                                <x-heroicon-o-user class="size-3" />

                                {{ $conversation->lastMessageSender()?->name ?? 'Usuario' }}

                            @endif

                        </span>

                    @endif

                </div>


            </div>

        </a>


    @empty

        <div class="bg-white border border-slate-200 rounded-2xl p-10 text-center">

            <x-heroicon-o-chat-bubble-left-right class="size-10 mx-auto text-slate-300" />

            <p class="mt-3 text-sm text-slate-500">
                No tienes conversaciones todavía
            </p>

        </div>

    @endforelse



    @if ($conversations->hasPages())

        <div class="pt-4">
            {{ $conversations->links() }}
        </div>

    @endif


</div>

@endsection