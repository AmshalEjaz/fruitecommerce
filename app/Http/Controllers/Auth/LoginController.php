<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Show the login form
    public function showLoginForm()
    {
        return view('login');
    }

    // Handle the login process
    public function login(Request $request)
    {
        // Validate the request
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Attempt to log in the user
        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();
            return $this->redirectBasedOnRole($user);
        }

        // Redirect back with an error if credentials do not match
        return redirect()->back()->withErrors(['email' => 'These credentials do not match our records.']);
    }

    // Redirect users based on their role
    protected function redirectBasedOnRole($user)
    {
        if ($user->hasRole('customer')) {
            return redirect()->route('index'); // Redirect customer to the index page
        } else {
            return redirect()->route('admin'); // Default redirect if role is not recognized
        }
    }

    // Handle logout
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }
}
