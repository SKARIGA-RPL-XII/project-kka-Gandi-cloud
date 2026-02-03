<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GOCLEAN - Layanan Pembersihan Profesional</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            line-height: 1.6;
            color: #333;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Header */
        .header {
            background: linear-gradient(135deg, #1f2937 0%, #1a232f 100%);
            color: white;
            padding: 1rem 0;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .logo-img {
            width: 70px;
            height: 70px;
            object-fit: contain;
        }

        .nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 1.8rem;
            font-weight: 700;
        }

        .nav-links {
            display: flex;
            list-style: none;
            gap: 2rem;
        }

        .nav-links a {
            color: white;
            text-decoration: none;
            font-weight: 500;
            transition: 0.3s;
        }

        .nav-links a:hover {
            color: #00ff9d;
        }

        .btn {
            padding: 0.7rem 1.5rem;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.3s;
            text-decoration: none;
            display: inline-block;
        }

        .btn-primary {
            background: #00ff9d;
            color: #005c02;
        }

        .btn-primary:hover {
            background: #00e68a;
            transform: translateY(-2px);
        }

        .btn-outline {
            border: 2px solid white;
            color: white;
            background: transparent;
        }

        .btn-outline:hover {
            background: white;
            color: #005c02;
        }

        /* Hero */
        .hero {
            background: linear-gradient(135deg, #005c02 0%, #00f7ff 100%);
            color: white;
            padding: 8rem 0 4rem;
            text-align: center;
        }

        .hero h1 {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }

        .hero p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
            opacity: 0.9;
        }

        .hero-buttons {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
        }

        /* Features */
        .features {
            padding: 4rem 0;
            background: #f8fafc;
        }

        .features h2 {
            text-align: center;
            font-size: 2.5rem;
            margin-bottom: 3rem;
            color: #1f2937;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }

        .feature-card {
            background: white;
            padding: 2rem;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.06);
            text-align: center;
            transition: 0.3s;
        }

        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .feature-icon {
            width: 80px;
            height: 80px;
            margin: 0 auto 1rem;
            background: linear-gradient(135deg, #00ff9d, #00c853);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            color: white;
        }

        .feature-card h3 {
            font-size: 1.5rem;
            margin-bottom: 1rem;
            color: #1f2937;
        }

        .feature-card p {
            color: #6b7280;
        }

        /* Services */
        .services {
            padding: 4rem 0;
        }

        .services h2 {
            text-align: center;
            font-size: 2.5rem;
            margin-bottom: 3rem;
            color: #1f2937;
        }

        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 2rem;
        }

        .service-card {
            background: white;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.06);
            transition: 0.3s;
        }

        .service-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .service-header {
            background: linear-gradient(135deg, #005c02, #00f7ff);
            color: white;
            padding: 2rem;
            text-align: center;
        }

        .service-header h3 {
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
        }

        .service-price {
            font-size: 2rem;
            font-weight: 700;
        }

        .service-body {
            padding: 2rem;
        }

        .service-features {
            list-style: none;
            margin-bottom: 2rem;
        }

        .service-features li {
            padding: 0.5rem 0;
            display: flex;
            align-items: center;
        }

        .service-features li i {
            color: #00c853;
            margin-right: 0.5rem;
        }

        /* CTA */
        .cta {
            background: linear-gradient(135deg, #005c02 0%, #00f7ff 100%);
            color: white;
            padding: 4rem 0;
            text-align: center;
        }

        .cta h2 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }

        .cta p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
            opacity: 0.9;
        }

        /* Footer */
        .footer {
            background: #1f2937;
            color: white;
            padding: 3rem 0 1rem;
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-bottom: 2rem;
        }

        .footer-section h3 {
            margin-bottom: 1rem;
            color: #00ff9d;
        }

        .footer-section p,
        .footer-section a {
            color: #d1d5db;
            text-decoration: none;
        }

        .footer-section a:hover {
            color: #00ff9d;
        }

        .footer-bottom {
            border-top: 1px solid #374151;
            padding-top: 1rem;
            text-align: center;
            color: #9ca3af;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .hero h1 {
                font-size: 2.5rem;
            }

            .nav-links {
                display: none;
            }

            .hero-buttons {
                flex-direction: column;
                align-items: center;
            }
        }
    </style>
</head>

