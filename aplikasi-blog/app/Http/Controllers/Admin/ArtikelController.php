<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use App\Models\KategoriArtikel;
use App\Models\Penulis;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    public function index()
    {
        $artikel = Artikel::with(['penulis', 'kategori'])->latest()->get();
        $penulis = Penulis::all();
        $kategori = KategoriArtikel::all();
        return view('admin.artikel.index', compact('artikel', 'penulis', 'kategori'));
    }

    public function store(Request $request)
    {
        if (auth()->user()->role !== 'admin') abort(403);

        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'id_penulis' => 'required|exists:penulis,id',
            'id_kategori' => 'required|exists:kategori_artikel,id',
        ]);

        Artikel::create($request->all());
        return redirect()->back()->with('success', 'Artikel berhasil ditambahkan.');
    }

    public function destroy(Artikel $artikel)
    {
        if (auth()->user()->role !== 'admin') abort(403);
        
        $artikel->delete();
        return redirect()->back()->with('success', 'Artikel berhasil dihapus.');
    }
}
