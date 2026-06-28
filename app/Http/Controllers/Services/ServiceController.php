<?php

namespace App\Http\Controllers\Services;

use App\Models\Services\Service;
use App\Http\Controllers\Controller;
use App\Http\Requests\Services\Store;
use App\Http\Requests\Services\Update;
use App\Models\Categories\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
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
            ->get();

        return view('services.index', compact('services', 'category'));
    }

    public function create()
    {
        $categories = Category::with('children')
            ->whereNull('parent_id')
            ->orderBy('name')
            ->get();

        return view('services.create', compact('categories'));
    }

    public function store(Store $request)
    {
        $service = Service::create([
            ...$request->safe()->except('images', 'category_id'),
            'user_id' => Auth::id(),
        ]);

        $service->categories()->attach($request->category_id);

        if ($request->hasFile('images')) {

            foreach ($request->file('images') as $index => $image) {

                $path = $image->store('services', 'public');

                $service->images()->create([
                    'path' => $path,
                    'order' => $index,
                    'is_primary' => $index === 0,
                ]);
            }
        }

        return redirect()
            ->route('services.show', $service->slug)
            ->with('success', 'Servicio creado correctamente.');
    }

    public function show(string $slug)
    {
        $service = Service::slug($slug)->firstOrFail();
        return view('services.show', compact('service'));
    }

    public function edit(string $slug)
    {
        $service = Service::slug($slug)->firstOrFail();

        $this->authorize('update', $service);

        $categories = Category::with('children')
            ->whereNull('parent_id')
            ->orderBy('name')
            ->get();

        return view('services.edit', compact('service', 'categories'));
    }

    public function update(Update $request, string $slug)
    {
        $service = Service::with('images')
            ->slug($slug)
            ->firstOrFail();

        $this->authorize('update', $service);

        $service->update(
            $request->safe()->except('images', 'category_id')
        );

        $service->categories()->sync([$request->category_id]);

        if ($request->hasFile('images')) {

            foreach ($service->images as $image) {
                Storage::disk('public')->delete($image->path);
            }

            $service->images()->delete();

            foreach ($request->file('images') as $index => $image) {

                $path = $image->store('services', 'public');

                $service->images()->create([
                    'path'       => $path,
                    'order'      => $index,
                    'is_primary' => $index === 0,
                ]);
            }
        }

        return redirect()
            ->route('services.show', $service->slug)
            ->with('success', 'Servicio actualizado correctamente.');
    }

    public function destroy(string $slug)
    {
        $service = Service::slug($slug)->firstOrFail();

        $this->authorize('delete', $service);

        $service->delete();

        return redirect()->route('services.index')->with('success', 'Eliminado');
    }
}
