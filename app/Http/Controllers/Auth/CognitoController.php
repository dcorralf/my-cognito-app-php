<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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

            $name = $cognitoUser->user['username'] ?? $cognitoUser->getName();

            $user = User::updateOrCreate(
                [
                    'email' => $cognitoUser->getEmail(),
                ],
                [
                    'name' => $name,
                    'cognito_id' => $cognitoUser->getId(),
                    'password' => '',
                ]
            );

            Auth::login($user, true);

            session(["cognito_user_object" => $cognitoUser]);
            return redirect('/home');

        } catch (Exception $e) {
            // Log register for debugging
//            Log::error($e->getMessage());
            return redirect('/error')->with('error', 'Algo salió mal durante la autenticación.');
        }
    }

    public function cognitoLogout() {
        Auth::logout(); // Log out app
        return redirect(Socialite::driver('cognito')->logoutCognitoUser()); // Call cognito logout url
    }
}

