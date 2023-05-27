<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\RedirectResponse;
use Laravel\Socialite\Facades\Socialite;

class GithubController extends Controller
{
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return RedirectResponse
     */
    public function redirectToProvider(): RedirectResponse
    {
        return Socialite::driver('github')->redirect();
    }

    
    /**
     * Obtain the user information from GitHub and log the user into the application.
     * If the user does not exist, the method will create a new user.
     *
     * @return RedirectResponse
     */
    public function handleProviderCallback(): RedirectResponse
    {
        try {
            $user = Socialite::driver('github')->user();
        } catch (\Exception $e) {
            return redirect('/');
        }

        $existingUser = User::where('email', $user->email)->first();
        
        if ($existingUser) {
            auth()->login($existingUser, true);
        } else {
            $newUser = new User;
            $newUser->name = $user->name ?? $user->nickname;
            $newUser->email = $user->email;
            $newUser->service_id = $user->id;
            $newUser->password = Str::uuid()->toString();
            $newUser->save();
            auth()->login($newUser, true);
        }

        return redirect()->to('/');
    }
}
