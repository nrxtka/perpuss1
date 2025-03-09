<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjam;
use Illuminate\Support\Facades\Hash;

class PeminjamLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login.peminjam');
    }

    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // Cek apakah username ada di database
        $peminjam = Peminjam::where('username', $request->username)->first();

        // Cek password
        if ($peminjam && password_verify($request->password, $peminjam->password)) {
            // Simpan data peminjam di session
            session([
                'peminjam_id' => $peminjam->id,
                'peminjam_nama' => $peminjam->nama,
                'peminjam_username' => $peminjam->username,
                'peminjam_email' => $peminjam->email,
                'is_logged_in' => true, // Tanda bahwa user sudah login
            ]);

            return redirect()->route('peminjam.dashboard');
        }

        return back()->with('LoginError', 'Username atau Password salah!');
    }

    public function logout()
    {
        // Hapus semua session yang berhubungan dengan peminjam
        session()->flush();
        return redirect()->route('login.peminjam');
    }

    public function showRegisterForm()
    {
        return view('register.peminjam');
    }

    public function register(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:peminjam,email',
            'username' => 'required|unique:peminjam,username',
            'password' => 'required|min:6',
            'alamat' => 'required',
        ]);

        // Simpan data ke database
        Peminjam::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('login.peminjam')->with('success', 'Registrasi berhasil! Silakan login.');
    }
}
