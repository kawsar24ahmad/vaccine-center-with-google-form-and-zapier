<?php

use App\Models\User;
use App\Models\VaccineCenter;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\VaccineCenterController;

Route::get('/', function () {
    return view('home');
});

Route::prefix('users')->group(function()  {
    Route::get('/', function ()  {
        $users = User::get();
        return view('users.index', compact('users'));
    })->name('users.index');
    Route::get('/register', [AuthController::class, 'register'])->name('users.register');
    Route::post('/register', [AuthController::class, 'store'])->name('users.store');
    Route::get('/not-scheduled', function ()  {
        $users = User::where('status', '=', 'Not_Scheduled')->get();
        return view('users.not-scheduled', compact('users'));
    })->name('users.not-scheduled');
});

Route::prefix('vaccine_centers')->group(function ()  {
    Route::get('/', [VaccineCenterController::class, 'index'])->name('vaccine_centers.index');
    Route::get('/{id}', [VaccineCenterController::class, 'show'])->name('vaccine_centers.show');
    Route::get('/schedule',[ScheduleController::class, 'scheduleUser'])->name('vaccine_centers.schedule');
});

Route::post('google-form-submit', [FormController::class, 'store']);
