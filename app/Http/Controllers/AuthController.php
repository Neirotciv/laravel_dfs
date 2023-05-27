<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Str;


class AuthController extends Controller
{
    /**
     * Attempts to log in a user with the given credentials.
     *
     * @param Request $request The Request object containing the user's login credentials.
     * @return RedirectResponse A redirect response to the homepage on successful login, or back to the login page with errors on failure.
     */
    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->to('/');
        }

        return back()->withErrors([
            'email' => "Les informations d'identification fournies ne correspondent pas à nos enregistrements.",
        ])->onlyInput('email');
    }


    /**
     * Logs out the currently authenticated user.
     *
     * @return RedirectResponse A redirect response to the homepage with a success message.
     */
    public function logout(): RedirectResponse
    {
        auth()->logout();
        return redirect('/')->with('success', 'Vous êtes deconnecté.');
    }


    /**
     * Redirects the user to the OAuth provider (Google) for authentication.
     *
     * @return RedirectResponse A redirect response to the Google OAuth service.
     */
    public function redirectToProvider(): RedirectResponse
    {
        return Socialite::driver('google')->redirect();
    }


    /**
     * Handles the OAuth callback from the provider (Google). If the user exists, logs them in; otherwise, creates and logs in a new user.
     *
     * @return RedirectResponse A redirect response to the homepage.
     */
    public function handleProviderCallback(): RedirectResponse
    {
        try {
            $user = Socialite::driver('google')->user();
        } catch (\Exception $e) {
            return redirect('/');
        }

        $existingUser = User::where('email', $user->email)->first();

        if ($existingUser) {
            auth()->login($existingUser, true);
        } else {
            $newUser = new User;
            $newUser->name = $user->name;
            $newUser->email = $user->email;
            $newUser->service_id = $user->id;
            $newUser->password = Str::uuid()->toString();
            $newUser->save();
            auth()->login($newUser, true);
        }
        
        return redirect()->to('/');
    }
}
