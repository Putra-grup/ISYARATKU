<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\M_Akun_Admin;

class C_Akun_Admin extends Controller
{
     public function formLogin()
    {
        return view('login'); // pastikan file resources/views/login.blade.php ada
    }

    public function login(Request $request)
{
    $admin = M_Akun_Admin::where('email', $request->email)->first();

    if ($admin && Hash::check($request->password, $admin->password)) {
        // Simpan data login ke session
        session(['admin_logged_in' => true, 'admin_id' => $admin->id]);

        return redirect()->route('admin.dashboard');
    }

    return back()->withErrors(['Email atau password salah']);
}

    public function dashboard(Request $request)
    {
        $adminId = $request->session()->get('admin_id');
        $admin = M_Akun_Admin::find($adminId);

        return view('admin/homepage_admin', compact('admin'));
    }
    //

}
