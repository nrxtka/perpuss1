<?php

namespace App\Http\Controllers\Peminjam;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DataBuku;
use App\Models\Peminjaman;

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil ID peminjam dari session
        $idPeminjam = session('id_peminjam');

        // Total buku yang tersedia
        $totalBuku = DataBuku::count();

        // Total riwayat peminjaman untuk peminjam yang sedang login
        $totalRiwayat = Peminjaman::where('id_peminjam', $idPeminjam)->count();

        return view('peminjam.dashboard', compact('totalBuku', 'totalRiwayat'));
    }
}
