<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\Store;
use App\Http\Requests\Product\Update;
use App\Models\Categories\Category;
use App\Models\Products\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProductController extends Controller
{
       /**
     * Listado de productos.
     */
    public function index(): View
    {
        $products = Product::query()
            ->with(['user', 'categories'])
            ->where('status', 'active')
            ->latest()
            ->paginate(20);

        return view('marketplace.index', compact('products'));
    }

    /**
     * Mostrar formulario de creación.
     */
    public function create(): View
    {
        $categories = Category::treeForContext('marketplace')
            ->orderBy('name')
            ->get();

        return view('marketplace.create', compact('categories'));
    }

    /**
     * Guardar producto.
     */
    public function store(Store $request): RedirectResponse
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image'] = $request
                ->file('image')
                ->store('marketplace', 'public');
        }

        $data['user_id'] = Auth::user()->id;

        $product = Product::create($data);

        if (! empty($data['category_id'])) {
            $product->categories()->sync([$data['category_id']]);
        }

        return redirect()
            ->route('marketplace.show', $product)
            ->with('success', 'Producto publicado correctamente.');
    }

    /**
     * Mostrar producto.
     */
    public function show(Product $product): View
    {
        abort_if($product->status !== 'active' && Auth::user()->id !== $product->user_id, 404);

        $product->load([
            'user',
            'categories',
            'conversations',
        ]);

        return view('marketplace.show', compact('product'));
    }

    /**
     * Formulario de edición.
     */
    public function edit(Product $product): View
    {
        $categories = Category::treeForContext('marketplace')
            ->orderBy('name')
            ->get();

        $this->authorize('update', $product);

        return view('marketplace.edit', compact('product', 'categories'));
    }

    /**
     * Actualizar producto.
     */
    public function update(Update $request, Product $product): RedirectResponse
    {
        $this->authorize('update', $product);

        $data = $request->validated();

        if ($request->hasFile('image')) {

            if ($product->image && Storage::disk('public')->exists($product->image)) {
                Storage::disk('public')->delete($product->image);
            }

            $data['image'] = $request
                ->file('image')
                ->store('marketplace', 'public');
        }

        $product->update($data);

        if (! empty($data['category_id'])) {
            $product->categories()->sync([$data['category_id']]);
        }

        return redirect()
            ->route('marketplace.show', $product)
            ->with('success', 'Producto actualizado correctamente.');
    }

    /**
     * Eliminar producto.
     */
    public function destroy(Product $product): RedirectResponse
    {
        $this->authorize('delete', $product);

        if ($product->image && Storage::disk('public')->exists($product->image)) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();

        return redirect()
            ->route('marketplace.index')
            ->with('success', 'Producto eliminado correctamente.');
    }
}
