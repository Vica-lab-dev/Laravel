<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CheckAdminMiddleware;
use App\Models\BookModel;
use Illuminate\Support\Facades\Route;

Route::get('/', [AdminController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth', CheckAdminMiddleware::class])
    ->controller(AdminController::class)
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::view('/add-book', 'admin.addBooksForm');
        Route::post('/create-book', 'create')->name('create');
});

Route::middleware('auth')
    ->controller(UserController::class)
    ->name('user.')
    ->prefix('user')
    ->group(function ()
{
    Route::get('/search/{book}','search')->name('search');
});
