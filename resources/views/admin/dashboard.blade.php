<!DOCTYPE html>
<html>
<head>
<title>Dashboard Admin | GO CLEAN</title>
<style>
body{font-family:'Inter',sans-serif;background:#eef5ff;padding:25px;}
.grid{display:grid;grid-template-columns:repeat(4,1fr);gap:20px;}
.card{background:white;padding:18px;border-radius:12px;box-shadow:0 4px 12px rgba(0,0,0,.05);}
.label{font-size:14px;color:#666;}
.value{font-size:32px;font-weight:700;margin-top:5px;}
</style>
</head>
<body>

<h2>Dashboard Admin — GO CLEAN</h2>

<div class="grid">
    <div class="card">
        <div class="label">Total Pesanan</div>
        <div class="value">{{ $totalPesanan }}</div>
    </div>

    <div class="card">
        <div class="label">Jumlah Customer</div>
        <div class="value">{{ $totalCustomer }}</div>
    </div>

    <div class="card">
        <div class="label">Jumlah Staff</div>
        <div class="value">{{ $totalStaff }}</div>
    </div>

    <div class="card">
        <div class="label">Pesanan Pending</div>
        <div class="value">{{ $pesananPending }}</div>
    </div>
</div>

<br><br>

<a href="{{ route('layanan.index') }}">Kelola Layanan</a> |
<a href="{{ route('staff.index') }}">Kelola Staff</a> |
<a href="{{ route('admin.laporan') }}">Laporan</a>

</body>
</html>
