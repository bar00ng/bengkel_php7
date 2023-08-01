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
    return view('user.index');
});

Route::group(['middleware' => ['auth', 'role:owner|guest']], function() {

});

Route::group(['middleware' => ['auth', 'role:owner']], function() {});

Route::group(['middleware' => ['auth', 'role:owner|mekanik']], function() {
    Route::get('/admin/dashboard', function() {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('/admin/list-bookin', 'BookingController@index')->name('list.book');
});

Route::group(['middleware' => ['auth']], function() {
    Route::post('/logout', 'AuthController@logout')->name('logout');

    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
});

Route::get('/login', function() {
    return view('auth.login');
})->name('login.form');
Route::post('/login', 'AuthController@login')->name('login.proses');

Route::get('/register', function() {
    return view('auth.register');
})->name('register.form');
Route::post('/register', 'AuthController@store')->name('register.proses');

Route::get('/user/dashboard', function() {
    return view('user.index');
})->name('guest.dashboard');

Route::get('/user/form-booking', function() {
    return view('user.formBooking');
})->name('guest.form.booking');

Route::get('/user/about', function() {
    return view('user.about');
})->name('about');