<?php

use Illuminate\Support\Facades\Route;

// require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('home');
});

Route::get('/home', function () {
    return view('home',["title" => "home"]);	
});

Route::get('/about', function () {
    return view('about',["title" => "about"]);
});

Route::get('/dashboard', function () {
    return view('dashboard',["title" => "dashboard"]);
});

use App\Http\Controllers\UserController;
Route::get("/user", [UserController::class, "index"])->name("user.index");
Route::get("/user/detail/{id}", [UserController::class, "detail"])->middleware('auth')->name("user.detail");
Route::get("/user/register", [UserController::class, "register"])->middleware('auth')->name("user.register");
Route::get("/user/login", [UserController::class, "login"])->middleware('auth')->name("user.login");
Route::get("/user/edit/{id}", [UserController::class, "edit"])->middleware('auth')->name("user.edit");
Route::get("/user/change_password", [UserController::class, "changePassView"])->middleware('auth')->name("user.change_password");
Route::post("/user/change_pass", [UserController::class, "changePass"])->middleware('auth')->name("user.change_pass");
Route::patch("/user/update/{id}", [UserController::class, "update"])->middleware('auth')->name("user.update");
Route::post("/user/store", [UserController::class, "store"])->middleware('auth')->name("user.store");
Route::delete("/user/delete/{id}", [UserController::class, "destroy"])->middleware('auth')->name("user.delete");

use App\Http\Controllers\MahasiswaController;
Route::get("/mahasiswa", [MahasiswaController::class, "index"])->name("mahasiswa.index");
Route::get("/mahasiswa/edit/{id}", [MahasiswaController::class, "edit"])->middleware('auth')->name("mahasiswa.edit");
Route::patch("/mahasiswa/update/{id}", [MahasiswaController::class, "update"])->middleware('auth')->name("mahasiswa.update");
Route::get("/mahasiswa/create", [MahasiswaController::class, "create"])->middleware('auth')->name("mahasiswa.create");
Route::post("/mahasiswa/store", [MahasiswaController::class, "store"])->middleware('auth')->name("mahasiswa.store");
Route::delete("/mahasiswa/delete/{id}", [MahasiswaController::class, "destroy"])->middleware('auth')->name("mahasiswa.delete");

use App\Http\Controllers\InformationController;
Route::get("/information", [InformationController::class, "index"])->name("information.index");
Route::get("/information/edit/{id}", [InformationController::class, "edit"])->middleware('auth')->name("information.edit");
Route::patch("/information/update/{id}", [InformationController::class, "update"])->middleware('auth')->name("information.update");
Route::get("/information/create", [InformationController::class, "create"])->middleware('auth')->name("information.create");
Route::post("/information/store", [InformationController::class, "store"])->middleware('auth')->name("information.store");
Route::delete("/information/delete/{id}", [InformationController::class, "destroy"])->middleware('auth')->name("information.delete");