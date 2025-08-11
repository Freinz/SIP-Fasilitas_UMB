<!DOCTYPE html>
<html lang="id" class="antialiased scroll-smooth">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>SIP-Fasilitas UMB | Sistem Peminjaman Fasilitas Universitas Muhammadiyah Banjarmasin</title>
    <link rel="icon" href="{{ URL::asset('image/umb-logo.png') }}" type="image/png">

    <!-- Tailwind CDN (quick start). In production use a compiled build. -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        'um-blue': '#003366',
                        'um-gold': '#C9A100',
                        'um-green': '#1E8F49'
                    },
                    boxShadow: {
                        'soft-lg': '0 10px 30px rgba(2,6,23,0.08)'
                    }
                }
            }
        }
    </script>

    <!-- Minimal custom CSS for loader & small helpers -->
    <style>
        /* Loader overlay */
        #page-loader {
            position: fixed;
            inset: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #ffffff;
            z-index: 60;
            transition: opacity .35s ease;
        }

        .spinner {
            width: 46px;
            height: 46px;
            border: 5px solid rgba(0, 0, 0, 0.08);
            border-top-color: #003366;
            border-radius: 50%;
            animation: spin .9s linear infinite;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        /* subtle backdrop blur for navbar when scrolled */
        .nav-glass {
            background-color: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(6px);
        }

        .dark .nav-glass {
            background-color: rgba(6, 9, 23, 0.6);
        }

        /* floating decorative icons */
        .float-deco {
            opacity: .08;
            will-change: transform;
        }

        /* reduced-motion respectful */
        @media (prefers-reduced-motion: reduce) {
            .spinner {
                animation: none;
            }

            [data-animate] {
                transition: none !important;
                transform: none !important;
                opacity: 1 !important;
            }
        }
    </style>
</head>

<body class="bg-white text-slate-800 dark:bg-slate-900 dark:text-slate-100">

    <!-- PAGE LOADER -->
    <div id="page-loader" aria-hidden="true">
        <div class="flex flex-col items-center gap-3">
            <div class="spinner" role="status" aria-label="Memuat..."></div>
            <span class="text-slate-500 dark:text-slate-300 text-sm">Memuat SIP-Fasilitas UMB …</span>
        </div>
    </div>

    <!-- NAVBAR -->
    <header class="fixed inset-x-0 top-0 z-50">
        <nav id="main-nav" class="mx-auto max-w-7xl px-4 py-3 flex items-center justify-between rounded-b-lg transition-shadow duration-300 ease-in-out nav-glass" role="navigation" aria-label="Main Navigation">
            <div class="flex items-center gap-3">
                <img src="{{ URL::asset('image/umb-logo.png') }}" alt="UMBJM Logo" class="h-10 w-10 rounded-md object-contain">
                <div>
                    <p class="text-sm font-semibold text-um-blue dark:text-um-gold">SIP-Fasilitas UMB</p>
                    <p class="text-xs text-slate-500 dark:text-slate-300 -mt-0.5">Sistem Peminjaman Fasilitas</p>
                </div>
            </div>

            <!-- Desktop links -->
            <ul class="hidden md:flex items-center gap-6" role="menubar" aria-label="Primary">
                <li><a href="#home" class="text-slate-700 dark:text-slate-200 hover:text-um-gold focus:outline-none focus:ring-2 focus:ring-um-gold/40 rounded px-2 py-1">Beranda</a></li>
                <li><a href="#features" class="text-slate-700 dark:text-slate-200 hover:text-um-gold focus:outline-none focus:ring-2 focus:ring-um-gold/40 rounded px-2 py-1">Fitur</a></li>
                <li><a href="#how-it-works" class="text-slate-700 dark:text-slate-200 hover:text-um-gold focus:outline-none focus:ring-2 focus:ring-um-gold/40 rounded px-2 py-1">Cara Kerja</a></li>
                <li><a href="#contact" class="text-slate-700 dark:text-slate-200 hover:text-um-gold focus:outline-none focus:ring-2 focus:ring-um-gold/40 rounded px-2 py-1">Kontak</a></li>
            </ul>

            <div class="flex items-center gap-3">
                <a href="/login" class="inline-flex items-center gap-2 bg-gradient-to-r from-um-blue to-um-green text-white px-4 py-2 rounded-full shadow-soft-lg hover:scale-[1.02] transform transition focus:outline-none focus:ring-2 focus:ring-um-gold/40">
                    <!-- login icon (inline svg) -->
                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" aria-hidden="true" focusable="false">
                        <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M10 17l5-5-5-5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M15 12H3" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <span class="text-sm font-medium">Masuk Sistem</span>
                </a>

                <!-- mobile menu button -->
                <button id="mobile-menu-btn" aria-controls="mobile-menu" aria-expanded="false" class="md:hidden inline-flex items-center justify-center p-2 rounded-md text-slate-700 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-800 focus:outline-none focus:ring-2 focus:ring-um-gold/40">
                    <span class="sr-only">Buka menu</span>
                    <!-- hamburger -->
                    <svg id="hamburger" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8h16M4 16h16" />
                    </svg>
                    <!-- X icon hidden by default -->
                    <svg id="close-icon" class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </nav>

        <!-- Mobile menu (hidden) -->
        <div id="mobile-menu" class="md:hidden bg-white dark:bg-slate-900 shadow-lg border-t border-slate-100 dark:border-slate-700" hidden>
            <div class="px-4 py-3 space-y-2">
                <a href="#home" class="block px-3 py-2 rounded hover:bg-slate-100 dark:hover:bg-slate-800">Beranda</a>
                <a href="#features" class="block px-3 py-2 rounded hover:bg-slate-100 dark:hover:bg-slate-800">Fitur</a>
                <a href="#how-it-works" class="block px-3 py-2 rounded hover:bg-slate-100 dark:hover:bg-slate-800">Cara Kerja</a>
                <a href="#contact" class="block px-3 py-2 rounded hover:bg-slate-100 dark:hover:bg-slate-800">Kontak</a>
            </div>
        </div>
    </header>

    <!-- MAIN CONTENT -->
    <main class="pt-24">

        <!-- HERO -->
        <section id="home" class="relative min-h-[85vh] flex items-center">
            <!-- decorative parallax image (kept subtle so content readable) -->
            <div aria-hidden="true" class="absolute inset-0 overflow-hidden">
                <img id="hero-bg" src="https://images.unsplash.com/photo-1503676260728-1c00da094a0b?q=80&w=1600&auto=format&fit=crop&ixlib=rb-4.0.3&s=5d59c7b3b4e6d3e1b3e8e84d99f652b6" alt="" class="w-full h-full object-cover brightness-50 dark:brightness-40 transform will-change-transform">
                <!-- floating icons -->
                <svg class="float-deco absolute left-8 top-20 h-40 w-40" viewBox="0 0 24 24" fill="none">
                    <path d="M12 2v4M12 18v4M4.9 4.9l2.8 2.8M16.3 16.3l2.8 2.8M2 12h4M18 12h4M4.9 19.1l2.8-2.8M16.3 7.7l2.8-2.8" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <svg class="float-deco absolute right-10 bottom-16 h-36 w-36" viewBox="0 0 24 24" fill="none">
                    <rect x="3" y="3" width="18" height="18" rx="3" stroke="currentColor" stroke-width="1.2" />
                </svg>
            </div>

            <div class="relative z-10 max-w-6xl mx-auto w-full px-6">
                <div class="bg-white/90 dark:bg-slate-800/80 backdrop-blur-lg rounded-2xl shadow-soft-lg p-8 md:p-12 lg:flex lg:items-center lg:gap-8">
                    <div class="flex-1">
                        <h1 class="text-3xl md:text-4xl font-extrabold text-um-blue dark:text-um-gold leading-tight">SIP-Fasilitas UMB</h1>
                        <p class="mt-2 text-slate-600 dark:text-slate-200">Sistem Peminjaman Fasilitas Universitas Muhammadiyah Banjarmasin</p>

                        <p class="mt-4 text-slate-700 dark:text-slate-300 leading-relaxed">
                            Solusi digital terdepan untuk mengelola peminjaman ruangan dan alat di kampus.
                            Proses yang lebih efisien, transparan, dan mudah untuk seluruh civitas akademika.
                        </p>

                        <div class="mt-6 flex flex-wrap gap-3">
                            <a href="/login" class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-um-blue text-white shadow hover:translate-y-[-2px] transition transform">
                                <!-- rocket icon -->
                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                    <path d="M12 2s4 1 6 3 3 6 3 6-3 0-7 4-7 7-7 7 3-1 6-4 4-7 4-7-3-1-6-4S6 4 6 4l6-2z" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <span class="text-sm font-medium">Mulai Peminjaman</span>
                            </a>

                            <a href="#features" class="inline-flex items-center gap-2 px-4 py-2 rounded-full border border-slate-200 dark:border-slate-700 text-slate-700 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-700 transition">
                                <!-- info icon -->
                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                    <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="1.2" />
                                    <path d="M12 16v-4M12 8h.01" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <span class="text-sm font-medium">Pelajari Lebih Lanjut</span>
                            </a>
                        </div>
                    </div>

                    <!-- hero graphic / illustration (ke kanan) -->
                    <div class="mt-6 lg:mt-0 lg:w-1/3">
                        <div class="rounded-xl overflow-hidden bg-gradient-to-b from-um-blue/70 to-um-green/60 p-4 text-white">
                            <div class="flex items-center gap-3">
                                <div class="rounded-lg bg-white/10 p-3">
                                    <!-- clipboard icon -->
                                    <svg class="h-8 w-8" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                        <path d="M9 2h6v4H9zM7 8h10v12H7z" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-xs uppercase opacity-90">Fitur Utama</p>
                                    <p class="font-semibold text-lg">Booking Real-time • Notifikasi • Workflow</p>
                                </div>
                            </div>

                            <ul class="mt-4 space-y-2 text-sm">
                                <li class="flex items-start gap-2"><span class="font-medium text-um-gold">•</span> Cek ketersediaan ruangan & alat</li>
                                <li class="flex items-start gap-2"><span class="font-medium text-um-gold">•</span> Persetujuan otomatis dengan notifikasi</li>
                                <li class="flex items-start gap-2"><span class="font-medium text-um-gold">•</span> Dashboard & keamanan data</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- FEATURES -->
        <section id="features" class="py-16">
            <div class="max-w-6xl mx-auto px-6">
                <h2 class="text-2xl md:text-3xl font-bold text-center text-um-blue dark:text-um-gold">Fitur Unggulan</h2>
                <p class="mt-2 text-center text-slate-600 dark:text-slate-300 max-w-2xl mx-auto">Sistem yang dirancang khusus untuk mempermudah proses peminjaman fasilitas kampus</p>

                <div class="mt-8 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                    <!-- Card 1 -->
                    <article class="group bg-white dark:bg-slate-800 p-6 rounded-2xl shadow-soft-lg transform transition hover:-translate-y-2 focus-within:ring-2 focus-within:ring-um-gold/30" data-animate>
                        <div class="flex items-center gap-4">
                            <div class="h-14 w-14 rounded-lg flex items-center justify-center bg-gradient-to-br from-um-blue to-um-green text-white">
                                <!-- calendar-check -->
                                <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                    <rect x="3" y="4" width="18" height="18" rx="2" stroke="currentColor" stroke-width="1.2" />
                                    <path d="M8 12l2.5 2.5L16 9" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-semibold text-lg text-slate-800 dark:text-slate-100">Booking Real-time</h3>
                                <p class="mt-1 text-sm text-slate-600 dark:text-slate-300">Cek ketersediaan ruangan dan alat secara real-time. Tidak ada lagi double booking atau konflik jadwal.</p>
                            </div>
                        </div>
                    </article>

                    <!-- Card 2 -->
                    <article class="group bg-white dark:bg-slate-800 p-6 rounded-2xl shadow-soft-lg transform transition hover:-translate-y-2 focus-within:ring-2 focus-within:ring-um-gold/30" data-animate>
                        <div class="flex items-center gap-4">
                            <div class="h-14 w-14 rounded-lg flex items-center justify-center bg-gradient-to-br from-um-blue to-um-green text-white">
                                <!-- workflow (checklist) -->
                                <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                    <rect x="3" y="4" width="18" height="18" rx="2" stroke="currentColor" stroke-width="1.2" />
                                    <path d="M8 12l2.5 2.5L16 9" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-semibold text-lg text-slate-800 dark:text-slate-100">Workflow Otomatis</h3>
                                <p class="mt-1 text-sm text-slate-600 dark:text-slate-300">Proses persetujuan otomatis dari Rumah Tangga, Bagian Umum, hingga Pimpinan dengan notifikasi real-time.</p>
                            </div>
                        </div>
                    </article>

                    <!-- Card 3 -->
                    <article class="group bg-white dark:bg-slate-800 p-6 rounded-2xl shadow-soft-lg transform transition hover:-translate-y-2 focus-within:ring-2 focus-within:ring-um-gold/30" data-animate>
                        <div class="flex items-center gap-4">
                            <div class="h-14 w-14 rounded-lg flex items-center justify-center bg-gradient-to-br from-um-blue to-um-green text-white">
                                <!-- mobile -->
                                <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                    <rect x="7" y="3" width="10" height="18" rx="2" stroke="currentColor" stroke-width="1.2" />
                                    <path d="M11 18h2" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-semibold text-lg text-slate-800 dark:text-slate-100">Mobile Friendly</h3>
                                <p class="mt-1 text-sm text-slate-600 dark:text-slate-300">Akses sistem kapan saja, di mana saja melalui smartphone atau tablet dengan tampilan responsif.</p>
                            </div>
                        </div>
                    </article>

                    <!-- Card 4 -->
                    <article class="group bg-white dark:bg-slate-800 p-6 rounded-2xl shadow-soft-lg transform transition hover:-translate-y-2 focus-within:ring-2 focus-within:ring-um-gold/30" data-animate>
                        <div class="flex items-center gap-4">
                            <div class="h-14 w-14 rounded-lg flex items-center justify-center bg-gradient-to-br from-um-blue to-um-green text-white">
                                <!-- bell -->
                                <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                    <path d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6 6 0 10-12 0v3.159c0 .538-.214 1.055-.595 1.436L4 17h5" stroke="currentColor" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-semibold text-lg text-slate-800 dark:text-slate-100">Notifikasi Pintar</h3>
                                <p class="mt-1 text-sm text-slate-600 dark:text-slate-300">Dapatkan notifikasi otomatis untuk setiap perubahan status, reminder, dan informasi penting lainnya.</p>
                            </div>
                        </div>
                    </article>

                    <!-- Card 5 -->
                    <article class="group bg-white dark:bg-slate-800 p-6 rounded-2xl shadow-soft-lg transform transition hover:-translate-y-2 focus-within:ring-2 focus-within:ring-um-gold/30" data-animate>
                        <div class="flex items-center gap-4">
                            <div class="h-14 w-14 rounded-lg flex items-center justify-center bg-gradient-to-br from-um-blue to-um-green text-white">
                                <!-- chart -->
                                <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                    <path d="M3 3v18h18" stroke="currentColor" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M9 13l3-3 4 4 5-5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-semibold text-lg text-slate-800 dark:text-slate-100">Dashboard Analytics</h3>
                                <p class="mt-1 text-sm text-slate-600 dark:text-slate-300">Monitor utilisasi fasilitas dengan dashboard yang komprehensif dan laporan yang detail.</p>
                            </div>
                        </div>
                    </article>

                    <!-- Card 6 -->
                    <article class="group bg-white dark:bg-slate-800 p-6 rounded-2xl shadow-soft-lg transform transition hover:-translate-y-2 focus-within:ring-2 focus-within:ring-um-gold/30" data-animate>
                        <div class="flex items-center gap-4">
                            <div class="h-14 w-14 rounded-lg flex items-center justify-center bg-gradient-to-br from-um-blue to-um-green text-white">
                                <!-- shield -->
                                <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                    <path d="M12 2l7 4v6c0 5-3.6 9-7 10-3.4-1-7-5-7-10V6l7-4z" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-semibold text-lg text-slate-800 dark:text-slate-100">Keamanan Data</h3>
                                <p class="mt-1 text-sm text-slate-600 dark:text-slate-300">Sistem keamanan berlapis dengan enkripsi data dan kontrol akses berbasis role untuk melindungi informasi.</p>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </section>

        <!-- STATISTICS -->
        <section class="py-12 bg-gradient-to-r from-um-blue to-um-green text-white">
            <div class="max-w-6xl mx-auto px-6">
                <div class="grid grid-cols-2 sm:grid-cols-4 gap-6 text-center">
                    <div>
                        <div class="text-3xl font-extrabold" data-target="50" data-suffix="+">0</div>
                        <div class="mt-1 text-sm opacity-90">Ruangan Tersedia</div>
                    </div>

                    <div>
                        <div class="text-3xl font-extrabold" data-target="200" data-suffix="+">0</div>
                        <div class="mt-1 text-sm opacity-90">Alat & Equipment</div>
                    </div>

                    <div>
                        <div class="text-3xl font-extrabold" data-target="1000" data-suffix="+">0</div>
                        <div class="mt-1 text-sm opacity-90">Pengguna Aktif</div>
                    </div>

                    <div>
                        <div class="text-3xl font-extrabold" data-target="99" data-suffix="%">0</div>
                        <div class="mt-1 text-sm opacity-90">Tingkat Kepuasan</div>
                    </div>
                </div>
            </div>
        </section>

        <!-- HOW IT WORKS -->
        <section id="how-it-works" class="py-16">
            <div class="max-w-6xl mx-auto px-6 text-center">
                <h2 class="text-2xl md:text-3xl font-bold text-um-blue dark:text-um-gold">Cara Kerja Sistem</h2>
                <p class="mt-2 text-slate-600 dark:text-slate-300">Proses peminjaman yang sederhana dan efisien dalam 4 langkah mudah</p>

                <div class="mt-8 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
                    <div class="p-6 bg-white dark:bg-slate-800 rounded-2xl shadow-soft-lg">
                        <div class="inline-flex items-center justify-center h-12 w-12 rounded-full bg-gradient-to-br from-um-blue to-um-green text-white font-bold">1</div>
                        <h3 class="mt-4 font-semibold">Cek Ketersediaan</h3>
                        <p class="mt-2 text-sm text-slate-600 dark:text-slate-300">Login ke sistem dan cek ketersediaan ruangan atau alat yang ingin dipinjam secara real-time.</p>
                    </div>

                    <div class="p-6 bg-white dark:bg-slate-800 rounded-2xl shadow-soft-lg">
                        <div class="inline-flex items-center justify-center h-12 w-12 rounded-full bg-gradient-to-br from-um-blue to-um-green text-white font-bold">2</div>
                        <h3 class="mt-4 font-semibold">Ajukan Peminjaman</h3>
                        <p class="mt-2 text-sm text-slate-600 dark:text-slate-300">Isi form pengajuan lengkap dengan dokumen persyaratan dan kirim untuk diproses.</p>
                    </div>

                    <div class="p-6 bg-white dark:bg-slate-800 rounded-2xl shadow-soft-lg">
                        <div class="inline-flex items-center justify-center h-12 w-12 rounded-full bg-gradient-to-br from-um-blue to-um-green text-white font-bold">3</div>
                        <h3 class="mt-4 font-semibold">Proses Persetujuan</h3>
                        <p class="mt-2 text-sm text-slate-600 dark:text-slate-300">Sistem akan memproses persetujuan otomatis melalui Admin RT, Bagian Umum, dan Pimpinan.</p>
                    </div>

                    <div class="p-6 bg-white dark:bg-slate-800 rounded-2xl shadow-soft-lg">
                        <div class="inline-flex items-center justify-center h-12 w-12 rounded-full bg-gradient-to-br from-um-blue to-um-green text-white font-bold">4</div>
                        <h3 class="mt-4 font-semibold">Peminjaman Aktif</h3>
                        <p class="mt-2 text-sm text-slate-600 dark:text-slate-300">Setelah disetujui, fasilitas siap digunakan. Jangan lupa mengembalikan tepat waktu!</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- FOOTER -->
        <footer id="contact" class="bg-slate-800 text-slate-200 py-10">
            <div class="max-w-6xl mx-auto px-6 grid md:grid-cols-4 gap-8">
                <div>
                    <h4 class="font-semibold text-white">SIP-Fasilitas UMB</h4>
                    <p class="mt-2 text-sm">Sistem Peminjaman Fasilitas Universitas Muhammadiyah Banjarmasin. Memudahkan civitas akademika dalam mengelola peminjaman ruangan dan alat kampus.</p>
                </div>

                <div>
                    <h4 class="font-semibold text-white">Kontak Kami</h4>
                    <p class="mt-2 text-sm"><span class="mr-2">📍</span>Jl. S.Parman No.18, Antasan Kecil Timur, Banjarmasin</p>
                    <p class="mt-1 text-sm">📞 (0511) 3252584</p>
                    <p class="mt-1 text-sm">✉️ info@umbjm.ac.id</p>
                </div>

                <div>
                    <h4 class="font-semibold text-white">Menu Cepat</h4>
                    <nav class="mt-2 text-sm space-y-1">
                        <a class="block hover:text-um-gold" href="#home">Beranda</a>
                        <a class="block hover:text-um-gold" href="#features">Fitur</a>
                        <a class="block hover:text-um-gold" href="#how-it-works">Cara Kerja</a>
                        <a class="block hover:text-um-gold" href="/login">Login Sistem</a>
                    </nav>
                </div>

                <div>
                    <h4 class="font-semibold text-white">Ikuti Kami</h4>
                    <div class="mt-3 flex items-center gap-3">
                        <a href="#" aria-label="Facebook" class="p-2 rounded bg-slate-700 hover:bg-um-blue transition">
                            <img src="/image/facebook.svg" alt="Facebook" class="h-5 w-5" />
                        </a>
                        <a href="#" aria-label="Twitter" class="p-2 rounded bg-slate-700 hover:bg-um-blue transition">
                            <img src="/image/twitter.svg" alt="Twitter" class="h-5 w-5" />
                        </a>
                        <a href="#" aria-label="Instagram" class="p-2 rounded bg-slate-700 hover:bg-um-blue transition">
                            <img src="/image/instagram.svg" alt="Instagram" class="h-5 w-5" />
                        </a>
                        <a href="#" aria-label="YouTube" class="p-2 rounded bg-slate-700 hover:bg-um-blue transition">
                            <img src="/image/youtube.svg" alt="Youtube" class="h-6 w-6" />
                        </a>
                    </div>
                </div>
            </div>

            <div class="mt-8 border-t border-slate-700 pt-6 text-center text-sm text-slate-400">
                &copy; 2024 SIP-Fasilitas UMB. Universitas Muhammadiyah Banjarmasin. All rights reserved.
            </div>
        </footer>
    </main>

    <!-- SCRIPT: interactivity (kehilangan sedikit JS, mudah dibaca & maintainable) -->
    <script>
        // --- Page Loader ---
        window.addEventListener('load', () => {
            const loader = document.getElementById('page-loader');
            if (!loader) return;
            loader.style.opacity = '0';
            setTimeout(() => loader.remove(), 400);
        });

        // --- Mobile menu toggle ---
        const mobileBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        const hamburger = document.getElementById('hamburger');
        const closeIcon = document.getElementById('close-icon');

        if (mobileBtn && mobileMenu) {
            mobileBtn.addEventListener('click', () => {
                const open = mobileMenu.hasAttribute('hidden') ? false : true;
                if (open) {
                    mobileMenu.setAttribute('hidden', '');
                    mobileBtn.setAttribute('aria-expanded', 'false');
                    hamburger.classList.remove('hidden');
                    closeIcon.classList.add('hidden');
                } else {
                    mobileMenu.removeAttribute('hidden');
                    mobileBtn.setAttribute('aria-expanded', 'true');
                    hamburger.classList.add('hidden');
                    closeIcon.classList.remove('hidden');
                }
            });
        }

        // --- Respect system dark preference & store user choice ---
        const HTML = document.documentElement;
        const stored = localStorage.getItem('site-theme'); // 'dark' | 'light' | null
        function applyTheme(theme) {
            if (theme === 'dark') HTML.classList.add('dark');
            else HTML.classList.remove('dark');
        }
        // initial: stored -> system -> light
        if (stored) applyTheme(stored);
        else applyTheme(window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light');

        // toggle via clicking the dark mode area (nav area could be extended to include explicit toggle)
        // (If you want a visible toggle button, add it in navbar and wire here.)
        // Example: clicking logo toggles theme for demo (you can replace with a dedicated button)
        // document.querySelector('.logo')?.addEventListener('click', () => {
        //   const isDark = HTML.classList.toggle('dark');
        //   localStorage.setItem('site-theme', isDark ? 'dark' : 'light');
        // });

        // --- Reveal on scroll (IntersectionObserver) ---
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('translate-y-0', 'opacity-100');
                    observer.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.12
        });

        // mark elements needing reveal
        document.querySelectorAll('[data-animate]').forEach(el => {
            el.classList.add('opacity-0', 'translate-y-6', 'transition', 'duration-700', 'ease-out');
            observer.observe(el);
        });

        // --- Animated counters ---
        const counters = document.querySelectorAll('[data-target]');
        if ('IntersectionObserver' in window && counters.length) {
            const counterObs = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const el = entry.target;
                        const target = parseInt(el.getAttribute('data-target'), 10) || 0;
                        const suffix = el.getAttribute('data-suffix') || '';
                        let current = 0;
                        const duration = 1200;
                        const stepTime = Math.max(12, Math.floor(duration / Math.max(1, target)));
                        const step = () => {
                            current += Math.ceil(target / (duration / stepTime));
                            if (current >= target) {
                                el.textContent = target + suffix;
                            } else {
                                el.textContent = current + suffix;
                                requestAnimationFrame(step);
                            }
                        };
                        step();
                        counterObs.unobserve(el);
                    }
                });
            }, {
                threshold: 0.6
            });
            counters.forEach(c => counterObs.observe(c));
        }

        // --- Simple parallax for hero background (lightweight) ---
        const heroBg = document.getElementById('hero-bg');
        if (heroBg) {
            window.addEventListener('scroll', () => {
                const scrolled = window.scrollY;
                // only small translate for performance & subtlety
                heroBg.style.transform = `translateY(${scrolled * 0.12}px)`;
            }, {
                passive: true
            });
        }

        // --- Accessibility: smooth focus outlines for keyboard users ---
        document.body.addEventListener('keyup', (e) => {
            if (e.key === 'Tab') document.documentElement.classList.add('user-is-tabbing');
        });

        // ---- End of scripts ----
    </script>
</body>

</html>