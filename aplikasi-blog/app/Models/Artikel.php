<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    protected $table = 'artikel';
    protected $fillable = ['judul', 'isi', 'gambar', 'id_penulis', 'id_kategori'];

    public function penulis()
    {
        return $this->belongsTo(Penulis::class, 'id_penulis');
    }

    public function kategori()
    {
        return $this->belongsTo(KategoriArtikel::class, 'id_kategori');
    }
}
