<?php
namespace App\Http\Controllers\Peminjam;

use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;

class PeminjamController extends Controller
{
    public function rakbuku()
    {
        return view('peminjam.rakbuku');
    }

    public function peminjaman()
    {
        return view('peminjam.peminjaman');
    }
}
