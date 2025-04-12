<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class DataAdminController extends Controller
{
    // Tampilkan semua admin (dengan pagination)
    public function index()
    {
        $admins = Admin::paginate(10); // Untuk pagination + firstItem(), lastItem(), dll
        return view('admin.dataadmin', compact('admins'));
    }

    // Tampilkan form tambah admin
    public function create()
    {
        return view('admin.createadmin');
    }

    // Simpan admin baru
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string|unique:admins,username|max:255',
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|email|unique:admins,email',
            'password' => 'required|string|min:6',
            'alamat' => 'nullable|string',
        ]);

        Admin::create([
            'username' => $request->username,
            'nama_lengkap' => $request->nama_lengkap,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('admin.dataadmin')->with('success', 'Admin berhasil ditambahkan!');
    }

    // Tampilkan form edit
    public function edit($id)
    {
        $admin = Admin::findOrFail($id);
        return view('admin.editadmin', compact('admin'));
    }

    // Simpan hasil edit
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|email|unique:admins,email,' . $id,
            'alamat' => 'nullable|string',
        ]);

        $admin = Admin::findOrFail($id);
        $admin->update([
            'nama_lengkap' => $request->nama_lengkap,
            'email' => $request->email,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('admin.dataadmin')->with('success', 'Admin berhasil diperbarui!');
    }

    // Hapus admin
    public function destroy($id)
    {
        $admin = Admin::findOrFail($id);
        $admin->delete();

        return redirect()->route('admin.dataadmin')->with('success', 'Admin berhasil dihapus!');
    }
}
