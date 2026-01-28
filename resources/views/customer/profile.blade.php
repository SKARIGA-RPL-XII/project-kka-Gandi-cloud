<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil | GO CLEAN</title>
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
        .card{background:white;padding:30px;border-radius:16px;box-shadow:0 4px 20px rgba(0,0,0,.06);margin-bottom:20px;}
        .profile-header{text-align:center;padding:20px 0;border-bottom:1px solid #f1f5f9;}
        .avatar{width:80px;height:80px;border-radius:50%;background:linear-gradient(135deg,#005c02,#00f7ff);display:flex;align-items:center;justify-content:center;color:white;font-size:32px;font-weight:700;margin:0 auto 15px;}
        .form-group{margin-bottom:20px;}
        .form-group label{display:block;margin-bottom:8px;font-weight:600;color:#374151;}
        .form-group input{width:100%;padding:12px;border:1px solid #d1d5db;border-radius:8px;font-size:14px;}
        .btn{padding:12px 24px;background:linear-gradient(135deg,#00ff9d,#00c853);color:white;border:none;border-radius:8px;font-weight:600;cursor:pointer;font-size:14px;}
        .btn:hover{transform:translateY(-2px);box-shadow:0 8px 25px rgba(0,200,83,.3);}
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
        <a href="/customer/test" style="color:#6b7280;text-decoration:none;">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>

    <div class="wrapper">
        <div class="card">
            <div class="profile-header">
                <div class="avatar">JD</div>
                <h3 style="margin:0;font-size:24px;color:#1f2937;">John Doe</h3>
                <p style="color:#6b7280;margin:5px 0 0 0;">Customer</p>
            </div>
            
            <form style="margin-top:30px;">
                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" value="John Doe">
                </div>
                
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" value="john@example.com">
                </div>
                
                <div class="form-group">
                    <label>Nomor Telepon</label>
                    <input type="tel" placeholder="Masukkan nomor telepon">
                </div>
                
                <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" placeholder="Masukkan alamat">
                </div>
                
                <button type="submit" class="btn">
                    <i class="fas fa-save"></i> Simpan Perubahan
                </button>
            </form>
        </div>
    </div>
</div>

</body>
</html>