<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreRequest;
use App\Http\Requests\User\UpdateRequest;
use App\Models\User;

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

    }

    public function update(UpdateRequest $request, string $slug)
    {

    }

    public function destroy(string $slug)
    {

    }
}
