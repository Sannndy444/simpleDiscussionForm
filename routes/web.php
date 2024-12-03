<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostsController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/tes', function () {
    return view('discussion.dashboard.index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('discussion')->middleware(['role:user'])->group(function () {
    Route::resource('dashboard', DashboardController::class)->as('discussion.dashboard');
    Route::resource('posts', PostsController::class)->as('discussion.posts');
});

require __DIR__.'/auth.php';
