@extends('main')

@section('title', 'Conversación')

@section('content')
<div x-data="{ sidebarOpen: false }" class="flex h-screen overflow-hidden bg-gray-50">
    
    {{-- Overlay para mobile --}}
    <div 
        x-show="sidebarOpen" 
        class="fixed inset-0 bg-black/40 z-20 lg:hidden backdrop-blur-sm"
        @click="sidebarOpen = false"
        x-transition.opacity
    ></div>

    {{-- SIDEBAR IZQUIERDO --}}
    @include('chat.partials.aside')

    {{-- CHAT PRINCIPAL --}}
    <div class="flex-1 flex flex-col min-w-0 bg-white">
        {{-- Encabezado --}}
        @include('chat.partials.chat-header')

        {{-- Área de mensajes --}}
        @include('chat.partials.chat-content')

        {{-- Formulario de envío --}}
        @include('chat.partials.chat-form')
    </div>
</div>

@if(!$conversation->messages->isEmpty())
<script>
    const container = document.getElementById('messages-container');
    if (container) {
        container.scrollTop = container.scrollHeight;
    }
</script>
@endif
@endsection