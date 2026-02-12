# ORDER ASSIGNMENT SYSTEM - GOCLEAN

## 📋 Cara Kerja Sistem Pesanan

### 1. Customer Membuat Pesanan
**Flow:**
1. Customer login → pilih layanan → isi form → pilih metode pembayaran
2. Sistem otomatis assign pesanan ke staff yang tersedia
3. Pesanan masuk dengan status `pending`

### 2. Auto-Assign Staff
**Algoritma:**
```php
// Pilih staff dengan pesanan aktif paling sedikit
$staff = User::where('role', 'staff')
    ->where('is_active', true)
    ->withCount(['orders' => function($query) {
        $query->whereIn('status', ['pending', 'confirmed', 'in_progress']);
    }])
    ->orderBy('orders_count', 'asc')
    ->first();
```

**Kriteria:**
- Staff harus role = 'staff'
- Staff harus is_active = true
- Dipilih berdasarkan jumlah pesanan aktif paling sedikit
- Load balancing otomatis

### 3. Pesanan Masuk Ke Dashboard

#### Admin Dashboard
- Melihat SEMUA pesanan dari semua customer
- Query: `Order::with(['customer.user', 'service'])->get()`
- Bisa delete pesanan
- Tidak bisa accept/reject/complete

#### Staff Dashboard
- Melihat pesanan yang di-assign ke mereka
- Query: `Order::where('staff_id', auth()->id())->get()`
- Bisa accept → start → complete
- Bisa reject pesanan
- Bisa delete pesanan yang sudah done/cancelled

### 4. Status Flow Pesanan

```
pending → confirmed → in_progress → done
   ↓
cancelled (bisa dari status manapun)
```

**Actions:**
- `pending`: Staff bisa **Accept** atau **Reject**
- `confirmed`: Staff bisa **Start** pekerjaan
- `in_progress`: Staff bisa **Complete** pekerjaan
- `done`: Staff bisa **Delete** (untuk cleanup)
- `cancelled`: Staff bisa **Delete**

### 5. Database Structure

**orders table:**
```
- id
- customer_id (FK to customers)
- service_id (FK to services)
- staff_id (FK to users) ← AUTO-ASSIGNED
- schedule (date)
- status (pending/confirmed/in_progress/done/cancelled)
- total (decimal)
- payment_method (qris/cash)
- created_at
- updated_at
```

### 6. Model Relations

**User Model:**
```php
// Orders sebagai staff
public function orders() {
    return $this->hasMany(Order::class, 'staff_id');
}
```

**Order Model:**
```php
public function customer() {
    return $this->belongsTo(Customer::class);
}

public function service() {
    return $this->belongsTo(Service::class);
}

public function staff() {
    return $this->belongsTo(User::class, 'staff_id');
}
```

**Customer Model:**
```php
public function orders() {
    return $this->hasMany(Order::class);
}

public function user() {
    return $this->belongsTo(User::class);
}
```

### 7. Testing Scenario

**Scenario 1: Customer Membuat Pesanan**
1. Login sebagai customer
2. Buat pesanan baru
3. Pilih metode pembayaran
4. ✅ Pesanan masuk ke admin/orders
5. ✅ Pesanan masuk ke staff/orders (staff yang di-assign)

**Scenario 2: Staff Memproses Pesanan**
1. Login sebagai staff
2. Lihat pesanan pending
3. Accept pesanan → status jadi `confirmed`
4. Start pekerjaan → status jadi `in_progress`
5. Complete pekerjaan → status jadi `done`

**Scenario 3: Multiple Staff**
1. Buat 2 staff: staff1@test.com, staff2@test.com
2. Customer buat 2 pesanan
3. ✅ Pesanan 1 → staff1 (0 pesanan aktif)
4. ✅ Pesanan 2 → staff2 (0 pesanan aktif)
5. Customer buat pesanan ke-3
6. ✅ Pesanan 3 → staff1 atau staff2 (yang paling sedikit)

### 8. Keuntungan Sistem

✅ **Auto-Assignment**: Tidak perlu manual assign
✅ **Load Balancing**: Distribusi merata ke semua staff
✅ **Scalable**: Bisa tambah staff kapan saja
✅ **Transparent**: Admin bisa lihat semua pesanan
✅ **Efficient**: Staff hanya lihat pesanan mereka

### 9. Future Improvements

- [ ] Manual re-assign pesanan ke staff lain
- [ ] Staff bisa decline dan auto re-assign
- [ ] Notifikasi real-time untuk staff
- [ ] Rating system setelah pesanan selesai
- [ ] Staff availability schedule

---
**Last Updated**: 2026-02-09
**Version**: 1.0.0
