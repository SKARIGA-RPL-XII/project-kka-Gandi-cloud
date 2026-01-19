<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard Customer | GOCLEAN</title>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
<style>
body{
    margin:0;
    font-family:'Inter',sans-serif;
    background:#f8fafc;
    display:flex;
}

/* SIDEBAR */
.sidebar{
    width:280px;
    background:linear-gradient(135deg,#005c02 0%,#00f7ff 100%);
    height:100vh;
    box-shadow:0 10px 30px rgba(0,0,0,.1);
    padding:0;
    position:fixed;
    overflow-y:auto;
}
.sidebar-header{
    padding:30px 25px;
    text-align:center;
    border-bottom:1px solid rgba(255,255,255,.1);
}
.sidebar h2{
    color:white;
    font-size:24px;
    font-weight:700;
    margin:0;
    text-shadow:0 2px 4px rgba(0,0,0,.3);
}
.sidebar-nav{
    padding:20px 0;
}
.sidebar a{
    display:flex;
    align-items:center;
    padding:15px 25px;
    color:rgba(255,255,255,.8);
    text-decoration:none;
    font-size:15px;
    transition:.3s;
    border-left:3px solid transparent;
}
.sidebar a:hover, .sidebar a.active{
    background:rgba(255,255,255,.1);
    color:white;
    border-left-color:#fff;
}
.sidebar a i{
    width:20px;
    margin-right:12px;
    font-size:16px;
}

.container{
    flex:1;
    margin-left:280px;
}

/* NAV */
.nav{
    height:70px;
    background:white;
    color:#333;
    display:flex;
    align-items:center;
    justify-content:space-between;
    padding:0 30px;
    box-shadow:0 2px 10px rgba(0,0,0,.05);
}
.nav-title{
    font-size:20px;
    font-weight:600;
    color:#2d3748;
}
.user-info{
    display:flex;
    align-items:center;
    gap:15px;
}
.user-avatar{
    width:40px;
    height:40px;
    border-radius:50%;
    background:linear-gradient(135deg,#005c02,#00f7ff);
    display:flex;
    align-items:center;
    justify-content:center;
    color:white;
    font-weight:600;
}

/* CONTENT */
.wrapper{
    padding:30px;
}
.hero-section{
    background:linear-gradient(135deg,#005c02 0%,#00f7ff 100%);
    border-radius:20px;
    padding:40px;
    color:white;
    margin-bottom:30px;
    position:relative;
    overflow:hidden;
}
.hero-section::before{
    content:'';
    position:absolute;
    top:0;
    right:0;
    width:200px;
    height:200px;
    background:url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><circle cx="50" cy="50" r="40" fill="none" stroke="rgba(255,255,255,0.1)" stroke-width="2"/><path d="M30 50h40M50 30v40" stroke="rgba(255,255,255,0.1)" stroke-width="2"/></svg>') no-repeat;
    opacity:0.3;
}
.hero-content h1{
    font-size:32px;
    font-weight:700;
    margin:0 0 10px 0;
}
.hero-content p{
    font-size:16px;
    opacity:0.9;
    margin:0;
}

.stats-grid{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(250px,1fr));
    gap:20px;
    margin-bottom:30px;
}
.stat-card{
    background:white;
    padding:25px;
    border-radius:16px;
    box-shadow:0 4px 20px rgba(0,0,0,.06);
    display:flex;
    align-items:center;
    gap:15px;
}
.stat-icon{
    width:50px;
    height:50px;
    border-radius:12px;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:20px;
    color:white;
}
.stat-icon.blue{background:linear-gradient(135deg,#3b82f6,#1d4ed8);}
.stat-icon.green{background:linear-gradient(135deg,#10b981,#059669);}
.stat-icon.purple{background:linear-gradient(135deg,#8b5cf6,#7c3aed);}
.stat-icon.orange{background:linear-gradient(135deg,#f59e0b,#d97706);}
.stat-info h3{
    font-size:24px;
    font-weight:700;
    margin:0 0 5px 0;
    color:#1f2937;
}
.stat-info p{
    font-size:14px;
    color:#6b7280;
    margin:0;
}

.services-section{
    background:white;
    border-radius:20px;
    padding:30px;
    margin-bottom:30px;
    box-shadow:0 4px 20px rgba(0,0,0,.06);
}
.services-grid{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(300px,1fr));
    gap:25px;
    margin-top:25px;
}
.service-card{
    border:2px solid #f1f5f9;
    border-radius:16px;
    padding:25px;
    text-align:center;
    transition:.3s;
    cursor:pointer;
}
.service-card:hover{
    border-color:#667eea;
    transform:translateY(-5px);
    box-shadow:0 10px 30px rgba(102,126,234,.15);
}
.service-icon{
    width:60px;
    height:60px;
    margin:0 auto 15px;
    background:linear-gradient(135deg,#667eea,#764ba2);
    border-radius:50%;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:24px;
    color:white;
}
.service-card h4{
    font-size:18px;
    font-weight:600;
    margin:0 0 10px 0;
    color:#1f2937;
}
.service-card p{
    font-size:14px;
    color:#6b7280;
    line-height:1.6;
    margin:0;
}

.card{
    background:white;
    padding:25px;
    border-radius:16px;
    box-shadow:0 4px 20px rgba(0,0,0,.06);
    margin-bottom:25px;
}
.card h4{
    font-size:18px;
    font-weight:600;
    margin:0 0 20px 0;
    color:#1f2937;
}
.btn{
    padding:12px 24px;
    border:none;
    border-radius:10px;
    background:linear-gradient(135deg,#667eea,#764ba2);
    color:white;
    font-weight:600;
    cursor:pointer;
    transition:.3s;
    font-size:14px;
}
.btn:hover{
    transform:translateY(-2px);
    box-shadow:0 8px 25px rgba(102,126,234,.3);
}
.btn-outline{
    background:transparent;
    border:2px solid #667eea;
    color:#667eea;
}
.btn-outline:hover{
    background:#667eea;
    color:white;
}
.flex{
    display:flex;
    justify-content:space-between;
    align-items:center;
}
.order-item{
    display:flex;
    align-items:center;
    gap:15px;
    padding:15px;
    border:1px solid #f1f5f9;
    border-radius:12px;
    margin-bottom:10px;
}
.order-icon{
    width:40px;
    height:40px;
    border-radius:8px;
    background:linear-gradient(135deg,#667eea,#764ba2);
    display:flex;
    align-items:center;
    justify-content:center;
    color:white;
    font-size:16px;
}
.order-info h5{
    font-size:16px;
    font-weight:600;
    margin:0 0 5px 0;
    color:#1f2937;
}
.order-info p{
    font-size:13px;
    color:#6b7280;
    margin:0;
}
.status{
    padding:4px 12px;
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

<!-- SIDEBAR -->
<div class="sidebar">
    <div class="sidebar-header">
        <h2><i class="fas fa-sparkles"></i> GOCLEAN</h2>
    </div>
    <div class="sidebar-nav">
        <a href="#" class="active"><i class="fas fa-home"></i> Dashboard</a>
        <a href="{{ route('order.create') }}"><i class="fas fa-plus-circle"></i> Buat Pesanan</a>
        <a href="{{ route('order.history') }}"><i class="fas fa-history"></i> Histori Pesanan</a>
        <a href="#"><i class="fas fa-user"></i> Profil</a>
        <a href="#"><i class="fas fa-headset"></i> Bantuan</a>
    </div>
</div>

<!-- MAIN -->
<div class="container">
    <div class="nav">
        <div class="nav-title">Dashboard Customer</div>
        <div class="user-info">
            <div class="user-avatar">{{ substr(Auth::user()->name, 0, 1) }}</div>
            <div>
                <div style="font-weight:600;font-size:14px;">{{ Auth::user()->name }}</div>
                <div style="font-size:12px;color:#6b7280;">Customer</div>
            </div>
            <form method="POST" action="{{ route('logout') }}" style="margin-left:15px;">
                @csrf
                <button class="btn btn-outline" style="padding:8px 16px;font-size:12px;">Logout</button>
            </form>
        </div>
    </div>

    <div class="wrapper">
        @if(session('success'))
            <div style="background:#d1fae5;color:#059669;padding:15px;border-radius:10px;margin-bottom:20px;border:1px solid #a7f3d0;">
                <i class="fas fa-check-circle"></i> {{ session('success') }}
            </div>
        @endif
        
        <!-- HERO SECTION -->
        <div class="hero-section">
            <div class="hero-content">
                <h1>Selamat Datang di GO CLEAN! 🧽</h1>
                <p>Layanan pembersihan profesional terpercaya untuk rumah dan kantor Anda. Nikmati kebersihan maksimal dengan teknologi modern dan tim ahli berpengalaman.</p>
            </div>
        </div>

        <!-- STATS -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon blue"><i class="fas fa-calendar-check"></i></div>
                <div class="stat-info">
                    <h3>{{ Auth::user()->orders()->count() }}</h3>
                    <p>Total Pesanan</p>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon green"><i class="fas fa-clock"></i></div>
                <div class="stat-info">
                    <h3>{{ Auth::user()->orders()->whereIn('status', ['pending', 'proses'])->count() }}</h3>
                    <p>Pesanan Aktif</p>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon purple"><i class="fas fa-check-circle"></i></div>
                <div class="stat-info">
                    <h3>{{ Auth::user()->orders()->where('status', 'selesai')->count() }}</h3>
                    <p>Selesai</p>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon orange"><i class="fas fa-star"></i></div>
                <div class="stat-info">
                    <h3>4.9</h3>
                    <p>Rating Layanan</p>
                </div>
            </div>
        </div>

        <!-- SERVICES -->
        <div class="services-section">
            <h4 style="font-size:24px;font-weight:700;margin:0 0 10px 0;color:#1f2937;">Layanan Kami</h4>
            <p style="color:#6b7280;margin:0;">Pilih layanan pembersihan yang sesuai dengan kebutuhan Anda</p>
            
            <div class="services-grid">
                <div class="service-card">
                    <div class="service-icon"><i class="fas fa-home"></i></div>
                    <h4>Pembersihan Rumah</h4>
                    <p>Layanan pembersihan menyeluruh untuk rumah tinggal. Termasuk ruang tamu, kamar tidur, dapur, dan kamar mandi dengan peralatan profesional.</p>
                </div>
                <div class="service-card">
                    <div class="service-icon"><i class="fas fa-building"></i></div>
                    <h4>Pembersihan Kantor</h4>
                    <p>Jaga kebersihan lingkungan kerja dengan layanan pembersihan kantor reguler. Menciptakan suasana kerja yang sehat dan produktif.</p>
                </div>
                <div class="service-card">
                    <div class="service-icon"><i class="fas fa-couch"></i></div>
                    <h4>Deep Cleaning</h4>
                    <p>Pembersihan mendalam untuk area yang sulit dijangkau. Cocok untuk pembersihan berkala atau persiapan acara khusus.</p>
                </div>
            </div>
        </div>

        <!-- ACTIVE ORDERS -->
        <div class="card">
            <div class="flex">
                <h4><i class="fas fa-tasks"></i> Pesanan Aktif</h4>
                <button class="btn" onclick="window.location.href='{{ route('order.create') }}'">+ Buat Pesanan Baru</button>
            </div>

            @php
                $active = Auth::user()->orders()->whereIn('status', ['pending', 'proses'])->get();
            @endphp

            @if($active->count() == 0)
                <div style="text-align:center;padding:40px 20px;">
                    <i class="fas fa-clipboard-list" style="font-size:48px;color:#d1d5db;margin-bottom:15px;"></i>
                    <p style="color:#6b7280;font-size:16px;margin:0;">Belum ada pesanan aktif</p>
                    <p style="color:#9ca3af;font-size:14px;margin:5px 0 0 0;">Buat pesanan pertama Anda sekarang!</p>
                </div>
            @else
                @foreach($active as $item)
                    <div class="order-item">
                        <div class="order-icon"><i class="fas fa-broom"></i></div>
                        <div class="order-info" style="flex:1;">
                            <h5>{{ $item->layanan }}</h5>
                            <p><i class="fas fa-calendar"></i> {{ $item->tanggal }} • <i class="fas fa-map-marker-alt"></i> {{ $item->alamat ?? 'Alamat tidak tersedia' }}</p>
                        </div>
                        <span class="status {{ $item->status }}">{{ ucfirst($item->status) }}</span>
                    </div>
                @endforeach
            @endif
        </div>

        <!-- ORDER HISTORY -->
        <div class="card">
            <h4><i class="fas fa-history"></i> Histori Pesanan</h4>

            @php
                $history = Auth::user()->orders()->whereIn('status', ['selesai', 'batal'])->latest()->take(5)->get();
            @endphp

            @if($history->count() == 0)
                <div style="text-align:center;padding:40px 20px;">
                    <i class="fas fa-file-alt" style="font-size:48px;color:#d1d5db;margin-bottom:15px;"></i>
                    <p style="color:#6b7280;font-size:16px;margin:0;">Belum ada histori pesanan</p>
                </div>
            @else
                @foreach($history as $item)
                    <div class="order-item">
                        <div class="order-icon"><i class="fas fa-check"></i></div>
                        <div class="order-info" style="flex:1;">
                            <h5>{{ $item->layanan }}</h5>
                            <p><i class="fas fa-calendar"></i> {{ $item->tanggal }} • <i class="fas fa-map-marker-alt"></i> {{ $item->alamat ?? 'Alamat tidak tersedia' }}</p>
                        </div>
                        <span class="status {{ $item->status }}">{{ ucfirst($item->status) }}</span>
                    </div>
                @endforeach
                <div style="text-align:center;margin-top:20px;">
                    <button class="btn btn-outline">Lihat Semua Histori</button>
                </div>
            @endif
        </div>
    </div>
</div>

</body>
</html>
