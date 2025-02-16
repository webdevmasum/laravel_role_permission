<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RolePermission\RolePermissionController;

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




    Route::get('/permission', [RolePermissionController::class, 'index'])->name('permission.index');
    Route::get('/permission/create', [RolePermissionController::class, 'create'])->name('permission.create');
    Route::post('/permission', [RolePermissionController::class, 'store'])->name('permission.store');
});

require __DIR__ . '/auth.php';
