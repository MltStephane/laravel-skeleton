<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::impersonate();

Route::name('public.')->group(function () {
    Route::get('/', \App\Http\Livewire\Public\Homepage::class)->name('homepage');
});

Route::middleware('auth')->group(function () {
    Route::prefix('app')->name('app.')->group(function () {
        Route::get('/', \App\Http\Livewire\App\Homepage::class)->name('homepage');

        Route::middleware('verified')->group(function () {
            Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
            Route::patch('profile', [ProfileController::class, 'update'])->name('profile.update');
            Route::delete('profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
        });
    });

    Route::middleware('role:admin')->prefix('/admin')->name('admin.')->group(function () {
        Route::get('/', \App\Http\Livewire\Admin\Dashboard::class)->name('dashboard');

        Route::prefix('users')->name('users.')->group(function () {
            Route::get('/', \App\Http\Livewire\Admin\Users\Index::class)->name('index');
        });
    });
});

require __DIR__ . '/auth.php';
