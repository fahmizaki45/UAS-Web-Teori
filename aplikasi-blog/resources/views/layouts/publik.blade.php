<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Web CMS - Tempat berbagi artikel dan informasi terbaru seputar teknologi, pemrograman, dan tutorial.">
    <title>@yield('title', 'Web CMS')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        /* ===== GLOBAL ===== */
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
            background: #f4f4f9;
            color: #333;
            font-size: 14px;
            line-height: 1.6;
        }
        a { text-decoration: none; transition: all 0.3s ease; }

        /* ===== NAVBAR ===== */
        .navbar-custom {
            background: linear-gradient(135deg, #2C3E50 0%, #34495E 100%);
            padding: 0;
            box-shadow: 0 2px 15px rgba(0,0,0,0.15);
            position: sticky;
            top: 0;
            z-index: 1050;
        }
        .navbar-brand-area {
            padding: 18px 0 10px;
        }
        .navbar-brand-area h1 {
            color: #fff;
            font-size: 26px;
            font-weight: 700;
            margin: 0;
            letter-spacing: -0.5px;
        }
        .navbar-brand-area h1 i {
            color: #4CAF50;
            margin-right: 8px;
        }
        .navbar-brand-area p {
            color: rgba(255,255,255,0.6);
            font-size: 12px;
            margin: 2px 0 0;
        }
        .navbar-nav-custom {
            background: rgba(0,0,0,0.15);
            border-top: 1px solid rgba(255,255,255,0.08);
        }
        .navbar-nav-custom .nav-link {
            color: rgba(255,255,255,0.75);
            padding: 12px 20px;
            font-size: 13px;
            font-weight: 500;
            letter-spacing: 0.3px;
            border-bottom: 3px solid transparent;
            transition: all 0.3s ease;
        }
        .navbar-nav-custom .nav-link:hover,
        .navbar-nav-custom .nav-link.active {
            color: #fff;
            background: rgba(255,255,255,0.05);
            border-bottom-color: #4CAF50;
        }
        .navbar-nav-custom .nav-link i {
            margin-right: 5px;
            font-size: 14px;
        }

        /* ===== HERO SECTION ===== */
        .hero-section {
            background: linear-gradient(135deg, #2C3E50 0%, #3d566e 100%);
            padding: 40px 0 35px;
            margin-bottom: 30px;
            position: relative;
            overflow: hidden;
        }
        .hero-section::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -20%;
            width: 500px;
            height: 500px;
            background: rgba(76, 175, 80, 0.08);
            border-radius: 50%;
        }
        .hero-section::after {
            content: '';
            position: absolute;
            bottom: -60%;
            left: -10%;
            width: 400px;
            height: 400px;
            background: rgba(76, 175, 80, 0.05);
            border-radius: 50%;
        }
        .hero-section h2 {
            color: #fff;
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 8px;
        }
        .hero-section p {
            color: rgba(255,255,255,0.65);
            font-size: 15px;
            margin: 0;
        }
        .hero-section .badge-hero {
            background: rgba(76,175,80,0.2);
            color: #81C784;
            border: 1px solid rgba(76,175,80,0.3);
            font-size: 11px;
            padding: 5px 12px;
            border-radius: 20px;
            font-weight: 500;
            display: inline-block;
            margin-bottom: 12px;
        }

        /* ===== MAIN CONTENT ===== */
        .content-wrapper {
            padding-bottom: 50px;
        }

        /* ===== ARTICLE CARDS ===== */
        .article-card {
            background: #fff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 2px 12px rgba(0,0,0,0.06);
            margin-bottom: 24px;
            border: 1px solid rgba(0,0,0,0.04);
            transition: all 0.35s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .article-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 30px rgba(0,0,0,0.1);
        }
        .article-card .card-img-wrapper {
            position: relative;
            overflow: hidden;
            height: 220px;
        }
        .article-card .card-img-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .article-card:hover .card-img-wrapper img {
            transform: scale(1.05);
        }
        .article-card .card-body {
            padding: 22px 24px 20px;
        }
        .badge-kategori {
            background: #e8f5e9;
            color: #2e7d32;
            font-size: 11px;
            font-weight: 600;
            padding: 4px 12px;
            border-radius: 20px;
            display: inline-block;
            letter-spacing: 0.3px;
        }
        .article-card h3 {
            font-size: 18px;
            font-weight: 600;
            color: #2C3E50;
            margin: 10px 0 8px;
            line-height: 1.4;
            transition: color 0.3s;
        }
        .article-card:hover h3 {
            color: #2e7d32;
        }
        .article-meta {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 12px;
            flex-wrap: wrap;
        }
        .avatar-inisial {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background: linear-gradient(135deg, #4CAF50, #2e7d32);
            color: #fff;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            font-weight: 700;
            flex-shrink: 0;
        }
        .article-meta span {
            color: #868e96;
            font-size: 12px;
        }
        .article-meta .separator {
            color: #dee2e6;
        }
        .article-excerpt {
            color: #6c757d;
            font-size: 14px;
            line-height: 1.65;
            margin-bottom: 16px;
        }
        .btn-baca {
            background: linear-gradient(135deg, #2e7d32, #4CAF50);
            color: #fff;
            border: none;
            padding: 9px 22px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 600;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }
        .btn-baca:hover {
            background: linear-gradient(135deg, #1b5e20, #2e7d32);
            color: #fff;
            transform: translateX(3px);
            box-shadow: 0 4px 12px rgba(46,125,50,0.3);
        }

        /* ===== SIDEBAR WIDGETS ===== */
        .widget {
            background: #fff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 2px 12px rgba(0,0,0,0.06);
            border: 1px solid rgba(0,0,0,0.04);
            margin-bottom: 24px;
        }
        .widget-header {
            padding: 18px 20px 14px;
            border-bottom: 2px solid #f4f4f9;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .widget-header i {
            color: #4CAF50;
            font-size: 18px;
        }
        .widget-header h5 {
            font-size: 15px;
            font-weight: 700;
            color: #2C3E50;
            margin: 0;
        }
        .widget-body {
            padding: 8px 0;
        }
        .kategori-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 11px 20px;
            color: #555;
            font-size: 13px;
            font-weight: 500;
            transition: all 0.25s ease;
            border-left: 3px solid transparent;
        }
        .kategori-item:hover {
            background: #f8fdf8;
            color: #2e7d32;
            border-left-color: #81C784;
        }
        .kategori-item.active {
            background: #e8f5e9;
            color: #2e7d32;
            font-weight: 600;
            border-left-color: #4CAF50;
        }
        .kategori-item .badge-count {
            background: #f0f0f5;
            color: #868e96;
            font-size: 11px;
            font-weight: 600;
            padding: 2px 10px;
            border-radius: 12px;
            min-width: 28px;
            text-align: center;
        }
        .kategori-item.active .badge-count {
            background: #c8e6c9;
            color: #2e7d32;
        }

        /* ===== ARTIKEL TERKAIT ===== */
        .artikel-terkait-item {
            display: flex;
            gap: 14px;
            padding: 14px 20px;
            transition: all 0.25s ease;
            border-bottom: 1px solid #f4f4f9;
        }
        .artikel-terkait-item:last-child {
            border-bottom: none;
        }
        .artikel-terkait-item:hover {
            background: #f8fdf8;
        }
        .artikel-terkait-item img {
            width: 70px;
            height: 55px;
            object-fit: cover;
            border-radius: 8px;
            flex-shrink: 0;
        }
        .artikel-terkait-item .info h6 {
            font-size: 13px;
            font-weight: 600;
            color: #2C3E50;
            margin: 0 0 4px;
            line-height: 1.4;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            transition: color 0.3s;
        }
        .artikel-terkait-item:hover .info h6 {
            color: #2e7d32;
        }
        .artikel-terkait-item .info small {
            color: #868e96;
            font-size: 11px;
        }

        /* ===== DETAIL PAGE ===== */
        .breadcrumb-custom {
            background: transparent;
            padding: 0;
            margin-bottom: 20px;
        }
        .breadcrumb-custom .breadcrumb-item a {
            color: #4CAF50;
            font-size: 13px;
        }
        .breadcrumb-custom .breadcrumb-item.active {
            color: #868e96;
            font-size: 13px;
        }
        .detail-img {
            border-radius: 12px;
            overflow: hidden;
            margin-bottom: 24px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
        .detail-img img {
            width: 100%;
            height: auto;
            max-height: 450px;
            object-fit: cover;
        }
        .detail-title {
            font-size: 26px;
            font-weight: 700;
            color: #2C3E50;
            line-height: 1.35;
            margin: 14px 0 12px;
        }
        .detail-content {
            font-size: 15px;
            line-height: 1.8;
            color: #444;
            margin: 24px 0;
        }
        .detail-content p {
            margin-bottom: 16px;
        }
        .btn-kembali {
            color: #4CAF50;
            font-weight: 600;
            font-size: 14px;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 10px 0;
            transition: all 0.3s;
        }
        .btn-kembali:hover {
            color: #2e7d32;
            transform: translateX(-4px);
        }

        /* ===== NO IMAGE PLACEHOLDER ===== */
        .no-image {
            background: linear-gradient(135deg, #e8f5e9, #c8e6c9);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #81C784;
            font-size: 48px;
            width: 100%;
            height: 100%;
            min-height: 200px;
        }

        /* ===== FOOTER ===== */
        .footer {
            background: linear-gradient(135deg, #2C3E50 0%, #34495E 100%);
            color: rgba(255,255,255,0.6);
            padding: 28px 0;
            font-size: 13px;
            margin-top: 20px;
        }
        .footer a {
            color: #81C784;
        }
        .footer a:hover {
            color: #4CAF50;
        }
        .footer .footer-brand {
            color: #fff;
            font-weight: 700;
            font-size: 16px;
        }
        .footer .footer-brand i {
            color: #4CAF50;
        }

        /* ===== EMPTY STATE ===== */
        .empty-state {
            text-align: center;
            padding: 60px 20px;
            color: #868e96;
        }
        .empty-state i {
            font-size: 52px;
            color: #dee2e6;
            margin-bottom: 16px;
            display: block;
        }
        .empty-state h5 {
            color: #6c757d;
            font-weight: 600;
            margin-bottom: 6px;
        }

        /* ===== ANIMATIONS ===== */
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-in {
            animation: fadeInUp 0.5s ease forwards;
        }
        .animate-delay-1 { animation-delay: 0.1s; opacity: 0; }
        .animate-delay-2 { animation-delay: 0.2s; opacity: 0; }
        .animate-delay-3 { animation-delay: 0.3s; opacity: 0; }
        .animate-delay-4 { animation-delay: 0.4s; opacity: 0; }
        .animate-delay-5 { animation-delay: 0.5s; opacity: 0; }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 991px) {
            .hero-section h2 { font-size: 22px; }
            .detail-title { font-size: 22px; }
            .article-card .card-img-wrapper { height: 180px; }
        }
        @media (max-width: 767px) {
            .navbar-brand-area h1 { font-size: 20px; }
            .hero-section { padding: 28px 0; }
            .hero-section h2 { font-size: 20px; }
            .article-card .card-body { padding: 16px 18px; }
        }
    </style>
</head>
<body>
    {{-- NAVBAR --}}
    <nav class="navbar-custom">
        <div class="container">
            <div class="navbar-brand-area">
                <h1><i class="bi bi-journal-richtext"></i>Web CMS</h1>
                <p>Berbagi Pengetahuan, Inspirasi &amp; Informasi</p>
            </div>
        </div>
        <div class="navbar-nav-custom">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center flex-wrap">
                    <div class="d-flex flex-wrap">
                        <a href="{{ route('publik.beranda') }}" class="nav-link {{ request()->routeIs('publik.beranda') || request()->routeIs('publik.beranda.alias') ? 'active' : '' }}">
                            <i class="bi bi-house-door"></i> Beranda
                        </a>
                        <a href="{{ route('publik.beranda') }}" class="nav-link">
                            <i class="bi bi-file-earmark-text"></i> Artikel
                        </a>
                        <a href="{{ route('publik.beranda') }}" class="nav-link">
                            <i class="bi bi-bookmark"></i> Kategori
                        </a>
                        <a href="#" class="nav-link">
                            <i class="bi bi-info-circle"></i> Tentang
                        </a>
                    </div>
                    
                    <div class="d-flex align-items-center py-2 py-md-0">
                        @auth
                            <a href="{{ route('dashboard') }}" class="nav-link text-white me-3">
                                <i class="bi bi-speedometer2 text-success"></i> Dashboard
                            </a>
                            <form method="POST" action="{{ route('logout') }}" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-outline-light btn-sm py-1 px-3" style="font-size: 12px; border-radius: 6px; font-weight: 500;">
                                    <i class="bi bi-box-arrow-right me-1"></i> Keluar
                                </button>
                            </form>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-success btn-sm py-1 px-3" style="font-size: 12px; border-radius: 6px; font-weight: 500; background-color: #2e7d32; border-color: #2e7d32;">
                                <i class="bi bi-box-arrow-in-right me-1"></i> Masuk (Login)
                            </a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </nav>

    {{-- FLASH MESSAGES --}}
    @if(session('success'))
        <div class="container mt-3">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        </div>
    @endif
    @if(session('error'))
        <div class="container mt-3">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="bi bi-exclamation-circle me-2"></i>{{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        </div>
    @endif

    {{-- MAIN CONTENT --}}
    @yield('content')

    {{-- FOOTER --}}
    <footer class="footer">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <span class="footer-brand"><i class="bi bi-journal-richtext me-2"></i>Web CMS</span>
                    <p class="mb-0 mt-1">&copy; {{ date('Y') }} Web CMS. All rights reserved.</p>
                </div>
                <div class="col-md-6 text-md-end mt-3 mt-md-0">
                    <p class="mb-0">Dibuat dengan <i class="bi bi-heart-fill text-danger"></i> menggunakan Laravel &amp; Bootstrap</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
