<?php

use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Client\ContactController;
use App\Http\Controllers\Client\HomeController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::post('/lien-he', [ContactController::class, 'store'])->name('contact.store');

Route::middleware(['auth', 'verified'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {


        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('projects', ProjectController::class);
        Route::resource('categories', CategoryController::class)->except(['show']);

        Route::get('/contacts', [DashboardController::class, 'contacts'])->name('contacts.index');
        Route::patch('/contacts/{contact}/status', [DashboardController::class, 'updateContactStatus'])->name('contacts.update-status');

    });

require __DIR__.'/auth.php';
