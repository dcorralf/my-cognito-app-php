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

/*
| Rutas para el flujo de autenticación con Cognito
*/
Route::get('/login/cognito', [CognitoController::class, 'redirect'])->name('cognito.redirect');
Route::get('/login/cognito/callback', [CognitoController::class, 'callback'])->name('cognito.callback');

/*
| Ruta para cerrar sesión
| Nota: Es mejor usar un método POST para el logout por seguridad.
*/
Route::post('/logout', [CognitoController::class, 'logout'])->name('logout');


/*
| Rutas protegidas que requieren autenticación
*/
Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    // Aquí puedes añadir más rutas que necesiten que el usuario esté logueado
});

//Auth::routes();
