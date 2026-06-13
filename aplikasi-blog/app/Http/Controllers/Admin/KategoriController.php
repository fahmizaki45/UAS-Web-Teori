<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KategoriArtikel;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = KategoriArtikel::withCount('artikel')->latest()->get();
        return view('admin.kategori.index', compact('kategori'));
    }

    public function store(Request $request)
    {
        if (auth()->user()->role !== 'admin') abort(403);

        $request->validate([
            'nama_kategori' => 'required|string|max:255',
        ]);

        KategoriArtikel::create($request->all());
        return redirect()->back()->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function destroy(KategoriArtikel $kategori)
    {
        if (auth()->user()->role !== 'admin') abort(403);
        
        $kategori->delete();
        return redirect()->back()->with('success', 'Kategori berhasil dihapus.');
    }
}
