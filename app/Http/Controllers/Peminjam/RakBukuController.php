<?php

namespace App\Http\Controllers\Peminjam;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DataBuku;
use App\Models\KategoriBuku;
use App\Models\Peminjaman;

class RakBukuController extends Controller
{
    public function index(Request $request)
    {
        $kategoriBuku = KategoriBuku::all();
        $kategoriDipilih = $request->query('kategori');
        
        $buku = DataBuku::with('kategori')
            ->when($kategoriDipilih, function ($query) use ($kategoriDipilih) {
                return $query->where('id_kategoribuku', $kategoriDipilih);
            })
            ->get();

        return view('peminjam.rakbuku', compact('buku', 'kategoriBuku', 'kategoriDipilih'));
    }

    public function show($id)
    {
        $buku = DataBuku::with('kategori')->findOrFail($id);
        return view('peminjam.detailbuku', compact('buku'));
    }

    public function pinjamBuku(Request $request, $id)
    {
        $buku = DataBuku::findOrFail($id);

        if ($buku->stok <= 0) {
            return redirect()->back()->with('error', 'Stok buku habis!');
        }

        Peminjaman::create([
            'id_peminjam' => session('id_peminjam'),
            'id_buku' => $buku->id_buku,
            'tgl_peminjam' => now(),
            'status_peminjaman' => 'dipinjam',
        ]);

        $buku->decrement('stok');

        return redirect()->route('peminjam.peminjaman')->with('success', 'Buku berhasil dipinjam!');
    }
}