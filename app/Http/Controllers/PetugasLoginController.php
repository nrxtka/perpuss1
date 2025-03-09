<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Petugas;

class PetugasLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login.petugas');
    }

    public function login(Request $request)
    {
     
        // Validasi input
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // Cari petugas berdasarkan username
        $petugas = Petugas::where('username', $request->username)->first();
  
        // Jika petugas ditemukan
        if ($petugas) {
            // Cek password tanpa hashing
            if ($petugas->password === $request->password) {
                // Simpan informasi petugas dalam session
                session(['petugas' => $petugas]);

                return redirect()->route('petugas.dashboard');
            } else {
                return back()->with('LoginError', 'Password salah!');
            }
        }

        return back()->with('LoginError', 'Username tidak ditemukan!');
    }

    public function logout()
    {
        session()->forget('petugas'); // Hapus session
        return redirect()->route('petugas.login');
    }
}
