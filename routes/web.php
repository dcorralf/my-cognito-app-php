<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\CognitoController;
use App\Http\Controllers\HomeController;

/*
| Welcome public route
*/
Route::get('/', function () {
    return view('welcome');
});

Route::get('/error', function () {
    return view('home');
});

Route::get('/login', function () { return view('auth.login'); })->name('login');
Route::post('/login', [LoginController::class, 'login']);


/*
| Cognito Authentication flow routes
*/
Route::get('oauth2/login', [CognitoController::class, 'redirect'])->name('redirect');
Route::get('oauth2/callback', [CognitoController::class, 'callback'])->name('callback');

/*
| Logout get route
*/
Route::get('/logout', function () {
    return view('welcome');
})->name('logout');

/*
| Protected routes
*/
Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    // This below we can add any authentication route
    Route::post('/logout', [CognitoController::class, 'cognitoLogout'])->name('logout');
});


