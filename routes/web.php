<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EnrollmentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('courses', CourseController::class)->except(['show']);

    Route::post('/enroll/{course}', [EnrollmentController::class, 'enroll'])->name('enroll');
});

require __DIR__.'/auth.php';