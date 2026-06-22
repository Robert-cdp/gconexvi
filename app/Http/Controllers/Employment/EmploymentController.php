<?php

namespace App\Http\Controllers\Employment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Employment\Store;
use App\Http\Requests\Employment\Update;
use App\Models\Employment\Employment;
use Illuminate\Http\Request;

class EmploymentController extends Controller
{
    public function index()
    {
        return view('employment.index');
    }

    public function create()
    {
        return view('employment.create');
    }

    public function store(Store $request)
    {
        $employment = Employment::create($request->validated());

        return redirect()->route('employment.show', $employment->slug)->with('success', 'Creado Correctamente.');
    }

    public function show(string $slug)
    {
        $employment = Employment::slug($slug)->firstOrFail();

        return view('employment.show', compact('employment'));
    }

    public function edit(string $slug)
    {
        $employment = Employment::slug($slug)->firstOrFail();
    
        return view('employment.edit', compact($employment));
    }

    public function update(Update $request, string $slug)
    {
        $employment = Employment::slug($slug)->firstOrFail();

        $employment->update($request->validated());

        return redirect()->route('employment.show', $employment->slug)->with('success', 'Actualizado');
    }

    public function destroy(string $slug)
    {  
        $employment = Employment::slug($slug)->firstOrFail();
        
        $employment->delete();

        return redirect()->route('employment.index')->with('success', 'Eliminado');
    }
}
