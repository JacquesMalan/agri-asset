<?php

use App\Http\Controllers\DemoLoginController;
use App\Livewire\Categories\Index as CategoriesIndex;
use App\Livewire\Assets\Index as AssetsIndex;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');
Route::post('demo-login', DemoLoginController::class)
    ->middleware('throttle:login')
    ->name('demo.login');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
    Route::get('categories', CategoriesIndex::class)->name('categories.index');
    Route::get('assets', AssetsIndex::class)->name('assets.index');
});

require __DIR__.'/settings.php';
