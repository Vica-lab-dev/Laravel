<?php

use App\Http\Controllers\IntelligencesController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

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

Route::get('/interests', [IntelligencesController::class, 'interests'])->name('interests');

Route::view('/about-user', 'info');

Route::view('/categories', 'categoriesForm')->name('categories.form');

Route::view('/allInformation', 'information');

Route::post('/about-user/create', [IntelligencesController::class, 'createInfo'])->name('create');

Route::post('/category/create', [IntelligencesController::class, 'categoryCreate'])->name('category.create');

Route::get('/information/{information}', [IntelligencesController::class, 'show'])->name('information.show');

Route::get('/allInformation', [IntelligencesController::class, 'allInformation'])->name('allInformation.show');

ROute::get('related/show', [IntelligencesController::class, 'showRelated'])->name('related.show');

Route::post('/interests/all', [IntelligencesController::class, 'allInterests'])->name('interest.all');

Route::get('/describing', [IntelligencesController::class, 'describe'])->name('describing');
