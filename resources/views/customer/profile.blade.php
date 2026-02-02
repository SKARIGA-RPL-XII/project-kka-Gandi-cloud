<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil | GOCLEAN</title>
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
        .card{background:white;border-radius:16px;padding:30px;box-shadow:0 4px 20px rgba(0,0,0,.06);text-align:center;}
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
        <a href="/profile" class="active"><i class="fas fa-user"></i> Profil</a>
        <a href="/help"><i class="fas fa-headset"></i> Bantuan</a>
    </div>
</div>

<div class="container">
    <div class="nav">
        <div class="nav-title">Profil Saya</div>
    </div>

    <div class="wrapper">
        <div class="card">
            <i class="fas fa-user-circle" style="font-size:80px;color:#d1d5db;margin-bottom:20px;"></i>
            <h2 style="margin:0 0 10px 0;color:#1f2937;">Halaman Profil</h2>
            <p style="color:#6b7280;margin:0 0 20px 0;">Fitur profil akan segera tersedia</p>
            <a href="/customer/test" style="display:inline-block;padding:12px 24px;background:linear-gradient(135deg,#00ff9d,#00c853);color:white;text-decoration:none;border-radius:10px;font-weight:600;">
                Kembali ke Dashboard
            </a>
        </div>
    </div>
</div>

</body>
</html>