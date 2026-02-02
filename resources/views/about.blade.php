<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tentang Kami - GOCLEAN</title>

    <!-- Font & Icon -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <style>
        /* Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            color: #333;
        }

        .container {
            max-width: 1200px;
            margin: auto;
            padding: 0 20px;
        }

        /* ================= HEADER ================= */

        .header {
            background: linear-gradient(135deg, #1f2937, #1a232f);
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
            list-style: none;
            display: flex;
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

        /* Button */

        .btn {
            padding: 0.6rem 1.4rem;
            border-radius: 8px;
            font-weight: 600;
            text-decoration: none;
            transition: 0.3s;
            display: inline-block;
        }

        .btn-outline {
            border: 2px solid white;
            color: white;
        }

        .btn-outline:hover {
            background: white;
            color: #005c02;
        }

        /* ================= HERO ================= */

        .hero {
            background: linear-gradient(135deg, #005c02, #00f7ff);
            color: white;
            text-align: center;
            padding: 8rem 0 4rem;
            margin-top: 70px;
        }

        .hero h1 {
            font-size: 3rem;
            margin-bottom: 0.5rem;
        }

        .hero p {
            opacity: 0.9;
        }

        /* ================= ABOUT ================= */

        .about {
            background: #f8fafc;
            padding: 4rem 0;
        }

        .about-box {
            background: white;
            padding: 3rem;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            text-align: center;
            max-width: 800px;
            margin: auto;
        }

        .about-box h2 {
            margin-bottom: 1rem;
            color: #1f2937;
        }

        .about-box p {
            color: #6b7280;
            font-size: 1.1rem;
            line-height: 1.8;
            margin-bottom: 1rem;
        }

        /* ================= FOOTER ================= */

        .footer {
            background: #1f2937;
            color: white;
            padding: 2rem 0;
            text-align: center;
            margin-top: 4rem;
        }

        .footer p {
            color: #9ca3af;
        }

        /* ================= RESPONSIVE ================= */

        @media (max-width: 768px) {

            .nav-links {
                display: none;
            }

            .hero h1 {
                font-size: 2.3rem;
            }

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
    </style>
</head>

<body>

    <!-- ================= HEADER ================= -->

    <header class="header">
        <div class="container">
            <nav class="nav">
                <div class="logo">
                    <img src="image/logo.jpg" alt="GOCLEAN Logo" class="logo-img">
                </div>


                <ul class="nav-links">
                    <li><a href="/">Beranda</a></li>
                    <li><a href="/#services">Layanan</a></li>
                    <li><a href="/about">Tentang</a></li>
                    <li><a href="/contact">Kontak</a></li>
                </ul>

                <a href="login" class="btn btn-outline">Masuk</a>

            </nav>
        </div>
    </header>


    <!-- ================= HERO ================= -->

    <section class="hero">
        <div class="container">
            <h1>Tentang Kami</h1>
            <p>Layanan Pembersihan Profesional</p>
        </div>
    </section>


    <!-- ================= ABOUT ================= -->

    <section class="about">
        <div class="container">

            <div class="about-box">

                <h2>Siapa Kami?</h2>

                <p>
                    GOCLEAN adalah layanan pembersihan profesional yang berdiri sejak 2025
                    dan berkomitmen memberikan layanan terbaik untuk rumah dan kantor Anda.
                </p>

                <p>
                    Kami didukung oleh tim berpengalaman, peralatan modern, serta sistem
                    pelayanan yang cepat, aman, dan terpercaya.
                </p>

            </div>

        </div>
    </section>


    <!-- ================= FOOTER ================= -->

    <footer class="footer">
        <div class="container">
            <p>&copy; 2026 GOCLEAN. All Rights Reserved.</p>
        </div>
    </footer>

</body>

</html>