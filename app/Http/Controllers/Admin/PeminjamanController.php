<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Peminjaman;
use App\Models\DataBuku;
use App\Models\DataPeminjam;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PeminjamanController extends Controller
{
    public function index()
    {
        // Ambil semua peminjaman dengan relasi
        $peminjaman = Peminjaman::with(['peminjam', 'buku'])->get();

        // Update status otomatis jika lewat dari 7 hari dan masih "dipinjam"
        $hariIni = Carbon::now();
        
        // Update status where it's still "dipinjam" and the return date has passed
        Peminjaman::where('status_peminjaman', 'dipinjam')
            ->where('tgl_peminjam', '<', $hariIni->subDays(7)->toDateString()) // using subDays instead of addDays
            ->update(['status_peminjaman' => 'belum dikembalikan']);
        
        return view('admin.peminjaman', compact('peminjaman'));
    }

    public function create()
    {
        // ambil data buku & peminjam, kirim ke form create
        $buku = DataBuku::all();
        $peminjam = DataPeminjam::all();
        return view('admin.createpeminjaman', compact('buku', 'peminjam'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_buku' => 'required|exists:buku,id_buku',
            'id_peminjam' => 'required|exists:peminjam,id_peminjam',
            'tgl_peminjam' => 'required|date',
            'tgl_pengembalian' => 'required|date|after_or_equal:tgl_peminjam',
            'status_peminjaman' => 'required|in:dipinjam,dikembalikan,belum dikembalikan',
        ]);        
    
        Peminjaman::create([
            'id_buku' => $request->id_buku,
            'id_peminjam' => $request->id_peminjam,
            'tgl_peminjam' => $request->tgl_peminjam,
            'tgl_pengembalian' => $request->tgl_pengembalian,
            'status_peminjaman' => $request->status_peminjaman,
        ]);
    
        return redirect()->route('admin.peminjaman')->with('success', 'Data peminjaman berhasil ditambahkan.');
    }    
    public function edit($id)
    {
        // Ambil data peminjaman berdasarkan id_peminjaman
        $peminjaman = Peminjaman::with(['peminjam', 'buku'])->findOrFail($id);
        return view('admin.editpeminjaman', compact('peminjaman'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status_peminjaman' => 'required|in:dipinjam,dikembalikan,belum dikembalikan',
        ]);

        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->status_peminjaman = $request->status_peminjaman;
        $peminjaman->save();

        return redirect()->back()->with('success', 'Status peminjaman berhasil diperbarui.');
    }
}
