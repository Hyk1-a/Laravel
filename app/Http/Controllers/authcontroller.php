<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;

class authcontroller extends Controller
{
    public function register(Request $request){
        $request->validate([
            'username' => ['required','max:255', 'string', 'unique:users'],
            'email' => ['required','email', 'max:255','unique:users'],
            'password' => ['required','min:5', 'confirmed'],
        ]);
        //Register User
        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Hash the password
        ]);

        //Login User
        Auth::login($user);

        //Redirect
        return redirect()->route('home');   
    }
    
    //Login Function
    public function login(Request $request){
        $fields = $request->validate([
            'email' => ['required','email', 'max:255'],
            'password' => ['required'],
        ]);
    
        if (Auth::attempt($fields, $request->remember)) {
            
            // Check if the user is an admin
            if ($request->user()->usertype === 'admin') {
                return redirect()->route('admin');
            }
            // Redirect non-admin users to the dashboard
                return redirect()->intended('/dashboard');
        }
        else 
        {
            return back()->withErrors([
                'failed' => 'Email or Password is incorrect'
            ]);
        }
    }
    
    //logout function
    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
    

}
