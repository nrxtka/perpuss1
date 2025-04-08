<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function index()
    {
        // Tambahkan eager loading untuk relasi peminjam dan buku
        $peminjaman = Peminjaman::with(['peminjam', 'buku'])->get();
        return view('admin.peminjaman', compact('peminjaman'));
    }
}
