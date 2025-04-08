<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Peminjaman;
use PDF;
use Carbon\Carbon; // Pastikan pakai Carbon buat tanggal

class LaporanPeminjamanController extends Controller
{
    public function index(Request $request)
    {
        $query = Peminjaman::query();

        // Ambil input tanggal dengan validasi
        $dari_tanggal = $request->dari_tanggal ? Carbon::parse($request->dari_tanggal)->format('Y-m-d') : null;
        $sampai_tanggal = $request->sampai_tanggal ? Carbon::parse($request->sampai_tanggal)->format('Y-m-d') : null;

        // Filter hanya jika kedua tanggal ada
        if ($dari_tanggal && $sampai_tanggal) {
            $query->whereBetween('tgl_peminjam', [$dari_tanggal, $sampai_tanggal]);
        }

        $peminjaman = $query->get();

        return view('admin.laporanpeminjaman', compact('peminjaman', 'dari_tanggal', 'sampai_tanggal'));
    }

    public function exportPDF(Request $request)
{
    $query = Peminjaman::query();

    $dari_tanggal = $request->dari_tanggal ? Carbon::parse($request->dari_tanggal)->format('Y-m-d') : null;
    $sampai_tanggal = $request->sampai_tanggal ? Carbon::parse($request->sampai_tanggal)->format('Y-m-d') : null;

    if ($dari_tanggal && $sampai_tanggal) {
        $query->whereBetween('tgl_peminjam', [$dari_tanggal, $sampai_tanggal]); // ini udah bener 🫶
    }

    $peminjaman = $query->get();

    $pdf = PDF::loadView('admin.laporanpeminjamanPDF', compact('peminjaman', 'dari_tanggal', 'sampai_tanggal'));
    $filename = 'laporan_peminjaman_' . Carbon::now()->format('Ymd_His') . '.pdf';

    return $pdf->download($filename);
}

}
