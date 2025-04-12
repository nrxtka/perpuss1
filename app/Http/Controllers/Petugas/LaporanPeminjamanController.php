<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Peminjaman;
use PDF;
use Carbon\Carbon;

class LaporanPeminjamanController extends Controller
{
    public function index(Request $request)
    {
        $query = Peminjaman::query();

        // Ambil filter
        $dari_tanggal = $request->dari_tanggal ? Carbon::parse($request->dari_tanggal)->format('Y-m-d') : null;
        $sampai_tanggal = $request->sampai_tanggal ? Carbon::parse($request->sampai_tanggal)->format('Y-m-d') : null;
        $status_peminjaman = $request->status_peminjaman ?? null;

        // Filter tanggal
        if ($dari_tanggal && $sampai_tanggal) {
            $query->whereBetween('tgl_peminjam', [$dari_tanggal, $sampai_tanggal]);
        }

        // Filter status
        if ($status_peminjaman) {
            if ($status_peminjaman === 'belum_dikembalikan') {
                $query->whereNull('status_peminjaman');
            } else {
                $query->where('status_peminjaman', $status_peminjaman);
            }
        }

        $peminjaman = $query->with(['peminjam', 'buku'])->get();

        return view('petugas.laporanpeminjaman', compact('peminjaman', 'dari_tanggal', 'sampai_tanggal', 'status_peminjaman'));
    }

    public function exportPDF(Request $request)
    {
        $query = Peminjaman::query();

        $dari_tanggal = $request->dari_tanggal ? Carbon::parse($request->dari_tanggal)->format('Y-m-d') : null;
        $sampai_tanggal = $request->sampai_tanggal ? Carbon::parse($request->sampai_tanggal)->format('Y-m-d') : null;
        $status_peminjaman = $request->status_peminjaman ?? null;

        if ($dari_tanggal && $sampai_tanggal) {
            $query->whereBetween('tgl_peminjam', [$dari_tanggal, $sampai_tanggal]);
        }

        if ($status_peminjaman) {
            if ($status_peminjaman === 'belum_dikembalikan') {
                $query->whereNull('status_peminjaman');
            } else {
                $query->where('status_peminjaman', $status_peminjaman);
            }
        }

        $peminjaman = $query->with(['peminjam', 'buku'])->get();

        $pdf = PDF::loadView('admin.laporanpeminjamanPDF', compact('peminjaman', 'dari_tanggal', 'sampai_tanggal', 'status_peminjaman'));
        $filename = 'laporan_peminjaman_' . Carbon::now()->format('Ymd_His') . '.pdf';

        return $pdf->download($filename);
    }
}
    