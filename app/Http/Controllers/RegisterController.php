<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create(): View 
    {
        return view('register.create');
    }

    public function store() 
    {
        $attributes = request()->validate([
            'name' => ['required', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'min:10', 'max:255']
        ]);

        $user = User::create($attributes);

        // with() = session()->flash()
        return redirect('/')->with('success', 'Votre compte à été créé.');
    }
}
