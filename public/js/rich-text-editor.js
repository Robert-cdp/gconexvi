function sanitizeHTML(html) {
    if (!html) return '';

    const template = document.createElement('template');
    template.innerHTML = html;

    const FORBIDDEN_TAGS = ['script', 'iframe', 'object', 'embed', 'form',
                            'input', 'button', 'style', 'link', 'meta', 'base'];
    const FORBIDDEN_ATTRS = /^(on\w+|srcdoc|data-(?!placeholder))$/i;
    const SAFE_URL = /^(https?:\/\/|mailto:|#|\/)/i;

    function walk(node) {
        for (const child of [...node.childNodes]) {
            if (child.nodeType === Node.ELEMENT_NODE) {
                if (FORBIDDEN_TAGS.includes(child.tagName.toLowerCase())) {
                    child.remove();
                    continue;
                }
                for (const attr of [...child.attributes]) {
                    if (FORBIDDEN_ATTRS.test(attr.name)) {
                        child.removeAttribute(attr.name);
                    } else if (['href', 'src', 'action'].includes(attr.name)
                               && !SAFE_URL.test(attr.value)) {
                        child.removeAttribute(attr.name);
                    }
                }
                walk(child);
            }
        }
    }

    walk(template.content);
    return template.innerHTML;
}

function isSafeURL(url) {
    try {
        const parsed = new URL(url);
        return ['http:', 'https:', 'mailto:'].includes(parsed.protocol);
    } catch {
        return false;
    }
}

function registerRichTextEditor() {
    Alpine.data('richTextEditor', (initialValue) => ({
        content: sanitizeHTML(initialValue || ''),

        init() {
            this.$nextTick(() => {
                const el = this.$refs.editor;
                if (!el) return;
                el.innerHTML = this.content;
            });
        },

        exec(command, value = null) {
            const el = this.$refs.editor;
            if (!el) return;

            if (document.activeElement !== el) el.focus();

            try {
                document.execCommand(command, false, value);
            } catch (e) {
                console.warn('[RTE] execCommand falló:', command, e);
            }

            this.updateContent();
        },

        isActive(command) {
            try {
                return document.queryCommandState(command);
            } catch {
                return false;
            }
        },

        insertLink() {
            const el = this.$refs.editor;
            if (!el) return;

            el.focus();
            const sel = window.getSelection();
            const savedRange = sel && sel.rangeCount > 0
                ? sel.getRangeAt(0).cloneRange()
                : null;

            const url = prompt('URL del enlace:', 'https://');
            if (!url || url.trim() === '' || url.trim() === 'https://') return;

            const cleanURL = url.trim();
            if (!isSafeURL(cleanURL)) {
                alert('URL no válida. Usa http://, https:// o mailto:');
                return;
            }

            const defaultText = savedRange && !savedRange.collapsed
                ? savedRange.toString()
                : cleanURL;
            const text = prompt('Texto a mostrar:', defaultText);
            if (text === null) return;

            el.focus();
            if (savedRange && sel) {
                sel.removeAllRanges();
                sel.addRange(savedRange);
            }

            const link = document.createElement('a');
            link.href = cleanURL;
            link.textContent = text.trim() || cleanURL;
            link.target = '_blank';
            link.rel = 'noopener noreferrer';

            const range = sel.getRangeAt(0);
            range.deleteContents();
            range.insertNode(link);


            range.setStartAfter(link);
            range.collapse(true);
            sel.removeAllRanges();
            sel.addRange(range);

            this.updateContent();
        },

        updateContent() {
            const el = this.$refs.editor;
            if (!el) return;
            this.content = sanitizeHTML(el.innerHTML);
        },

        handleEscape() {
            this.$refs.editor?.blur();
        },
    }));
}

if (window.Alpine && window.Alpine.data) {
    registerRichTextEditor();
} else {
    document.addEventListener('alpine:init', registerRichTextEditor);
}