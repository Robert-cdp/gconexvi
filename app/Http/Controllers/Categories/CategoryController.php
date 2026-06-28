<?php

namespace App\Http\Controllers\Categories;

use App\Models\Categories\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\Categories\Store;
use App\Http\Requests\Categories\Update;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::with('parent')
            ->orderBy('name')
            ->get();

        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        $categories = Category::orderBy('name')->get();

        return view('categories.create', compact('categories'));
    }

    public function store(Store $request)
    {
        Category::create($request->validated());

        return redirect()->route('categories.index')->with('success', 'Creado.');
    }

    public function show(string $slug)
    {
        $category = Category::slug($slug)->firstOrFail();

        return view('categories.show', compact('category'));
    }

    public function edit(string $slug)
    {
        $category = Category::slug($slug)->firstOrFail();

        $categories = Category::whereKeyNot($category->id)
            ->orderBy('name')
            ->get();

        return view('categories.edit', compact('category', 'categories'));
    }

    public function update(Update $request, string $slug)
    {
        $category = Category::slug($slug)->firstOrFail();

        $category->update($request->validated());

        return redirect()->route('categories.index')->with('success', 'Actualizado.');
    }

    public function destroy(string $slug)
    {
        $category = Category::slug($slug)->firstOrFail();

        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Eliminado.');
    }
}
