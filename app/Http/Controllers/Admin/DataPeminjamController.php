<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DataPeminjam;
use Illuminate\Support\Facades\Hash;

class DataPeminjamController extends Controller
{
    public function index()
    {
        $datapeminjam = DataPeminjam::all();
        return view('admin.datapeminjam', compact('datapeminjam'));
    }

    public function create()
    {
        return view('admin.createpeminjam');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:peminjam,email',
            'username' => 'required|string|max:50|unique:peminjam,username',
            'password' => 'required|string|min:6',
            'alamat' => 'nullable|string|max:255',
        ]);

        DataPeminjam::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('admin.datapeminjam')->with('success', 'Peminjam berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $peminjam = DataPeminjam::findOrFail($id);
        return view('admin.editpeminjam', compact('peminjam'));
    }

    public function update(Request $request, $id)
    {
        $peminjam = DataPeminjam::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:peminjam,email,' . $id . ',id_peminjam',
            'username' => 'required|string|max:50|unique:peminjam,username,' . $id . ',id_peminjam',
            'password' => 'nullable|string|min:6',
            'alamat' => 'nullable|string|max:255',
        ]);

        $peminjam->update([
            'nama' => $request->nama,
            'email' => $request->email,
            'username' => $request->username,
            'password' => $request->password ? Hash::make($request->password) : $peminjam->password,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('admin.datapeminjam')->with('success', 'Data peminjam berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $peminjam = DataPeminjam::findOrFail($id);
        $peminjam->delete();

        return redirect()->route('admin.datapeminjam')->with('success', 'Peminjam berhasil dihapus!');
    }
}
