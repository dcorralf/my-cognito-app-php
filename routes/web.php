<?php

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

Route::get('/login', function () { return view('welcome'); })->name('login');

/*
| Cognito Authentication flow routes
*/
Route::get('oauth2/login', [CognitoController::class, 'redirect'])->name('redirect');
Route::get('oauth2/callback', [CognitoController::class, 'callback'])->name('callback');

/*
| Logout get route
*/
//Route::get('/logout', function () {
//    return view('welcome');
//})->name('logout');

/*
| Protected routes
*/
Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/logout', [CognitoController::class, 'cognitoLogout'])->name('logout');
});


