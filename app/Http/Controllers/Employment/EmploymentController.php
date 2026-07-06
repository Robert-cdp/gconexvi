<?php

namespace App\Http\Controllers\Employment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Employment\Store;
use App\Http\Requests\Employment\Update;
use App\Models\Categories\Category;
use App\Models\Employment\Employment;
use Illuminate\Support\Facades\Auth;

class EmploymentController extends Controller
{
    public function index(?Category $category = null)
    {
        $employments = Employment::query()
            ->when($category, function ($query) use ($category) {
                $query->whereHas('categories', function ($q) use ($category) {
                    $q->where('categories.id', $category->id);
                });
            })
            ->latest()
            ->get();

        return view('employment.index', compact('employments'));
    }

    public function create()
    {
        $categories = Category::forContext('employments')
            ->with('children')
            ->whereNull('parent_id')
            ->orderBy('name')
            ->get();

        return view('employment.create', compact('categories'));
    }

    public function store(Store $request)
    {
        $employment = Employment::create([
            ...$request->safe()->except('category_id'),
            'user_id' => Auth::id(),
            'status' => 'open',
        ]);

        $employment->categories()->sync([$request->validated('category_id')]);

        return redirect()->route('employments.show', $employment->slug)->with('success', 'Creado correctamente.');
    }

    public function show(string $slug)
    {
        $employment = Employment::slug($slug)->firstOrFail();

        $similarEmployments = Employment::query()
            ->where('id', '!=', $employment->id)
            ->where('status', 'open')
            ->whereHas('categories', function ($query) use ($employment) {
                $query->whereIn(
                    'categories.id',
                    $employment->categories->pluck('id')
                );
            })
            ->latest()
            ->take(5)
            ->get();
            
        return view('employment.show', compact('employment', 'similarEmployments'));
    }

    public function edit(string $slug)
    {
        $employment = Employment::with('categories')
            ->slug($slug)
            ->firstOrFail();

        $this->authorize('update', $employment);

        $categories = Category::forContext('employments')
            ->with('children')
            ->whereNull('parent_id')
            ->orderBy('name')
            ->get();

        return view('employment.edit', compact('employment', 'categories'));
    }

    public function update(Update $request, string $slug)
    {
        $employment = Employment::slug($slug)->firstOrFail();

        $this->authorize('update', $employment);

        $employment->update(
            $request->validated()
        );

        $employment->categories()->sync($request->categories);

        return redirect()
            ->route('employments.show', $employment->slug)
            ->with('success', 'Actualizado correctamente');
    }

    public function destroy(string $slug)
    {
        $employment = Employment::slug($slug)->firstOrFail();

        $employment->delete();

        return redirect()->route('employment.index')->with('success', 'Eliminado');
    }
}
