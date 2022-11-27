<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register', [
            'title' => 'Register',
            'active' => 'register',
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|min:3|max:32|unique:users',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:6|max:16',
            'no_telp' => 'required|min:8|max:13',
        ]);

        $validated['password'] = bcrypt($validated['password']);

        User::create($validated);

        return redirect('/login');
    }
}
