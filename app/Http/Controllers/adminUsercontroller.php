<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class adminUsercontroller extends Controller
{
    public function create()
    {   
        return view('admin.Create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'usertype' => 'required|in:user,admin',
        ]);

        User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'usertype' => $request->usertype,
        ]);

        return redirect()->route('admin.users')->with('success', 'User created successfully!');
    }
    
    public function edit($id)
    {
        $user = User::findorFail($id);
        if (!$user) { 
            return redirect()->back()->with('error', 'User not found'); 
        }
        return view('admin.userEdit', ['user' => $user]);
    }
    

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'usertype' => 'required|in:user,admin',
        ]);

        $user->update([
            'username' => $request->username,
            'email' => $request->email,
            'usertype' => $request->usertype,
        ]);

        return redirect()->route('admin.users')->with('success', 'User updated successfully!');
    }
    
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.users')->with('success', 'User deleted successfully!');
    }
    
}
