<?php
namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Datapetugas;
use App\Models\DataBuku;
use App\Models\DataPeminjam;

class DashboardPetugasController extends Controller
{
    public function index()
    {
        $totalAdmin = Admin::count();
        $totalPetugas = Datapetugas::count();
        $totalBuku = DataBuku::count();
        $totalPeminjaman = DataPeminjam::count();

        return view('petugas.dashboard', compact('totalAdmin', 'totalPetugas', 'totalBuku', 'totalPeminjaman'));
    }
}
