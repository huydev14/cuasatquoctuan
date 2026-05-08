<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Client\ContactController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\ProjectController as ClientProjectController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/projects', [ClientProjectController::class, 'index'])->name('projects.index');
Route::get('/projects/{slug}', [HomeController::class, 'show'])->name('projects.show');

Route::post('/lien-he', [ContactController::class, 'store'])->name('contact.store');

Route::middleware(['auth', 'verified'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('projects', ProjectController::class);
        Route::resource('categories', CategoryController::class)->except(['show']);

        Route::get('/contacts', [DashboardController::class, 'contacts'])->name('contacts.index');
        Route::get('/contacts/{contact}', [DashboardController::class, 'show'])->name('contacts.show');
        Route::patch('/contacts/{contact}/status', [DashboardController::class, 'updateContactStatus'])->name('contacts.update-status');

        // Audit log
        Route::get('/audit', [\App\Http\Controllers\Admin\AuditLogController::class, 'index'])->name('audit.index');

    });

require __DIR__.'/auth.php';
