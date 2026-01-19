<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Histori Pesanan | GOCLEAN</title>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
<style>
body{
    margin:0;
    font-family:'Inter',sans-serif;
    background:#f8fafc;
    padding:30px;
}
.container{
    max-width:1200px;
    margin:0 auto;
}
.header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:30px;
}
.btn{
    padding:12px 24px;
    border:none;
    border-radius:10px;
    background:linear-gradient(135deg,#667eea,#764ba2);
    color:white;
    font-weight:600;
    cursor:pointer;
    text-decoration:none;
    display:inline-block;
}
.card{
    background:white;
    border-radius:16px;
    box-shadow:0 4px 20px rgba(0,0,0,.06);
    overflow:hidden;
}
.order-item{
    display:flex;
    align-items:center;
    gap:20px;
    padding:20px;
    border-bottom:1px solid #f1f5f9;
}
.order-item:last-child{
    border-bottom:none;
}
.order-icon{
    width:50px;
    height:50px;
    border-radius:12px;
    background:linear-gradient(135deg,#667eea,#764ba2);
    display:flex;
    align-items:center;
    justify-content:center;
    color:white;
    font-size:20px;
}
.order-info{
    flex:1;
}
.order-info h4{
    font-size:18px;
    font-weight:600;
    margin:0 0 8px 0;
    color:#1f2937;
}
.order-info p{
    font-size:14px;
    color:#6b7280;
    margin:0;
}
.status{
    padding:6px 16px;
    border-radius:20px;
    font-size:12px;
    font-weight:500;
}
.status.pending{background:#fef3c7;color:#d97706;}
.status.proses{background:#dbeafe;color:#2563eb;}
.status.selesai{background:#d1fae5;color:#059669;}
.status.batal{background:#fee2e2;color:#dc2626;}
</style>
</head>
<body>

<div class="container">
    <div class="header">
        <h1>Histori Pesanan</h1>
        <a href="{{ route('customer.dashboard') }}" class="btn">
            <i class="fas fa-arrow-left"></i> Kembali ke Dashboard
        </a>
    </div>

    <div class="card">
        @if($orders->count() == 0)
            <div style="text-align:center;padding:60px 20px;">
                <i class="fas fa-file-alt" style="font-size:64px;color:#d1d5db;margin-bottom:20px;"></i>
                <h3 style="color:#6b7280;margin:0 0 10px 0;">Belum ada pesanan</h3>
                <p style="color:#9ca3af;margin:0;">Buat pesanan pertama Anda sekarang!</p>
            </div>
        @else
            @foreach($orders as $order)
                <div class="order-item">
                    <div class="order-icon">
                        <i class="fas fa-broom"></i>
                    </div>
                    <div class="order-info">
                        <h4>{{ $order->layanan }}</h4>
                        <p>
                            <i class="fas fa-calendar"></i> {{ $order->tanggal }} • 
                            <i class="fas fa-map-marker-alt"></i> {{ $order->alamat }}
                        </p>
                    </div>
                    <span class="status {{ $order->status }}">{{ ucfirst($order->status) }}</span>
                </div>
            @endforeach
        @endif
    </div>
</div>

</body>
</html>