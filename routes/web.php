<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\ProfileController;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

//Mandar a esta ruta para hacer logout
Route::get('/logout', function (Request $request) {
    Auth::logout();
 
    $request->session()->invalidate();
 
    $request->session()->regenerateToken();
    return view('auth.login');
});

//Ruta para ver todos los libros, debe restringirse a administrador
Route::resource('/libros', LibroController::class)->middleware('auth');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function (User $user) {
    return view('dashboard');
})->name('dashboard');

Route::get('/users', function () {
    return view('admin.users.index');
});

/* Route::get('/profile', function () {
    return view('user.profile');
}); */

Route::resource('/profile', ProfileController::class);
//Route::resource('/users', UsersController::class);

