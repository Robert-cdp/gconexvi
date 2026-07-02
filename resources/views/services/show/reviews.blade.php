<div class="bg-white rounded-2xl border border-slate-200 p-6 shadow-sm">
    <h2 class="text-xl font-bold text-slate-800 mb-4">
        ⭐ Reseñas ({{ $service->reviews->count() }})
    </h2>

    <div class="space-y-4">

        @forelse($service->reviews as $review)
            <div class="flex items-start gap-3 pb-4 border-b border-slate-100">

                <img src="{{ Storage::url($review->user->avatar ?? 'images/default-avatar.webp') }}"
                    class="w-10 h-10 rounded-full" alt="{{ $review->user->name }}">

                <div class="flex-1">

                    <div class="flex items-center justify-between">

                        <p class="font-semibold text-slate-800">
                            {{ $review->user->name }}
                        </p>

                        <span class="text-yellow-500 text-sm">
                            {{ str_repeat('⭐', $review->rating) }}
                        </span>

                    </div>

                    <p class="text-sm text-slate-500 mt-1">
                        {{ $review->comment }}
                    </p>

                    <p class="text-xs text-slate-400 mt-2">
                        {{ $review->created_at->diffForHumans() }}
                    </p>

                </div>

            </div>

        @empty
            <p class="text-slate-500">
                Este servicio aún no tiene reseñas.
            </p>
        @endforelse

    </div>
</div>
