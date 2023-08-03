<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('guest.dashboard');
});

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::get('/user/dashboard', 'DashboardController@userDashboard')->name('guest.dashboard');

Route::group(['middleware' => ['auth', 'role:owner|guest']], function() {
    Route::get('/user/form-booking', 'BookingController@formAdd')->name('guest.form.booking');

    Route::get('/user/about', function() {
        return view('user.about');
    })->name('about');

    Route::post('/user/form-booking', 'BookingController@storeData')->name('store.book');

    Route::get('/user/history-booking', 'BookingController@listBookingUser')->name('history.book');

    Route::get('/user/form-testimoni/{kd_booking}', 'TestimoniController@index')->name('guest.form.testimoni');

    Route::post('/user/form-testimoni/{kd_booking}', 'TestimoniController@storeData')->name('store.testimoni');
});

Route::group(['middleware' => ['auth', 'role:owner']], function() {
    Route::delete('/delete-booking/{kd_booking}', 'BookingController@delete')->name('delete.book');
});

Route::group(['middleware' => ['auth', 'role:owner|mekanik']], function() {
    Route::get('/admin/list-booking/{filter?}', 'BookingController@index')->name('list.book');

    Route::patch('/patch-booking/{kd_booking}/{status}', 'BookingController@patch')->name('patch.book');

    Route::get('/admin/list-testimoni', 'TestimoniController@listTestimoniUser')->name('list.testimoni');
});

Route::group(['middleware' => ['auth']], function() {
    Route::post('/logout', 'AuthController@logout')->name('logout');

});

Route::get('/login', function() {
    return view('auth.login');
})->name('login');

Route::post('/login', 'AuthController@login')->name('login.proses');

Route::get('/register', function() {
    return view('auth.register');
})->name('register.form');

Route::post('/register', 'AuthController@store')->name('register.proses');
