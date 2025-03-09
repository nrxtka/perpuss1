<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Models\DataPeminjam;
use App\Models\DataBuku;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function index()
    {
        $peminjaman = Peminjaman::with(['peminjam', 'buku'])->get();
        return view('petugas.peminjaman', compact('peminjaman'));
    }

    public function create()
    {
        $peminjams = DataPeminjam::all();
        $bukus = DataBuku::all();
        return view('petugas.createpeminjaman', compact('peminjams', 'bukus'));
    }

    // Simpan data peminjaman ke database
    public function store(Request $request)
    {
        $request->validate([
            'id_peminjam' => 'required|exists:peminjam,id_peminjam',
            'id_buku' => 'required|exists:buku,id_buku',
            'tgl_peminjam' => 'required|date',
            'tgl_pengembalian' => 'nullable|date|after:tgl_peminjam',
            'status_peminjaman' => 'required|in:dipinjam,dikembalikan,belum dikembalikan',
        ]);

        Peminjaman::create([
            'id_peminjam' => $request->id_peminjam,
            'id_buku' => $request->id_buku,
            'tgl_peminjam' => $request->tgl_peminjam,
            'tgl_pengembalian' => $request->tgl_pengembalian,
            'status_peminjaman' => $request->status_peminjaman,
        ]);

        return redirect()->route('petugas.createpeminjaman')->with('success', 'Peminjaman berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $peminjams = DataPeminjam::all();
        $bukus = DataBuku::all();
        return view('petugas.editpeminjaman', compact('peminjaman', 'peminjams', 'bukus'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_peminjam' => 'required|exists:peminjam,id_peminjam',
            'id_buku' => 'required|exists:buku,id_buku',
            'tgl_peminjam' => 'required|date',
            'tgl_pengembalian' => 'nullable|date|after:tgl_peminjam',
            'status_peminjaman' => 'required|in:dipinjam,dikembalikan,belum dikembalikan',
        ]);
        

        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->update([
            'id_peminjam' => $request->id_peminjam,
            'id_buku' => $request->id_buku,
            'tgl_peminjam' => $request->tgl_peminjam,
            'tgl_pengembalian' => $request->tgl_pengembalian,
            'status_peminjaman' => $request->status_peminjaman,
        ]);
        
        return redirect()->route('petugas.peminjaman')->with('success', 'Peminjaman berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->delete();

        return redirect()->route('petugas.peminjaman')->with('success', 'Peminjaman berhasil dihapus!');
    }
}
