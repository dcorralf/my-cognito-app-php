<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use SocialiteProviders\Cognito\Provider;

class CognitoController extends Controller
{
    public function redirect(): \Symfony\Component\HttpFoundation\RedirectResponse|\Illuminate\Http\RedirectResponse
    {
        return Socialite::driver('cognito')->redirect();
    }

    public function callback(): \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
    {
        $user = null;
        try {
            /** @var Provider $cognitoDriver */
            /** @var \Laravel\Socialite\Contracts\User $cognitoUser */
            $cognitoUser = Socialite::driver('cognito')->stateless()->user();
            $user = User::updateOrCreate(
                [
                    'email' => $cognitoUser->getEmail(),
                ],
                [
                    'name' => $cognitoUser->getName(),
                    'cognito_id' => $cognitoUser->getId(),
                ]
            );

            Auth::login($user, true);
//            die($user);

            return redirect('/home'); // laravel/ui redirige a /home

        } catch (Exception $e) {
            // Puedes registrar el error para depuración
//            Log::error($e->getMessage());
//            die($user);
            return redirect('/error')->with('error', 'Algo salió mal durante la autenticación.');
        }
    }

    public function cognitoLogout() {
        Auth::logout(); // Log out app
        return redirect(Socialite::driver('cognito')->logoutCognitoUser()); // Call cognito logout url
    }
}

