<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('owner.welcome');
});

Route::get('/dashboard', function () {
    return view('owner.dashboard');  // SHINYA EDIT
})->middleware(['auth:owners', 'verified'])->name('dashboard');  // SHINYA EDIT



Route::middleware('auth:owners')->group(function () { // SHINYA EDIT
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/ownerAuth.php';
