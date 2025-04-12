<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Datapetugas;
use App\Models\DataBuku;
use App\Models\DataPeminjam;

class IndexController extends Controller
{
    public function index()
    {
        if (!session()->has('admin')) {
            return redirect()->route('login.admin')->with('LoginError', 'Silahkan login dulu!');
        }
    
        $totalAdmin = Admin::count();
        $totalPetugas = Datapetugas::count();
        $totalBuku = DataBuku::count();
        $totalPeminjaman = DataPeminjam::count();
    
        return view('admin.index', [
            'totalAdmin' => $totalAdmin,
            'totalPetugas' => $totalPetugas,
            'totalBuku' => $totalBuku,
            'totalPeminjaman' => $totalPeminjaman,
        ]);
    }
    
}
