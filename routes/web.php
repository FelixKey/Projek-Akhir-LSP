<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\ProfileController;

require __DIR__ . '/auth.php';

Route::get('/', function () {
    return view('home');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});


Route::get("/user/register", [UserController::class, "register"])->name("user.register");
Route::get('/user/login', [UserController::class, 'loginView'])->name('login.view');
Route::post("/user/store", [UserController::class, "store"])->name("user.store");

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::get("/user", [UserController::class, "index"])->name("user.index");
    Route::get("/user/detail/{id}", [UserController::class, "detail"])->name("user.detail");
    Route::get("/user/edit/{id}", [UserController::class, "edit"])->name("user.edit");
    Route::post('/user/{id}/validate', [UserController::class, 'validateUser'])->name('user.validate');
    Route::post('/user/{id}/reject', [UserController::class, 'rejectUser'])->name('user.reject');
    Route::patch("/user/update/{id}", [UserController::class, "update"])->name("user.update");
    Route::delete("/user/delete/{id}", [UserController::class, "destroy"])->name("user.delete");

    Route::get("/mahasiswa", [MahasiswaController::class, "index"])->name("mahasiswa.index");
    Route::get("/mahasiswa/detail/{id}", [MahasiswaController::class, "detail"])->name("mahasiswa.detail");
    Route::post('/mahasiswa/{id}/validate', [MahasiswaController::class, 'validatemahasiswa'])->name('mahasiswa.validate');
    Route::post('/mahasiswa/{id}/reject', [MahasiswaController::class, 'rejectmahasiswa'])->name('mahasiswa.reject');
    Route::get("/mahasiswa/edit/{id}", [MahasiswaController::class, "edit"])->name("mahasiswa.edit");
    Route::patch("/mahasiswa/update/{id}", [MahasiswaController::class, "update"])->name("mahasiswa.update");
    Route::get("/mahasiswa/create", [MahasiswaController::class, "create"])->name("mahasiswa.create");
    Route::post("/mahasiswa/create/store", [MahasiswaController::class, "store"])->name("mahasiswa.create.store");
    Route::delete("/mahasiswa/delete/{id}", [MahasiswaController::class, "destroy"])->name("mahasiswa.delete");

    Route::get("/information", [InformationController::class, "index"])->name("information.index");
    Route::get("/information/detail/{id}", [InformationController::class, "detail"])->name("information.detail");
    Route::get("/information/edit/{id}", [InformationController::class, "edit"])->name("information.edit");
    Route::patch("/information/update/{id}", [InformationController::class, "update"])->name("information.update");
    Route::get("/information/create", [InformationController::class, "create"])->name("information.create");
    Route::post("/information/create/store", [InformationController::class, "store"])->name("information.create.store");
    Route::delete("/information/delete/{id}", [InformationController::class, "destroy"])->name("information.delete");
});
