# GOCLEAN - Sistem Manajemen Layanan Pembersihan

## 📋 Deskripsi Proyek
GOCLEAN adalah sistem manajemen layanan pembersihan berbasis web yang memungkinkan customer memesan layanan, staff mengelola pesanan, dan admin mengatur seluruh sistem.

## 🚀 Fitur Utama

### 1. Landing Page
- **URL**: `http://localhost:8000/`
- Halaman utama dengan informasi layanan
- Call-to-action untuk pemesanan
- Informasi kontak dan layanan

### 2. Sistem Login
- **URL**: `http://localhost:8000/login`
- Multi-role login (Customer, Staff, Admin)
- Demo credentials tersedia

### 3. Dashboard Customer
- **URL**: `http://localhost:8000/customer/test`
- **Fitur**:
  - Statistik pesanan pribadi
  - Form pemesanan layanan baru
  - Histori pesanan lengkap
  - Halaman profil dan bantuan

### 4. Dashboard Staff
- **URL**: `http://localhost:8000/staff/test`
- **Fitur**:
  - Statistik pekerjaan harian
  - Kelola pesanan (terima/tolak/selesaikan)
  - Filter pesanan berdasarkan status
  - Daftar pesanan dengan aksi lengkap

### 5. Dashboard Admin
- **URL**: `http://localhost:8000/admin/test`
- **Fitur**:
  - Statistik sistem lengkap
  - **CRUD Layanan** (Tambah/Edit/Hapus)
  - Kelola users dan pesanan
  - Pengaturan website

## 🛠️ Teknologi yang Digunakan
- **Framework**: Laravel 10.x
- **Frontend**: HTML5, CSS3, JavaScript
- **Styling**: Tailwind CSS + Custom CSS
- **Icons**: Font Awesome 6.0
- **Database**: MySQL (dengan simulasi data)

## 📁 Struktur File Penting

```
project-kka-Gandi-cloud/
├── resources/views/
│   ├── welcome.blade.php          # Landing page
│   ├── login.blade.php            # Halaman login
│   ├── customer/
│   │   ├── dashboard.blade.php    # Dashboard customer
│   │   ├── order-create.blade.php # Form pemesanan
│   │   ├── order-history.blade.php# Histori pesanan
│   │   ├── profile.blade.php      # Profil customer
│   │   └── help.blade.php         # Bantuan
│   ├── staff/
│   │   ├── layout.blade.php       # Layout staff
│   │   ├── dashboard.blade.php    # Dashboard staff
│   │   └── orders.blade.php       # Kelola pesanan
│   └── admin/
│       ├── layout.blade.php       # Layout admin
│       ├── dashboard.blade.php    # Dashboard admin
│       ├── services.blade.php     # Daftar layanan
│       ├── service-create.blade.php # Tambah layanan
│       ├── service-edit.blade.php # Edit layanan
│       ├── users.blade.php        # Kelola users
│       ├── orders.blade.php       # Kelola pesanan
│       └── settings.blade.php     # Pengaturan
├── app/Http/Controllers/
│   ├── OrderController.php        # Controller pesanan
│   ├── CustomerController.php     # Controller customer
│   ├── StaffController.php        # Controller staff
│   └── AdminController.php        # Controller admin
└── routes/web.php                 # Routing aplikasi
```

## 🎯 URL Testing

### Halaman Utama
- **Landing Page**: `http://localhost:8000/`
- **Login**: `http://localhost:8000/login`

### Customer
- **Dashboard**: `http://localhost:8000/customer/test`
- **Buat Pesanan**: `http://localhost:8000/order/create`
- **Histori**: `http://localhost:8000/order/history`

### Staff
- **Dashboard**: `http://localhost:8000/staff/test`
- **Kelola Pesanan**: `http://localhost:8000/staff/orders/test`

### Admin
- **Dashboard**: `http://localhost:8000/admin/test`
- **Kelola Layanan**: `http://localhost:8000/admin/services/test`
- **Tambah Layanan**: `http://localhost:8000/admin/services/create/test`
- **Kelola Users**: `http://localhost:8000/admin/users/test`
- **Kelola Pesanan**: `http://localhost:8000/admin/orders/test`
- **Pengaturan**: `http://localhost:8000/admin/settings/test`

## 🔐 Demo Login Credentials
- **Customer**: customer@test.com / password
- **Staff**: staff@test.com / password  
- **Admin**: admin@test.com / password

## ✨ Fitur CRUD Admin Layanan

### 1. Create (Tambah Layanan)
- Form lengkap dengan validasi
- Preview real-time
- Upload dan validasi data

### 2. Read (Lihat Layanan)
- Daftar layanan dengan statistik
- Filter dan pencarian
- Informasi detail lengkap

### 3. Update (Edit Layanan)
- Form edit dengan data existing
- Validasi dan preview
- Update real-time

### 4. Delete (Hapus Layanan)
- Konfirmasi sebelum hapus
- Soft delete untuk keamanan
- Notifikasi sukses

## 🎨 Desain & UI/UX
- **Responsive Design**: Mobile-first approach
- **Color Scheme**: Gradient hijau-biru (#005c02 to #00f7ff)
- **Typography**: Inter font family
- **Icons**: Font Awesome untuk konsistensi
- **Animations**: Smooth transitions dan hover effects

## 📊 Fitur Statistik
- Dashboard dengan real-time stats
- Grafik dan chart untuk visualisasi
- Filter berdasarkan tanggal dan status
- Export data (simulasi)

## 🔧 Cara Menjalankan

1. **Clone Repository**
   ```bash
   git clone [repository-url]
   cd project-kka-Gandi-cloud
   ```

2. **Install Dependencies**
   ```bash
   composer install
   npm install
   ```

3. **Setup Environment**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Database Setup**
   ```bash
   php artisan migrate
   ```

5. **Run Server**
   ```bash
   php artisan serve
   ```

6. **Access Website**
   - Buka browser: `http://localhost:8000`

## 📝 Catatan Penting
- Sistem menggunakan data simulasi untuk demo
- Semua fungsi CRUD berfungsi dengan notifikasi
- Responsive design untuk semua device
- Validasi form lengkap di semua halaman
- Security measures implemented

## 🏆 Keunggulan Sistem
1. **User-Friendly Interface**: Mudah digunakan untuk semua role
2. **Complete CRUD Operations**: Semua operasi database lengkap
3. **Responsive Design**: Optimal di semua perangkat
4. **Real-time Updates**: Notifikasi dan update langsung
5. **Professional Design**: UI/UX modern dan menarik
6. **Secure System**: Validasi dan security measures
7. **Scalable Architecture**: Mudah dikembangkan

## 📞 Support
Untuk pertanyaan atau bantuan, hubungi:
- Email: info@goclean.id
- Phone: 0812-3456-7890

---
**© 2024 GOCLEAN - Layanan Pembersihan Profesional**