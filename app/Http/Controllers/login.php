<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\M_Data_Akun;
use App\Models\M_Akun_Admin;
use Illuminate\Support\Facades\Auth;

class Login extends Controller
{

    public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    // Autentikasi untuk user
    if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
        $request->session()->regenerate();
        return redirect()->route('user/homepage_user'); 
    }

    // Manual login untuk admin
    $admin = M_Akun_Admin::where('email', $request->email)->first();
    if ($admin && Hash::check($request->password, $admin->password)) {
        session([
            'admin_logged_in' => true,
            'admin_id' => $admin->id,
        ]);
        return redirect()->route('admin/dashboard');
    }

    return back()->withErrors(['email' => 'Email atau password salah']);
    }
}
