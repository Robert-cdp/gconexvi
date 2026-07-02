<h2 class="text-xl font-bold text-slate-900 mt-8">
    Reseñas ({{ $user->reviewsReceived()->count() }})
</h2>

<div class="space-y-4 mt-4">

    @forelse($user->reviewsReceived() as $review)

        <div class="bg-white rounded-2xl border border-slate-200 p-5 shadow-sm">

            <div class="flex items-start gap-3">

                <img
                    src="{{ Storage::url($review->user->avatar ?? 'images/default-avatar.webp') }}"
                    class="w-10 h-10 rounded-full"
                    alt="{{ $review->user->name }}"
                >

                <div class="flex-1">

                    <div class="flex items-center justify-between">

                        <div>
                            <p class="font-semibold text-slate-800">
                                {{ $review->user->name }}
                            </p>

                            <p class="text-xs text-slate-400 mt-1">
                                Servicio:
                                {{ $review->reviewable->title }}
                            </p>
                        </div>

                        <span class="text-yellow-500 text-sm">
                            {{ str_repeat('⭐', $review->rating) }}
                        </span>

                    </div>

                    @if($review->comment)
                        <p class="text-sm text-slate-600 mt-3">
                            {{ $review->comment }}
                        </p>
                    @endif

                    <p class="text-xs text-slate-400 mt-3">
                        {{ $review->created_at->diffForHumans() }}
                    </p>

                </div>

            </div>

        </div>

    @empty

        <div class="bg-white rounded-2xl border border-slate-200 p-6 text-center">
            <p class="text-slate-500">
                Este usuario aún no tiene reseñas.
            </p>
        </div>

    @endforelse

</div>

{{ $user->reviewsReceived()->links('components.pagination') }}