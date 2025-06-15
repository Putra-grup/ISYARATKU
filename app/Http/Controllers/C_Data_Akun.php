<?php

namespace App\Http\Controllers;

use App\Models\M_Data_Akun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class C_Data_Akun extends Controller
{
    public function formLogin()
    {
        return view('login'); // resources/views/login.blade.php
    }

    public function formRegister()
    {
        return view('register'); // resources/views/register.blade.php
    }

    public function homepage()
    {
        $user = Auth::user(); // Ambil user yang sedang login
        return view('user.homepage_user', compact('user'));
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        // Login menggunakan Auth::attempt
        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {
            $request->session()->regenerate();
            return redirect()->route('homepage');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah',
        ])->onlyInput('email');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'email'        => 'required|string|email|max:255|unique:data_akun,email',
            'password'     => 'required|string|min:8',
        ], [
            'email.required'     => 'Email wajib diisi.',
            'email.email'        => 'Format email tidak valid.',
            'email.unique'       => 'Email sudah digunakan.',
            'nama_lengkap.required' => 'Nama lengkap wajib diisi.',
            'password.required'  => 'Password wajib diisi.',
            'password.min'       => 'Password minimal 8 karakter.',
        ]);

        M_Data_Akun::create([
            'nama_lengkap' => $request->nama_lengkap,
            'email'        => $request->email,
            'password'     => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Berhasil daftar, silakan login.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
