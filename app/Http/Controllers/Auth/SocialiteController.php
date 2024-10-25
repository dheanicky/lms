<?php

namespace App\Http\Controllers\Auth;

use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class SocialAuthController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->stateless()->user();
        $this->loginOrRegisterUser($user, 'google');
        return redirect()->intended('/dashboard');
    }

    public function redirectToGithub()
    {
        return Socialite::driver('github')->redirect();
    }

    public function handleGithubCallback()
    {
        $user = Socialite::driver('github')->stateless()->user();
        $this->loginOrRegisterUser($user, 'github');
        return redirect()->intended('/dashboard');
    }

    protected function loginOrRegisterUser($socialUser, $provider)
    {
        $user = User::updateOrCreate(
            ['email' => $socialUser->getEmail()],
            [
                'name' => $socialUser->getName(),
                'provider_id' => $socialUser->getId(),
                'provider_name' => $provider,
            ]
        );

        Auth::login($user);
    }
}
