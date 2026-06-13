@extends('layouts.publik')

@section('title', $artikel->judul . ' — Web CMS')

@section('content')
{{-- MAIN CONTENT --}}
<section class="content-wrapper" style="padding-top: 30px;">
    <div class="container">
        <div class="row">
            {{-- KOLOM KIRI: DETAIL ARTIKEL --}}
            <div class="col-lg-8">
                <div class="animate-in animate-delay-1">
                    {{-- BREADCRUMB --}}
                    <nav aria-label="breadcrumb" class="breadcrumb-custom">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('publik.beranda') }}"><i class="bi bi-house-door me-1"></i>Beranda</a>
                            </li>
                            @if($artikel->kategori)
                                <li class="breadcrumb-item">
                                    <a href="{{ route('publik.beranda', ['kategori' => $artikel->kategori->id]) }}">{{ $artikel->kategori->nama_kategori }}</a>
                                </li>
                            @endif
                            <li class="breadcrumb-item active" aria-current="page">{{ Str::limit($artikel->judul, 40) }}</li>
                        </ol>
                    </nav>

                    {{-- GAMBAR ARTIKEL --}}
                    <div class="detail-img">
                        @if($artikel->gambar && file_exists(public_path('storage/gambar/' . $artikel->gambar)))
                            <img src="{{ asset('storage/gambar/' . $artikel->gambar) }}" alt="{{ $artikel->judul }}">
                        @else
                            <div class="no-image" style="min-height: 300px;">
                                <i class="bi bi-image"></i>
                            </div>
                        @endif
                    </div>

                    {{-- BADGE KATEGORI --}}
                    @if($artikel->kategori)
                        <span class="badge-kategori">
                            <i class="bi bi-bookmark-fill me-1"></i>{{ $artikel->kategori->nama_kategori }}
                        </span>
                    @endif

                    {{-- JUDUL --}}
                    <h1 class="detail-title">{{ $artikel->judul }}</h1>

                    {{-- META --}}
                    <div class="article-meta" style="margin-bottom: 0;">
                        @if($artikel->penulis)
                            <span class="avatar-inisial">{{ strtoupper(substr($artikel->penulis->nama, 0, 1)) }}</span>
                            <span>{{ $artikel->penulis->nama }}</span>
                            <span class="separator">·</span>
                        @endif
                        <span><i class="bi bi-calendar3 me-1"></i>{{ $artikel->created_at ? $artikel->created_at->format('d F Y') : '-' }}</span>
                    </div>

                    <hr style="margin: 20px 0; border-color: #eee;">

                    {{-- ISI ARTIKEL --}}
                    <div class="detail-content">
                        {!! nl2br(e($artikel->isi)) !!}
                    </div>

                    <hr style="margin: 24px 0; border-color: #eee;">

                    {{-- KEMBALI KE BERANDA --}}
                    <a href="{{ route('publik.beranda') }}" class="btn-kembali">
                        <i class="bi bi-arrow-left"></i> Kembali ke Beranda
                    </a>
                </div>
            </div>

            {{-- KOLOM KANAN: SIDEBAR --}}
            <div class="col-lg-4">
                @if($artikelTerkait->count() > 0)
                    <div class="widget animate-in animate-delay-2">
                        <div class="widget-header">
                            <i class="bi bi-link-45deg"></i>
                            <h5>Artikel Terkait</h5>
                        </div>
                        <div class="widget-body" style="padding: 0;">
                            @foreach($artikelTerkait as $terkait)
                                <a href="{{ route('publik.detail', $terkait->id) }}" class="artikel-terkait-item" id="terkait-{{ $terkait->id }}">
                                    @if($terkait->gambar && file_exists(public_path('storage/gambar/' . $terkait->gambar)))
                                        <img src="{{ asset('storage/gambar/' . $terkait->gambar) }}" alt="{{ $terkait->judul }}">
                                    @else
                                        <div style="width:70px; height:55px; background: linear-gradient(135deg, #e8f5e9, #c8e6c9); border-radius:8px; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                                            <i class="bi bi-image" style="color:#81C784; font-size:20px;"></i>
                                        </div>
                                    @endif
                                    <div class="info">
                                        <h6>{{ $terkait->judul }}</h6>
                                        <small><i class="bi bi-calendar3 me-1"></i>{{ $terkait->created_at ? $terkait->created_at->format('d M Y') : '-' }}</small>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif

                {{-- WIDGET INFO --}}
                <div class="widget animate-in animate-delay-3">
                    <div class="widget-header">
                        <i class="bi bi-info-circle-fill"></i>
                        <h5>Tentang Blog</h5>
                    </div>
                    <div class="widget-body" style="padding: 16px 20px;">
                        <p style="color:#6c757d; font-size:13px; margin:0; line-height:1.7;">
                            <strong>Web CMS</strong> adalah platform berbagi pengetahuan dan informasi seputar teknologi, pemrograman, dan tutorial bermanfaat lainnya.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
