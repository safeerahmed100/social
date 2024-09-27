<?php

use Illuminate\Http\Request;
use App\Http\controllers\auth\loginController; 
use App\Http\controllers\auth\logoutController; 
use App\Http\controllers\auth\signupController; 
use App\Http\controllers\auth\profileController; 

use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function(){
    Route::get('/',[loginController::class,'index'])->name('login.view');
    Route::post('/login',[loginController::class,'login'])->name('login');
    Route::get('/signup',[signupController::class,'index'])->name('signup.view');
    Route::post('/register',[signupController::class,'signup'])->name('signup');  
    });
    Route::middleware('auth:sanctum')->group(function(){
    Route::post('/logout',[logoutController::class,'logout'])->name('logout');
    Route::post('/profile',[profileController::class,'setupProfile'])->name('profile.setup');

    });

    Route::middleware('auth')->group(function(){
    Route::get('/welcome',function(){
        return view('welcome');
    })->name('welcome');
    
    });