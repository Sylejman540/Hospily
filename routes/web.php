<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\SessionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\AlertController;

Route::get('/', function () {
    return view('home');
});

Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisterController::class, 'index']);
    Route::post('/register', [RegisterController::class, 'store']);
    Route::get("/login", [SessionController::class, 'index']);
    Route::post("/login", [SessionController::class, 'store']);
});

Route::middleware('auth')->group(function () {
    // ====== DASHBOARD ======
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/api/dashboard', [DashboardController::class, 'index']);
    Route::get('/api/dashboard/chart-data', [DashboardController::class, 'chartData']);
    Route::get('/api/dashboard/summary', [DashboardController::class, 'summary']);

    Route::get('/patients', function () {
        return view('dashboard.patient');
    });

    Route::get('/appointments', function() {
        return view('dashboard.appointment');
    });

    Route::delete("/logout", [SessionController::class, 'destroy']);

    // ====== DEPARTMENTS (Admin only) ======
    Route::middleware('admin')->group(function () {
        Route::resource('departments', DepartmentController::class);
        Route::get('/api/departments', [DepartmentController::class, 'index']);
        Route::post('/api/departments', [DepartmentController::class, 'store']);
        Route::get('/api/departments/{department}', [DepartmentController::class, 'show']);
        Route::patch('/api/departments/{department}', [DepartmentController::class, 'update']);
        Route::delete('/api/departments/{department}', [DepartmentController::class, 'destroy']);
    });

    // ====== PATIENTS (Admins & Clinicians) ======
    Route::middleware('clinician')->group(function () {
        Route::resource('patients', PatientController::class);
        Route::post('patients/{patient}/discharge', [PatientController::class, 'discharge'])->name('patients.discharge');
    });

    // ====== APPOINTMENTS (Admins & Clinicians) ======
    Route::middleware('clinician')->group(function () {
        Route::resource('appointments', AppointmentController::class);
        Route::patch('appointments/{appointment}/status', [AppointmentController::class, 'updateStatus'])->name('appointments.updateStatus');
    });

    // ====== HANDOVER ALERTS (Admin-create, all-view) ======
    Route::get('alerts', [AlertController::class, 'index']); // All authenticated users can view
    Route::get('/api/alerts', [AlertController::class, 'index']);
    Route::get('/api/alerts/{handover_alert}', [AlertController::class, 'show']);
    
    Route::middleware('admin')->group(function () {
        Route::post('alerts', [AlertController::class, 'store']);
        Route::delete('alerts/{handover_alert}', [AlertController::class, 'destroy']);
        
        Route::post('/api/alerts', [AlertController::class, 'store']);
        Route::delete('/api/alerts/{handover_alert}', [AlertController::class, 'destroy']);
    });
});