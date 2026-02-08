# ✅ CHECKLIST TESTING GOCLEAN

## 🔐 AUTHENTICATION

### Login
- [ ] Login sebagai Admin (admin@goclean.com / goclean)
- [ ] Login sebagai Staff (staff@test.com / password)
- [ ] Login sebagai Customer (customer@test.com / password)
- [ ] Login dengan role yang salah (harus error)
- [ ] Login dengan password salah (harus error)

### Register
- [ ] Register sebagai Customer (harus berhasil)
- [ ] Register sebagai Staff (harus berhasil)
- [ ] Register sebagai Admin (harus ditolak)
- [ ] Register dengan email duplikat (harus error)
- [ ] Register dengan password < 8 karakter (harus error)

---

## 👤 CUSTOMER FEATURES

### Dashboard
- [ ] Lihat statistik pesanan
- [ ] Lihat pesanan aktif
- [ ] Lihat layanan tersedia
- [ ] Navigasi sidebar berfungsi

### Buat Pesanan
- [ ] Akses halaman `/order/create`
- [ ] Pilih layanan pembersihan
- [ ] Pilih tanggal (harus > hari ini)
- [ ] Input alamat lengkap
- [ ] Submit form berhasil

### Pembayaran
- [ ] Redirect ke halaman payment
- [ ] Lihat detail pesanan
- [ ] Pilih metode QRIS
- [ ] Pilih metode Cash
- [ ] Konfirmasi pembayaran berhasil

### Histori Pesanan
- [ ] Akses halaman `/order/history`
- [ ] Lihat semua pesanan
- [ ] Filter berdasarkan status
- [ ] Lihat detail pesanan

### Profil & Bantuan
- [ ] Akses halaman profil
- [ ] Akses halaman bantuan

---

## 👷 STAFF FEATURES

### Dashboard
- [ ] Lihat statistik (pending, proses, selesai)
- [ ] Lihat total pendapatan
- [ ] Lihat pesanan terbaru
- [ ] Notifikasi pesanan baru muncul

### Kelola Pesanan
- [ ] Akses halaman `/staff/orders/test`
- [ ] Lihat semua pesanan
- [ ] Filter status pending
- [ ] Filter status proses
- [ ] Filter status selesai

### Aksi Pesanan
- [ ] Terima pesanan (pending → proses)
- [ ] Tolak pesanan (pending → batal)
- [ ] Selesaikan pekerjaan (proses → selesai)
- [ ] Statistik update otomatis

### Notifikasi Real-time
- [ ] Customer buat pesanan baru
- [ ] Notifikasi muncul di staff dashboard
- [ ] Counter pending update
- [ ] Auto-refresh setelah 5 detik

---

## 👨‍💼 ADMIN FEATURES

### Dashboard
- [ ] Lihat total users
- [ ] Lihat total orders
- [ ] Lihat total services
- [ ] Lihat total revenue

### Kelola Layanan (CRUD)
- [ ] **CREATE**: Tambah layanan baru
  - [ ] Input nama layanan
  - [ ] Input deskripsi
  - [ ] Input harga
  - [ ] Input durasi
  - [ ] Submit berhasil
  
- [ ] **READ**: Lihat daftar layanan
  - [ ] Lihat semua layanan
  - [ ] Lihat detail layanan
  
- [ ] **UPDATE**: Edit layanan
  - [ ] Akses form edit
  - [ ] Update data
  - [ ] Submit berhasil
  
- [ ] **DELETE**: Hapus layanan
  - [ ] Konfirmasi hapus
  - [ ] Layanan terhapus

### Kelola Users
- [ ] Akses halaman `/admin/users/test`
- [ ] Lihat semua users
- [ ] Filter berdasarkan role
- [ ] Lihat detail user

### Kelola Pesanan
- [ ] Akses halaman `/admin/orders/test`
- [ ] Lihat semua pesanan
- [ ] Filter berdasarkan status
- [ ] Lihat detail pesanan

### Pengaturan
- [ ] Akses halaman `/admin/settings/test`
- [ ] Update site name
- [ ] Update contact info
- [ ] Submit berhasil

---

## 🔄 INTEGRATION TESTING

### Customer → Staff Flow
1. [ ] Customer login
2. [ ] Customer buat pesanan
3. [ ] Staff login
4. [ ] Staff lihat notifikasi
5. [ ] Staff terima pesanan
6. [ ] Staff selesaikan pekerjaan
7. [ ] Customer cek histori (status selesai)

### Admin Management
1. [ ] Admin login
2. [ ] Admin tambah layanan baru
3. [ ] Customer lihat layanan baru
4. [ ] Customer pesan layanan baru
5. [ ] Admin lihat pesanan di dashboard

---

## 🌐 NAVIGATION TESTING

### Public Pages
- [ ] Landing page `/`
- [ ] About page `/about`
- [ ] Contact page `/contact`
- [ ] Login page `/login`
- [ ] Register page `/register`

### Protected Routes
- [ ] Customer tidak bisa akses `/staff/test`
- [ ] Customer tidak bisa akses `/admin/test`
- [ ] Staff tidak bisa akses `/admin/test`
- [ ] Staff tidak bisa akses `/customer/test`
- [ ] Admin tidak bisa akses `/customer/test`
- [ ] Admin tidak bisa akses `/staff/test`

---

## 📱 RESPONSIVE TESTING

- [ ] Desktop (1920x1080)
- [ ] Laptop (1366x768)
- [ ] Tablet (768x1024)
- [ ] Mobile (375x667)

---

## 🐛 ERROR HANDLING

- [ ] Form validation berfungsi
- [ ] Error message muncul
- [ ] Success message muncul
- [ ] 404 page untuk route tidak ada
- [ ] Redirect ke login jika belum login

---

## ⚡ PERFORMANCE

- [ ] Page load < 3 detik
- [ ] No console errors
- [ ] No PHP errors
- [ ] Database queries optimal

---

## 🎯 FINAL CHECK

- [ ] Semua fitur customer berfungsi
- [ ] Semua fitur staff berfungsi
- [ ] Semua fitur admin berfungsi
- [ ] Login/logout berfungsi
- [ ] Register berfungsi (kecuali admin)
- [ ] Notifikasi real-time berfungsi
- [ ] CRUD layanan berfungsi
- [ ] Status pesanan update dengan benar

---

**Status: [ ] PASSED / [ ] FAILED**

**Catatan:**
_Tulis catatan jika ada bug atau error_
