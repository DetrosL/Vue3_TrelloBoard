<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $Users = User::all();
        return response()->json($Users);
    }

    public function store(Request $request)
    {

       $request->validate([
            'status' => 'required|string|min:1',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        return response()->json($user, 201);
    }

    public function show(string $id)
    {
        $User = User::find($id);
        return response()->json($User);
    }

    public function edit(string $id)
    {
        $user = User::find($id);
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'status' => 'required|in:active,inactive',
            'name' => 'required|max:255',
            'email' => 'required',
            'password' => 'sometimes|min:8|confirmed',
        ]);
        
        $User = User::find($id);
        $User->update($request->all());
        return redirect()->route('user.index')->with('success', 'User updated successfully.');
    }

    public function destroy(string $id)
    {
        $User = User::find($id);
        $User->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully');
    }
}