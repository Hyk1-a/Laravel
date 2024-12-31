<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class adminDBcontroller extends Controller 
{
    public function index(){

        return view('admin.dashboard');
    }
    public function adminshow(){

        $users = User::all();

        return view('admin.adminManagement',compact('users'));
        
    }
    public function show(){
        $users = User::all();

        return view('admin.usermanagement',compact('users'));

    }

}

