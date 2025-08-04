<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIP-Fasilitas UMB | Sistem Peminjaman Fasilitas Universitas Muhammadiyah Banjarmasin</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            overflow-x: hidden;
        }

        /* Navbar */
        .navbar {
            position: fixed;
            top: 0;
            width: 100%;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            padding: 1rem 0;
            z-index: 1000;
            transition: all 0.3s ease;
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.1);
        }

        .nav-container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 2rem;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .logo-icon {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.5rem;
        }

        .logo-text {
            font-size: 1.5rem;
            font-weight: bold;
            color: #2c3e50;
        }

        .nav-links {
            display: flex;
            list-style: none;
            gap: 2rem;
        }

        .nav-links a {
            text-decoration: none;
            color: #2c3e50;
            font-weight: 500;
            transition: color 0.3s ease;
            position: relative;
        }

        .nav-links a:hover {
            color: #667eea;
        }

        .nav-links a::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -5px;
            left: 0;
            background: #667eea;
            transition: width 0.3s ease;
        }

        .nav-links a:hover::after {
            width: 100%;
        }

        .login-btn {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 0.8rem 2rem;
            border: none;
            border-radius: 50px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }

        .login-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(102, 126, 234, 0.3);
        }

        /* Hero Section */
        .hero {
            min-height: 100vh;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><defs><pattern id="grid" width="50" height="50" patternUnits="userSpaceOnUse"><path d="M 50 0 L 0 0 0 50" fill="none" stroke="rgba(255,255,255,0.1)" stroke-width="1"/></pattern></defs><rect width="100%" height="100%" fill="url(%23grid)"/></svg>');
            opacity: 0.3;
        }

        .hero-content {
            text-align: center;
            color: white;
            max-width: 800px;
            padding: 2rem;
            position: relative;
            z-index: 2;
        }

        .hero-title {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            opacity: 0;
            animation: fadeInUp 1s ease 0.3s forwards;
        }

        .hero-subtitle {
            font-size: 1.3rem;
            margin-bottom: 2rem;
            opacity: 0.9;
            opacity: 0;
            animation: fadeInUp 1s ease 0.6s forwards;
        }

        .hero-description {
            font-size: 1.1rem;
            margin-bottom: 3rem;
            opacity: 0.8;
            line-height: 1.8;
            opacity: 0;
            animation: fadeInUp 1s ease 0.9s forwards;
        }

        .cta-buttons {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
            opacity: 0;
            animation: fadeInUp 1s ease 1.2s forwards;
        }

        .cta-primary, .cta-secondary {
            padding: 1rem 2.5rem;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .cta-primary {
            background: white;
            color: #667eea;
        }

        .cta-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(255, 255, 255, 0.3);
        }

        .cta-secondary {
            background: transparent;
            color: white;
            border: 2px solid white;
        }

        .cta-secondary:hover {
            background: white;
            color: #667eea;
            transform: translateY(-3px);
        }

        /* Floating Elements */
        .floating-element {
            position: absolute;
            opacity: 0.1;
            animation: float 6s ease-in-out infinite;
        }

        .floating-element:nth-child(1) {
            top: 20%;
            left: 10%;
            animation-delay: 0s;
        }

        .floating-element:nth-child(2) {
            top: 60%;
            right: 10%;
            animation-delay: 2s;
        }

        .floating-element:nth-child(3) {
            bottom: 20%;
            left: 20%;
            animation-delay: 4s;
        }

        /* Features Section */
        .features {
            padding: 6rem 2rem;
            background: #f8f9fa;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .section-title {
            text-align: center;
            font-size: 2.5rem;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 1rem;
        }

        .section-subtitle {
            text-align: center;
            font-size: 1.1rem;
            color: #6c757d;
            margin-bottom: 4rem;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin-top: 4rem;
        }

        .feature-card {
            background: white;
            padding: 2.5rem;
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .feature-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
        }

        .feature-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 2rem;
            margin: 0 auto 1.5rem;
        }

        .feature-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 1rem;
        }

        .feature-description {
            color: #6c757d;
            line-height: 1.6;
        }

        /* Statistics Section */
        .stats {
            padding: 6rem 2rem;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 2rem;
            text-align: center;
        }

        .stat-item {
            padding: 2rem;
        }

        .stat-number {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            display: block;
        }

        .stat-label {
            font-size: 1.1rem;
            opacity: 0.9;
        }

        /* How It Works Section */
        .how-it-works {
            padding: 6rem 2rem;
            background: white;
        }

        .steps-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 3rem;
            margin-top: 4rem;
        }

        .step {
            text-align: center;
            position: relative;
        }

        .step-number {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.5rem;
            font-weight: 700;
            margin: 0 auto 1.5rem;
        }

        .step-title {
            font-size: 1.3rem;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 1rem;
        }

        .step-description {
            color: #6c757d;
            line-height: 1.6;
        }

        /* Footer */
        .footer {
            background: #2c3e50;
            color: white;
            padding: 4rem 2rem 2rem;
        }

        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 3rem;
        }

        .footer-section h3 {
            font-size: 1.3rem;
            margin-bottom: 1.5rem;
            color: #ecf0f1;
        }

        .footer-section p, .footer-section a {
            color: #bdc3c7;
            text-decoration: none;
            line-height: 1.8;
        }

        .footer-section a:hover {
            color: #667eea;
        }

        .footer-bottom {
            margin-top: 2rem;
            padding-top: 2rem;
            border-top: 1px solid #34495e;
            text-align: center;
            color: #bdc3c7;
        }

        .social-links {
            display: flex;
            gap: 1rem;
            justify-content: center;
            margin-top: 1rem;
        }

        .social-links a {
            width: 40px;
            height: 40px;
            background: #34495e;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            transition: all 0.3s ease;
        }

        .social-links a:hover {
            background: #667eea;
            transform: translateY(-3px);
        }

        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0px);
            }
            50% {
                transform: translateY(-20px);
            }
        }

        /* Responsive */
        @media (max-width: 768px) {
            .nav-links {
                display: none;
            }

            .hero-title {
                font-size: 2.5rem;
            }

            .hero-subtitle {
                font-size: 1.1rem;
            }

            .cta-buttons {
                flex-direction: column;
                align-items: center;
            }

            .features-grid {
                grid-template-columns: 1fr;
            }

            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .steps-container {
                grid-template-columns: 1fr;
            }
        }

        /* Scroll animations */
        .fade-in {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.6s ease;
        }

        .fade-in.visible {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="nav-container">
            <div class="logo">
                <div class="logo-icon">
                    <i class="fas fa-university"></i>
                </div>
                <div class="logo-text">SIP-Fasilitas UMB</div>
            </div>
            <ul class="nav-links">
                <li><a href="#home">Beranda</a></li>
                <li><a href="#features">Fitur</a></li>
                <li><a href="#how-it-works">Cara Kerja</a></li>
                <li><a href="#contact">Kontak</a></li>
            </ul>
            <a href="/login" class="login-btn">
                <i class="fas fa-sign-in-alt"></i>
                Masuk Sistem
            </a>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="hero">
        <div class="floating-element">
            <i class="fas fa-building" style="font-size: 4rem;"></i>
        </div>
        <div class="floating-element">
            <i class="fas fa-tools" style="font-size: 3rem;"></i>
        </div>
        <div class="floating-element">
            <i class="fas fa-clipboard-list" style="font-size: 3.5rem;"></i>
        </div>
        
        <div class="hero-content">
            <h1 class="hero-title">SIP-Fasilitas UMB</h1>
            <p class="hero-subtitle">Sistem Peminjaman Fasilitas Universitas Muhammadiyah Banjarmasin</p>
            <p class="hero-description">
                Solusi digital terdepan untuk mengelola peminjaman ruangan dan alat di kampus. 
                Proses yang lebih efisien, transparan, dan mudah untuk seluruh civitas akademika.
            </p>
            <div class="cta-buttons">
                <a href="/login" class="cta-primary">
                    <i class="fas fa-rocket"></i>
                    Mulai Peminjaman
                </a>
                <a href="#features" class="cta-secondary">
                    <i class="fas fa-info-circle"></i>
                    Pelajari Lebih Lanjut
                </a>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="features">
        <div class="container">
            <h2 class="section-title fade-in">Fitur Unggulan</h2>
            <p class="section-subtitle fade-in">
                Sistem yang dirancang khusus untuk mempermudah proses peminjaman fasilitas kampus
            </p>
            
            <div class="features-grid">
                <div class="feature-card fade-in">
                    <div class="feature-icon">
                        <i class="fas fa-calendar-check"></i>
                    </div>
                    <h3 class="feature-title">Booking Real-time</h3>
                    <p class="feature-description">
                        Cek ketersediaan ruangan dan alat secara real-time. Tidak ada lagi double booking atau konflik jadwal.
                    </p>
                </div>

                <div class="feature-card fade-in">
                    <div class="feature-icon">
                        <!-- SVG icon for workflow -->
                        <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="8" y="8" width="32" height="32" rx="8" fill="url(#workflow-gradient)"/>
                            <path d="M16 24H32M16 24L20 20M16 24L20 28" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <defs>
                                <linearGradient id="workflow-gradient" x1="8" y1="8" x2="40" y2="40" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#667eea"/>
                                    <stop offset="1" stop-color="#764ba2"/>
                                </linearGradient>
                            </defs>
                        </svg>
                    </div>
                    <h3 class="feature-title">Workflow Otomatis</h3>
                    <p class="feature-description">
                        Proses persetujuan otomatis dari Rumah Tangga, Bagian Umum, hingga Pimpinan dengan notifikasi real-time.
                    </p>
                </div>

                <div class="feature-card fade-in">
                    <div class="feature-icon">
                        <i class="fas fa-mobile-alt"></i>
                    </div>
                    <h3 class="feature-title">Mobile Friendly</h3>
                    <p class="feature-description">
                        Akses sistem kapan saja, di mana saja melalui smartphone atau tablet dengan tampilan responsif.
                    </p>
                </div>

                <div class="feature-card fade-in">
                    <div class="feature-icon">
                        <i class="fas fa-bell"></i>
                    </div>
                    <h3 class="feature-title">Notifikasi Pintar</h3>
                    <p class="feature-description">
                        Dapatkan notifikasi otomatis untuk setiap perubahan status, reminder, dan informasi penting lainnya.
                    </p>
                </div>

                <div class="feature-card fade-in">
                    <div class="feature-icon">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <h3 class="feature-title">Dashboard Analytics</h3>
                    <p class="feature-description">
                        Monitor utilisasi fasilitas dengan dashboard yang komprehensif dan laporan yang detail.
                    </p>
                </div>

                <div class="feature-card fade-in">
                    <div class="feature-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h3 class="feature-title">Keamanan Data</h3>
                    <p class="feature-description">
                        Sistem keamanan berlapis dengan enkripsi data dan kontrol akses berbasis role untuk melindungi informasi.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Statistics Section -->
    <section class="stats">
        <div class="container">
            <div class="stats-grid">
                <div class="stat-item fade-in">
                    <span class="stat-number">50+</span>
                    <span class="stat-label">Ruangan Tersedia</span>
                </div>
                <div class="stat-item fade-in">
                    <span class="stat-number">200+</span>
                    <span class="stat-label">Alat & Equipment</span>
                </div>
                <div class="stat-item fade-in">
                    <span class="stat-number">1000+</span>
                    <span class="stat-label">Pengguna Aktif</span>
                </div>
                <div class="stat-item fade-in">
                    <span class="stat-number">99%</span>
                    <span class="stat-label">Tingkat Kepuasan</span>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works Section -->
    <section id="how-it-works" class="how-it-works">
        <div class="container">
            <h2 class="section-title fade-in">Cara Kerja Sistem</h2>
            <p class="section-subtitle fade-in">
                Proses peminjaman yang sederhana dan efisien dalam 4 langkah mudah
            </p>
            
            <div class="steps-container">
                <div class="step fade-in">
                    <div class="step-number">1</div>
                    <h3 class="step-title">Cek Ketersediaan</h3>
                    <p class="step-description">
                        Login ke sistem dan cek ketersediaan ruangan atau alat yang ingin dipinjam secara real-time.
                    </p>
                </div>
                
                <div class="step fade-in">
                    <div class="step-number">2</div>
                    <h3 class="step-title">Ajukan Peminjaman</h3>
                    <p class="step-description">
                        Isi form pengajuan lengkap dengan dokumen persyaratan dan kirim untuk diproses.
                    </p>
                </div>
                
                <div class="step fade-in">
                    <div class="step-number">3</div>
                    <h3 class="step-title">Proses Persetujuan</h3>
                    <p class="step-description">
                        Sistem akan memproses persetujuan otomatis melalui Admin RT, Bagian Umum, dan Pimpinan.
                    </p>
                </div>
                
                <div class="step fade-in">
                    <div class="step-number">4</div>
                    <h3 class="step-title">Peminjaman Aktif</h3>
                    <p class="step-description">
                        Setelah disetujui, fasilitas siap digunakan. Jangan lupa mengembalikan tepat waktu!
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer id="contact" class="footer">
        <div class="footer-content">
            <div class="footer-section">
                <h3>SIP-Fasilitas UMB</h3>
                <p>
                    Sistem Peminjaman Fasilitas Universitas Muhammadiyah Banjarmasin. 
                    Memudahkan civitas akademika dalam mengelola peminjaman ruangan dan alat kampus.
                </p>
            </div>
            
            <div class="footer-section">
                <h3>Kontak Kami</h3>
                <p><i class="fas fa-map-marker-alt"></i> Jl. S.Parman No.18, Antasan Kecil Timur, Banjarmasin</p>
                <p><i class="fas fa-phone"></i> (0511) 3252584</p>
                <p><i class="fas fa-envelope"></i> info@umbjm.ac.id</p>
            </div>
            
            <div class="footer-section">
                <h3>Menu Cepat</h3>
                <p><a href="#home">Beranda</a></p>
                <p><a href="#features">Fitur</a></p>
                <p><a href="#how-it-works">Cara Kerja</a></p>
                <p><a href="/login">Login Sistem</a></p>
            </div>
            
            <div class="footer-section">
                <h3>Ikuti Kami</h3>
                <div class="social-links">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
        </div>
        
        <div class="footer-bottom">
            <p>&copy; 2024 SIP-Fasilitas UMB. Universitas Muhammadiyah Banjarmasin. All rights reserved.</p>
        </div>
    </footer>

    <script>
        // Smooth scrolling
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Scroll animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, observerOptions);

        document.querySelectorAll('.fade-in').forEach(el => {
            observer.observe(el);
        });

        // Navbar scroll effect
        window.addEventListener('scroll', () => {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 100) {
                navbar.style.background = 'rgba(255, 255, 255, 0.98)';
                navbar.style.boxShadow = '0 2px 30px rgba(0, 0, 0, 0.15)';
            } else {
                navbar.style.background = 'rgba(255, 255, 255, 0.95)';
                navbar.style.boxShadow = '0 2px 20px rgba(0, 0, 0, 0.1)';
            }
        });

        // Counter animation
        function animateCounters() {
            const counters = document.querySelectorAll('.stat-number');
            counters.forEach(counter => {
                const target = parseInt(counter.textContent);
                const increment = target / 100;
                let current = 0;
                
                const updateCounter = () => {
                    if (current < target) {
                        current += increment;
                        counter.textContent = Math.ceil(current) + (counter.textContent.includes('%') ? '%' : '+');
                        requestAnimationFrame(updateCounter);
                    } else {
                        counter.textContent = target + (counter.textContent.includes('%') ? '%' : '+');
                    }
                };
                
                updateCounter();
            });
        }

        // Start counter animation when stats section is visible
        const statsSection = document.querySelector('.stats');
        const statsObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateCounters();
                    statsObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.5 });

        statsObserver.observe(statsSection);

        // Mobile menu toggle (if needed)
        const mobileMenuBtn = document.querySelector('.mobile-menu-btn');
        const navLinks = document.querySelector('.nav-links');

        if (mobileMenuBtn) {
            mobileMenuBtn.addEventListener('click', () => {
                navLinks.classList.toggle('active');
            });
        }

        // Parallax effect for floating elements
        window.addEventListener('scroll', () => {
            const scrolled = window.pageYOffset;
            const parallax = document.querySelectorAll('.floating-element');
            const speed = 0.5;

            parallax.forEach(element => {
                const yPos = -(scrolled * speed);
                element.style.transform = `translateY(${yPos}px)`;
            });
        });
    </script>
</body>
</html>