<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PublikController;
use App\Models\Artikel;
use App\Models\KategoriArtikel;
use App\Models\Penulis;
use App\Models\User;

// Route halaman pengunjung (tanpa middleware auth)
Route::get('/', [PublikController::class, 'beranda'])->name('publik.beranda');
Route::get('/beranda', [PublikController::class, 'beranda'])->name('publik.beranda.alias');
Route::get('/artikel/{id}', [PublikController::class, 'detail'])->name('publik.detail');

Route::get('/dashboard', function () {
    $counts = [
        'artikel' => Artikel::count(),
        'kategori' => KategoriArtikel::count(),
        'penulis' => Penulis::count(),
        'users' => User::count(),
    ];
    $recent_artikels = Artikel::with(['penulis', 'kategori'])->latest()->take(5)->get();
    return view('dashboard', compact('counts', 'recent_artikels'));
})->middleware(['auth', 'verified'])->name('dashboard');

use App\Http\Controllers\Admin\PenulisController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\ArtikelController;

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Route CMS (Admin/User)
    Route::resource('admin/penulis', PenulisController::class)->names('penulis')->only(['index', 'store', 'destroy']);
    Route::resource('admin/kategori', KategoriController::class)->names('kategori')->only(['index', 'store', 'destroy']);
    Route::resource('admin/artikel', ArtikelController::class)->names('artikel')->only(['index', 'store', 'destroy']);
});

require __DIR__.'/auth.php';
