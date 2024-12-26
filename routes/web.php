<?php

use App\Http\Controllers\adminDBcontroller;
use App\Http\Controllers\authcontroller;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use App\Http\Controllers\PostController;
use Doctrine\DBAL\Driver\Middleware;


// home page
Route::redirect('/','posts')->name('home');    

Route::resource('posts', PostController::class);

//user posts
Route::get('/{user}/posts', [DashboardController::class,'userPosts'])->name('posts.user');

//middleware for guest
Route::middleware('guest')->group(function(){
        //Register
    Route::view('/register', 'auth.register')->name('register');
    Route::post('/register', [authcontroller::class, 'register'])->name('register');
    // Login
    Route::view('/login', 'auth.login')->name('login');
    Route::post('/login', [authcontroller::class, 'login'])->name('login');

});

//middleware for auth
Route::middleware('auth')->group(function(){
    //Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');    
        //Logout
    Route::post('/logout', [authcontroller::class,'logout'])->name('logout');

});

Route::middleware('auth')->group(function(){
    //admin page
    Route::get('/admin', [adminDBcontroller::class, 'index'])->name('admin');   
    //admin to see registered users
    Route::get('/admin/users', [adminDBcontroller::class, 'usermanagement'])->name('admin.users');
    
});