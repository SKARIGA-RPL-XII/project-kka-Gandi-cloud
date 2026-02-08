# PANDUAN LENGKAP SETUP GOCLEAN

## 🚀 LANGKAH SETUP AWAL

### 1. Install Dependencies
```bash
composer install
npm install
```

### 2. Setup Environment
```bash
copy .env.example .env
php artisan key:generate
```

### 3. Konfigurasi Database
Edit file `.env`:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=goclean
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Buat Database
Buka phpMyAdmin atau MySQL:
```sql
CREATE DATABASE goclean;
```

### 5. Jalankan Migration & Seeder
```bash
php artisan migrate:fresh --seed
```

### 6. Jalankan Server
```bash
php artisan serve
```

Buka browser: `http://localhost:8000`

---

## 👥 AKUN LOGIN

### Admin (Fixed - Tidak bisa register)
- Email: `admin@goclean.com`
- Password: `goclean`
- Dashboard: `/admin/test`

### Staff (Demo)
- Email: `staff@test.com`
- Password: `password`
- Dashboard: `/staff/test`

### Customer (Demo)
- Email: `customer@test.com`
- Password: `password`
- Dashboard: `/customer/test`

---

## 📋 FITUR YANG BERFUNGSI

### ✅ CUSTOMER
1. **Login** - Login dengan role customer
2. **Dashboard** - Lihat statistik pesanan
3. **Buat Pesanan** - Pesan layanan pembersihan
4. **Pilih Pembayaran** - QRIS atau Cash
5. **Histori Pesanan** - Lihat semua pesanan
6. **Profil** - Kelola profil
7. **Bantuan** - Halaman bantuan

### ✅ STAFF
1. **Login** - Login dengan role staff
2. **Dashboard** - Lihat pesanan masuk
3. **Notifikasi Real-time** - Pesanan baru muncul otomatis
4. **Terima Pesanan** - Tombol terima pesanan pending
5. **Tolak Pesanan** - Tombol tolak pesanan
6. **Selesaikan Pekerjaan** - Tombol selesai untuk pesanan proses
7. **Kelola Pesanan** - Filter berdasarkan status
8. **Statistik** - Pending, proses, selesai, pendapatan

### ✅ ADMIN
1. **Login** - Login dengan akun admin tetap
2. **Dashboard** - Statistik lengkap sistem
3. **Kelola Layanan** - CRUD layanan (Create, Read, Update, Delete)
4. **Kelola Users** - Lihat semua user
5. **Kelola Pesanan** - Lihat semua pesanan
6. **Pengaturan** - Setting website

---

## 🔄 ALUR SISTEM

### Alur Pesanan:
1. **Customer** membuat pesanan → Status: `pending`
2. **Staff** menerima notifikasi pesanan baru
3. **Staff** klik "Terima" → Status: `proses`
4. **Staff** klik "Selesai" → Status: `selesai`

Atau:
3. **Staff** klik "Tolak" → Status: `batal`

---

## 🛠️ TROUBLESHOOTING

### Error: "No application encryption key"
```bash
php artisan key:generate
```

### Error: Database connection
- Pastikan MySQL/XAMPP running
- Cek konfigurasi `.env`
- Pastikan database `goclean` sudah dibuat

### Error: Migration failed
```bash
php artisan migrate:fresh --seed
```

### Halaman blank/error
```bash
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
```

---

## 📁 STRUKTUR URL

### Public
- `/` - Landing page
- `/login` - Halaman login
- `/register` - Halaman register (hanya customer & staff)
- `/about` - Tentang kami
- `/contact` - Kontak

### Customer
- `/customer/test` - Dashboard
- `/order/create` - Buat pesanan
- `/order/payment` - Pembayaran
- `/order/history` - Histori
- `/profile` - Profil
- `/help` - Bantuan

### Staff
- `/staff/test` - Dashboard
- `/staff/orders/test` - Kelola pesanan
- `/staff/orders/test?status=pending` - Filter pending
- `/staff/orders/test?status=proses` - Filter proses
- `/staff/orders/test?status=selesai` - Filter selesai

### Admin
- `/admin/test` - Dashboard
- `/admin/services/test` - Kelola layanan
- `/admin/services/create/test` - Tambah layanan
- `/admin/services/{id}/edit/test` - Edit layanan
- `/admin/users/test` - Kelola users
- `/admin/orders/test` - Kelola pesanan
- `/admin/settings/test` - Pengaturan

---

## ⚠️ CATATAN PENTING

1. **Admin tidak bisa register** - Hanya 1 akun admin tetap
2. **Customer & Staff bisa register** - Melalui halaman `/register`
3. **Pesanan real-time** - Menggunakan localStorage untuk simulasi
4. **Data demo** - Sistem menggunakan data simulasi untuk testing
5. **Role validation** - Setiap role hanya bisa akses dashboard masing-masing

---

## 🎯 TESTING FLOW

### Test Customer:
1. Login sebagai customer
2. Buat pesanan baru
3. Pilih layanan & tanggal
4. Pilih metode pembayaran
5. Cek histori pesanan

### Test Staff:
1. Login sebagai staff
2. Lihat notifikasi pesanan baru
3. Terima pesanan
4. Selesaikan pekerjaan
5. Cek statistik

### Test Admin:
1. Login sebagai admin
2. Tambah layanan baru
3. Edit layanan
4. Lihat users
5. Lihat pesanan
6. Update settings

---

## 📞 SUPPORT

Jika ada masalah:
1. Cek error log di `storage/logs/laravel.log`
2. Pastikan semua dependencies terinstall
3. Pastikan database sudah di-migrate
4. Clear cache jika ada perubahan

**Sistem siap digunakan! 🎉**
