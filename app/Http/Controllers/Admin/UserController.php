<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    // user form view
    public function create()
    {
        return view('admin.userCreate');
    }

    public function index()
    {
        // Vs code error
       $users = User::whereIn('role', ['admin', 'driver'])
                 ->latest()
                 ->paginate(15);
        return view('admin.users.index', compact('users'));
    }


    // create user
    public function store(Request $request )
    {
        $fields = $request -> validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone_number' => 'required|regex:/^[0-9]{8}$/|unique:users,phone_number',
            'password' => 'required|min:6|confirmed',
            'role' => 'required|in:admin,driver'
        ]);

        User::create($fields);

        return redirect() -> route('admin.users.index')
            -> with('success', 'User Added Successfully.');
    }

    // Edit
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    // Update
    public function update(Request $request, User $user)
    {
        $fields = $request -> validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone_number' => 'required|regex:/^[0-9]{8}$/|unique:users,phone_number,' . $user->id,
            'password' => 'nullable|min:6|confirmed',
            'role' => 'required|in:admin,driver',
        ]);

        if (!empty($fileds['password']))
            $fileds['password']  = Hash::make($fileds['password']);
        else
            unset($fields['password']);

        $user -> update($fields);

        return redirect() -> route('admin.users.index')
                        -> with('succsess', 'User Updated Successfully');
    }

    // soft delete
    public function destroy(User $user)
    {

        if ($user -> id === Auth::id())
            return back() -> withError(['error' => 'You Cannot Delete Your Own Account']);

        $user->delete();

        return redirect()->route('admin.users.index')
                        ->with('success', 'User deleted successfully.');
    }
}

