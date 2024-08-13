<?php

use App\Http\Controllers\CsvController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/upload-csv', [CsvController::class, 'index'])->name('upload.csv.index');
Route::post('/upload-csv', [CsvController::class, 'upload'])->name('upload-csv');

Route::get('/contact', function() {
    return Inertia::render('Contact');
})->name('contact');

Route::get('/cookies-policy', function() {
    return Inertia::render('CookiesPolicy');
})->name('cookies-policy');

Route::get('/currencies/pairs/{value}', [HomeController::class, 'page'])->name('page');

Route::get('/hello', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
