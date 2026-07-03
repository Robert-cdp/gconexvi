<div class="border-t border-gray-200 p-4 lg:p-6 bg-white">
    <form method="POST" action="{{ route('chat.messages.store', $conversation) }}" class="flex items-end gap-3"
        x-data="{
            message: '',
            resize() {
                const el = $refs.textarea;
                el.style.height = 'auto';
                el.style.height = el.scrollHeight + 'px';
            }
        }">
        @csrf
        <div class="flex-1 relative">
            <textarea x-ref="textarea" x-model="message" @input="resize()"
                @keydown.enter.prevent="if (!$event.shiftKey && message.trim() !== '') $el.form.requestSubmit()" name="message"
                rows="1" placeholder="Escribe un mensaje..."
                class="w-full px-4 py-3 pr-12 border border-gray-200 rounded-2xl bg-gray-50 text-sm placeholder-gray-400 focus:outline-none focus:border-blue-400 focus:ring-4 focus:ring-blue-50 focus:bg-white resize-none transition max-h-36 overflow-y-auto"
                style="min-height: 44px;"></textarea>
        </div>

        {{-- Errores --}}
        @error('message')
            <p class="absolute -bottom-6 left-4 text-xs text-red-500 mt-1">{{ $message }}</p>
        @enderror
    </form>
</div>
