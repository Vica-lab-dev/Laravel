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

Route::middleware('auth')->controller(IntelligencesController::class)->group(function () {
    Route::get('/interests', 'interests')->name('interests');

    Route::post('/about-user/create', 'createInfo')->name('create');

    Route::post('/category/create', 'categoryCreate')->name('category.create');

    Route::get('/information/{information}', 'show')->name('information.show');

    Route::get('/allInformation', 'allInformation')->name('allInformation.show');

    ROute::get('related/show', 'showRelated')->name('related.show');

    Route::post('/interests/all', 'allInterests')->name('interest.all');

    Route::get('/describing', 'describe')->name('describing');

    Route::get('/quiz', 'quiz')->name('quiz');

    Route::post('/quiz/started', 'quizStarted')->name('quiz.started');

    Route::view('/about-user', 'info');

    Route::view('/categories', 'categoriesForm')->name('categories.form');

    Route::view('/all/Information', 'information');

});





