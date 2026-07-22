@extends('main')

@section('title', 'Conversación')

@section('content')
    <div x-data="{
        sidebarOpen: false,
        init() {
            this.$nextTick(() => {
                const container = document.getElementById('chat-messages');
                if (container) container.scrollTop = container.scrollHeight;
            });
        }
    }"
        class="h-[calc(80vh-4rem)] flex overflow-hidden rounded-xl shadow-sm border border-gray-200/80 bg-white">

        {{-- Sidebar contextual (escritorio) --}}
        @include('chat.show._sidebar')
        {{-- Overlay del sidebar en móvil --}}
        @include('chat.show._overlay')

        {{-- Panel principal del chat --}}
        <div class="flex-1 flex flex-col min-w-0 bg-gradient-to-b from-white to-gray-50/30">

            {{-- Header --}}
            @include('chat.show._header')

            {{-- Área de mensajes --}}
            @include('chat.show._messages')

            {{-- Formulario inferior --}}
            @include('chat.show._form')
        </div>
    </div>

    @include('chat.show._scripts')
@endsection
