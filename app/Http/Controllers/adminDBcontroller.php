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

    public function show(){

        $users = User::all();
        return view('admin.usermanagement',compact('users'));

    }
    public function adminshow(){

        $users = User::all();
        return view('admin.adminManagement',compact('users'));
        
    }
}

