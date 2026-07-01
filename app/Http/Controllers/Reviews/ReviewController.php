<?php

namespace App\Http\Controllers\Reviews;

use App\Http\Controllers\Controller;
use App\Http\Requests\Reviews\Store;
use App\Http\Requests\Reviews\Update;
use App\Models\Reviews\Review;
use App\Models\Services\Service;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function create(Service $service)
    {
        $this->authorize('create', [Review::class, $service]);

        return view('reviews.create', compact('service'));
    }

    public function store(Store $request, Service $service)
    {
        $this->authorize('create', [Review::class, $service]);

        $service->reviews()->create([
            'user_id' => Auth::user()->id,
            'rating' => $request->integer('rating'),
            'comment' => $request->comment,
        ]);

        return redirect()
            ->route('services.show', $service)
            ->with('success', 'Gracias por tu reseña.');
    }

    public function update(Update $request, Review $review)
    {
        $this->authorize('update', $review);

        $review->update([
            'rating' => $request->integer('rating'),
            'comment' => $request->comment,
        ]);

        return back()->with('success', 'La reseña ha sido actualizada.');
    }

    public function destroy(Review $review)
    {
        $this->authorize('delete', $review);

        $review->delete();

        return back()->with('success', 'La reseña ha sido eliminada.');
    }
}
