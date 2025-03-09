<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Datapetugas;
use Illuminate\Http\Request;

class DataPetugasController extends Controller
{
    public function index()
    {
        $datapetugas = Datapetugas::all();
        return view('admin.datapetugas', compact('datapetugas'));
    }

    public function create()
    {
        return view('admin.createpetugas'); 
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_petugas' => 'required|string|max:255',
            'email' => 'required|email|unique:petugas,email',
            'username' => 'required|string|max:255|unique:petugas,username',
            'password' => 'required|string|min:6',
            'alamat' => 'required|string|max:255',
        ]);
    
        Datapetugas::create([
            'id_petugas' => rand(1000, 9999), // ID manual biar nggak error
            'nama_petugas' => $request->nama_petugas,
            'email' => $request->email,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'alamat' => $request->alamat,
        ]);
    
        return redirect()->route('admin.datapetugas')->with('success', 'Petugas berhasil ditambahkan!');
    }
    

    public function edit($id)
    {
        $petugas = Datapetugas::findOrFail($id);
        return view('admin.editpetugas', compact('petugas'));
    }

    public function update(Request $request, $id)
    {
        $petugas = Datapetugas::findOrFail($id);

        $request->validate([
            'nama_petugas' => 'required|string|max:255',
            'email' => 'required|email|unique:petugas,email,' . $id . ',id_petugas',
            'alamat' => 'required|string|max:255',
        ]);

        $petugas->update([
            'nama_petugas' => $request->nama_petugas,
            'email' => $request->email,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('admin.datapetugas')->with('success', 'Petugas berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $petugas = Datapetugas::findOrFail($id);
        $petugas->delete();

        return redirect()->route('admin.datapetugas')->with('success', 'Petugas berhasil dihapus!');
    }
}
