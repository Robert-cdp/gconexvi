<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreRequest;
use App\Http\Requests\User\UpdateRequest;

class UserController extends Controller
{
    public function index()
    {
        return view('user.index');
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(StoreRequest $request)
    {
        User::create($request->validated());
        return redirect()->route('user.index')->with('success', 'User Creado.');
    }

    public function edit(string $slug)
    {
        $user = User::slug($slug)->firstOrFail()    ;
        return view('user.edit', $user->slug);
    }

    public function update(UpdateRequest $request, string $slug)
    {
        $user = User::slug($slug)->firstOrFail();
        $user->update($request->validated());
        return redirect()->route('user.index')->with('success', 'Actualizado');
    }

    public function destroy(string $slug)
    {
        $user = User::slug($slug)->firstOrFail();
        $user->delete();
        return redirect()->route('user.index')->with('succes', 'Eliminado');
    }
}
