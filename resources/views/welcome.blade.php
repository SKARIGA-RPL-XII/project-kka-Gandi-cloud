<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GO CLEAN - Layanan Pembersihan Profesional</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body{margin:0;font-family:'Inter',sans-serif;background:linear-gradient(135deg,#005c02 0%,#00f7ff 100%);min-height:100vh;display:flex;align-items:center;justify-content:center;}
        .container{text-align:center;color:white;padding:40px;}
        h1{font-size:48px;font-weight:700;margin:0 0 20px 0;text-shadow:0 2px 4px rgba(0,0,0,.3);}
        p{font-size:18px;margin:0 0 40px 0;opacity:0.9;}
        .btn{display:inline-block;padding:15px 30px;background:white;color:#005c02;text-decoration:none;border-radius:10px;font-weight:600;margin:0 10px;transition:.3s;box-shadow:0 4px 15px rgba(0,0,0,.2);}
        .btn:hover{transform:translateY(-2px);box-shadow:0 8px 25px rgba(0,0,0,.3);}
        .btn-outline{background:transparent;color:white;border:2px solid white;}
        .btn-outline:hover{background:white;color:#005c02;}
    </style>
</head>
<body>
    <div class="container">
        <h1><i class="fas fa-sparkles"></i> GO CLEAN</h1>
        <p>Layanan pembersihan profesional terpercaya untuk rumah dan kantor Anda</p>
        
        <a href="{{ route('login') }}" class="btn">
            <i class="fas fa-sign-in-alt"></i> Login
        </a>
        
        <a href="{{ route('register') }}" class="btn btn-outline">
            <i class="fas fa-user-plus"></i> Daftar
        </a>
    </div>
</body>
</html>