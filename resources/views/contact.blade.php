<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak - GOCLEAN</title>
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

        .contact-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 3rem;
        }

        .contact-info {
            background: white;
            padding: 2rem;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, .06);
        }

        .contact-form {
            background: white;
            padding: 2rem;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, .06);
        }

        .contact-item {
            display: flex;
            align-items: center;
            margin-bottom: 1.5rem;
            padding: 1rem;
            background: #f8fafc;
            border-radius: 10px;
        }

        .contact-icon {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, #00ff9d, #00c853);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            margin-right: 1rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            font-weight: 600;
            color: #374151;
            margin-bottom: 0.5rem;
        }

        .form-control {
            width: 100%;
            padding: 0.75rem;
            border: 2px solid #e5e7eb;
            border-radius: 8px;
            font-size: 0.9rem;
            transition: .3s;
        }

        .form-control:focus {
            outline: none;
            border-color: #00c853;
            box-shadow: 0 0 0 3px rgba(0, 200, 83, 0.1);
        }

        .btn-primary {
            background: linear-gradient(135deg, #00ff9d, #00c853);
            color: white;
            width: 100%;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0, 255, 157, 0.3);
        }

        .map {
            background: #e5e7eb;
            height: 300px;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #6b7280;
            margin-top: 2rem;
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
            <h1>Hubungi Kami</h1>
            <p>Siap melayani kebutuhan kebersihan Anda 24/7</p>
        </div>
    </section>

    <section class="content">
        <div class="container">
            <div class="contact-grid">
                <div class="contact-info">
                    <h3 style="margin-bottom:2rem;color:#1f2937;">Informasi Kontak</h3>

                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-phone"></i>
                        </div>
                        <div>
                            <h4>Telepon</h4>
                            <p>0812-3456-7890</p>
                            <p>021-1234-5678</p>
                        </div>
                    </div>

                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div>
                            <h4>Email</h4>
                            <p>info@goclean.id</p>
                            <p>support@goclean.id</p>
                        </div>
                    </div>

                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div>
                            <h4>Alamat</h4>
                            <p>Jl. Raya Malang No. 123</p>
                            <p>Malang, Jawa Timur 65141</p>
                        </div>
                    </div>

                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div>
                            <h4>Jam Operasional</h4>
                            <p>Senin - Sabtu: 08:00 - 18:00</p>
                            <p>Minggu: 09:00 - 15:00</p>
                        </div>
                    </div>
                </div>

                <div class="contact-form">
                    <h3 style="margin-bottom:2rem;color:#1f2937;">Kirim Pesan</h3>

                    <form>
                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input type="text" class="form-control" placeholder="Masukkan nama Anda" required>
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" placeholder="Masukkan email Anda" required>
                        </div>

                        <div class="form-group">
                            <label>Nomor Telepon</label>
                            <input type="tel" class="form-control" placeholder="Masukkan nomor telepon">
                        </div>

                        <div class="form-group">
                            <label>Subjek</label>
                            <select class="form-control" required>
                                <option value="">Pilih subjek</option>
                                <option>Informasi Layanan</option>
                                <option>Keluhan</option>
                                <option>Saran</option>
                                <option>Lainnya</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Pesan</label>
                            <textarea class="form-control" rows="5" placeholder="Tulis pesan Anda..."
                                required></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-paper-plane"></i> Kirim Pesan
                        </button>
                    </form>
                </div>
            </div>

            <div class="map">
                <div style="text-align:center;">
                    <i class="fas fa-map text-4xl mb-4"></i>
                    <p>Peta Lokasi Kantor GOCLEAN</p>
                    <p style="font-size:0.8rem;">Jl. Raya Malang No. 123, Malang, Jawa Timur</p>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.querySelector('form').addEventListener('submit', function (e) {
            e.preventDefault();
            alert('Terima kasih! Pesan Anda telah terkirim. Tim kami akan segera menghubungi Anda.');
            this.reset();
        });
    </script>

</body>

</html>