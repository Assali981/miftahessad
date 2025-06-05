<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ProjectController;

/*
|--------------------------------------------------------------------------
| Web Routes - Miftach Assaad Foundation
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group.
|
*/

// Main Website Routes
Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/projects', function () {
    return view('projects');
})->name('projects');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

// Language Switching Route
Route::get('/language/{locale}', function ($locale) {
    // Validate locale
    if (!in_array($locale, ['ar', 'en', 'fr'])) {
        abort(404);
    }

    // Set locale in session
    session(['locale' => $locale]);

    // Set success message based on locale
    $messages = [
        'ar' => 'تم تغيير اللغة بنجاح',
        'en' => 'Language changed successfully',
        'fr' => 'Langue changée avec succès'
    ];

    return redirect()->back()->with('language_changed', $messages[$locale]);
})->name('language');

// Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
    // Admin Authentication Routes (accessible without login)
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Protected Admin Routes (require admin authentication)
    Route::middleware(['admin.auth'])->group(function () {
        Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');

        // Project Management Routes
        Route::resource('projects', ProjectController::class);

        // Additional admin routes can be added here
        Route::get('/settings', function () {
            return view('admin.settings');
        })->name('settings');

        Route::get('/media', function () {
            return view('admin.media');
        })->name('media');
    });
});
