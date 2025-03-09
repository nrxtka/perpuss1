<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class DataAdminController extends Controller
{
    
    public function index()
{
    $admins = Admin::all();
    return view('admin.dataadmin', compact('admins'));
}

public function create()
{
    return view('admin.createadmin'); 
}

public function store(Request $request)
{
    $request->validate([
        'username' => 'required|string|unique:admins,username|max:255', // Tambahkan validasi username
        'nama_lengkap' => 'required|string|max:255',
        'email' => 'required|email|unique:admins,email',
        'password' => 'required|string|min:6',
        'alamat' => 'nullable|string',
    ]);

    Admin::create([
        'username' => $request->username, // Tambahkan username
        'nama_lengkap' => $request->nama_lengkap,
        'email' => $request->email,
        'password' => Hash::make($request->password), // Simpan password terenkripsi
        'alamat' => $request->alamat,
    ]);

    return redirect()->route('admin.dataadmin')->with('success', 'Admin berhasil ditambahkan!');
}

    // Menampilkan halaman edit
    public function edit($id)
    {
        $admin = Admin::findOrFail($id);
        return view('admin.editadmin', compact('admin'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|email|unique:admins,email,' . $id,
            'alamat' => 'nullable|string',
        ]);
    
        $admin = Admin::findOrFail($id);
        $admin->update($request->all());
    
        return redirect()->route('admin.dataadmin')->with('success', 'Admin berhasil diperbarui');
    }
    

    // Hapus admin
    public function destroy($id)
    {
        Admin::findOrFail($id)->delete();
        return redirect()->route('admin.dataadmin')->with('success', 'Admin berhasil dihapus!');
    }
}
