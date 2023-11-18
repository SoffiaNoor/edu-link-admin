<?php

use App\Http\Controllers\AuditController;
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

Route::middleware(['auth'])->group(function () {
    Route::get('/', [HomeController::class, 'index']);
    Route::resource('/mata_kuliah', MataKuliahController::class);
    Route::resource('/histori_mk', AuditController::class);
    Route::resource('/dosen', DosenController::class);
    Route::resource('/ruang', RuangController::class);
    Route::resource('/tempat', TempatController::class);
    Route::resource('/ambil_kuliah', AmbilKuliahController::class);
    Route::resource('/mahasiswa', MahasiswaController::class);
    Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('ambil_kuliah/{NRP}/{IDMK}', [AmbilKuliahController::class, 'show'])->name('ambil_kuliah.show');
    Route::get('ambil_kuliah/{NRP}/{IDMK}/edit', [AmbilKuliahController::class, 'edit'])->name('ambil_kuliah.edit');
    Route::delete('ambil_kuliah/{NRP}/{IDMK}', [AmbilKuliahController::class, 'destroy'])->name('ambil_kuliah.destroy');
    Route::put('ambil_kuliah/{NRP}/{IDMK}/edit', [AmbilKuliahController::class, 'update'])->name('ambil_kuliah.update');
    Route::put('tempat/{IDRuang}/{IDMK}/edit', [TempatController::class, 'update'])->name('tempat.update');
    Route::get('tempat/{IDRuang}/{IDMK}', [TempatController::class, 'show'])->name('tempat.show');
    Route::get('tempat/{IDRuang}/{IDMK}/edit', [TempatController::class, 'edit'])->name('tempat.edit');
    Route::delete('tempat/{IDRuang}/{IDMK}', [TempatController::class, 'destroy'])->name('tempat.destroy');
    Route::put('tempat/{IDRuang}/{IDMK}/edit', [TempatController::class, 'update'])->name('tempat.update');
    Route::resource('/user', UserController::class);
    Route::post('/user/{id}', [UserController::class, 'changePassword'])->name('user.changePassword');
    Route::get('/histori_mk', [AuditController::class, 'showAudit'])->name('audit.showAudit');
});

Route::get('/404', function () {
    return view('errors.404');
})->name('custom.404');