<body>

    <!-- Header -->
    <header class="header">
        <div class="container">
            <nav class="nav">
                <div class="logo">
                    <i class="fas fa-sparkles"></i> GOCLEAN
                </div>


                <ul class="nav-links">
                    <li><a href="/">Beranda</a></li>
                    <li><a href="/#services">Layanan</a></li>
                    <li><a href="/about">Tentang</a></li>
                    <li><a href="/contact">Kontak</a></li>
                </ul>
                <div>
                    <a href="/register" class="btn btn-primary" style="margin-right:10px;">Daftar</a>
                    <a href="/login" class="btn btn-outline">Masuk</a>
                </div>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero" id="home">
        <div class="container">
            <h1>Layanan Pembersihan Profesional</h1>
            <p>Solusi terpercaya untuk kebersihan rumah dan kantor Anda dengan standar kualitas tinggi</p>
            <div class="hero-buttons">
                <a href="/login" class="btn btn-primary">Pesan Sekarang</a>
                <a href="#services" class="btn btn-outline">Lihat Layanan</a>
            </div>
        </div>
    </section>

    <!-- Features -->
    <section class="features">
        <div class="container">
            <h2>Mengapa Memilih GOCLEAN?</h2>
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h3>Terpercaya</h3>
                    <p>Tim profesional berpengalaman dengan standar keamanan tinggi</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <h3>Tepat Waktu</h3>
                    <p>Layanan sesuai jadwal yang telah disepakati</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-tools"></i>
                    </div>
                    <h3>Peralatan Modern</h3>
                    <p>Menggunakan peralatan dan bahan pembersih berkualitas</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-money-bill-wave"></i>
                    </div>
                    <h3>Harga Terjangkau</h3>
                    <p>Tarif kompetitif dengan kualitas layanan terbaik</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Services -->
    <section class="services" id="services">
        <div class="container">
            <h2>Layanan Kami</h2>
            <div class="services-grid">
                <div class="service-card">
                    <div class="service-header">
                        <h3>Pembersihan Rumah</h3>
                        <div class="service-price">Rp 150.000</div>
                    </div>
                    <div class="service-body">
                        <ul class="service-features">
                            <li><i class="fas fa-check"></i> Pembersihan seluruh ruangan</li>
                            <li><i class="fas fa-check"></i> Vacuum dan pel lantai</li>
                            <li><i class="fas fa-check"></i> Bersih kamar mandi</li>
                            <li><i class="fas fa-check"></i> Durasi 2-4 jam</li>
                        </ul>
                        <a href="/login" class="btn btn-primary" style="width:100%;text-align:center;">Pesan Layanan</a>
                    </div>
                </div>

                <div class="service-card">
                    <div class="service-header">
                        <h3>Pembersihan Kantor</h3>
                        <div class="service-price">Rp 200.000</div>
                    </div>
                    <div class="service-body">
                        <ul class="service-features">
                            <li><i class="fas fa-check"></i> Bersih area kerja</li>
                            <li><i class="fas fa-check"></i> Sanitasi meja & kursi</li>
                            <li><i class="fas fa-check"></i> Bersih toilet kantor</li>
                            <li><i class="fas fa-check"></i> Durasi 3-5 jam</li>
                        </ul>
                        <a href="/login" class="btn btn-primary" style="width:100%;text-align:center;">Pesan Layanan</a>
                    </div>
                </div>

                <div class="service-card">
                    <div class="service-header">
                        <h3>Deep Cleaning</h3>
                        <div class="service-price">Rp 300.000</div>
                    </div>
                    <div class="service-body">
                        <ul class="service-features">
                            <li><i class="fas fa-check"></i> Pembersihan mendalam</li>
                            <li><i class="fas fa-check"></i> Area sulit dijangkau</li>
                            <li><i class="fas fa-check"></i> Disinfeksi menyeluruh</li>
                            <li><i class="fas fa-check"></i> Durasi 4-6 jam</li>
                        </ul>
                        <a href="/login" class="btn btn-primary" style="width:100%;text-align:center;">Pesan Layanan</a>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- CTA -->
    <section class="cta">
        <div class="container">
            <h2>Siap Untuk Rumah Bersih?</h2>
            <p>Hubungi kami sekarang dan rasakan perbedaannya</p>
            <a href="/login" class="btn btn-primary">Mulai Sekarang</a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h3>GOCLEAN</h3>
                    <p>Layanan pembersihan profesional terpercaya untuk rumah dan kantor Anda.</p>
                </div>
                <div class="footer-section">
                    <h3>Layanan</h3>
                    <p><a href="#services">Pembersihan Rumah</a></p>
                    <p><a href="#services">Pembersihan Kantor</a></p>
                    <p><a href="#services">Deep Cleaning</a></p>
                </div>
                <div class="footer-section">
                    <h3>Kontak</h3>
                    <p><i class="fas fa-phone"></i> 0812-3456-7890</p>
                    <p><i class="fas fa-envelope"></i> info@goclean.id</p>
                    <p><i class="fas fa-map-marker-alt"></i> Malang, Indonesia</p>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2026 GOCLEAN. All rights reserved.</p>
            </div>
        </div>
    </footer>

</body>

</html>