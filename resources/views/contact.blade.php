<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hubungi Kami - GOCLEAN</title>
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
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            padding: 2rem;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .header {
            text-align: center;
            margin-bottom: 3rem;
        }

        .header h1 {
            font-size: 2.5rem;
            color: #005c02;
            margin-bottom: 0.5rem;
        }

        .header p {
            color: #6b7280;
            font-size: 1.1rem;
        }

        .content-wrapper {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 2rem;
            margin-bottom: 2rem;
        }

        .contact-info {
            background: white;
            padding: 2rem;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .contact-info h2 {
            font-size: 1.5rem;
            color: #1f2937;
            margin-bottom: 1.5rem;
        }

        .info-item {
            display: flex;
            align-items: start;
            margin-bottom: 1.5rem;
            padding: 1rem;
            background: #f9fafb;
            border-radius: 12px;
        }

        .info-item i {
            font-size: 1.5rem;
            color: #00c853;
            margin-right: 1rem;
            margin-top: 0.2rem;
        }

        .info-item div h3 {
            font-size: 1rem;
            color: #374151;
            margin-bottom: 0.3rem;
        }

        .info-item div p {
            color: #6b7280;
            font-size: 0.95rem;
        }

        .contact-form {
            background: white;
            padding: 2rem;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .contact-form h2 {
            font-size: 1.5rem;
            color: #1f2937;
            margin-bottom: 1.5rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            font-weight: 600;
            color: #374151;
            margin-bottom: 0.5rem;
            font-size: 0.9rem;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 0.8rem 1rem;
            border: 2px solid #e5e7eb;
            border-radius: 12px;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            font-family: 'Inter', sans-serif;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #00c853;
            box-shadow: 0 0 0 3px rgba(0, 200, 83, 0.1);
        }

        .form-group textarea {
            resize: vertical;
            min-height: 120px;
        }

        .btn-submit {
            width: 100%;
            padding: 1rem;
            border: none;
            border-radius: 12px;
            background: linear-gradient(135deg, #00c853, #005c02);
            color: white;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 1rem;
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0, 200, 83, 0.3);
        }

        .back-link {
            text-align: center;
            margin-top: 2rem;
        }

        .back-link a {
            color: #00c853;
            text-decoration: none;
            font-weight: 600;
            font-size: 1rem;
        }

        .success-message {
            background: #d1fae5;
            color: #059669;
            padding: 1rem;
            border-radius: 12px;
            margin-bottom: 1.5rem;
            display: none;
        }

        @media (max-width: 768px) {
            .content-wrapper {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    
    <div class="container">
        <div class="header">
            <h1><i class="fas fa-sparkles"></i> GOCLEAN</h1>
            <p>Hubungi kami untuk pertanyaan, saran, atau keluhan</p>
        </div>

        <div class="content-wrapper">
            <div class="contact-info">
                <h2><i class="fas fa-info-circle"></i> Informasi Kontak</h2>
                
                <div class="info-item">
                    <i class="fas fa-map-marker-alt"></i>
                    <div>
                        <h3>Alamat</h3>
                        <p>Jl. Kebersihan No. 123<br>Jakarta Selatan, 12345</p>
                    </div>
                </div>

                <div class="info-item">
                    <i class="fas fa-phone"></i>
                    <div>
                        <h3>Telepon</h3>
                        <p>0812-3456-7890<br>021-1234-5678</p>
                    </div>
                </div>

                <div class="info-item">
                    <i class="fas fa-envelope"></i>
                    <div>
                        <h3>Email</h3>
                        <p>info@goclean.id<br>support@goclean.id</p>
                    </div>
                </div>

                <div class="info-item">
                    <i class="fas fa-clock"></i>
                    <div>
                        <h3>Jam Operasional</h3>
                        <p>Senin - Jumat: 08:00 - 17:00<br>Sabtu: 08:00 - 14:00</p>
                    </div>
                </div>
            </div>

            <div class="contact-form">
                <h2><i class="fas fa-paper-plane"></i> Kirim Pesan</h2>

                @if(session('success'))
                    <div class="success-message" style="display:block;">
                        <i class="fas fa-check-circle"></i> {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('contact.store') }}" method="POST">
                    @csrf
                    
                    <div class="form-group">
                        <label for="name">Nama Lengkap <span style="color:red;">*</span></label>
                        <input type="text" id="name" name="name" placeholder="Masukkan nama lengkap Anda" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email <span style="color:red;">*</span></label>
                        <input type="email" id="email" name="email" placeholder="nama@email.com" required>
                    </div>

                    <div class="form-group">
                        <label for="subject">Subjek <span style="color:red;">*</span></label>
                        <input type="text" id="subject" name="subject" placeholder="Topik pesan Anda" required>
                    </div>

                    <div class="form-group">
                        <label for="message">Pesan <span style="color:red;">*</span></label>
                        <textarea id="message" name="message" placeholder="Tulis pesan, saran, atau keluhan Anda di sini..." required></textarea>
                    </div>

                    <button type="submit" class="btn-submit">
                        <i class="fas fa-paper-plane"></i> Kirim Pesan
                    </button>
                </form>
            </div>
        </div>

        <div class="back-link">
            <a href="/"><i class="fas fa-arrow-left"></i> Kembali ke Beranda</a>
        </div>
    </div>
</body>
</html>
