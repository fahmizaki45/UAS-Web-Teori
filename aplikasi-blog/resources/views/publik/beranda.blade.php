@extends('layouts.publik')

@section('title', 'Web CMS — Beranda')

@section('content')
{{-- HERO SECTION --}}
<section class="hero-section">
    <div class="container">
        <div class="badge-hero"><i class="bi bi-stars me-1"></i> Selamat Datang</div>
        <h2>Temukan Artikel Menarik &amp; Inspiratif</h2>
        <p>Jelajahi berbagai artikel terbaru seputar teknologi, pemrograman, dan tutorial informatif.</p>
    </div>
</section>

{{-- MAIN CONTENT --}}
<section class="content-wrapper">
    <div class="container">
        <div class="row">
            {{-- KOLOM KIRI: DAFTAR ARTIKEL --}}
            <div class="col-lg-8">
                @if($artikel->count() > 0)
                    @foreach($artikel as $index => $item)
                        <div class="article-card animate-in animate-delay-{{ $index + 1 }}">
                            <div class="card-img-wrapper">
                                @if($item->gambar && file_exists(public_path('storage/gambar/' . $item->gambar)))
                                    <img src="{{ asset('storage/gambar/' . $item->gambar) }}" alt="{{ $item->judul }}">
                                @else
                                    <div class="no-image">
                                        <i class="bi bi-image"></i>
                                    </div>
                                @endif
                            </div>
                            <div class="card-body">
                                @if($item->kategori)
                                    <span class="badge-kategori">
                                        <i class="bi bi-bookmark-fill me-1"></i>{{ $item->kategori->nama_kategori }}
                                    </span>
                                @endif
                                <h3>{{ $item->judul }}</h3>
                                <div class="article-meta">
                                    @if($item->penulis)
                                        <span class="avatar-inisial">{{ strtoupper(substr($item->penulis->nama, 0, 1)) }}</span>
                                        <span>{{ $item->penulis->nama }}</span>
                                        <span class="separator">·</span>
                                    @endif
                                    <span><i class="bi bi-calendar3 me-1"></i>{{ $item->created_at ? $item->created_at->format('d M Y') : '-' }}</span>
                                </div>
                                <p class="article-excerpt">
                                    {{ Str::limit(strip_tags($item->isi), 150) }}
                                </p>
                                <a href="{{ route('publik.detail', $item->id) }}" class="btn-baca">
                                    Baca Selengkapnya <i class="bi bi-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="widget">
                        <div class="empty-state">
                            <i class="bi bi-journal-x"></i>
                            <h5>Belum Ada Artikel</h5>
                            <p>Belum ada artikel yang dipublikasikan{{ $kategoriAktif ? ' untuk kategori ini' : '' }}.</p>
                            @if($kategoriAktif)
                                <a href="{{ route('publik.beranda') }}" class="btn-baca mt-3">
                                    <i class="bi bi-arrow-left"></i> Lihat Semua Artikel
                                </a>
                            @endif
                        </div>
                    </div>
                @endif
            </div>

            {{-- KOLOM KANAN: SIDEBAR --}}
            <div class="col-lg-4">
                <div class="widget animate-in animate-delay-2">
                    <div class="widget-header">
                        <i class="bi bi-bookmarks-fill"></i>
                        <h5>Kategori Artikel</h5>
                    </div>
                    <div class="widget-body">
                        {{-- Semua Artikel --}}
                        <a href="{{ route('publik.beranda') }}"
                           class="kategori-item {{ !$kategoriAktif ? 'active' : '' }}" id="kategori-semua">
                            <span><i class="bi bi-grid-fill me-2"></i>Semua Artikel</span>
                            <span class="badge-count">{{ $totalArtikel }}</span>
                        </a>
                        {{-- Daftar Kategori --}}
                        @foreach($semuaKategori as $kat)
                            <a href="{{ route('publik.beranda', ['kategori' => $kat->id]) }}"
                               class="kategori-item {{ $kategoriAktif == $kat->id ? 'active' : '' }}" id="kategori-{{ $kat->id }}">
                                <span><i class="bi bi-tag-fill me-2"></i>{{ $kat->nama_kategori }}</span>
                                <span class="badge-count">{{ $kat->artikel_count }}</span>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
