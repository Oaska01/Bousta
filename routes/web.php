<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BusController;
use App\Http\Controllers\Admin\LostItemController;
use App\Http\Controllers\Admin\RouteController;
use App\Http\Controllers\Admin\ShiftController;
use App\Http\Controllers\Admin\StopController;
use App\Http\Controllers\Admin\TripTemplateController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Driver\DriverController;
use App\Http\Controllers\Driver\FoundItemController;
use App\Http\Controllers\Driver\StopTimeController;
use App\Http\Controllers\Passenger\LostItemReportController;
use App\Http\Controllers\Passenger\ScheduleController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ScheduleController::class, 'index'])->name('index');
// Route::get('/schedule', [ScheduleController::class, 'show'])->name('schedule.show');

Route::middleware('guest') -> group(
    function()
    {
        // Passenger login (phone only)
        Route::get('/login', [AuthController::class, 'loginView'])->name('login.view');
        Route::post('/login', [AuthController::class, 'login'])->name('login');

        // Staff login (email + password)
        Route::get('/staff/login', [AuthController::class, 'loginStaffView'])->name('login.viewStaff');
        Route::post('/staff/login', [AuthController::class, 'loginStaff'])->name('login.staff');

        // Register (passengers only)
        Route::get('/register', [AuthController::class, 'registerView'])->name('register.view');
        Route::post('/register', [AuthController::class, 'register'])->name('register');
    }
);


Route::middleware('auth') -> group(
    function ()
    {

        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

        // Passenger
        Route::middleware('role:passenger')->prefix('passenger')->name('passenger.')->group(function () {
            Route::get('/home', [ScheduleController::class, 'home'])->name('home');
            Route::get('/lost-items', [LostItemReportController::class, 'index'])->name('lost-items.index');
            Route::get('/lost-items/create', [LostItemReportController::class, 'create'])->name('lost-items.create');
            Route::post('/lost-items/submit', [LostItemReportController::class, 'store'])->name('lost-items.store');
        });

        //Driver
        Route::middleware('role:driver')->prefix('driver')->name('driver.')->group(function () {
            Route::get('/home', [DriverController::class, 'home'])->name('home');
            Route::post('/stop-times', [StopTimeController::class, 'store'])->name('stop-times.store');
            Route::get('/found-items/create', [FoundItemController::class, 'create'])->name('found-items.create');
            Route::post('/found-items/submit', [FoundItemController::class, 'store'])->name('found-items.store');
        });

        // Admin
        Route::middleware('role:admin')->prefix('admin')->name('admin.')->group(function () {
            Route::get('/home', [AdminController::class, 'home'])->name('home');
            Route::resource('routes', RouteController::class);
            Route::resource('stops', StopController::class);
            Route::resource('buses', BusController::class);
            Route::resource('users', UserController::class);
            Route::resource('shifts', ShiftController::class);
            Route::resource('trip-templates', TripTemplateController::class);
            Route::resource('lost-items', LostItemController::class);
        });
    }
);
