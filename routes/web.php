<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\CognitoController;
use App\Http\Controllers\HomeController;

/*
| Ruta de bienvenida pública
*/
Route::get('/', function () {
    return view('welcome');
});

Route::get('/error', function () {
    return view('home');
});


/*
| Rutas para el flujo de autenticación con Cognito
*/
Route::get('oauth2/login', [CognitoController::class, 'redirect'])->name('redirect');
Route::get('oauth2/callback', [CognitoController::class, 'callback'])->name('callback');

/*
| Ruta para cerrar sesión
| Nota: Es mejor usar un método POST para el logout por seguridad.
*/
Route::post('/logout', [CognitoController::class, 'cognitoLogout'])->name('logout');
Route::get('/logout', function () {
    return view('logout');
})->name('logout');

/*
| Rutas protegidas que requieren autenticación
*/
Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    // Aquí puedes añadir más rutas que necesiten que el usuario esté logueado
});


