<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PassengerController;
use Illuminate\Support\Facades\Route;


Route::get('/', [MainController::class, 'index']) -> name('index');

Route::middleware('guest') -> group(function()
    {
        //login
        Route::get('/loginView', [AuthController::class, 'loginView']) -> name('loginView');
        Route::post('/login', [AuthController::class, 'login']) -> name('login');
        //register
        Route::get('/registerView', [AuthController::class, 'registerView']) -> name('registerView');
        Route::post('/register', [AuthController::class, 'register']) -> name('register');

        // OTP
        Route::get('/verifyOtp', [AuthController::class, 'otpView'])->name('otp.show');
        Route::post('/verifyOtp', [AuthController::class, 'verifyOtp'])->name('otp.verify');

        Route::get('/passenger/home', [PassengerController::class, 'passengerView']) -> name('passengerH');
        Route::get('/admin/home', [PassengerController::class, 'adminView']) -> name('adminHome');
        Route::get('/passenger/home', [PassengerController::class, 'driverView']) -> name('driverHome');
    }
);

// logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


