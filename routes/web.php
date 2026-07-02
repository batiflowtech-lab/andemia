<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Home');
})->name('home');

// Public pages
Route::get('/about', function () {
    return Inertia::render('About');
})->name('about');

Route::get('/destination', function () {
    return Inertia::render('Destination');
})->name('destination');

Route::get('/luxury-journeys', function () {
    return Inertia::render('LuxuryJourneys');
})->name('luxury-journeys');

Route::get('/classic-madagascar', function () {
    return Inertia::render('ClassicMadagascar');
})->name('classic-madagascar');

Route::get('/contact', function () {
    return Inertia::render('Contact');
})->name('contact');

// Blog
Route::get('/blog', function () {
    return Inertia::render('Blog/Index');
})->name('blog.index');

Route::get('/blog/{slug}', function ($slug) {
    return Inertia::render('Blog/Show', ['slug' => $slug]);
})->name('blog.show');

// Admin area
Route::prefix('admin')->middleware(['auth'])->name('admin.')->group(function () {
    Route::get('/', function () {
        return Inertia::render('Admin/Dashboard');
    })->name('dashboard');

    Route::get('/posts', function () {
        return Inertia::render('Admin/Posts/Index');
    })->name('posts.index');

    Route::get('/photos', function () {
        return Inertia::render('Admin/Photos/Index');
    })->name('photos.index');
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
