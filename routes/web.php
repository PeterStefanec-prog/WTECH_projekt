<?php

use Illuminate\Support\Facades\Route;
// for auth
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('index');
});



// ****************************************************
// ********************* Authorization *********************

// show login form - we go to localhost:8000/login
// it triggers showLoginForm() method in AuthController
// and it returns view('auth.login-page')
Route::get('login', [AuthController::class, 'showLoginForm'])
    ->name('login');

// send login form
Route::post('login', [AuthController::class, 'login']);

// logout - only with post
Route::post('logout', [AuthController::class, 'logout'])
    ->name('logout');

// show registration form
Route::get('register', [AuthController::class, 'showRegistrationForm'])
    ->name('register');

// send registtration form
Route::post('register', [AuthController::class, 'register']);

// profile for logged in users
Route::middleware('auth')->get('profile', [AuthController::class, 'profile'])
    ->name('profile.show');

// // ********************* end of authorization *********************
// ****************************************************


// ****************** profile *****************
Route::middleware('auth')->put('/profile', [AuthController::class, 'updateProfile'])
    ->name('profile.update');
// ****************** end of profile *****************
