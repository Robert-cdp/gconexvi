<?php

namespace App\Http\Controllers\Reviews;

use App\Http\Controllers\Controller;
use App\Http\Requests\Reviews\Store;
use App\Http\Requests\Reviews\Update;
use App\Models\Products\Product;
use App\Models\Reviews\Review;
use App\Models\Services\Service;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ReviewController extends Controller
{
    protected function resolveReviewable(string $type, int $id)
    {
        return match ($type) {
            'service' => Service::findOrFail($id),
            'product' => Product::findOrFail($id),

            default => abort(404),
        };
    }

    public function create(string $type, int $id): View
    {
        $reviewable = $this->resolveReviewable($type, $id);

        $this->authorize('create', [Review::class, $reviewable]);

        return view('reviews.create', compact('reviewable', 'type'));
    }

    public function store(Store $request): RedirectResponse
    {
        $reviewable = $this->resolveReviewable(
            $request->type,
            $request->id
        );

        $this->authorize('create', [Review::class, $reviewable]);

        $reviewable->reviews()->create([
            'user_id' => Auth::id(),
            'rating' => $request->integer('rating'),
            'comment' => $request->comment,
        ]);

        return redirect($reviewable->url)
            ->with('success', 'Gracias por tu reseña.');
    }

    public function update(Update $request, Review $review): RedirectResponse
    {
        $this->authorize('update', $review);

        $review->update([
            'rating' => $request->integer('rating'),
            'comment' => $request->comment,
        ]);

        return back()->with('success', 'La reseña ha sido actualizada.');
    }

    public function destroy(Review $review): RedirectResponse
    {
        $this->authorize('delete', $review);

        $review->delete();

        return back()->with('success', 'La reseña ha sido eliminada.');
    }
}
