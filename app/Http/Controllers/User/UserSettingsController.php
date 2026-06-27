<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\UpdateAvatar;
use App\Http\Requests\Profile\UpdateBio;
use App\Http\Requests\Profile\UpdateData;
use App\Http\Requests\Profile\UpdatePassword;
use Illuminate\Support\Facades\Storage;

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
        $request->user()->update([
            'password' => $request->safe()->only('password')['password'],
        ]);

        return back()->with('success', 'Contraseña actualizada correctamente.');
    }

    public function avatar(Request $request)
    {
        return view('user.settings.avatar', [
            'user' => $request->user(),
        ]);
    }

    public function updateAvatar(UpdateAvatar $request)
    {
        $user = $request->user();

        if ($user->avatar) {
            Storage::disk('public')->delete($user->avatar);
        }

        $path = $request->file('avatar')->store('avatars', 'public');

        $user->update([
            'avatar' => $path,
        ]);

        return back()->with('success', 'Foto de perfil actualizada correctamente.');
    }

    public function bio(Request $request)
    {
        return view('user.settings.bio', [
            'user' => $request->user(),
        ]);
    }

    public function updateBio(UpdateBio $request)
    {
        $request->user()->update(
            $request->validated()
        );

        return back()->with('success', 'Biografía actualizada correctamente.');
    }
}
