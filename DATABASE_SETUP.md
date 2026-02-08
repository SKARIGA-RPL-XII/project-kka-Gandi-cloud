# Setup Database GOCLEAN

## Langkah-langkah Setup Database:

### 1. Buat Database
```sql
CREATE DATABASE goclean;
```

### 2. Konfigurasi .env
Edit file `.env` dan sesuaikan:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=goclean
DB_USERNAME=root
DB_PASSWORD=
```

### 3. Jalankan Migration
```bash
php artisan migrate
```

### 4. Jalankan Seeder (Insert Admin)
```bash
php artisan db:seed --class=AdminSeeder
```

Atau jalankan semua seeder:
```bash
php artisan db:seed
```

### 5. Reset Database (Opsional)
Jika ingin reset ulang database:
```bash
php artisan migrate:fresh --seed
```

## Akun Admin Default

Setelah seeder dijalankan, akun admin akan otomatis dibuat:

- **Email**: admin@goclean.com
- **Password**: goclean
- **Role**: admin

**PENTING**: Hanya ada 1 akun admin yang tidak bisa diduplikasi atau didaftarkan lagi.

## Struktur Database

### Tables:
1. **users** - Data user (admin, customer, staff)
2. **customers** - Detail customer
3. **staff** - Detail staff
4. **services** - Layanan pembersihan
5. **orders** - Pesanan
6. **payments** - Pembayaran

## Catatan:
- Admin tidak bisa register, hanya 1 akun tetap
- Customer dan Staff bisa register
- Semua password di-hash menggunakan bcrypt
