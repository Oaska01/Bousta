<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PassengerController extends Controller
{
    public function passengerView()
    {
        return view('passenger.home');
    }
    public function adminView()
    {
        return view('admin.home');
    }
    public function driverView()
    {
        return view('driver.home');
    }
}
