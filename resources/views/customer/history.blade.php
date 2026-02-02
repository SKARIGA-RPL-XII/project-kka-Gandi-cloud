<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Histori Pesanan | GO CLEAN</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body{margin:0;font-family:'Inter',sans-serif;background:#f8fafc;display:flex;}
        .sidebar{width:280px;background:linear-gradient(135deg,#005c02 0%,#00f7ff 100%);height:100vh;position:fixed;}
        .sidebar-header{padding:30px 25px;text-align:center;border-bottom:1px solid rgba(255,255,255,.1);}
        .sidebar h2{color:white;font-size:24px;font-weight:700;margin:0;}
        .sidebar-nav{padding:20px 0;}
        .sidebar a{display:flex;align-items:center;padding:15px 25px;color:rgba(255,255,255,.8);text-decoration:none;transition:.3s;}
        .sidebar a:hover, .sidebar a.active{background:rgba(255,255,255,.1);color:white;}
        .sidebar a i{margin-right:12px;}
        
        .container{flex:1;margin-left:280px;}
        .nav{height:70px;background:white;display:flex;align-items:center;justify-content:space-between;padding:0 30px;}
        .nav-title{font-size:20px;font-weight:600;color:#2d3748;}
        
        .wrapper{padding:30px;}
        .card{background:white;padding:30px;border-radius:16px;box-shadow:0 4px 20px rgba(0,0,0,.06);}
        .order-item{display:flex;align-items:center;gap:15px;padding:20px;border:1px solid #f1f5f9;border-radius:12px;margin-bottom:15px;}
        .order-icon{width:50px;height:50px;border-radius:8px;background:linear-gradient(135deg,#667eea,#764ba2);display:flex;align-items:center;justify-content:center;color:white;font-size:20px;}
        .order-info{flex:1;}
        .order-info h5{font-size:18px;font-weight:600;margin:0 0 5px 0;color:#1f2937;}
        .order-info p{font-size:14px;color:#6b7280;margin:0;}
        .status{padding:6px 12px;border-radius:20px;font-size:12px;font-weight:500;}
        .status.pending{background:#fef3c7;color:#d97706;}
        .status.proses{background:#dbeafe;color:#2563eb;}
        .status.selesai{background:#d1fae5;color:#059669;}
        .status.batal{background:#fee2e2;color:#dc2626;}
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
        <a href="/order/history" class="active"><i class="fas fa-history"></i> Histori Pesanan</a>
        <a href="/profile"><i class="fas fa-user"></i> Profil</a>
        <a href="/help"><i class="fas fa-headset"></i> Bantuan</a>
    </div>
</div>

<div class="container">
    <div class="nav">
        <div class="nav-title">Histori Pesanan</div>
        <a href="/customer/test" style="color:#6b7280;text-decoration:none;">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>

    <div class="wrapper">
        <div class="card">
            <h3 style="margin:0 0 20px 0;font-size:24px;color:#1f2937;">
                <i class="fas fa-clock-rotate-left"></i> Riwayat Pesanan Anda
            </h3>
            
            <div class="order-item">
                <div class="order-icon"><i class="fas fa-home"></i></div>
                <div class="order-info">
                    <h5>Pembersihan Rumah</h5>
                    <p>26 Januari 2024 • Jl. Sudirman No. 123</p>
                </div>
                <span class="status selesai">Selesai</span>
            </div>
            
            <div class="order-item">
                <div class="order-icon"><i class="fas fa-couch"></i></div>
                <div class="order-info">
                    <h5>Deep Cleaning</h5>
                    <p>25 Januari 2024 • Jl. Thamrin No. 456</p>
                </div>
                <span class="status proses">Proses</span>
            </div>
            
            <div class="order-item">
                <div class="order-icon"><i class="fas fa-building"></i></div>
                <div class="order-info">
                    <h5>Pembersihan Kantor</h5>
                    <p>24 Januari 2024 • Jl. Gatot Subroto No. 789</p>
                </div>
                <span class="status pending">Pending</span>
            </div>
        </div>
    </div>
</div>

</body>
</html>