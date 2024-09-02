<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        // Fetch all users with their roles
        $users = User::with('roles')->get();
        $roles = Role::all();
        return view('accesscontrol', compact('users', 'roles'));
    }

    public function show(User $user)
    {
        // Fetch the user's roles
        $roles = $user->roles;
        return view('accesscontrol', compact('user', 'roles'));
    }

    public function create()
    {
        // Fetch all roles for role selection in the create form
        $roles = Role::all();
        return view('users.create', compact('roles'));
    }

    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
        'roles' => 'nullable|array',
        'roles.*' => 'exists:roles,id'
    ]);

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
    ]);

    // Fetch role names based on the provided IDs
    if ($request->roles) {
        $roleNames = Role::whereIn('id', $request->roles)->pluck('name')->toArray();
        $user->assignRole($roleNames);
    }

    return redirect()->route('users.index')->with('success', 'User created successfully.');
}


    public function edit(User $user)
    {
        // Fetch all roles and the user's current roles
        $roles = Role::all();
        $userRoles = $user->roles->pluck('id')->toArray();

        return view('users.edit', compact('user', 'roles', 'userRoles'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'roles' => 'nullable|array',
            'roles.*' => 'exists:roles,id'
        ]);

        // Update user data
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? bcrypt($request->password) : $user->password,
        ]);

        // Sync roles
        if ($request->roles) {
            $user->syncRoles($request->roles);
        } else {
            $user->syncRoles([]);
        }

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
