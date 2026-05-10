<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    // user form view
    public function create()
    {
        return view('admin.userCreate');
    }

    public function index()
    {
       $users = User::whereIn('role', ['admin', 'driver'])
                 ->latest()
                 ->paginate(15);
        return view('admin.home', compact('users'));
    }

    // create user
    public function store(Request $request )
    {
        $fields = $request -> validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|regex:/^[0-9]{8}$/|unique:users,phone_number',
            'phone_number' => 'required|min:6|confirmed',
            'role' => 'required|in:admin,driver'
        ]);

        User::Create($fields);

        return redirect() -> route('admin.use')
    }
}

