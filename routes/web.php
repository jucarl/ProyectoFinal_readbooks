<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\CategoriaController;
use App\Models\Libro;
use App\Models\User;
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
    if (Auth::check()) {
        return view('dashboard');
    }
    else {
        return view('auth.login');
    }

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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    if(auth()->user()->is_admin == 1)
        return view('dashboard');
    else
        return view('user.index');
})->name('dashboard');

Route::get('/inicio', function () {
    return view('user.index');
})->middleware('auth');

Route::get('/profile', function () {
    return view('profile.show');
})->middleware('auth');

Route::get('create',[LibroController::class, 'create'])->name('create')->middleware('auth');

Route::resource('/perfil', ProfileController::class)->middleware('auth');
Route::resource('/autores', UsersController::class)->middleware('auth');
Route::resource('/categorias', CategoriaController::class)->middleware('auth');

//Route::get('/categorias/{categoria}',function($categoria){
//    return view('user.categoria')->with('categoria', $categoria);;
//});

Route::get('/autores/{id}', 'App\Http\Controllers\UsersController@show')->middleware('auth');

Route::get('/site-search',[LibroController::class, 'search']);

Route::get('search-demo', function(){
    return view('search');
});
