<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class AuthController extends Controller
{
    public function store(Request $request) {
        $validated = $request->validate([
            'email' => 'required|email|unique:users,email',
            'name' => 'required|string|max:255',
            'password' => 'required|min:6',
        ], [
            'email.required' => 'Kolom email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah terdaftar.',
            'name.required' => 'Kolom nama wajib diisi.',
            'name.string' => 'Kolom nama harus berupa string.',
            'name.max' => 'Kolom nama maksimal 255 karakter.',
            'password.required' => 'Kolom password wajib diisi.',
            'password.min' => 'Password minimal harus 6 karakter.',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password'])
        ]);

        $user->attachRole('guest');

        return back()->with('success', 'Proses register berhasil!');
    }

    public function login(Request $request) {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'required' => 'Kolom :attribute wajib diisi.',
            'email' => 'Format :attribute tidak valid.',
            'min' => ':Attribute harus memiliki minimal :min karakter.',
        ]);

        // Attempt to authenticate the user
        if (Auth::attempt($validated)) {
            // Authentication successful
            return redirect('/dashboard');
        }

        // Authentication failed
        return back()->withErrors([
            'email' => 'Invalid credentials',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
