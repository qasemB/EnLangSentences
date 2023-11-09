<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// guests routes group-------------------------->>>
Route::middleware(["guest"])->group(function (){
    Route::get('/register', function () {return view('auth.register');});
    Route::post('/register', [AuthController::class, "register"])->name("register");
    Route::get('/login', function () {return view('auth.login');})->name("login");
    Route::post('/login', [AuthController::class, "login"])->name("login");
});


// authed routes group-------------------------->>>
Route::middleware(["auth"])->group(function (){
    Route::get('/logout', [AuthController::class, "logout"]);
});

// rest routes--------------------------------->>>
Route::get('/', [HomeController::class, "index"]);





