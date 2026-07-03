<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Categories\Category;
use App\Models\Employment\Employment;
use App\Models\Forum\Topic;
use App\Models\Services\Service;

class HomeController extends Controller
{
    public function index(?Category $category = null)
    {
        $services = Service::query()
            ->when($category, function ($query) use ($category) {
                $query->whereHas('categories', function ($q) use ($category) {
                    $q->where('categories.id', $category->id);
                });
            })
            ->latest()
            ->take(3)
            ->get();

        $employments = Employment::query()
            ->when($category, function ($query) use ($category) {
                $query->whereHas('categories', function ($q) use ($category) {
                    $q->where('categories.id', $category->id);
                });
            })
            ->latest()
            ->take(3)
            ->get();

        $topics = Topic::with([
            'user',
            'categories',
        ])
            ->withCount('replies')
            ->latest()
            ->take(8)
            ->get();

        return view('home.index', compact('services', 'employments', 'topics'));
    }
}
