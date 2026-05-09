<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginView()
    {
        return view('auth.login');
    }

    public function loginStaffView()
    {
        return view('auth.loginStaff');
    }
    public function registerView()
    {
        return view('auth.register');
    }

    // login
    public function login(Request $request)
    {
        $fields = $request->validate([
            'phone_number' => 'required|string|regex:/^[0-9]{8}$/'
        ]);

        $user = User::where('phone_number', $fields['phone_number'])
                            ->where('role', 'passenger') -> first();

        if (!$user)
            {
                return back()-> withError([
                    'phone_number' => 'No passenger account found with this phone number.'
                ]) -> onlyInput('phone_number');
            }

        Auth::login($user);
        $request->session()->regenerate();
        return redirect()->route('passenger.home');
    }

    public function loginStaff(Request $request)
    {
        $fields = $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        if (!Auth::attempt($fields))
            {
                return back()->withErrors([
                    'email' => 'Invalid credentials.',
                ])->onlyInput('email');
            }

        $user = Auth::user();

        if ($user->role === 'passenger')
            {
                Auth::logout();
                return back() -> withErrors([
                    'email' => 'This login is for staff only.',
                    ])->onlyInput('email');
            }
        $request->session()->regenerate();

        return match($user->role) {
            'admin'  => redirect()->route('admin.home'),
            'driver' => redirect()->route('driver.home'),
        };
    }

    public function register(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required|string|max:255',
            'phone_number' => 'required|string|regex:/^[0-9]{8}$/|unique:users,phone_number',
            'email' => 'nullable|email|unique:users,email',
        ]);

        $fields['role'] = 'passenger';

        $user = User::create($fields);
        Auth::login($user);
        $request->session()->regenerate();

        return redirect()->route('passenger.home');
    }

    // logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login.view');
    }
}

