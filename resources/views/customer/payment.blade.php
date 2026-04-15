<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Pembayaran | GOCLEAN</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Inter', sans-serif; background: #f8fafc; display: flex; }

        /* Sidebar */
        .sidebar { width: 280px; background: linear-gradient(135deg, #005c02 0%, #00f7ff 100%); min-height: 100vh; position: fixed; top: 0; left: 0; overflow-y: auto; }
        .sidebar-header { padding: 28px 24px; text-align: center; border-bottom: 1px solid rgba(255,255,255,.15); }
        .sidebar-header h2 { color: white; font-size: 22px; font-weight: 700; }
        .sidebar a { display: flex; align-items: center; padding: 14px 24px; color: rgba(255,255,255,.8); text-decoration: none; font-size: 14px; transition: .2s; border-left: 3px solid transparent; }
        .sidebar a:hover, .sidebar a.active { background: rgba(255,255,255,.12); color: white; border-left-color: white; }
        .sidebar a i { width: 20px; margin-right: 12px; }

        /* Main */
        .main { flex: 1; margin-left: 280px; min-height: 100vh; }
        .topbar { background: white; padding: 0 30px; height: 65px; display: flex; align-items: center; justify-content: space-between; box-shadow: 0 1px 8px rgba(0,0,0,.06); position: sticky; top: 0; z-index: 10; }
        .topbar h1 { font-size: 18px; font-weight: 600; color: #1f2937; }
        .content { padding: 30px; max-width: 860px; }

        /* Card */
        .card { background: white; border-radius: 16px; padding: 28px; box-shadow: 0 2px 16px rgba(0,0,0,.06); margin-bottom: 20px; }

        /* Summary */
        .summary-row { display: flex; justify-content: space-between; align-items: center; padding: 11px 0; border-bottom: 1px solid #f1f5f9; font-size: 14px; color: #374151; }
        .summary-row:last-child { border-bottom: none; font-weight: 700; font-size: 16px; color: #059669; padding-top: 14px; }
        .summary-box { background: #f8fafc; border-radius: 12px; padding: 18px 20px; margin-bottom: 28px; }

        /* Payment Options */
        .method-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; margin-bottom: 24px; }
        .method-card { border: 2px solid #e5e7eb; border-radius: 12px; padding: 22px 18px; cursor: pointer; text-align: center; transition: .2s; position: relative; }
        .method-card:hover { border-color: #00c853; transform: translateY(-2px); }
        .method-card.selected { border-color: #00c853; background: #f0fdf4; }
        .method-card input[type="radio"] { position: absolute; opacity: 0; pointer-events: none; }
        .method-icon { width: 56px; height: 56px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 22px; color: white; margin: 0 auto 12px; }
        .icon-transfer { background: linear-gradient(135deg, #3b82f6, #1d4ed8); }
        .icon-cash { background: linear-gradient(135deg, #10b981, #059669); }
        .method-card h4 { font-size: 16px; font-weight: 600; color: #1f2937; margin-bottom: 4px; }
        .method-card p { font-size: 13px; color: #6b7280; }

        /* Bank List */
        .bank-section { display: none; background: #f8fafc; border-radius: 12px; padding: 20px; margin-bottom: 20px; }
        .bank-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 12px; }
        .bank-item { background: white; border-radius: 10px; padding: 16px; border: 1px solid #e5e7eb; display: flex; align-items: center; gap: 14px; }
        .bank-logo { width: 46px; height: 46px; border-radius: 8px; display: flex; align-items: center; justify-content: center; color: white; font-weight: 700; font-size: 11px; flex-shrink: 0; }
        .bank-info p { margin: 0; }
        .bank-name { font-size: 13px; font-weight: 600; color: #1f2937; }
        .bank-number { font-size: 17px; font-weight: 700; color: #111827; letter-spacing: .5px; margin: 2px 0 !important; }
        .bank-owner { font-size: 11px; color: #6b7280; }
        .bank-note { background: #fef9c3; border: 1px solid #fde047; border-radius: 8px; padding: 12px 16px; margin-top: 14px; font-size: 13px; color: #854d0e; line-height: 1.6; }

        /* Button */
        .btn-pay { width: 100%; padding: 15px; border: none; border-radius: 12px; background: linear-gradient(135deg, #00c853, #005c02); color: white; font-size: 16px; font-weight: 600; cursor: pointer; transition: .2s; }
        .btn-pay:hover:not(:disabled) { transform: translateY(-2px); box-shadow: 0 6px 20px rgba(0,200,83,.35); }
        .btn-pay:disabled { opacity: .5; cursor: not-allowed; }

        /* Alert */
        .alert-success { background: #d1fae5; color: #065f46; padding: 12px 16px; border-radius: 10px; margin-bottom: 20px; font-size: 14px; }
        .alert-error { background: #fee2e2; color: #991b1b; padding: 12px 16px; border-radius: 10px; margin-bottom: 20px; font-size: 14px; }

        /* Back link */
        .back-link { display: inline-flex; align-items: center; gap: 8px; color: #6b7280; text-decoration: none; font-size: 14px; margin-bottom: 20px; }
        .back-link:hover { color: #374151; }

        /* Responsive */
        @media (max-width: 768px) {
            body { flex-direction: column; }
            .sidebar { width: 100%; min-height: auto; position: relative; }
            .sidebar a { display: inline-flex; padding: 12px 18px; border-left: none; white-space: nowrap; }
            .sidebar nav { display: flex; overflow-x: auto; }
            .main { margin-left: 0; }
            .content { padding: 16px; }
            .method-grid { grid-template-columns: 1fr; }
            .bank-grid { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>

<div class="sidebar">
    <div class="sidebar-header">
        <h2><i class="fas fa-sparkles"></i> GOCLEAN</h2>
    </div>
    <nav>
        <a href="{{ route('customer.dashboard') }}"><i class="fas fa-home"></i> Dashboard</a>
        <a href="{{ route('order.create') }}" class="active"><i class="fas fa-plus-circle"></i> Buat Pesanan</a>
        <a href="{{ route('order.history') }}"><i class="fas fa-history"></i> Histori</a>
        <a href="{{ route('customer.profile') }}"><i class="fas fa-user"></i> Profil</a>
    </nav>
</div>

<div class="main">
    <div class="topbar">
        <h1><i class="fas fa-credit-card" style="color:#00c853;margin-right:8px;"></i> Pembayaran Pesanan</h1>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" style="background:none;border:none;color:#ef4444;cursor:pointer;font-size:14px;">
                <i class="fas fa-sign-out-alt"></i> Logout
            </button>
        </form>
    </div>

    <div class="content">
        <a href="{{ route('order.create') }}" class="back-link">
            <i class="fas fa-arrow-left"></i> Kembali ke Form Pesanan
        </a>

        @if(session('error'))
            <div class="alert-error"><i class="fas fa-exclamation-circle"></i> {{ session('error') }}</div>
        @endif

        @if($errors->any())
            <div class="alert-error">
                @foreach($errors->all() as $error)
                    <div><i class="fas fa-exclamation-circle"></i> {{ $error }}</div>
                @endforeach
            </div>
        @endif

        <!-- Ringkasan Pesanan -->
        <div class="card">
            <h3 style="font-size:18px;font-weight:700;color:#1f2937;margin-bottom:16px;">
                <i class="fas fa-receipt" style="color:#00c853;margin-right:8px;"></i> Ringkasan Pesanan
            </h3>
            <div class="summary-box">
                <div class="summary-row">
                    <span>Layanan</span>
                    <span style="font-weight:600;">{{ $orderData['layanan'] }}</span>
                </div>
                <div class="summary-row">
                    <span>Tanggal Jadwal</span>
                    <span>{{ date('d M Y', strtotime($orderData['tanggal'])) }}</span>
                </div>
                <div class="summary-row">
                    <span>Alamat</span>
                    <span style="max-width:300px;text-align:right;">{{ $orderData['alamat'] }}</span>
                </div>
                <div class="summary-row">
                    <span>Total Pembayaran</span>
                    <span>Rp {{ number_format($orderData['total'], 0, ',', '.') }}</span>
                </div>
            </div>

            <!-- Form Pembayaran -->
            <form action="{{ route('order.payment.process') }}" method="POST" id="paymentForm">
                @csrf

                <h3 style="font-size:16px;font-weight:700;color:#1f2937;margin-bottom:16px;">
                    <i class="fas fa-wallet" style="color:#00c853;margin-right:8px;"></i> Pilih Metode Pembayaran
                </h3>

                <div class="method-grid">
                    <div class="method-card" onclick="selectMethod(this, 'transfer')">
                        <input type="radio" name="payment_method" value="transfer">
                        <div class="method-icon icon-transfer">
                            <i class="fas fa-university"></i>
                        </div>
                        <h4>Transfer Bank</h4>
                        <p>Transfer ke rekening bank / e-wallet</p>
                    </div>
                    <div class="method-card" onclick="selectMethod(this, 'cash')">
                        <input type="radio" name="payment_method" value="cash">
                        <div class="method-icon icon-cash">
                            <i class="fas fa-money-bill-wave"></i>
                        </div>
                        <h4>Cash</h4>
                        <p>Bayar tunai saat layanan selesai</p>
                    </div>
                </div>

                <!-- Info Transfer Bank -->
                <div class="bank-section" id="bankSection">
                    <p style="font-size:14px;font-weight:600;color:#1f2937;margin-bottom:14px;">
                        <i class="fas fa-info-circle" style="color:#3b82f6;"></i> Pilih salah satu rekening di bawah:
                    </p>
                    <div class="bank-grid">
                        <div class="bank-item">
                            <div class="bank-logo" style="background:#003d99;">BCA</div>
                            <div class="bank-info">
                                <p class="bank-name">Bank BCA</p>
                                <p class="bank-number">3901089660834545</p>
                                <p class="bank-owner">a.n. GOCLEAN Indonesia</p>
                            </div>
                        </div>
                        <div class="bank-item">
                            <div class="bank-logo" style="background:#003d79;">MDR</div>
                            <div class="bank-info">
                                <p class="bank-name">Bank Mandiri</p>
                                <p class="bank-number">9876543210</p>
                                <p class="bank-owner">a.n. GOCLEAN Indonesia</p>
                            </div>
                        </div>
                        <div class="bank-item">
                            <div class="bank-logo" style="background:#ed7d31;">BNI</div>
                            <div class="bank-info">
                                <p class="bank-name">Bank BNI</p>
                                <p class="bank-number">8810089660834545</p>
                                <p class="bank-owner">a.n. GOCLEAN Indonesia</p>
                            </div>
                        </div>
                        <div class="bank-item">
                            <div class="bank-logo" style="background:#0066cc;">BRI</div>
                            <div class="bank-info">
                                <p class="bank-name">Bank BRI</p>
                                <p class="bank-number">88810089660834545</p>
                                <p class="bank-owner">a.n. GOCLEAN Indonesia</p>
                            </div>
                        </div>
                        <div class="bank-item">
                            <div class="bank-logo" style="background:#118EEA;">DANA</div>
                            <div class="bank-info">
                                <p class="bank-name">DANA</p>
                                <p class="bank-number">089660834545</p>
                                <p class="bank-owner">a.n. GOCLEAN Indonesia</p>
                            </div>
                        </div>
                    </div>
                    <div class="bank-note">
                        <i class="fas fa-exclamation-triangle"></i>
                        <strong>Penting:</strong> Transfer tepat <strong>Rp {{ number_format($orderData['total'], 0, ',', '.') }}</strong>.
                        Setelah transfer, klik tombol konfirmasi di bawah. Pesanan akan diproses setelah pembayaran dikonfirmasi.
                    </div>
                </div>

                <button type="submit" class="btn-pay" id="btnPay" disabled>
                    <i class="fas fa-lock"></i> Pilih Metode Pembayaran Dulu
                </button>
            </form>
        </div>
    </div>
</div>

<script>
    function selectMethod(el, method) {
        document.querySelectorAll('.method-card').forEach(c => c.classList.remove('selected'));
        el.classList.add('selected');
        el.querySelector('input[type="radio"]').checked = true;

        const bankSection = document.getElementById('bankSection');
        const btn = document.getElementById('btnPay');

        if (method === 'transfer') {
            bankSection.style.display = 'block';
            btn.innerHTML = '<i class="fas fa-university"></i> Konfirmasi Pembayaran Transfer';
        } else {
            bankSection.style.display = 'none';
            btn.innerHTML = '<i class="fas fa-money-bill-wave"></i> Konfirmasi Pembayaran Cash';
        }
        btn.disabled = false;
    }

    document.getElementById('paymentForm').addEventListener('submit', function(e) {
        const selected = document.querySelector('input[name="payment_method"]:checked');
        if (!selected) {
            e.preventDefault();
            alert('Silakan pilih metode pembayaran terlebih dahulu.');
            return;
        }
        if (selected.value === 'transfer') {
            if (!confirm('Pastikan Anda sudah melakukan transfer sesuai nominal. Lanjutkan konfirmasi?')) {
                e.preventDefault();
            }
        }
    });
</script>

</body>
</html>
