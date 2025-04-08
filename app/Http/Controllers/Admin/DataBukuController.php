<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DataBuku;
use App\Models\KategoriBuku;
use Illuminate\Support\Facades\Storage;

class DataBukuController extends Controller
{
    public function index()
    {
        $databuku = DataBuku::with('kategori')->get();
        $kategori = KategoriBuku::all(); // Tambahkan ini
        return view('admin.databuku', compact('databuku', 'kategori')); // Kirim ke view
    }
     

    public function create()
    {
        $kategori = KategoriBuku::all();
        return view('admin.createbuku', compact('kategori'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'judul_buku' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'tahun_terbit' => 'required|integer|min:1900|max:' . date('Y'),
            'stok' => 'required|integer|min:0',
            'cover' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'id_kategoribuku' => 'required|exists:kategoribuku,id_kategoribuku',
        ]);
    
        $coverName = null;
        if ($request->hasFile('cover')) {
            $coverName = $request->file('cover')->store('covers', 'public');
        }
    
        DataBuku::create([
            'judul_buku' => $request->judul_buku,
            'penulis' => $request->penulis,
            'penerbit' => $request->penerbit,
            'tahun_terbit' => $request->tahun_terbit,
            'stok' => $request->stok, // Simpan stok
            'cover' => $coverName,
            'id_kategoribuku' => $request->id_kategoribuku,
        ]);
    
        return redirect()->route('admin.databuku')->with('success', 'Buku berhasil ditambahkan!');
    }    
    public function edit($id)
    {
        $buku = DataBuku::with('kategori')->findOrFail($id);
        $kategori = KategoriBuku::all();
        return view('admin.editbuku', compact('buku', 'kategori'));
    }
    
    public function update(Request $request, $id)
    {
        $buku = DataBuku::findOrFail($id);
    
        $request->validate([
            'judul_buku' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'tahun_terbit' => 'required|integer|min:1900|max:' . date('Y'),
            'stok' => 'required|integer|min:0', // Validasi stok
            'cover' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'id_kategoribuku' => 'required|exists:kategoribuku,id_kategoribuku',
            
        ]);
    
        if ($request->hasFile('cover')) {
            if ($buku->cover) {
                Storage::disk('public')->delete($buku->cover);
            }
            $buku->cover = $request->file('cover')->store('covers', 'public');
        }
    
        $buku->update([
            'judul_buku' => $request->judul_buku,
            'penulis' => $request->penulis,
            'penerbit' => $request->penerbit,
            'tahun_terbit' => $request->tahun_terbit,
            'stok' => $request->stok,
            'id_kategoribuku' => $request->id_kategoribuku,
        ]);
    
        return redirect()->route('admin.databuku')->with('success', 'Buku berhasil diperbarui!');
    }    
    public function destroy($id)
    {
        $buku = DataBuku::findOrFail($id);
        if ($buku->cover) {
            Storage::disk('public')->delete($buku->cover);
        }
        $buku->delete();

        return redirect()->route('admin.databuku')->with('success', 'Buku berhasil dihapus!');
    }
}
