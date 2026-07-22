<div class="border-t border-gray-100 bg-white/95 backdrop-blur-sm px-4 py-3">
    <form action="{{ route('chat.messages.store', $conversation) }}" method="POST" class="flex items-end gap-2">
        @csrf
        <div class="flex-1 relative group">
            <textarea name="message" rows="1" placeholder="Escribe tu mensaje aquí..."
                class="w-full resize-none rounded-2xl border border-gray-200 bg-gray-50 py-2.5 pl-4 pr-12 text-sm text-gray-900 placeholder-gray-400 shadow-inner transition-all duration-200
                            hover:border-gray-200
                            focus:outline-none
                            focus:ring-2 focus:ring-primary-500
                            focus:border-transparent
                            focus:bg-white
                            outline-none"
                x-data x-ref="textarea"
                @input="$el.style.height = 'auto'; $el.style.height = ($el.scrollHeight > 120 ? 120 : $el.scrollHeight) + 'px'"
                @keydown.enter.prevent="$refs.submitBtn.click()" style="min-height: 2.5rem; max-height: 120px;"></textarea>
            <button type="submit" x-ref="submitBtn"
                class="absolute right-1.5 bottom-1.5 p-2 rounded-xl text-primary-600 hover:bg-primary-50 hover:text-primary-700 transition-all duration-200 group-focus-within:text-primary-600">
                <x-heroicon-o-paper-airplane class="w-5 h-5" />
            </button>
        </div>
    </form>
</div>
