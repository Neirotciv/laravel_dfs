<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class RegisterController extends Controller
{
    /**
     * Returns the view that allows users to register.
     *
     * @return View The view for creating a new registration.
     */
    public function create(): View 
    {
        return view('register.create');
    }

    
    /**
     * Stores a new user's data after validating the input.
     *
     * @return RedirectResponse A redirect response to the homepage with a success message.
     */
    public function store(): RedirectResponse
    {
        $attributes = request()->validate([
            'name' => ['required', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'min:10', 'max:255']
        ]);

        User::create($attributes);

        return redirect('/')->with('success', 'Votre compte à été créé.');
    }
}
