<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran | GOCLEAN</title>
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
        .payment-container{max-width:800px;margin:0 auto;}
        .card{background:white;border-radius:16px;padding:30px;box-shadow:0 4px 20px rgba(0,0,0,.06);margin-bottom:20px;}
        .order-summary{background:#f8fafc;border-radius:12px;padding:20px;margin-bottom:30px;}
        .payment-methods{display:grid;grid-template-columns:1fr 1fr;gap:20px;margin-bottom:30px;}
        .payment-option{border:2px solid #e5e7eb;border-radius:12px;padding:25px;cursor:pointer;transition:.3s;text-align:center;position:relative;}
        .payment-option:hover{border-color:#667eea;transform:translateY(-2px);}
        .payment-option.selected{border-color:#667eea;background:#f8faff;}
        .payment-option input{position:absolute;opacity:0;}
        .payment-icon{width:60px;height:60px;margin:0 auto 15px;border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:24px;color:white;}
        .qris-icon{background:linear-gradient(135deg,#667eea,#764ba2);}
        .cash-icon{background:linear-gradient(135deg,#00c853,#4caf50);}
        .payment-option h4{font-size:18px;font-weight:600;margin:0 0 8px 0;color:#1f2937;}
        .payment-option p{font-size:14px;color:#6b7280;margin:0;}
        .qris-section{display:none;text-align:center;padding:20px;background:#f8fafc;border-radius:12px;margin-top:20px;}
        .qris-code{width:200px;height:200px;margin:0 auto 20px;background:#fff;border:2px solid #e5e7eb;border-radius:12px;display:flex;align-items:center;justify-content:center;font-size:48px;color:#d1d5db;}
        .btn{padding:14px 28px;border:none;border-radius:12px;background:linear-gradient(135deg,#00ff9d,#00c853);color:white;font-weight:600;cursor:pointer;transition:.3s;font-size:16px;width:100%;}
        .btn:hover{transform:translateY(-2px);box-shadow:0 8px 25px rgba(0,255,157,.3);}
        .btn:disabled{opacity:0.6;cursor:not-allowed;transform:none;}
        .back-btn{display:inline-flex;align-items:center;color:#6b7280;text-decoration:none;font-size:14px;margin-bottom:20px;transition:.3s;}
        .back-btn:hover{color:#374151;}
        .back-btn i{margin-right:8px;}
        .summary-item{display:flex;justify-content:space-between;align-items:center;padding:10px 0;border-bottom:1px solid #f1f5f9;}
        .summary-item:last-child{border-bottom:none;font-weight:600;font-size:18px;color:#059669;}
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
        <a href="/profile"><i class="fas fa-user"></i> Profil</a>
        <a href="/help"><i class="fas fa-headset"></i> Bantuan</a>
    </div>
</div>

<div class="container">
    <div class="nav">
        <div class="nav-title">Pembayaran</div>
    </div>

    <div class="wrapper">
        <div class="payment-container">
            <a href="/order/create" class="back-btn">
                <i class="fas fa-arrow-left"></i> Kembali ke Form Pesanan
            </a>
            
            <div class="card">
                <h2 style="font-size:28px;font-weight:700;margin:0 0 10px 0;color:#1f2937;">Pembayaran Pesanan</h2>
                <p style="color:#6b7280;margin:0 0 30px 0;">Pilih metode pembayaran yang Anda inginkan</p>

                <!-- Order Summary -->
                <div class="order-summary">
                    <h3 style="font-size:18px;font-weight:600;margin:0 0 15px 0;color:#1f2937;">Ringkasan Pesanan</h3>
                    <div class="summary-item">
                        <span>Layanan:</span>
                        <span>{{ $orderData['layanan'] }}</span>
                    </div>
                    <div class="summary-item">
                        <span>Tanggal:</span>
                        <span>{{ date('d M Y', strtotime($orderData['tanggal'])) }}</span>
                    </div>
                    <div class="summary-item">
                        <span>Alamat:</span>
                        <span>{{ Str::limit($orderData['alamat'], 30) }}</span>
                    </div>
                    <div class="summary-item">
                        <span>Total Pembayaran:</span>
                        <span>Rp {{ number_format($orderData['total'], 0, ',', '.') }}</span>
                    </div>
                </div>

                <form action="/order/payment/process" method="POST" id="paymentForm">
                    @csrf
                    
                    <h3 style="font-size:20px;font-weight:600;margin:0 0 20px 0;color:#1f2937;">Pilih Metode Pembayaran</h3>
                    
                    <div class="payment-methods">
                        <div class="payment-option" onclick="selectPayment(this, 'qris')">
                            <input type="radio" name="payment_method" value="qris" required>
                            <div class="payment-icon qris-icon">
                                <i class="fas fa-qrcode"></i>
                            </div>
                            <h4>QRIS</h4>
                            <p>Bayar dengan scan QR Code</p>
                        </div>
                        
                        <div class="payment-option" onclick="selectPayment(this, 'cash')">
                            <input type="radio" name="payment_method" value="cash" required>
                            <div class="payment-icon cash-icon">
                                <i class="fas fa-money-bill-wave"></i>
                            </div>
                            <h4>Cash</h4>
                            <p>Bayar tunai saat layanan</p>
                        </div>
                    </div>

                    <!-- QRIS Section -->
                    <div id="qrisSection" class="qris-section">
                        <h4 style="margin:0 0 15px 0;color:#1f2937;">Scan QR Code untuk Pembayaran</h4>
                        <div class="qris-code">
                            <i class="fas fa-qrcode"></i>
                        </div>
                        <p style="color:#6b7280;margin:0 0 15px 0;">Scan QR Code di atas dengan aplikasi e-wallet Anda</p>
                        <p style="color:#059669;font-weight:600;margin:0;">Total: Rp {{ number_format($orderData['total'], 0, ',', '.') }}</p>
                    </div>

                    <button type="submit" class="btn" id="paymentBtn" disabled>
                        <i class="fas fa-credit-card"></i> Konfirmasi Pembayaran
                    </button>
                </form>
            </div>

            <!-- Payment Info -->
            <div class="card">
                <h3 style="font-size:18px;font-weight:600;margin:0 0 15px 0;color:#1f2937;">Informasi Pembayaran</h3>
                <div style="display:grid;grid-template-columns:1fr 1fr;gap:20px;">
                    <div>
                        <h4 style="color:#667eea;margin:0 0 10px 0;font-size:16px;"><i class="fas fa-qrcode"></i> QRIS</h4>
                        <ul style="color:#6b7280;font-size:14px;line-height:1.6;margin:0;padding-left:20px;">
                            <li>Pembayaran langsung</li>
                            <li>Aman dan terpercaya</li>
                            <li>Mendukung semua e-wallet</li>
                            <li>Konfirmasi otomatis</li>
                        </ul>
                    </div>
                    <div>
                        <h4 style="color:#00c853;margin:0 0 10px 0;font-size:16px;"><i class="fas fa-money-bill-wave"></i> Cash</h4>
                        <ul style="color:#6b7280;font-size:14px;line-height:1.6;margin:0;padding-left:20px;">
                            <li>Bayar saat layanan selesai</li>
                            <li>Tidak perlu pembayaran di muka</li>
                            <li>Fleksibel dan mudah</li>
                            <li>Terima kembalian pas</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
let selectedMethod = null;

function selectPayment(element, method) {
    // Remove selected class from all options
    document.querySelectorAll('.payment-option').forEach(opt => opt.classList.remove('selected'));
    
    // Add selected class to clicked option
    element.classList.add('selected');
    
    // Check the radio button
    element.querySelector('input[type="radio"]').checked = true;
    
    // Store selected method
    selectedMethod = method;
    
    // Show/hide QRIS section
    const qrisSection = document.getElementById('qrisSection');
    if (method === 'qris') {
        qrisSection.style.display = 'block';
    } else {
        qrisSection.style.display = 'none';
    }
    
    // Enable payment button
    document.getElementById('paymentBtn').disabled = false;
    
    // Update button text
    const btn = document.getElementById('paymentBtn');
    if (method === 'qris') {
        btn.innerHTML = '<i class="fas fa-qrcode"></i> Bayar dengan QRIS';
    } else {
        btn.innerHTML = '<i class="fas fa-money-bill-wave"></i> Konfirmasi Pembayaran Cash';
    }
}

// Form submission
document.getElementById('paymentForm').addEventListener('submit', function(e) {
    if (!selectedMethod) {
        e.preventDefault();
        alert('Silakan pilih metode pembayaran');
        return;
    }
    
    if (selectedMethod === 'qris') {
        // Simulasi proses QRIS
        e.preventDefault();
        
        // Show loading
        const btn = document.getElementById('paymentBtn');
        btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Memproses Pembayaran...';
        btn.disabled = true;
        
        // Simulate payment processing
        setTimeout(() => {
            // Submit form after "payment" processed
            this.submit();
        }, 2000);
    }
});
</script>

</body>
</html>