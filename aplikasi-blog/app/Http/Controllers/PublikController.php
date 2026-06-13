<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artikel;
use App\Models\KategoriArtikel;

class PublikController extends Controller
{
    public function beranda(Request $request)
    {
        $kategoriAktif = $request->query('kategori');

        $query = Artikel::with('penulis', 'kategori')->orderBy('id', 'desc');

        if ($kategoriAktif) {
            $query->where('id_kategori', $kategoriAktif);
        }

        $artikel = $query->take(5)->get();
        $semuaKategori = KategoriArtikel::withCount('artikel')
                            ->orderBy('nama_kategori')->get();
        $totalArtikel = Artikel::count();

        return view('publik.beranda', compact(
            'artikel', 'semuaKategori', 'totalArtikel', 'kategoriAktif'
        ));
    }

    public function detail(string $id)
    {
        $artikel = Artikel::with('penulis', 'kategori')->findOrFail($id);

        $artikelTerkait = Artikel::with('penulis')
            ->where('id_kategori', $artikel->id_kategori)
            ->where('id', '!=', $artikel->id)
            ->orderBy('id', 'desc')
            ->take(4)
            ->get();

        return view('publik.detail', compact('artikel', 'artikelTerkait'));
    }
}
