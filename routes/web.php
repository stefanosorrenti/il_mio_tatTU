<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TattooController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->middleware(['auth'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('tattoo', TattooController::class);
require __DIR__.'/auth.php';
