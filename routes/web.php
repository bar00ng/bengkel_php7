<?php

use Illuminate\Support\Facades\Route;

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
<<<<<<< HEAD
    return view('admin.dashboard');
=======
    return view('user.index');
>>>>>>> 604d4fe72c5503e4c5f6f642b7870bf36511aa02
});

Route::group(['middleware' => ['auth']], function() {
    Route::get('/dashboard', '')->name('dashboard');

    Route::post('/logout', 'AuthController@logout')->name('logout');
});


Route::get('/login', function() {
    return view('auth.login');
})->name('login.form');
Route::post('/login', 'AuthController@login')->name('login.proses');

Route::get('/register', function() {
    return view('auth.register');
})->name('register.form');
Route::post('/register', 'AuthController@store')->name('register.proses');

Route::middleware('redirectIfAuthenticated')->group(function (){
    Route::get('/login', function() {
        return view('auth.login')->with('401', 'Silahkan login terlebih dahulu!');
    })->name('login');
});