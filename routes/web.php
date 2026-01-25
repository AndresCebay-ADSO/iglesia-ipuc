<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/', function () {
    return redirect()->route('login');
});

// Authentication routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Protected routes
Route::middleware('auth')->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Members CRUD
    Route::resource('members', MemberController::class);

    // Reports
    Route::get('/reports', [ReportController::class, 'index'])->name('reports.index')->middleware('role:admin,secretary');

    // Export
    Route::get('/export', [ExportController::class, 'export'])->name('export.index')->middleware('role:admin,secretary');
});
