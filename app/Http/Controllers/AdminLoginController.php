<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class AdminLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login.admin');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required', // Ubah dari 'email' ke 'username'
            'password' => 'required'
        ]);
    
        $admin = Admin::where('username', $request->username)->first(); // Cari berdasarkan username
    
        if (!$admin || !Hash::check($request->password, $admin->password)) {
            return back()->with('LoginError', 'Username atau password salah!');
        }
    
        // Simpan sesi admin
        Session::put('admin', $admin);
    
        return redirect()->route('admin.index');
    }    

    public function logout()
    {
        Session::forget('admin');
        return redirect()->route('admin.login.form')->with('LogoutSuccess', 'Berhasil logout!');
    }

    public function dashboard()
    {
        if (!Session::has('admin')) {
            return redirect()->route('admin.login.form')->with('LoginError', 'Silahkan login dulu!');
        }

        return view('admin.index');
    }
}
