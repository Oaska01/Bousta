<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginView()
    {
        return view('auth.login');
    }

    // function login(Request $request, User $user)
    // {

    //     // $user = User:: ;
    //     $fields = $request->validate([
    //         'phone_number' => 'required | string | regex:/^[0-9]{8}$/',
    //     ]);

    //     // Attempt to log the user in
    //     if (Auth::attempt($fields)) {
    //         return redirect()->route('passenger.home');
    //     }

    //     return back()->withErrors([
    //         'phone_number' => 'The provided credentials do not match our records.',
    //     ])->onlyInput('phone_number');
    // }

    public function login(Request $request)
{
    $fields = $request->validate([
        'phone_number' => 'required|string|regex:/^[0-9]{8}$/',
    ]);

    $user = User::where('phone_number', $fields['phone_number'])->first();

    if (!$user) {
        return back()->withErrors([
            'phone_number' => 'No account found with this phone number.',
        ])->onlyInput('phone_number');
    }

    Auth::login($user);

    return match($user->role) {
        'admin'  => redirect()->route('adminHome'),
        'driver' => redirect()->route('driverHome'),
        default  => redirect()->route('passengerHome'),
    };
}

    public function registerView()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $fields = $request -> validate([
            'name' => 'required | string | max:255',
            'phone_number' => 'required | string | regex:/^[0-9]{8}$/ | unique:users,phone_number',
            'email' => 'nullable | string | email| unique:users,email',
        ]);

        // to add dummy password
        $fields['password'] = bcrypt('dummy_password');

        $user = User::create($fields);

        Auth::login($user);

        return redirect() -> route('passenger.home');
    }

    function logout(Request $request)
    {
        Auth::logout();
        return redirect() -> route('loginView');
    }

    // OTP functions

    public function sendOtp(Request $request)
    {
        $fields = $request -> validate([
            'phone_number' => 'required | string | regex:/^[0-9]{8}$/'
        ]);

        $phone = $request->phone_number;

        // Check if user exist
        $user = User::where('phone_number', $phone)->first();
        if(!$user)
        {
            return back()->withErrors([
                'phone_number' => 'No Account Found With This Phone Number!'
                ]);
        }

        // generate 6 digits OTP
        $otp =rand(100000, 999999);


    }
}
