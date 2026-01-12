<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Front\HomeController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'home_1'])->name('home_1');
Route::get('/home-2', [HomeController::class, 'home_2'])->name('home_2');
Route::get('/home-3', [HomeController::class, 'home_3'])->name('home_3');
Route::get('/home-4', [HomeController::class, 'home_4'])->name('home_4');
Route::get('/home-5', [HomeController::class, 'home_5'])->name('home_5');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
