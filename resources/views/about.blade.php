<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Kami - GOCLEAN</title>
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
            transition: .3s;
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
            transition: .3s;
            text-decoration: none;
            display: inline-block;
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

        .hero {
            background: linear-gradient(135deg, #005c02 0%, #00f7ff 100%);
            color: white;
            padding: 8rem 0 4rem;
            text-align: center;
        }

        .hero h1 {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }

        .content {
            padding: 4rem 0;
            background: #f8fafc;
        }

        .about-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin-bottom: 3rem;
        }

        .about-card {
            background: white;
            padding: 2rem;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, .06);
            text-align: center;
        }

        .about-icon {
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

        .about-card h3 {
            font-size: 1.5rem;
            margin-bottom: 1rem;
            color: #1f2937;
        }

        .about-card p {
            color: #6b7280;
        }

        .team {
            background: white;
            padding: 4rem 0;
        }

        .team h2 {
            text-align: center;
            font-size: 2.5rem;
            margin-bottom: 3rem;
            color: #1f2937;
        }

        .team-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
        }

        .team-member {
            text-align: center;
            padding: 2rem;
        }

        .team-avatar {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background: linear-gradient(135deg, #667eea, #764ba2);
            margin: 0 auto 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3rem;
            color: white;
        }

        .team-member h4 {
            font-size: 1.2rem;
            margin-bottom: 0.5rem;
            color: #1f2937;
        }

        .team-member p {
            color: #6b7280;
            font-size: 0.9rem;
        }
    </style>
</head>

<body>

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
                    <a href="/login" class="btn btn-outline">Masuk</a>
                </div>
            </nav>
        </div>
    </header>

    <section class="hero">
        <div class="container">
            <h1>Tentang GOCLEAN</h1>
            <p>Layanan pembersihan profesional terpercaya sejak 2026</p>
        </div>
    </section>

    <section class="content">
        <div class="container">
            <div class="about-grid">
                <div class="about-card">
                    <div class="about-icon">
                        <i class="fas fa-history"></i>
                    </div>
                    <h3>Pengalaman</h3>
                    <p>Lebih dari 4 tahun melayani ribuan pelanggan dengan kepuasan 99%</p>
                </div>
                <div class="about-card">
                    <div class="about-icon">
                        <i class="fas fa-award"></i>
                    </div>
                    <h3>Kualitas</h3>
                    <p>Standar internasional dengan sertifikasi ISO 9001:2016</p>
                </div>
                <div class="about-card">
                    <div class="about-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3>Tim Profesional</h3>
                    <p>50+ staff terlatih dan berpengalaman di bidang cleaning service</p>
                </div>
            </div>

            <div style="background:white;padding:3rem;border-radius:16px;box-shadow:0 4px 20px rgba(0,0,0,.06);">
                <h2 style="text-align:center;font-size:2rem;margin-bottom:2rem;color:#1f2937;">Visi & Misi</h2>
                <div style="display:grid;grid-template-columns:1fr 1fr;gap:3rem;">
                    <div>
                        <h3 style="color:#00c853;margin-bottom:1rem;">Visi</h3>
                        <p>Menjadi perusahaan layanan pembersihan terdepan di Indonesia yang memberikan solusi
                            kebersihan terbaik untuk rumah dan bisnis.</p>
                    </div>
                    <div>
                        <h3 style="color:#00c853;margin-bottom:1rem;">Misi</h3>
                        <p>Memberikan layanan pembersihan berkualitas tinggi dengan teknologi modern, harga terjangkau,
                            dan kepuasan pelanggan sebagai prioritas utama.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="team">
        <div class="container">
            <h2>Tim Kami</h2>
            <div class="team-grid">
                <div class="team-member">
                    <div class="team-avatar">
                        <i class="fas fa-user-tie"></i>
                    </div>
                    <h4>Daffa Paundra Gandi</h4>
                    <p>CEO & Founder</p>
                </div>
                <div class="team-member">
                    <div class="team-avatar">
                        <i class="fas fa-user-cog"></i>
                    </div>
                    <h4>Sari Dewi</h4>
                    <p>Operations Manager</p>
                </div>
                <div class="team-member">
                    <div class="team-avatar">
                        <i class="fas fa-user-friends"></i>
                    </div>
                    <h4>Budi Santoso</h4>
                    <p>Customer Service</p>
                </div>
                <div class="team-member">
                    <div class="team-avatar">
                        <i class="fas fa-user-check"></i>
                    </div>
                    <h4>Maya Putri</h4>
                    <p>Quality Control</p>
                </div>
            </div>
        </div>
    </section>

</body>

</html>