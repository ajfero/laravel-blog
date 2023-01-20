<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthenticatedSessionController extends Controller
{
    public function store(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ]);

        // login incorrect
        // attemp intent with the credential with a boolean for confirm the login 
        // $request-input('remember') return on/off if checkbox are check or not.
        // $request->boolean('remember') the method attempt received a boolean with first ans second parament it for that we used boolean()
        if (!Auth::attempt($credentials, $request->boolean('remember'))) {
            // return with exception to the user with validation error -> below the label specific.
            throw ValidationException::withMessages([
                'email' => __('auth.failed')
            ]);
        }

        // login success
        $request->session()->regenerate();

        // return to the old route where we come from
        // return redirect()->intended(/route)
        return redirect()->intended()
            ->with('status', 'You are logged in');
    }

    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        // regeneramos el token csrf
        $request->session()->regenerateToken();

        return to_route('login')
            ->with('status', 'You are logged out!');
    }
}
