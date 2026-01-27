<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | GO CLEAN</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        body{margin:0;font-family:'Inter',sans-serif;background:#f8fbff;display:flex;height:100vh;}
        .left{flex:1.2;background:linear-gradient(135deg,#005c02 0%,#00f7ff 100%);color:white;display:flex;justify-content:center;align-items:center;flex-direction:column;padding:40px;}
        .right{flex:1;display:flex;justify-content:center;align-items:center;}
        .card{width:80%;max-width:380px;background:white;border-radius:14px;padding:28px 30px;box-shadow:0 10px 35px rgba(0,0,0,.08);}
        input,select{width:100%;padding:12px;border:1px solid #d7dce3;border-radius:8px;margin-top:10px;font-size:14px;}
        button{width:100%;background:linear-gradient(135deg,#a200ff,#048eb8);border:none;padding:12px;color:white;border-radius:8px;font-weight:600;font-size:15px;margin-top:20px;cursor:pointer;}
        a{color:#006eff;text-decoration:none;font-size:14px;}
        .alert{background:#d1fae5;color:#059669;padding:15px;border-radius:10px;margin-bottom:20px;border:1px solid #a7f3d0;}
    </style>
</head>
<body>

<div class="left">
    <h1 style="font-size:48px;margin:0 0 20px 0;">GO CLEAN</h1>
    <p style="font-size:18px;opacity:0.9;">Bergabunglah dengan layanan pembersihan terpercaya</p>
</div>

<div class="right">
    <form class="card" method="POST" action="{{ route('register') }}">
        @csrf
        <h2 style="margin:0 0 15px 0;">Daftar Akun</h2>

        <input type="text" name="name" placeholder="Nama Lengkap" required>
        <input type="email" name="email" placeholder="Email" required>
        
        <select name="role" required style="width:100%;padding:12px;border:1px solid #d7dce3;border-radius:8px;margin-top:10px;font-size:14px;">
            <option value="">Pilih Role</option>
            <option value="customer">Customer</option>
            <option value="staff">Staff</option>
            <option value="admin">Admin</option>
        </select>
        
        <input type="password" name="password" placeholder="Password" required>
        <input type="password" name="password_confirmation" placeholder="Konfirmasi Password" required>

        <button type="submit">Daftar</button>

        <p style="margin-top:15px;font-size:14px;">Sudah punya akun?
            <a href="{{ route('login') }}">Login sekarang</a>
        </p>
    </form>
</div>

</body>
</html>