<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class UserController extends Controller
{
    public function create()
    {
        return view('users.register');
    }

    public function store(Request $request): RedirectResponse
    {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required| confirmed| min:6'
        ]);

        $formFields['password'] = bcrypt($formFields['password']);

        $formFields['surname'] = '';
        $formFields['address'] = '';
        $formFields['country'] = '';
        $formFields['balance'] = 0;

        $user = User::create($formFields);

        auth()->login($user);

        return redirect('/')->with('message', 'User registered and logged in');
    }

    public function logout(Request $request): RedirectResponse
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'You have been logged out');
    }

    public function login(): View
    {
        return view('users.login');
    }

    public function authenticate(Request $request): RedirectResponse
    {
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);


        if (auth()->attempt($formFields)) {
            $request->session()->regenerate();
            return redirect('/')->with('message', 'You are logged in');
        }


        return back()->withErrors(['email' => 'Invalid login'])->onlyInput('email');
    }

    public function dashboard(): View
    {
        $user = Auth::user();
        return view('users.dashboard', [
            'user' => $user
        ]);
    }
}
