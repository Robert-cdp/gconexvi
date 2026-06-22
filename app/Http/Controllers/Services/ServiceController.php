<?php

namespace App\Http\Controllers\Services;

use App\Models\Services\Service;
use App\Http\Controllers\Controller;
use App\Http\Requests\Services\Store;
use App\Http\Requests\Services\Update;

class ServiceController extends Controller
{
    public function index()
    {
        return view('services.index');
    }

    public function create()
    {
        return view('services.create');
    }

    public function store(Store $request)
    {
        $service = Service::create($request->validated());
        return redirect()->route('services.show', $service->slug)->with('success', 'Creado Correctamente.');
    }

    public function show(string $slug)
    {
        $service = Service::slug($slug)->firstOrFail();
        return view('services.show', $service->slug);
    }

    public function edit(string $slug)
    {
        $service = Service::slug($slug)->firstOrFail();
        return view('services.edit', $service->slug);
    }

    public function update(Update $request, string $slug)
    {
        $service = Service::slug($slug)->firstOrFail();
        $service->update($request->validated());
        return redirect()->route('services.show', $service->slug)->with('success', 'Actualizado');
    }

    public function destroy(string $slug)
    {
        $service = Service::slug($slug)->firstOrFail();
        $service->delete();
        return redirect()->route('services.index')->with('success', 'Eliminado');
    }
}
