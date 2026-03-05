<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\Admin\HomeController as AdminController;
use App\Http\Controllers\Auth\GoogleAuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

// ... (imports are fine)

// Home Page
Route::get('/', [HomeController::class, 'index'])->name('home');

// About Page
Route::get('/about', function () {
    return view('pages.about');
})->name('about');

// Contact Page
Route::get('/contact', function () {
    return view('pages.contact');
})->name('contact');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');

// Legal Pages
Route::get('/privacy-policy', function () {
    return view('pages.privacy-policy');
})->name('privacy');

Route::get('/terms', function () {
    return view('pages.terms-of-service');
})->name('terms');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');

// Mini Games Page
Route::get('/mini-games', function () {
    return view('pages.mini-games');
})->name('mini-games');

// Games
Route::get('/games', [GameController::class, 'index'])->name('games.index');
Route::get('/games/{game}', [GameController::class, 'show'])->name('games.show');

// Events
Route::get('/events', [EventController::class, 'index'])->name('events.index');
Route::get('/events/{event}', [EventController::class, 'show'])->name('events.show');
Route::post('/events/{event}/register', [EventController::class, 'register'])->middleware('auth')->name('events.register');
Route::delete('/events/{event}/register', [EventController::class, 'unregister'])->middleware('auth')->name('events.unregister');

// Teams
Route::get('/teams', [TeamController::class, 'index'])->name('teams.index');
Route::get('/teams/{team}', [TeamController::class, 'show'])->name('teams.show');
Route::post('/teams/{team}/apply', [TeamController::class, 'apply'])->middleware('auth')->name('teams.apply');
Route::post('/applications/{application}/accept', [App\Http\Controllers\TeamApplicationController::class, 'accept'])->middleware('auth')->name('applications.accept');
Route::post('/applications/{application}/reject', [App\Http\Controllers\TeamApplicationController::class, 'reject'])->middleware('auth')->name('applications.reject');

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::middleware(App\Http\Middleware\AdminMiddleware::class)->prefix('admin')->name('admin.')->group(function () {
        Route::get('/users', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('users.index');
        Route::post('/users/{user}/promote', [App\Http\Controllers\Admin\AdminController::class, 'promote'])->name('users.promote');
        Route::post('/users/{user}/demote', [App\Http\Controllers\Admin\AdminController::class, 'demote'])->name('users.demote');

        Route::resource('events', App\Http\Controllers\Admin\AdminEventController::class)->except(['show']);
        Route::resource('teams', App\Http\Controllers\Admin\AdminTeamController::class)->except(['show']);
    });

});

// Recruitment Posts (Public)
Route::get('/recruitment', [App\Http\Controllers\RecruitmentPostController::class, 'index'])->name('recruitment.index');
Route::get('/recruitment/{post}', [App\Http\Controllers\RecruitmentPostController::class, 'show'])->name('recruitment.show');

// Recruitment Posts (Recruiter Only)
Route::middleware('auth')->group(function () {
    Route::get('/recruitment-create', function () {
        return redirect()->route('dashboard', ['tab' => 'recruitment']);
    })->name('recruitment.create');
    Route::post('/recruitment', [App\Http\Controllers\RecruitmentPostController::class, 'store'])->name('recruitment.store');
    
    // Application Management
    Route::post('/recruitment/applications/{application}/approve', [App\Http\Controllers\RecruitmentApplicationController::class, 'approve'])->name('recruitment.applications.approve');
    Route::post('/recruitment/applications/{application}/reject', [App\Http\Controllers\RecruitmentApplicationController::class, 'reject'])->name('recruitment.applications.reject');
    Route::delete('/recruitment/applications/{application}/kick', [App\Http\Controllers\RecruitmentApplicationController::class, 'kick'])->name('recruitment.applications.kick');
});

// Recruitment Post - Apply (Must be logged in)
Route::post('/recruitment/{post}/apply', [App\Http\Controllers\RecruitmentApplicationController::class, 'apply'])->middleware('auth')->name('recruitment.apply');

require __DIR__.'/auth.php';
