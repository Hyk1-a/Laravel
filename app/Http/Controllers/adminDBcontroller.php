<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class adminDBcontroller extends Controller
{
    public function index(){
        return view('admin.dashboard');
    }

    public function usermanagement(){
        $users = User::all();
        return view('admin.usermanagement',compact('users'));
    }
}

