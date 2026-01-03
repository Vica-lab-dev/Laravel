<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\usersController;
use App\Http\Middleware\AdminCheckMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth', AdminCheckMiddleware::class])->prefix('admin')->group(function ()
{
    Route::controller(AdminController::class)->name('admin.')->group(function ()
    {
        Route::get('/page',  'page')->name('page');
        Route::post('/create',  'create')->name('create');
        Route::get('/page/edit/{page}',  'singlePage')->name('edit');
        Route::post('page/update/{page}',  'update')->name('update');
        Route::get('/page/delete/{page}',  'delete')->name('delete');
    });
});

Route::middleware('auth')->prefix('users')->group(function ()
{
    Route::controller(usersController::class)->name('users.')->group(function ()
    {
        Route::get('/page', 'page')->name('page');
    });
});
