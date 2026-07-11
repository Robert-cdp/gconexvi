<?php

namespace App\Http\Controllers\Forum;

use App\Models\User;
use App\Models\Forum\Topic;
use App\Models\Categories\Category;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\Forum\StoreTopic;
use App\Http\Requests\Forum\UpdateTopic;

class TopicController extends Controller
{
    public function index(?Category $category = null)
    {
        $topics = Topic::with([
            'user',
            'categories',
        ])
            ->withCount('replies')
            ->when($category, function ($query) use ($category) {
                $query->whereHas('categories', function ($q) use ($category) {
                    $q->where('categories.id', $category->id);
                });
            })
            ->latest()
            ->paginate(8);

        $categories = Category::forContext('community')
            ->with('children')
            ->whereNull('parent_id')
            ->orderBy('name')
            ->get();

        $activeUsers = User::withCount([
            'forumTopics',
            'forumReplies',
        ])
            ->get()
            ->map(function ($user) {
                $user->contributions = $user->forum_topics_count + $user->forum_replies_count;
                return $user;
            })
            ->sortByDesc('contributions')
            ->take(5);

        return view('forum.index', compact('topics', 'categories', 'category', 'activeUsers'));
    }

    public function create()
    {
        $categories = Category::treeForContext('community')
            ->orderBy('name')
            ->get();

        return view('forum.create', compact('categories'));
    }

    public function store(StoreTopic $request)
    {
        $topic = Topic::create([
            ...$request->validated(),
            'user_id' => Auth::id(),
        ]);

        $topic->categories()->attach($request->category_id);

        return redirect()
            ->route('community.show', $topic)
            ->with('success', 'Publicado Correctamente.');
    }

    public function show(string $slug)
    {
        $topic = Topic::with([
            'user',
            'categories',
        ])
            ->where('slug', $slug)
            ->firstOrFail();

        $replies = $topic->replies()
            ->with('user')
            ->latest()
            ->paginate(8);

        return view('forum.show', compact('topic', 'replies'));
    }

    public function edit(string $slug)
    {
        $topic = Topic::slug($slug)->firstOrFail();

        $this->authorize('update', $topic);

        $categories = Category::treeForContext('community')
            ->orderBy('name')
            ->get();

        return view('forum.edit', compact('topic', 'categories'));
    }

    public function update(UpdateTopic $request, string $slug)
    {
        $topic = Topic::with('categories')
            ->slug($slug)
            ->firstOrFail();

        $this->authorize('update', $topic);

        $topic->update(
            $request->safe()->except('category_id')
        );

        $topic->categories()->sync([$request->category_id]);

        return redirect()
            ->route('community.show', $topic->slug)
            ->with('success', 'Actualizado correctamente.');
    }

    public function destroy(string $slug)
    {
        $topic = Topic::slug($slug)->firstOrFail();

        $topic->delete();

        return redirect()->route('community.index')->with('success', 'Publicado Correctamente.');
    }
}
