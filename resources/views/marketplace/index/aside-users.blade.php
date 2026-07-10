<div class="bg-white rounded-2xl border border-slate-200 p-5 shadow-sm">
    <h4 class="text-sm font-semibold text-slate-500 uppercase tracking-wide mb-3">Vendedores top</h4>
    <div class="space-y-3">
        @foreach ($topSellers as $seller)
            <div class="flex items-center gap-3">
                <img src="{{ Storage::url($seller->avatar ?? 'images/default-avatar.webp') }}" class="w-9 h-9 rounded-full ring-2 ring-primary-100">

                <div class="flex-1 min-w-0">
                    <p class="text-sm font-medium text-slate-800 truncate">
                        {{ $seller->name }}
                    </p>

                    <p class="text-xs text-slate-400">
                        {{ $seller->reviews_count }} reviews
                    </p>
                </div>
            </div>
        @endforeach
    </div>
</div>
