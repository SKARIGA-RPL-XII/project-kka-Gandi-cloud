<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Pesanan | GOCLEAN</title>
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
        .form-container{background:white;border-radius:20px;padding:40px;box-shadow:0 4px 20px rgba(0,0,0,.06);max-width:600px;margin:0 auto;}
        .form-group{margin-bottom:25px;}
        .form-group label{display:block;font-weight:600;color:#374151;margin-bottom:8px;font-size:14px;}
        .form-control{width:100%;padding:12px 16px;border:2px solid #e5e7eb;border-radius:10px;font-size:14px;transition:.3s;box-sizing:border-box;}
        .form-control:focus{outline:none;border-color:#667eea;box-shadow:0 0 0 3px rgba(102,126,234,.1);}
        .service-options{display:grid;grid-template-columns:1fr;gap:15px;}
        .service-option{border:2px solid #e5e7eb;border-radius:12px;padding:20px;cursor:pointer;transition:.3s;position:relative;}
        .service-option:hover{border-color:#667eea;}
        .service-option.selected{border-color:#667eea;background:#f8faff;}
        .service-option input{position:absolute;opacity:0;}
        .service-info h4{font-size:16px;font-weight:600;margin:0 0 5px 0;color:#1f2937;}
        .service-info p{font-size:14px;color:#6b7280;margin:0 0 8px 0;}
        .service-price{font-size:18px;font-weight:700;color:#059669;}
        .btn{padding:14px 28px;border:none;border-radius:12px;background:linear-gradient(135deg,#00ff9d,#00c853);color:white;font-weight:600;cursor:pointer;transition:.3s;font-size:16px;width:100%;}
        .btn:hover{transform:translateY(-2px);box-shadow:0 8px 25px rgba(0,255,157,.3);}
        .btn:disabled{opacity:0.6;cursor:not-allowed;transform:none;}
        .alert{padding:12px 16px;border-radius:8px;margin-bottom:20px;font-size:14px;}
        .alert-danger{background:#fef2f2;color:#dc2626;border:1px solid #fecaca;}
        .back-btn{display:inline-flex;align-items:center;color:#6b7280;text-decoration:none;font-size:14px;margin-bottom:20px;transition:.3s;}
        .back-btn:hover{color:#374151;}
        .back-btn i{margin-right:8px;}
    </style>
</head>
<body>

<div class="sidebar">
    <div class="sidebar-header">
        <h2><i class="fas fa-sparkles"></i> GOCLEAN</h2>
    </div>
    <div class="sidebar-nav">
        <a href="/customer/test"><i class="fas fa-home"></i> Dashboard</a>
        <a href="/order/create" class="active"><i class="fas fa-plus-circle"></i> Buat Pesanan</a>
        <a href="/order/history"><i class="fas fa-history"></i> Histori Pesanan</a>
        <a href="/profile"><i class="fas fa-user"></i> Profil</a>
        <a href="/help"><i class="fas fa-headset"></i> Bantuan</a>
    </div>
</div>

<div class="container">
    <div class="nav">
        <div class="nav-title">Buat Pesanan Baru</div>
    </div>

    <div class="wrapper">
        <div class="form-container">
            <a href="/customer/test" class="back-btn">
                <i class="fas fa-arrow-left"></i> Kembali ke Dashboard
            </a>
            
            <h2 style="font-size:28px;font-weight:700;margin:0 0 10px 0;color:#1f2937;">Buat Pesanan Baru</h2>
            <p style="color:#6b7280;margin:0 0 30px 0;">Isi form di bawah untuk membuat pesanan layanan pembersihan</p>

        @if ($errors->any())
            <div style="background:#fee2e2;color:#dc2626;padding:15px;border-radius:10px;margin-bottom:20px;border:1px solid #fecaca;">
                <ul style="margin:0;padding-left:20px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

            <form action="{{ route('order.store') }}" method="POST" id="orderForm">
                @csrf
                
                <div class="form-group">
                    <label for="layanan">Pilih Layanan</label>
                    <div class="service-options">
                        <div class="service-option" onclick="selectService(this, 'Pembersihan Rumah')">
                            <input type="radio" name="layanan" value="Pembersihan Rumah" required>
                            <div class="service-info">
                                <h4><i class="fas fa-home"></i> Pembersihan Rumah</h4>
                                <p>Layanan pembersihan menyeluruh untuk rumah tinggal</p>
                                <div class="service-price">Rp 150.000</div>
                            </div>
                        </div>
                        
                        <div class="service-option" onclick="selectService(this, 'Pembersihan Kantor')">
                            <input type="radio" name="layanan" value="Pembersihan Kantor" required>
                            <div class="service-info">
                                <h4><i class="fas fa-building"></i> Pembersihan Kantor</h4>
                                <p>Jaga kebersihan lingkungan kerja Anda</p>
                                <div class="service-price">Rp 200.000</div>
                            </div>
                        </div>
                        
                        <div class="service-option" onclick="selectService(this, 'Deep Cleaning')">
                            <input type="radio" name="layanan" value="Deep Cleaning" required>
                            <div class="service-info">
                                <h4><i class="fas fa-magic"></i> Deep Cleaning</h4>
                                <p>Pembersihan mendalam untuk area sulit dijangkau</p>
                                <div class="service-price">Rp 300.000</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="tanggal">Tanggal Layanan</label>
                    <input type="date" name="tanggal" id="tanggal" class="form-control" required min="{{ date('Y-m-d', strtotime('+1 day')) }}">
                </div>

                <div class="form-group">
                    <label for="alamat">Alamat Lengkap</label>
                    <textarea name="alamat" id="alamat" class="form-control" rows="4" placeholder="Masukkan alamat lengkap tempat layanan..." required style="resize:vertical;"></textarea>
                </div>

                <button type="submit" class="btn">
                    <i class="fas fa-arrow-right"></i> Lanjut ke Pembayaran
                </button>
            </form>
        </div>
    </div>
</div>

<script>
function selectService(element, service) {
    // Remove selected class from all options
    document.querySelectorAll('.service-option').forEach(opt => opt.classList.remove('selected'));
    
    // Add selected class to clicked option
    element.classList.add('selected');
    
    // Check the radio button
    element.querySelector('input[type="radio"]').checked = true;
}

// Set minimum date to tomorrow
document.getElementById('tanggal').min = new Date(Date.now() + 86400000).toISOString().split('T')[0];
</script>

</body>
</html>