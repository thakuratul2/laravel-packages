<?php


use Illuminate\Support\Facades\Route;
use YourVendor\TimeAttendance\Http\Controllers\TimeAttendanceController;

Route::middleware('auth')->group(function () {
    Route::post('/log-time', [TimeAttendanceController::class, 'logTime'])->name('log.time');
});
