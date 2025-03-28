<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin.welcome');  // SHINYA EDIT
});

Route::get('/dashboard', function () {
    return view('admin.dashboard');  // SHINYA EDIT
})->middleware(['auth:admin', 'verified'])->name('dashboard');  // SHINYA EDIT



Route::middleware('auth:admin')->group(function () {  // SHINYA EDIT
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/adminAuth.php';
