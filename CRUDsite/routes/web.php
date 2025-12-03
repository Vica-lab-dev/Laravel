<?php

use App\Http\Controllers\FriendsController;
use App\Http\Controllers\ProfileController;
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


Route::middleware('auth')->group(function() {

    Route::get("/all-users", [FriendsController::class, 'getAllUsers'])->name('AllUsers');

    Route::view("/navigation", 'navigation');

    Route::get("/findFriends/{user}", [FriendsController::class, 'singleUser'])->name('findFriends');

    Route::get("/research", [FriendsController::class, 'research'])->name('research');

    Route::get("/addFriend/{user}", [FriendsController::class, 'addFriend'])->name('foundFriend');

    Route::view("/confirm", "addFriend");

    Route::post("/addedFriend", [FriendsController::class, 'addedFriend'])->name('addedFriend');


});
