<div class="bg-white rounded-2xl p-6">
    <h2 class="text-xs font-bold uppercase tracking-widest text-slate-400 mb-4">
        Publicado por
    </h2>
    <div class="flex items-center gap-4">
        <img src="{{ Storage::url($product->user->avatar ?? 'images/default-avatar.webp') }}" class="w-12 h-12 rounded-full object-cover ring-2 ring-slate-200"
            alt="{{ $product->user->name }}">
        <div class="min-w-0">
            <a href="{{ route('user.profile', $product->user) }}"
                class="font-semibold text-slate-900 hover:text-primary-600 transition text-sm truncate block">
                {{ $product->user->name }}
            </a>
            <p class="text-xs text-slate-500 mt-0.5">
                Publicado {{ $product->created_at->diffForHumans() }}
            </p>
            @if ($product->location)
                <p class="text-xs text-slate-500">{{ $product->location }}</p>
            @endif
        </div>
    </div>
</div>
