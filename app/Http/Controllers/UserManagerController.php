<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserManagerController extends Controller
{
    public function index()
    {
        // Retrieve all users sorted alphabetically by first name and last name
        $users = User::orderBy('first_name')->orderBy('last_name')->get();

        return view('user.index', compact('users'));
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        // Validate the input
        $validatedData = $request->validate([
            'username' => 'required|unique:users',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        // Create a new user record
        User::create($validatedData);

        return redirect()->route('user.index')->with('success', 'User created successfully.');
    }

    public function show(User $user)
    {
        return view('user.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('user.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        // Validate the input
        $validatedData = $request->validate([
            'username' => 'required|unique:users,username,' . $user->id,
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:6',
        ]);

        // Update the user record
        $user->update($validatedData);

        return redirect()->route('user.index')->with('success', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        // Soft-delete the user record
        $user->delete();

        return redirect()->route('user.index')->with('success', 'User deleted successfully.');
    }
}
