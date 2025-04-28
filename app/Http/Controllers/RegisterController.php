<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{
    /**
     * Show the registration form.
     */
    public function index(): View
    {
        return view('register.index', [
            'title' => 'Register',
            'active' => 'register'
        ]);
    }

    /**
     * Handle a registration request.
     */
    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'min:3', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email:dns', 'max:255', 'unique:users'],
            'password' => [
                'required',
                'string',
                Password::min(5)
                    ->numbers()
                    ->symbols()
                    ->uncompromised(),
                'max:255'
            ],
            'location' => ['required', 'string', 'min:5', 'max:255']
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'username' => $validatedData['username'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'location' => $validatedData['location']
        ]);

        // Optional: Login the user immediately after registration
        // auth()->login($user);

        return redirect()
            ->route('login')
            ->with('success', 'Registration successful! Please login.');
    }
}