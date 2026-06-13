<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Masuk - Web CMS</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css?family=Plus+Jakarta+Sans:400,500,600,700,800&display=swap" rel="stylesheet" />
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { 
            font-family: 'Plus Jakarta Sans', sans-serif; 
        }
    </style>
</head>
<body class="min-h-screen bg-gradient-to-br from-[#0f172a] via-[#1e293b] to-[#0f172a] flex items-center justify-center p-4 relative overflow-x-hidden">
    
    <!-- Background glows (radial gradients for rich aesthetics) -->
    <div class="absolute top-10 left-10 w-72 h-72 bg-orange-500/10 rounded-full blur-[100px] pointer-events-none"></div>
    <div class="absolute bottom-10 right-10 w-80 h-80 bg-indigo-500/10 rounded-full blur-[100px] pointer-events-none"></div>

    <div class="w-full max-w-[450px] relative">
        <!-- Main Card -->
        <div class="bg-slate-900/80 backdrop-blur-xl border border-slate-800 rounded-3xl shadow-[0_25px_50px_-12px_rgba(0,0,0,0.5)] overflow-hidden relative">
            
            <!-- Glow top border line -->
            <div class="h-1.5 w-full bg-gradient-to-r from-orange-500 via-amber-500 to-yellow-500"></div>

            <div class="p-8 sm:p-10">
                <!-- Brand Logo & Header -->
                <div class="flex flex-col items-center text-center mb-8">
                    <div class="w-12 h-12 bg-gradient-to-tr from-orange-500 to-amber-500 rounded-2xl flex items-center justify-center shadow-lg shadow-orange-500/20 mb-4">
                        <!-- Book Open / Write SVG Icon -->
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                    </div>
                    <h1 class="text-2xl font-extrabold text-white tracking-tight">Web CMS</h1>
                    <p class="text-sm text-slate-400 mt-1.5">Masuk untuk mengelola publikasi blog Anda</p>
                </div>

                <!-- Session Status -->
                <x-auth-session-status class="mb-5 p-3 rounded-lg bg-green-500/10 border border-green-500/20 text-green-400 text-xs text-center" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}" class="space-y-5">
                    @csrf
                    
                    <!-- Email Input -->
                    <div class="space-y-1.5">
                        <label for="email" class="block text-xs font-semibold text-slate-300 uppercase tracking-wider">Alamat Email</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 text-slate-500">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.206"></path>
                                </svg>
                            </span>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                                class="block w-full pl-11 pr-4 py-3 bg-slate-950 border border-slate-800 rounded-xl text-sm text-slate-100 placeholder-slate-600 focus:outline-none focus:border-orange-500 focus:ring-1 focus:ring-orange-500 transition-all duration-200" 
                                placeholder="name@example.com">
                        </div>
                        <x-input-error :messages="$errors->get('email')" class="text-xs text-red-500 mt-1" />
                    </div>

                    <!-- Password Input -->
                    <div class="space-y-1.5">
                        <div class="flex justify-between items-center">
                            <label for="password" class="block text-xs font-semibold text-slate-300 uppercase tracking-wider">Kata Sandi</label>
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="text-xs font-medium text-orange-400 hover:text-orange-300 transition-colors">Lupa Password?</a>
                            @endif
                        </div>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 text-slate-500">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                </svg>
                            </span>
                            <input id="password" type="password" name="password" required
                                class="block w-full pl-11 pr-4 py-3 bg-slate-950 border border-slate-800 rounded-xl text-sm text-slate-100 placeholder-slate-600 focus:outline-none focus:border-orange-500 focus:ring-1 focus:ring-orange-500 transition-all duration-200" 
                                placeholder="••••••••">
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="text-xs text-red-500 mt-1" />
                    </div>

                    <!-- Remember Me checkbox -->
                    <div class="flex items-center">
                        <input id="remember_me" type="checkbox" name="remember" 
                            class="w-4 h-4 rounded bg-slate-950 border-slate-800 text-orange-500 focus:ring-orange-500/20 focus:ring-offset-slate-900 focus:ring-2">
                        <label for="remember_me" class="ml-2.5 text-xs text-slate-400 font-medium cursor-pointer">Ingat saya di perangkat ini</label>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="w-full flex items-center justify-center gap-2 py-3 px-4 bg-gradient-to-r from-orange-600 to-amber-500 hover:from-orange-500 hover:to-amber-400 text-white text-sm font-bold rounded-xl transition-all duration-300 transform active:scale-[0.98] shadow-lg shadow-orange-950/20">
                        <span>Masuk ke Dashboard</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                        </svg>
                    </button>
                </form>

                <!-- Footer registration helper -->
                @if (Route::has('register'))
                    <div class="mt-8 text-center border-t border-slate-800/60 pt-6">
                        <p class="text-xs text-slate-500">
                            Belum terdaftar? 
                            <a href="{{ route('register') }}" class="text-orange-400 font-semibold hover:text-orange-300 hover:underline transition-all">
                                Buat akun baru &rarr;
                            </a>
                        </p>
                    </div>
                @endif

            </div>
        </div>

        <!-- Extra bottom helper links (optional back to homepage link) -->
        <div class="text-center mt-5">
            <a href="{{ route('publik.beranda') }}" class="inline-flex items-center gap-2 text-xs text-slate-500 hover:text-slate-400 transition-colors">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                <span>Kembali ke Beranda Utama</span>
            </a>
        </div>
    </div>

</body>
</html>
