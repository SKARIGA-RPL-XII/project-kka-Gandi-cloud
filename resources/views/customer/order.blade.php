<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Pesanan | GO CLEAN</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: 'Inter', sans-serif;
            background: #f8fafc;
            display: flex;
        }

        .sidebar {
            width: 280px;
            background: linear-gradient(135deg, #005c02 0%, #00f7ff 100%);
            height: 100vh;
            box-shadow: 0 10px 30px rgba(0, 0, 0, .1);
            padding: 0;
            position: fixed;
            overflow-y: auto;
        }

        .sidebar-header {
            padding: 30px 25px;
            text-align: center;
            border-bottom: 1px solid rgba(255, 255, 255, .1);
        }

        .sidebar h2 {
            color: white;
            font-size: 24px;
            font-weight: 700;
            margin: 0;
            text-shadow: 0 2px 4px rgba(0, 0, 0, .3);
        }

        .sidebar-nav {
            padding: 20px 0;
        }

        .sidebar a {
            display: flex;
            align-items: center;
            padding: 15px 25px;
            color: rgba(255, 255, 255, .8);
            text-decoration: none;
            font-size: 15px;
            transition: .3s;
            border-left: 3px solid transparent;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background: rgba(255, 255, 255, .1);
            color: white;
            border-left-color: #fff;
        }

        .sidebar a i {
            width: 20px;
            margin-right: 12px;
            font-size: 16px;
        }

        .container {
            flex: 1;
            margin-left: 280px;
        }

        .nav {
            height: 70px;
            background: white;
            color: #333;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 30px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, .05);
        }

        .nav-title {
            font-size: 20px;
            font-weight: 600;
            color: #2d3748;
        }

        .wrapper {
            padding: 30px;
        }

        .card {
            background: white;
            padding: 30px;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, .06);
            max-width: 600px;
            margin: 0 auto;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #374151;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            font-size: 14px;
        }

        .btn {
            padding: 12px 24px;
            background: linear-gradient(135deg, #00ff9d, #00c853);
            color: white;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0, 200, 83, .3);
        }
    </style>
</head>

<body>

    <div class="sidebar">
        <div class="sidebar-header">
            <h2><i class="fas fa-sparkles"></i> GOCLEAN</h2>
        </div>
        <div class="sidebar-nav">
            <a href="/customer/test"><i class="fas fa-home"></i> Dashboard</a>
            <a href="/order/create" class="active"><i class="fas fa-plus-circle"></i> Buat Pesanan</a>
            <a href="#"><i class="fas fa-history"></i> Histori Pesanan</a>
            <a href="#"><i class="fas fa-user"></i> Profil</a>
        </div>
    </div>

    <div class="container">
        <div class="nav">
            <div class="nav-title">Buat Pesanan Baru</div>
            <a href="/customer/test" style="color:#6b7280;text-decoration:none;">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>

        <div class="wrapper">
            <div class="card">
                <h3 style="margin:0 0 20px 0;font-size:24px;color:#1f2937;">
                    <i class="fas fa-clipboard-list"></i> Form Pesanan
                </h3>

                <form method="POST" action="{{ route('order.store') }}">
                    @csrf

                    <div class="form-group">
                        <label>Jenis Layanan</label>
                        <select name="service_id">
                            <option value="1">Pembersihan Rumah</option>
                            <option value="2">Cuci Sofa</option>
                            <option value="3">Cuci Karpet</option>
                        </select>

                    </div>

                    <div class="form-group">
                        <label>Tanggal Layanan</label>
                        <input type="datetime-local" name="schedule">
                    </div>

                    <div class="form-group">
                        <label>Alamat Lengkap</label>
                        <textarea name="alamat" rows="4" placeholder="Masukkan alamat lengkap..." required></textarea>
                    </div>

                    <button type="submit" class="btn">
                        <i class="fas fa-paper-plane"></i> Buat Pesanan
                    </button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>