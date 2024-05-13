<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    if (!Auth::check()) {
        return view('auth.login');
    }
    return redirect(url('/dashboard'));
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
