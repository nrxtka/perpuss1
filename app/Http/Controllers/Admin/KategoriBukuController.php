<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KategoriBuku;

class KategoriBukuController extends Controller
{
    public function index()
    {
        $kategoribuku = KategoriBuku::all();
        return view('admin.kategoribuku', compact('kategoribuku'));
    }

    public function create()
    {
        return view('admin.createkategoribuku');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori_buku' => 'required|string|max:255|unique:kategoribuku,kategori_buku',
        ]);

        KategoriBuku::create([
            'kategori_buku' => $request->kategori_buku,
        ]);

        return redirect()->route('admin.kategoribuku')->with('success', 'Kategori berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $kategori = KategoriBuku::findOrFail($id);
        return view('admin.editkategori', compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        $kategori = KategoriBuku::findOrFail($id);

        $request->validate([
            'kategori_buku' => 'required|string|max:255|unique:kategoribuku,kategori_buku,' . $id . ',id_kategoribuku',
        ]);

        $kategori->update([
            'kategori_buku' => $request->kategori_buku,
        ]);

        return redirect()->route('admin.kategoribuku')->with('success', 'Kategori berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $kategori = KategoriBuku::findOrFail($id);
        $kategori->delete();

        return redirect()->route('admin.kategoribuku')->with('success', 'Kategori berhasil dihapus!');
    }
}
