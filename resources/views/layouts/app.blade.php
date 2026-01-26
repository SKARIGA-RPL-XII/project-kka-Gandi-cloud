<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title') | GOCLEAN</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body { display:flex; margin:0; font-family:Inter,sans-serif; background:#0f172a; color:white; }
        .sidebar { width:240px; background:#1e293b; height:100vh; padding:20px; }
        .sidebar a { display:block; color:#cbd5e1; padding:10px 0; text-decoration:none; font-weight:500; }
        .sidebar a:hover { color:white; }
        .content { flex:1; background:#f1f5f9; color:black; padding:25px; }
    </style>
</head>
<body>

<div class="sidebar">
    <h2 style="color:white;margin-bottom:20px;">GOCLEAN</h2>
    <a href="{{ route('customer.dashboard') }}"><i class="fas fa-home"></i> Dashboard</a>
    <a href="{{ route('order.create') }}"><i class="fas fa-plus-circle"></i> Buat Pesanan</a>
    <a href="{{ route('order.history') }}"><i class="fas fa-history"></i> Riwayat Pesanan</a>
    <a href="{{ route('profile.edit') }}"><i class="fas fa-user"></i> Profil</a>
</div>

<div class="content">
    @yield('content')
</div>

</body>
</html>
