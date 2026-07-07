<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

use Laravel\Socialite\Facades\Socialite;

use Throwable;

class GoogleController extends Controller
{
    /**
     * Redirecciona al usuario hacia la autenticación de Google.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function redirect(): RedirectResponse
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Procesa la respuesta de autenticación enviada por Google.
     *
     * Si el usuario ya existe, inicia sesión.
     * Si existe una cuenta con el mismo correo, la vincula con Google.
     * Si no existe, crea una nueva cuenta.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function callback(): RedirectResponse
    {
        try {
            /** @var \Laravel\Socialite\Two\GoogleProvider $provider */
            $provider = Socialite::driver('google');

            $google = $provider
                ->stateless()
                ->user();

            if (! $google->getEmail()) {
                return redirect()
                    ->route('login')
                    ->with('error', 'No fue posible obtener el correo electrónico de Google.');
            }

            $user = $this->findOrCreateUser($google);

            Auth::login($user, true);

            return redirect()->intended('/');
        } catch (Throwable $e) {

            report($e);

            return redirect()
                ->route('login')
                ->with('error', 'No fue posible iniciar sesión con Google.');
        }
    }

    /**
     * Busca un usuario existente o crea uno nuevo.
     *
     * @param mixed $google
     * @return \App\Models\User
     */
    private function findOrCreateUser($google): User
    {
        $user = User::where('provider', 'google')
            ->where('provider_id', $google->getId())
            ->first();

        if ($user) {
            return $user;
        }

        $user = User::where('email', $google->getEmail())->first();

        if ($user) {

            $this->linkGoogleAccount($user, $google);

            return $user;
        }

        return $this->createGoogleUser($google);
    }

    /**
     * Vincula una cuenta existente con Google.
     *
     * @param \App\Models\User $user
     * @param mixed $google
     * @return void
     */
    private function linkGoogleAccount(User $user, $google): void
    {
        $data = [
            'provider' => 'google',
            'provider_id' => $google->getId(),
            'email_verified_at' => now(),
        ];

        if (! $user->avatar) {

            $avatar = $this->downloadAvatar($google->getAvatar());

            if ($avatar) {
                $data['avatar'] = $avatar;
            }
        }

        $user->update($data);
    }

    /**
     * Crea un nuevo usuario autenticado mediante Google.
     *
     * @param mixed $google
     * @return \App\Models\User
     */
    private function createGoogleUser($google): User
    {
        return User::create([
            'name' => $google->getName(),
            'email' => $google->getEmail(),
            'password' => Hash::make(Str::random(40)),
            'provider' => 'google',
            'provider_id' => $google->getId(),
            'email_verified_at' => now(),
            'avatar' => $this->downloadAvatar($google->getAvatar()),
        ]);
    }

    /**
     * Descarga un avatar remoto y lo almacena localmente.
     *
     * @param string|null $url URL del avatar.
     * @return string|null Ruta relativa almacenada o null si ocurre un error.
     */
    private function downloadAvatar(?string $url): ?string
    {
        if (blank($url)) {
            return null;
        }

        try {

            $response = Http::timeout(10)->get($url);

            if (! $response->successful()) {
                return null;
            }

            $filename = 'avatars/' . Str::uuid() . '.jpg';

            Storage::disk('public')->put($filename, $response->body());

            return $filename;
        } catch (Throwable $e) {

            report($e);

            return null;
        }
    }
}
