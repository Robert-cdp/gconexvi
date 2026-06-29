@props([
    'name'        => 'content',
    'label'       => 'Contenido',
    'placeholder' => 'Escribe el contenido de tu tema...',
    'value'       => '',
    'required'    => false,
    'height'      => '400px',
])

<div x-data="richTextEditor(@js($value))"
     x-on:keydown.escape.window="handleEscape"
     class="w-full">

    @if($label)
        <label for="{{ $name }}_editor"
               class="block text-sm font-semibold text-slate-700 mb-2">
            {{ $label }}
            @if($required)
                <span class="text-red-500" aria-hidden="true">*</span>
            @endif
        </label>
    @endif

    <div class="border border-slate-200 rounded-xl overflow-hidden
                focus-within:ring-2 focus-within:ring-primary-100
                focus-within:border-primary-300 transition-all">

        {{-- ── Barra de herramientas ── --}}
        <div class="flex flex-wrap items-center gap-1 px-3 py-2
                    bg-slate-50 border-b border-slate-200"
             role="toolbar" aria-label="Herramientas de formato">

            {{-- Negrita --}}
            <button type="button" @click="exec('bold')"
                    :class="isActive('bold') ? 'bg-primary-100 text-primary-700' : 'text-slate-600 hover:bg-slate-100'"
                    class="p-2 rounded-lg transition-colors" title="Negrita (Ctrl+B)">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M6 4h8a4 4 0 014 4 4 4 0 01-4 4H6zM6 12h9a4 4 0 014 4 4 4 0 01-4 4H6z"/>
                </svg>
            </button>

            {{-- Cursiva --}}
            <button type="button" @click="exec('italic')"
                    :class="isActive('italic') ? 'bg-primary-100 text-primary-700' : 'text-slate-600 hover:bg-slate-100'"
                    class="p-2 rounded-lg transition-colors" title="Cursiva (Ctrl+I)">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 4h4m-2 0v16m-4-8h8"/>
                </svg>
            </button>

            {{-- Subrayado --}}
            <button type="button" @click="exec('underline')"
                    :class="isActive('underline') ? 'bg-primary-100 text-primary-700' : 'text-slate-600 hover:bg-slate-100'"
                    class="p-2 rounded-lg transition-colors" title="Subrayado (Ctrl+U)">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M6 20h12M8 4v8a4 4 0 008 0V4"/>
                </svg>
            </button>

            <span class="w-px h-5 bg-slate-300 mx-1" role="separator"></span>

            {{-- Alinear izquierda --}}
            <button type="button" @click="exec('justifyLeft')"
                    :class="isActive('justifyLeft') ? 'bg-primary-100 text-primary-700' : 'text-slate-600 hover:bg-slate-100'"
                    class="p-2 rounded-lg transition-colors" title="Alinear a la izquierda">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path d="M3 3h18v2H3zm0 4h12v2H3zm0 4h18v2H3zm0 4h12v2H3zm0 4h18v2H3z"/>
                </svg>
            </button>

            {{-- Centrar --}}
            <button type="button" @click="exec('justifyCenter')"
                    :class="isActive('justifyCenter') ? 'bg-primary-100 text-primary-700' : 'text-slate-600 hover:bg-slate-100'"
                    class="p-2 rounded-lg transition-colors" title="Centrar">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path d="M3 3h18v2H3zm2 4h14v2H5zm-2 4h18v2H3zm2 4h14v2H5zm-2 4h18v2H3z"/>
                </svg>
            </button>

            {{-- Alinear derecha --}}
            <button type="button" @click="exec('justifyRight')"
                    :class="isActive('justifyRight') ? 'bg-primary-100 text-primary-700' : 'text-slate-600 hover:bg-slate-100'"
                    class="p-2 rounded-lg transition-colors" title="Alinear a la derecha">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path d="M3 3h18v2H3zm6 4h12v2H9zm-6 4h18v2H3zm6 4h12v2H9zm-6 4h18v2H3z"/>
                </svg>
            </button>

            {{-- Justificar --}}
            <button type="button" @click="exec('justifyFull')"
                    :class="isActive('justifyFull') ? 'bg-primary-100 text-primary-700' : 'text-slate-600 hover:bg-slate-100'"
                    class="p-2 rounded-lg transition-colors" title="Justificar">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path d="M3 3h18v2H3zm0 4h18v2H3zm0 4h18v2H3zm0 4h18v2H3zm0 4h18v2H3z"/>
                </svg>
            </button>

            <span class="w-px h-5 bg-slate-300 mx-1" role="separator"></span>

            {{-- Lista de viñetas --}}
            <button type="button" @click="exec('insertUnorderedList')"
                    :class="isActive('insertUnorderedList') ? 'bg-primary-100 text-primary-700' : 'text-slate-600 hover:bg-slate-100'"
                    class="p-2 rounded-lg transition-colors" title="Lista de viñetas">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <circle cx="5" cy="6"  r="1.5" fill="currentColor"/>
                    <circle cx="5" cy="12" r="1.5" fill="currentColor"/>
                    <circle cx="5" cy="18" r="1.5" fill="currentColor"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M9 6h11M9 12h11M9 18h11"/>
                </svg>
            </button>

            {{-- Lista numerada --}}
            <button type="button" @click="exec('insertOrderedList')"
                    :class="isActive('insertOrderedList') ? 'bg-primary-100 text-primary-700' : 'text-slate-600 hover:bg-slate-100'"
                    class="p-2 rounded-lg transition-colors" title="Lista numerada">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M9 6h11M9 12h11M9 18h11"/>
                    <text x="2" y="8"  font-size="6" fill="currentColor" stroke="none">1</text>
                    <text x="2" y="14" font-size="6" fill="currentColor" stroke="none">2</text>
                    <text x="2" y="20" font-size="6" fill="currentColor" stroke="none">3</text>
                </svg>
            </button>

            {{-- Aumentar sangría --}}
            <button type="button" @click="exec('indent')"
                    class="p-2 rounded-lg text-slate-600 hover:bg-slate-100 transition-colors"
                    title="Aumentar sangría">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M12 4l6 6m0 0l-6 6m6-6H4"/>
                </svg>
            </button>

            {{-- Disminuir sangría --}}
            <button type="button" @click="exec('outdent')"
                    class="p-2 rounded-lg text-slate-600 hover:bg-slate-100 transition-colors"
                    title="Disminuir sangría">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M4 4l6 6m0 0l-6 6m6-6h12"/>
                </svg>
            </button>

            <span class="w-px h-5 bg-slate-300 mx-1" role="separator"></span>

            {{-- Insertar enlace --}}
            <button type="button" @click="insertLink"
                    class="p-2 rounded-lg text-slate-600 hover:bg-slate-100 transition-colors"
                    title="Insertar enlace">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656
                             l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/>
                </svg>
            </button>
        </div>

        <div x-ref="editor"
             id="{{ $name }}_editor"
             contenteditable="true"
             @input="updateContent"
             @paste="$nextTick(() => updateContent())"
             class="rte-editor px-4 py-3 text-sm text-slate-700 leading-relaxed
                    overflow-y-auto focus:outline-none"
             data-placeholder="{{ $placeholder }}"
             style="min-height: {{ $height }}; max-height: 500px;"
             aria-multiline="true"
             aria-label="{{ $label }}">
        </div>
    </div>

    {{-- Campo hidden que se envía en el formulario --}}
    <input type="hidden"
           name="{{ $name }}"
           x-model="content"
           @if($required) required @endif>

    @error($name)
        <p class="mt-2 text-sm text-red-600" role="alert">{{ $message }}</p>
    @enderror
</div>

@pushOnce('styles')
<style>
.rte-editor:empty::before {
    content: attr(data-placeholder);
    color: #94a3b8;
    pointer-events: none;
    display: block;
}
.rte-editor ul {
    list-style-type: disc !important;
    padding-left: 1.5rem !important;
    margin: 0.5rem 0 !important;
}
.rte-editor ol {
    list-style-type: decimal !important;
    padding-left: 1.5rem !important;
    margin: 0.5rem 0 !important;
}
.rte-editor li {
    display: list-item !important;
    margin: 0.15rem 0 !important;
}
.rte-editor a {
    color: #2563eb;
    text-decoration: underline;
}
.rte-editor b, .rte-editor strong { font-weight: 700; }
.rte-editor i, .rte-editor em     { font-style: italic; }
.rte-editor u                      { text-decoration: underline; }
.rte-editor blockquote {
    border-left: 3px solid #cbd5e1;
    padding-left: 1rem;
    color: #64748b;
    margin: 0.5rem 0;
}
</style>
@endPushOnce

@push('scripts')
    <script src="{{ asset('js/rich-text-editor.js') }}"></script>
@endpush