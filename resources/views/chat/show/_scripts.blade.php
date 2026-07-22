@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const container = document.getElementById('chat-messages');
            if (container) {
                container.scrollTop = container.scrollHeight;
                // Volver a hacer scroll si la altura cambia (nuevos mensajes cargados dinámicamente)
                const observer = new MutationObserver(() => {
                    container.scrollTop = container.scrollHeight;
                });
                observer.observe(container, {
                    childList: true,
                    subtree: true
                });
            }
        });
    </script>
@endpush
