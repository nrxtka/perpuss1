<?php

namespace App\Http\Controllers\Peminjam;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\DataBuku;
use App\Models\Peminjam;

class PeminjamanController extends Controller
{
    // Menampilkan daftar peminjaman hanya untuk user yang sedang login
    public function index()
    {
        $idPeminjam = session('id_peminjam');
        $peminjaman = Peminjaman::with('buku')->where('id_peminjam', $idPeminjam)->get();
        return view('peminjam.peminjaman', compact('peminjaman'));
    }

    // Menampilkan form peminjaman buku baru
    public function create($id_buku)
    {
        $buku = DataBuku::findOrFail($id_buku);
        $peminjam = Peminjam::findOrFail(session('id_peminjam'));
        return view('peminjam.create_peminjaman', compact('buku', 'peminjam'));
    }

    // Menampilkan form peminjaman spesifik buku
    public function formPeminjaman($id_buku)
    {
        $buku = DataBuku::findOrFail($id_buku);
        $peminjam = Peminjam::findOrFail(session('id_peminjam'));
        return view('peminjam.rakbuku', compact('buku', 'peminjam'));
    }

    // Menyimpan data peminjaman baru
    public function store(Request $request)
    {
      

        $request->validate([
            'id_buku' => 'required|exists:buku,id_buku',
            'tgl_peminjam' => 'required|date',
            'tgl_pengembalian' => 'required|date|after:tgl_peminjam',
            'status_peminjaman' => 'required|in:dipinjam,dikembalikan'
        ]);

        Peminjaman::create([
            'id_peminjam' => session('id_peminjam'),
            'id_buku' => $request->id_buku,
            'tgl_peminjam' => $request->tgl_peminjam,
            'tgl_pengembalian' => $request->tgl_pengembalian,
            'status_peminjaman' => $request->status_peminjaman
        ]);

        DataBuku::where('id_buku', $request->id_buku)->decrement('stok');

        return redirect()->route('peminjam.rakbuku')->with('success', 'Buku berhasil dipinjam!');
    }

    // Mengembalikan buku yang dipinjam
    public function returnBook($id)
    {
        $idPeminjam = session('id_peminjam');
        $peminjaman = Peminjaman::where('id_peminjaman', $id)
            ->where('id_peminjam', $idPeminjam)
            ->firstOrFail();

        $peminjaman->update([
            'tgl_pengembalian' => now(),
            'status_peminjaman' => 'dikembalikan'
        ]);

        DataBuku::where('id_buku', $peminjaman->id_buku)->increment('stok');

        return redirect()->route('peminjam.peminjaman')->with('success', 'Buku berhasil dikembalikan!');
    }
    
}
