<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Admin\PageAdminController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\PasswordResetController;
use App\Http\Controllers\DiagnosticController;
use App\Http\Controllers\Admin\DiagnosticQuestionAdminController;
use App\Http\Controllers\Admin\DiagnosticResultRuleAdminController;
use App\Http\Controllers\Admin\UserAdminController;
use App\Http\Controllers\Admin\PageCategoryAdminController;

// Auth
Route::get('/register', [RegisterController::class, 'create']);
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [LoginController::class, 'create'])->name('login');
Route::post('/login', [LoginController::class, 'store']);
Route::post('/logout', [LoginController::class, 'destroy']);

// Profil (protégé)
Route::get('/profile', [ProfileController::class, 'show'])->middleware('auth');
Route::post('/profile', [ProfileController::class, 'update'])->middleware('auth');
Route::prefix('admin')->middleware(['admin'])->group(function () {
    Route::get('/pages', [PageAdminController::class, 'index']);
    Route::get('/pages/create', [PageAdminController::class, 'create']);
    Route::post('/pages', [PageAdminController::class, 'store']);
    Route::get('/pages/{page}/edit', [PageAdminController::class, 'edit']);
    Route::put('/pages/{page}', [PageAdminController::class, 'update']);
    Route::delete('/pages/{page}', [PageAdminController::class, 'destroy']);

    Route::get('/diagnostic/questions', [DiagnosticQuestionAdminController::class, 'index']);
    Route::get('/diagnostic/questions/create', [DiagnosticQuestionAdminController::class, 'create']);
    Route::post('/diagnostic/questions', [DiagnosticQuestionAdminController::class, 'store']);
    Route::get('/diagnostic/questions/{question}/edit', [DiagnosticQuestionAdminController::class, 'edit']);
    Route::put('/diagnostic/questions/{question}', [DiagnosticQuestionAdminController::class, 'update']);
    Route::delete('/diagnostic/questions/{question}', [DiagnosticQuestionAdminController::class, 'destroy']);

    Route::get('/diagnostic/results', [DiagnosticResultRuleAdminController::class, 'index']);
    Route::get('/diagnostic/results/create', [DiagnosticResultRuleAdminController::class, 'create']);
    Route::post('/diagnostic/results', [DiagnosticResultRuleAdminController::class, 'store']);
    Route::get('/diagnostic/results/{rule}/edit', [DiagnosticResultRuleAdminController::class, 'edit']);
    Route::put('/diagnostic/results/{rule}', [DiagnosticResultRuleAdminController::class, 'update']);
    Route::delete('/diagnostic/results/{rule}', [DiagnosticResultRuleAdminController::class, 'destroy']);

    Route::get('/users', [UserAdminController::class, 'index']);
    Route::get('/users/create', [UserAdminController::class, 'create']);
    Route::post('/users', [UserAdminController::class, 'store']);
    Route::get('/users/{user}/edit', [UserAdminController::class, 'edit']);
    Route::put('/users/{user}', [UserAdminController::class, 'update']);
    Route::delete('/users/{user}', [UserAdminController::class, 'destroy']);

    Route::get('/page-categories', [PageCategoryAdminController::class, 'index']);
    Route::get('/page-categories/create', [PageCategoryAdminController::class, 'create']);
    Route::post('/page-categories', [PageCategoryAdminController::class, 'store']);
    Route::get('/page-categories/{pageCategory}/edit', [PageCategoryAdminController::class, 'edit']);
    Route::put('/page-categories/{pageCategory}', [PageCategoryAdminController::class, 'update']);
    Route::delete('/page-categories/{pageCategory}', [PageCategoryAdminController::class, 'destroy']);
});

Route::get('/', function () {
    return view('home');
});

// Module Informations
Route::get('/pages', [PageController::class, 'index']);
Route::get('/pages/{slug}', [PageController::class, 'show']);

//Reset de mdp
Route::get('/forgot-password', [PasswordResetController::class, 'requestForm'])->name('password.request');
Route::post('/forgot-password', [PasswordResetController::class, 'sendResetLink'])->name('password.email');

Route::get('/reset-password/{token}', [PasswordResetController::class, 'resetForm'])->name('password.reset');
Route::post('/reset-password', [PasswordResetController::class, 'reset'])->name('password.update');

//Diagnostic de stress
Route::get('/diagnostic', [DiagnosticController::class, 'showForm']);
Route::post('/diagnostic', [DiagnosticController::class, 'submit']);
Route::get('/diagnostic/result/{submission}', [DiagnosticController::class, 'showResult']);

//Catégories pages
Route::get('/pages/category/{slug}', [PageController::class, 'category']);
