<?php

namespace App\Http\Controllers\Forum;

use App\Models\User;
use App\Models\Forum\Forum;
use App\Models\Categories\Category;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\Forum\StoreTopic;
use App\Http\Requests\Forum\UpdateTopic;
use App\Models\Forum\Topic;

class TopicController extends Controller
{
    public function index()
    {
        $topics = Topic::with([
            'user',
            'categories',
            'replies',
        ])->latest()->get();

        $categories = Category::has('forums', '>=', 10)
            ->withCount('forums')
            ->orderByDesc('forums_count')
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

        return view('forum.index', compact('topics', 'categories', 'activeUsers'));
    }

    public function create()
    {
        $categories = Category::with('children')
            ->whereNull('parent_id')
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
        $topic = Topic::slug($slug)->firstOrFail();

        return view('forum.show', compact('topic'));
    }

    public function edit(string $slug)
    {
        $topic = Topic::slug($slug)->firstOrFail();

        $this->authorize('update', $topic);

        $categories = Category::with('children')
            ->whereNull('parent_id')
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
