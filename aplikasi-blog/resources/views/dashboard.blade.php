<x-app-layout>
    <x-slot name="header">
        <h2 class="font-extrabold text-2xl text-slate-800 leading-tight flex items-center gap-2">
            <svg class="w-6 h-6 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
            </svg>
            {{ __('Dasbor Manajemen Konten') }}
        </h2>
    </x-slot>

    <div class="py-8 bg-slate-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">
            
            <!-- Welcome Hero Section -->
            <div class="relative overflow-hidden bg-gradient-to-r from-slate-900 via-indigo-950 to-slate-900 text-white rounded-3xl p-6 sm:p-8 shadow-xl">
                <!-- Background decorative glow -->
                <div class="absolute -right-10 -top-10 w-48 h-48 bg-orange-500/20 rounded-full blur-3xl pointer-events-none"></div>
                <div class="absolute -left-10 -bottom-10 w-48 h-48 bg-indigo-500/20 rounded-full blur-3xl pointer-events-none"></div>

                <div class="relative z-10 flex flex-col md:flex-row md:items-center justify-between gap-6">
                    <div>
                        <div class="flex items-center gap-3 mb-2 flex-wrap">
                            @if(Auth::user()->role === 'admin')
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-amber-500/20 text-amber-300 border border-amber-500/30">
                                    <span class="w-1.5 h-1.5 rounded-full bg-amber-400 animate-ping"></span>
                                    Administrator
                                </span>
                            @else
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-blue-500/20 text-blue-300 border border-blue-500/30">
                                    <span class="w-1.5 h-1.5 rounded-full bg-blue-400"></span>
                                    Kontributor / Pembaca
                                </span>
                            @endif
                            <span class="text-xs text-slate-400 font-medium">{{ date('d M Y') }}</span>
                        </div>
                        <h1 class="text-2xl sm:text-3xl font-extrabold tracking-tight">
                            Selamat Datang, {{ Auth::user()->name }}!
                        </h1>
                        <p class="text-sm text-slate-300 mt-2 max-w-2xl leading-relaxed">
                            Aplikasi Web CMS ini dirancang untuk memudahkan Anda mengelola artikel blog publik, kategori topik, serta informasi penulis dengan cepat dan aman.
                        </p>
                    </div>
                    <div class="flex flex-wrap gap-3">
                        <a href="{{ route('publik.beranda') }}" class="inline-flex items-center gap-2 px-5 py-2.5 bg-slate-800 hover:bg-slate-700 text-white text-xs font-bold uppercase tracking-wider rounded-xl transition-all duration-300 shadow-sm border border-slate-700">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                            <span>Lihat Web Utama</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Stats Grid Section -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Total Articles -->
                <div class="bg-white p-6 rounded-3xl border border-slate-200/80 shadow-sm hover:shadow-md hover:-translate-y-1 transition-all duration-300 group">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">Artikel Terbit</p>
                            <p class="text-3xl font-extrabold text-slate-800 mt-2">{{ $counts['artikel'] }}</p>
                        </div>
                        <div class="w-12 h-12 rounded-2xl bg-orange-500/10 text-orange-600 flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="mt-4 pt-4 border-t border-slate-100 flex justify-between items-center">
                        <span class="text-xs text-slate-500">Artikel yang dipublikasi</span>
                        <a href="{{ route('artikel.index') }}" class="text-xs font-bold text-orange-600 hover:text-orange-700 hover:underline">Kelola &rarr;</a>
                    </div>
                </div>

                <!-- Total Categories -->
                <div class="bg-white p-6 rounded-3xl border border-slate-200/80 shadow-sm hover:shadow-md hover:-translate-y-1 transition-all duration-300 group">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">Kategori Topik</p>
                            <p class="text-3xl font-extrabold text-slate-800 mt-2">{{ $counts['kategori'] }}</p>
                        </div>
                        <div class="w-12 h-12 rounded-2xl bg-blue-500/10 text-blue-600 flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="mt-4 pt-4 border-t border-slate-100 flex justify-between items-center">
                        <span class="text-xs text-slate-500">Kategori topik blog</span>
                        <a href="{{ route('kategori.index') }}" class="text-xs font-bold text-blue-600 hover:text-blue-700 hover:underline">Kelola &rarr;</a>
                    </div>
                </div>

                <!-- Total Authors -->
                <div class="bg-white p-6 rounded-3xl border border-slate-200/80 shadow-sm hover:shadow-md hover:-translate-y-1 transition-all duration-300 group">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">Penulis Terdaftar</p>
                            <p class="text-3xl font-extrabold text-slate-800 mt-2">{{ $counts['penulis'] }}</p>
                        </div>
                        <div class="w-12 h-12 rounded-2xl bg-emerald-500/10 text-emerald-600 flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="mt-4 pt-4 border-t border-slate-100 flex justify-between items-center">
                        <span class="text-xs text-slate-500">Penulis kontributor</span>
                        <a href="{{ route('penulis.index') }}" class="text-xs font-bold text-emerald-600 hover:text-emerald-700 hover:underline">Kelola &rarr;</a>
                    </div>
                </div>
            </div>

            <!-- Two Columns Section: Recent Articles & Quick Action Panel -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Left: Recent Articles List -->
                <div class="lg:col-span-2 bg-white rounded-3xl border border-slate-200/80 shadow-sm overflow-hidden flex flex-col justify-between">
                    <div>
                        <div class="p-6 border-b border-slate-100 flex items-center justify-between">
                            <h3 class="text-lg font-bold text-slate-800">Artikel Terbaru</h3>
                            <a href="{{ route('artikel.index') }}" class="text-xs font-semibold text-slate-500 hover:text-orange-600 hover:underline transition-colors">Lihat Semua</a>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full text-sm text-left text-slate-500">
                                <thead class="text-xs text-slate-400 uppercase bg-slate-50/50 border-b border-slate-100">
                                    <tr>
                                        <th class="px-6 py-4 font-semibold">Judul</th>
                                        <th class="px-6 py-4 font-semibold">Penulis</th>
                                        <th class="px-6 py-4 font-semibold">Kategori</th>
                                        <th class="px-6 py-4 font-semibold text-right">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-100">
                                    @forelse ($recent_artikels as $art)
                                        <tr class="hover:bg-slate-50/40 transition-colors">
                                            <td class="px-6 py-4">
                                                <div class="font-semibold text-slate-800 line-clamp-1 max-w-[240px]">
                                                    {{ $art->judul }}
                                                </div>
                                                <span class="text-[10px] text-slate-400 font-medium block mt-0.5">
                                                    {{ $art->created_at->format('d M Y') }}
                                                </span>
                                            </td>
                                            <td class="px-6 py-4">
                                                <div class="flex items-center gap-2">
                                                    <div class="w-6 h-6 rounded-full bg-slate-100 flex items-center justify-center text-[10px] text-slate-600 font-bold border border-slate-200">
                                                        {{ substr($art->penulis->nama ?? 'P', 0, 1) }}
                                                    </div>
                                                    <span class="text-xs text-slate-700 font-medium line-clamp-1 max-w-[120px]">
                                                        {{ $art->penulis->nama ?? 'Tidak Diketahui' }}
                                                    </span>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4">
                                                <span class="inline-flex px-2 py-0.5 text-[11px] font-semibold bg-slate-100 text-slate-600 rounded-md">
                                                    {{ $art->kategori->nama_kategori ?? 'Umum' }}
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 text-right">
                                                <a href="{{ route('publik.detail', $art->id) }}" target="_blank" class="inline-flex items-center gap-1.5 px-3 py-1.5 text-xs font-bold bg-orange-50 hover:bg-orange-100 text-orange-600 rounded-lg transition-colors">
                                                    <span>Buka</span>
                                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                                                    </svg>
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="px-6 py-10 text-center">
                                                <div class="flex flex-col items-center justify-center text-slate-400">
                                                    <svg class="w-10 h-10 mb-2 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                    </svg>
                                                    <p class="text-xs">Belum ada data artikel saat ini.</p>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @if($recent_artikels->isNotEmpty())
                        <div class="p-4 bg-slate-50/50 border-t border-slate-100 text-center">
                            <span class="text-xs text-slate-400 font-medium">Menampilkan 5 artikel terbitan terbaru</span>
                        </div>
                    @endif
                </div>

                <!-- Right: Quick Actions / Helpers Section -->
                <div class="space-y-6">
                    <!-- Navigasi & Pintasan -->
                    <div class="bg-white p-6 rounded-3xl border border-slate-200/80 shadow-sm space-y-4">
                        <h3 class="text-base font-bold text-slate-800">Aksi Pintas</h3>
                        
                        <div class="space-y-3">
                            <a href="{{ route('artikel.index') }}" class="w-full flex items-center justify-between p-3.5 rounded-2xl bg-slate-50 hover:bg-orange-50 border border-slate-100 hover:border-orange-200 transition-all group">
                                <div class="flex items-center gap-3">
                                    <div class="w-9 h-9 rounded-xl bg-orange-100 text-orange-600 flex items-center justify-center group-hover:scale-105 transition-transform">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                        </svg>
                                    </div>
                                    <div class="text-left">
                                        <p class="text-xs font-bold text-slate-800">Kelola & Tulis Artikel</p>
                                        <p class="text-[10px] text-slate-400 font-medium mt-0.5">Edit atau buat artikel baru</p>
                                    </div>
                                </div>
                                <svg class="w-4 h-4 text-slate-400 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>

                            <a href="{{ route('kategori.index') }}" class="w-full flex items-center justify-between p-3.5 rounded-2xl bg-slate-50 hover:bg-blue-50 border border-slate-100 hover:border-blue-200 transition-all group">
                                <div class="flex items-center gap-3">
                                    <div class="w-9 h-9 rounded-xl bg-blue-100 text-blue-600 flex items-center justify-center group-hover:scale-105 transition-transform">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                        </svg>
                                    </div>
                                    <div class="text-left">
                                        <p class="text-xs font-bold text-slate-800">Topik Kategori</p>
                                        <p class="text-[10px] text-slate-400 font-medium mt-0.5">Kelola taksonomi kategori</p>
                                    </div>
                                </div>
                                <svg class="w-4 h-4 text-slate-400 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>

                            <a href="{{ route('penulis.index') }}" class="w-full flex items-center justify-between p-3.5 rounded-2xl bg-slate-50 hover:bg-emerald-50 border border-slate-100 hover:border-emerald-200 transition-all group">
                                <div class="flex items-center gap-3">
                                    <div class="w-9 h-9 rounded-xl bg-emerald-100 text-emerald-600 flex items-center justify-center group-hover:scale-105 transition-transform">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                        </svg>
                                    </div>
                                    <div class="text-left">
                                        <p class="text-xs font-bold text-slate-800">Daftar Penulis</p>
                                        <p class="text-[10px] text-slate-400 font-medium mt-0.5">Kelola identitas penulis blog</p>
                                    </div>
                                </div>
                                <svg class="w-4 h-4 text-slate-400 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                @csrf
                            </form>
                            <button onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="w-full flex items-center justify-between p-3.5 rounded-2xl bg-slate-50 hover:bg-rose-50 border border-slate-100 hover:border-rose-200 transition-all group">
                                <div class="flex items-center gap-3">
                                    <div class="w-9 h-9 rounded-xl bg-rose-100 text-rose-600 flex items-center justify-center group-hover:scale-105 transition-transform">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                        </svg>
                                    </div>
                                    <div class="text-left">
                                        <p class="text-xs font-bold text-slate-800">Keluar (Logout)</p>
                                        <p class="text-[10px] text-slate-400 font-medium mt-0.5">Akhiri sesi manajemen Anda</p>
                                    </div>
                                </div>
                                <svg class="w-4 h-4 text-slate-400 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Role Info Card -->
                    <div class="bg-gradient-to-br from-slate-900 to-indigo-950 p-6 rounded-3xl text-white shadow-sm relative overflow-hidden">
                        <div class="absolute -right-6 -bottom-6 w-24 h-24 bg-orange-500/10 rounded-full blur-xl pointer-events-none"></div>
                        <h4 class="text-sm font-bold text-slate-200">Panduan Hak Akses</h4>
                        <p class="text-[11px] text-slate-400 leading-relaxed mt-2">
                            Hak akses akun Anda ditentukan berdasarkan peran Anda:
                        </p>
                        <div class="mt-3.5 space-y-2.5">
                            <div class="flex gap-2.5">
                                <div class="mt-0.5 w-1.5 h-1.5 rounded-full bg-amber-400 shrink-0"></div>
                                <div class="text-[11px]">
                                    <strong class="text-amber-300">Admin</strong> memiliki hak akses penuh untuk melakukan Tambah, Edit, dan Hapus artikel, kategori, dan penulis.
                                </div>
                            </div>
                            <div class="flex gap-2.5">
                                <div class="mt-0.5 w-1.5 h-1.5 rounded-full bg-blue-400 shrink-0"></div>
                                <div class="text-[11px]">
                                    <strong class="text-blue-300">User</strong> memiliki hak akses baca (Read-only) untuk meninjau data di CMS tanpa opsi untuk menambah atau menghapusnya.
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 pt-4 border-t border-slate-800/80 text-[10px] text-slate-500 text-center">
                            Role Saat Ini: <span class="font-bold text-slate-300 uppercase tracking-wider">{{ Auth::user()->role }}</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
