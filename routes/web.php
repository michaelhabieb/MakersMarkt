<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Verkoper\VerkoperController;
use App\Http\Controllers\User\UserController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');


    // Routes voor algemene gebruikers (user)
    Route::middleware(['auth', 'role:user'])->group(function () {
        Route::get('/user/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');

    });

// Routes voor verkopers
    Route::middleware(['auth', 'role:verkoper'])->prefix('verkoper')->name('verkoper.')->group(function () {
        Route::get('/dashboard', [VerkoperController::class, 'dashboard'])->name('dashboard');
    });

// Routes voor beheerders (admin)
    Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    });
});

require __DIR__.'/auth.php';
