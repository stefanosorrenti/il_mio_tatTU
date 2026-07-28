<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TattooController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\StyleController;
use App\Http\Controllers\ExtraController;
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

    // Rotte tattoo
    Route::resource('tattoo', TattooController::class);

    // Rotte artist
    Route::resource('artist', ArtistController::class);

    // Rotte style
    Route::resource('style', StyleController::class);

    // Rotta per la pagina extra
    Route::get('/extra', [ExtraController::class, 'extra'])->name('extra');
});


require __DIR__ . '/auth.php';
