<?php

namespace App\Http\Controllers\Categories;

use App\Models\Categories\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\Categories\Store;
use App\Http\Requests\Categories\Update;

/**
 * Class CategoryController
 *
 * Controlador para la administración de categorías.
 * - CRUD completo usando slugs como identificadores en rutas
 * - Manejo de contextos de visibilidad (category_contexts)
 * - Form Requests personalizados para validación
 */
class CategoryController extends Controller
{
    /**
     * Listado de todas las categorías.
     *
     * Carga las relaciones 'parent' y 'contexts' para mostrar
     * la jerarquía y los módulos donde aparece cada categoría.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $categories = Category::with(['parent', 'contexts'])
            ->orderBy('name')
            ->get();

        return view('categories.index', compact('categories'));
    }

    /**
     * Formulario para crear una nueva categoría.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $categories = Category::orderBy('name')->get();
        $contexts = config('categories.contexts');

        return view('categories.create', compact('categories', 'contexts'));
    }

    /**
     * Almacena una nueva categoría en la base de datos.
     *
     * Crea la categoría y sus contextos asociados en la tabla 'category_contexts'.
     *
     * @param  Store  $request  Form Request validado
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Store $request)
    {
        $category = Category::create($request->safe()->except('contexts'));

        $category->contexts()->createMany(
            collect($request->validated('contexts'))
                ->map(fn($context) => [
                    'context' => $context,
                ])
                ->all()
        );

        return redirect()
            ->route('categories.index')
            ->with('success', 'Categoría creada correctamente.');
    }

    /**
     * Muestra los detalles de una categoría específica.
     *
     * @param  string  $slug  Slug único de la categoría
     * @return \Illuminate\View\View
     */
    public function show(string $slug)
    {
        $category = Category::slug($slug)->firstOrFail();

        return view('categories.show', compact('category'));
    }

    /**
     * Formulario para editar una categoría existente.
     *
     * Excluye la categoría actual de la lista de posibles padres.
     *
     * @param  string  $slug  Slug de la categoría a editar
     * @return \Illuminate\View\View
     */
    public function edit(string $slug)
    {
        $category = Category::with('contexts')
            ->slug($slug)
            ->firstOrFail();

        $categories = Category::whereKeyNot($category->id)
            ->orderBy('name')
            ->get();

        $contexts = config('categories.contexts');

        return view('categories.edit', compact('category', 'categories', 'contexts'));
    }

    /**
     * Actualiza la información de una categoría y sus contextos.
     *
     * Reemplaza completamente los contextos anteriores por los nuevos.
     *
     * @param  Update  $request  Form Request validado
     * @param  string  $slug     Slug de la categoría a actualizar
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Update $request, string $slug)
    {
        $category = Category::slug($slug)->firstOrFail();

        $category->update($request->safe()->except('contexts'));

        $category->contexts()->delete();

        $category->contexts()->createMany(
            collect($request->validated('contexts'))
                ->map(fn($context) => [
                    'context' => $context,
                ])
                ->all()
        );

        return redirect()
            ->route('categories.index')
            ->with('success', 'Categoría actualizada correctamente.');
    }

    /**
     * Elimina una categoría de la base de datos.
     *
     * Si el modelo usa SoftDeletes, esto será un borrado lógico.
     *
     * @param  string  $slug  Slug de la categoría a eliminar
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(string $slug)
    {
        $category = Category::slug($slug)->firstOrFail();

        $category->delete();

        return redirect()
            ->route('categories.index')
            ->with('success', 'Categoría eliminada correctamente.');
    }
}