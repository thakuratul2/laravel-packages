<?php


use brsoftsolatul\TimeAttendance\Http\Controllers\TimeAttendanceController;
use Illuminate\Support\Facades\Route;

Route::get('/time-attendance', function () {
    return view('timeattendance::navbar');
});

Route::post('/toggle-time', [TimeAttendanceController::class, 'logTimeAttendance'])->name('toggle-time');
