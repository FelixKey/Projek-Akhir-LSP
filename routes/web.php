<?php

use Illuminate\Support\Facades\Route;

// require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('home');
});

Route::get('/home', function () {
    return view('home');	
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/contact', function () {
    return view('contact');
});

use App\Http\Controllers\UserController;
Route::get("/user", [UserController::class, "index"])->name("user.index");
Route::get("/user/detail/{id}", [UserController::class, "detail"])->name("user.detail");
Route::get("/user/register", [UserController::class, "register"])->name("user.register");
Route::get("/user/login", [UserController::class, "login"])->name("user.login");
Route::get("/user/edit/{id}", [UserController::class, "edit"])->name("user.edit");
Route::get("/user/change_password", [UserController::class, "changePassView"])->name("user.change_password");
Route::post("/user/change_pass", [UserController::class, "changePass"])->name("user.change_pass");
Route::patch("/user/update/{id}", [UserController::class, "update"])->name("user.update");
Route::post("/user/store", [UserController::class, "store"])->name("user.store");
Route::delete("/user/delete/{id}", [UserController::class, "destroy"])->name("user.delete");

use App\Http\Controllers\MahasiswaController;
Route::get("/mahasiswa", [MahasiswaController::class, "index"])->name("mahasiswa.index");
Route::get("/mahasiswa/detail/{id}", [MahasiswaController::class, "detail"])->name("mahasiswa.detail");
Route::get("/mahasiswa/edit/{id}", [MahasiswaController::class, "edit"])->name("mahasiswa.edit");
Route::patch("/mahasiswa/update/{id}", [MahasiswaController::class, "update"])->name("mahasiswa.update");
Route::get("/mahasiswa/create", [MahasiswaController::class, "create"])->name("mahasiswa.create");
Route::post("/mahasiswa/create/store", [MahasiswaController::class, "store"])->name("mahasiswa.create.store");
Route::delete("/mahasiswa/delete/{id}", [MahasiswaController::class, "destroy"])->name("mahasiswa.delete");

use App\Http\Controllers\InformationController;
Route::get("/information", [InformationController::class, "index"])->name("information.index");
Route::get("/information/detail/{id}", [InformationController::class, "detail"])->name("information.detail");
Route::get("/information/edit/{id}", [InformationController::class, "edit"])->name("information.edit");
Route::patch("/information/update/{id}", [InformationController::class, "update"])->name("information.update");
Route::get("/information/create", [InformationController::class, "create"])->name("information.create");
Route::post("/information/create/store", [InformationController::class, "store"])->name("information.create.store");
Route::delete("/information/delete/{id}", [InformationController::class, "destroy"])->name("information.delete");