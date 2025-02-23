<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DegreeController;

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::resource('people', PersonController::class);
    Route::get('/', function () {
        return redirect()->route('people.index');
    });

    Route::get('/degree', [DegreeController::class, 'showForm'])->name('degree.form');
    Route::get('/calculate-degree', [DegreeController::class, 'calculateDegree'])->name('calculate.degree');
});