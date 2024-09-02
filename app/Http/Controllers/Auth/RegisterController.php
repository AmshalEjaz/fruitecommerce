<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class RegisterController extends Controller
{
    // Show the registration form
    public function showRegistrationForm()
    {
        return view('register');
    }

    // Handle the registration process
    public function register(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Ensure the 'customer' role exists
        $this->createCustomerRoleIfNotExists();

        // Create the user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Assign 'customer' role to the user
        $user->assignRole('customer');

        // Log the user in
        Auth::login($user);

        // Redirect based on the user's role
        return $this->redirectBasedOnRole($user);
    }

    // Create the 'customer' role if it does not exist
    protected function createCustomerRoleIfNotExists()
    {
        if (!Role::where('name', 'customer')->exists()) {
            Role::create(['name' => 'customer']);
        }
    }

    // Redirect users based on their role
    protected function redirectBasedOnRole($user)
    {
        if ($user->hasRole('customer')) {
            return redirect()->route('index');
        } elseif ($user->hasRole('admin') || $user->hasRole('super admin')) {
            return redirect()->route('admin.index');
        } else {
            return redirect()->route('index');
        }
    }
}
