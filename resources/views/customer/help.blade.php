<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bantuan | GOCLEAN</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body{margin:0;font-family:'Inter',sans-serif;background:#f8fafc;display:flex;}
        .sidebar{width:280px;background:linear-gradient(135deg,#005c02 0%,#00f7ff 100%);height:100vh;box-shadow:0 10px 30px rgba(0,0,0,.1);padding:0;position:fixed;overflow-y:auto;}
        .sidebar-header{padding:30px 25px;text-align:center;border-bottom:1px solid rgba(255,255,255,.1);}
        .sidebar h2{color:white;font-size:24px;font-weight:700;margin:0;text-shadow:0 2px 4px rgba(0,0,0,.3);}
        .sidebar-nav{padding:20px 0;}
        .sidebar a{display:flex;align-items:center;padding:15px 25px;color:rgba(255,255,255,.8);text-decoration:none;font-size:15px;transition:.3s;border-left:3px solid transparent;}
        .sidebar a:hover, .sidebar a.active{background:rgba(255,255,255,.1);color:white;border-left-color:#fff;}
        .sidebar a i{width:20px;margin-right:12px;font-size:16px;}
        .container{flex:1;margin-left:280px;}
        .nav{height:70px;background:white;color:#333;display:flex;align-items:center;justify-content:space-between;padding:0 30px;box-shadow:0 2px 10px rgba(0,0,0,.05);}
        .nav-title{font-size:20px;font-weight:600;color:#2d3748;}
        .wrapper{padding:30px;}
        .card{background:white;border-radius:16px;padding:30px;box-shadow:0 4px 20px rgba(0,0,0,.06);}
        .faq-item{border-bottom:1px solid #f1f5f9;padding:20px 0;}
        .faq-item:last-child{border-bottom:none;}
        .faq-question{font-weight:600;color:#1f2937;margin-bottom:10px;}
        .faq-answer{color:#6b7280;line-height:1.6;}
    </style>
</head>
<body>

<div class="sidebar">
    <div class="sidebar-header">
        <h2><i class="fas fa-sparkles"></i> GOCLEAN</h2>
    </div>
    <div class="sidebar-nav">
        <a href="/customer/test"><i class="fas fa-home"></i> Dashboard</a>
        <a href="/order/create"><i class="fas fa-plus-circle"></i> Buat Pesanan</a>
        <a href="/order/history"><i class="fas fa-history"></i> Histori Pesanan</a>
        <a href="/profile"><i class="fas fa-user"></i> Profil</a>
        <a href="/help" class="active"><i class="fas fa-headset"></i> Bantuan</a>
    </div>
</div>

<div class="container">
    <div class="nav">
        <div class="nav-title">Pusat Bantuan</div>
    </div>

    <div class="wrapper">
        <div class="card">
            <h2 style="margin:0 0 20px 0;color:#1f2937;">
                <i class="fas fa-question-circle"></i> Frequently Asked Questions
            </h2>
            
            <div class="faq-item">
                <div class="faq-question">Bagaimana cara membuat pesanan?</div>
                <div class="faq-answer">Klik menu "Buat Pesanan", pilih layanan yang diinginkan, tentukan tanggal, dan masukkan alamat lengkap.</div>
            </div>
            
            <div class="faq-item">
                <div class="faq-question">Berapa lama waktu pengerjaan?</div>
                <div class="faq-answer">Waktu pengerjaan bervariasi tergantung jenis layanan. Pembersihan rumah biasanya 2-4 jam, sedangkan deep cleaning bisa 4-6 jam.</div>
            </div>
            
            <div class="faq-item">
                <div class="faq-question">Bagaimana sistem pembayaran?</div>
                <div class="faq-answer">Pembayaran dilakukan setelah layanan selesai. Kami menerima pembayaran tunai atau transfer.</div>
            </div>
            
            <div class="faq-item">
                <div class="faq-question">Apakah bisa reschedule pesanan?</div>
                <div class="faq-answer">Ya, Anda bisa menghubungi customer service kami untuk mengubah jadwal pesanan yang masih berstatus pending.</div>
            </div>
            
            <div style="margin-top:30px;padding:20px;background:#f8fafc;border-radius:12px;text-align:center;">
                <h4 style="margin:0 0 10px 0;color:#1f2937;">Butuh bantuan lebih lanjut?</h4>
                <p style="color:#6b7280;margin:0 0 15px 0;">Hubungi customer service kami</p>
                <div style="display:flex;justify-content:center;gap:15px;">
                    <span style="color:#059669;font-weight:600;"><i class="fas fa-phone"></i> 0812-3456-7890</span>
                    <span style="color:#059669;font-weight:600;"><i class="fas fa-envelope"></i> help@goclean.id</span>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>