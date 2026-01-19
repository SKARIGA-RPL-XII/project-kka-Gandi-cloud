<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Form Pesanan | GOCLEAN</title>
<style>
body{font-family:'Inter',sans-serif;background:#f4f9ff;padding:25px;}
.card{background:white;padding:20px;border-radius:12px;box-shadow:0 5px 15px rgba(0,0,0,.05);max-width:500px;margin:auto;}
input,select,textarea{width:100%;padding:10px;margin-bottom:10px;border:1px solid #ccc;border-radius:6px;}
.btn{padding:10px 18px;border:none;background:#1A73E8;color:white;font-weight:600;border-radius:8px;cursor:pointer;}
</style>
</head>
<body>

<div class="card">
    <h3>Form Pemesanan</h3>

    @if(session('success'))
        <p style="color:green;">{{ session('success') }}</p>
    @endif

    <form action="{{ route('order.store') }}" method="POST">
        @csrf

        <label>Layanan</label>
        <select name="layanan" required>
            <option value="">-- Pilih Layanan --</option>
            <option value="Bersih Rumah">Bersih Rumah</option>
            <option value="Cuci Sofa">Cuci Sofa</option>
            <option value="Cuci Karpet">Cuci Karpet</option>
        </select>

        <label>Tanggal Pelayanan</label>
        <input type="date" name="tanggal" required>

        <label>Alamat</label>
        <textarea name="alamat" rows="3" required></textarea>

        <button class="btn">Kirim Pesanan</button>
    </form>
</div>

</body>
</html>
