<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Role\Store;
use App\Http\Requests\Role\Update;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        return view('role.index');
    }

    public function create()
    {
        return view('role.create');
    }
    
    public function store(Store $request)
    {
        $role = Role::create($request->validated());

        return redirect()->route('roles.show', $role->slug)->with('success', 'Creado.');
    }

    public function show(string $slug)
    {
        $role = Role::slug($slug)->firstOrFail();

        return view('role.show', compact('role'));
    }

    public function edit(string $slug)
    {
        $role = Role::slug($slug)->firstOrFail();

        return view('role.edit', compact('role'));
    }

    public function update(Update $request, string $slug)
    {
        $role = Role::slug($slug)->firstOrFail();

        $role->update($request->validated());

        return redirect()->route('roles.show', $role->slug)->with('success', 'Actualizado.');
    }

    public function destroy(string $slug)
    {
        $role = Role::slug($slug)->firstOrFail();

        $role->delete();

        return redirect()->route('roles.index')->with('success', 'Eliminado.');
    }
}
