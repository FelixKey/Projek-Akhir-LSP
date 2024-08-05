<?php

use Illuminate\Support\Facades\Route;

// require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('home',["title" => "home"]);	
});

Route::get('/home', function () {
    return view('home',["title" => "home"]);	
});

Route::get('/register', function () {
    return view('auth/register',["title" => "register"]);
});

Route::get('/login', function () {
    return view('auth/login',["title" => "login"]);
});

Route::get('/about', function () {
    return view('about',["title" => "about"]);
});

Route::get('/dashboard', function () {
    return view('dashboard',["title" => "dashboard"]);
});

Route::get('/akun', function () {
    return view('akun/index',["title" => "dashboard"]);
});