<?php

use App\Http\Controllers\AuditController;
use App\Http\Controllers\MentorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MataKuliahController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\RuangController;
use App\Http\Controllers\TempatController;
use App\Http\Controllers\AmbilKuliahController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;

View::composer('layouts.master', function ($view) {
    $loggedInUser = Auth::user();
    $view->with('loggedInUser', $loggedInUser);
});

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

// Route::middleware(['auth'])->group(function () {
    Route::get('/', [HomeController::class, 'index']);
    Route::resource('/mata_kuliah', MataKuliahController::class);
    Route::resource('/dosen', DosenController::class);
    Route::resource('/ruang', RuangController::class);
    Route::resource('/tempat', TempatController::class);
    Route::resource('/ambil_kuliah', AmbilKuliahController::class);
    Route::resource('/mentor', MentorController::class);
    Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::resource('/user', UserController::class);
    Route::post('/user/{id}', [UserController::class, 'changePassword'])->name('user.changePassword');
    Route::get('/histori_mk', [AuditController::class, 'showAudit'])->name('audit.showAudit');
// });

Route::get('/404', function () {
    return view('errors.404');
})->name('custom.404');

