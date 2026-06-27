<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\UpdateData;
use App\Http\Requests\Profile\UpdatePassword;

class UserSettingsController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        return view('user.settings.data', compact('user'));
    }

    public function update(UpdateData $request)
    {
        $user = $request->user();

        $user->update($request->validated());

        return back()->with('success', 'Datos actualizados correctamente.');
    }

    public function password(Request $request)
    {
        $user = $request->user();

        return view('user.settings.password', compact('user'));
    }

    public function updatePassword(UpdatePassword $request)
    {
        $user = $request->user();

        $user->update([
            'password' => $request->password,
        ]);

        return back()->with('success', 'Contraseña actualizada correctamente.');
    }
}