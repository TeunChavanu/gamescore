<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});
Route::get('/all_games', function () {
    return view('all_games');
});
Route::get('/add', function () {
    return view('add');
});
Route::get('/review', function () {
    return view('review');
});
Route::get('/show', function () {
    return view('show');
});

Route::resource('games', GameController::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
Route::patch('/admin/promote/{user}', [AdminController::class, 'promote'])->name('admin.promote');

require __DIR__.'/auth.php';
