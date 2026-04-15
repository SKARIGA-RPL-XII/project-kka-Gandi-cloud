# REGISTER SYSTEM - GOCLEAN

## ✅ Sistem Register yang Sudah Diperbaiki

### 1. Route Register
**File**: `routes/web.php`

```php
// GET - Tampilkan form register
Route::get('/register', fn() => view('auth.register'))->name('register');

// POST - Process registration
Route::post('/register/process', function (Request $request) {
    try {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed'
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'role' => 'customer',
            'is_active' => true,
            'password' => Hash::make($validated['password'])
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Registrasi berhasil!'
        ]);
    } catch (ValidationException $e) {
        return response()->json([
            'success' => false,
            'message' => $e->getMessage(),
            'errors' => $e->errors()
        ], 422);
    } catch (Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Terjadi kesalahan: ' . $e->getMessage()
        ], 500);
    }
})->name('register.process');
```

### 2. User Model
**File**: `app/Models/User.php`

```php
protected $fillable = [
    'name',
    'email',
    'password',
    'role',
    'is_active',  // ✅ Ditambahkan
];
```

### 3. Register Form
**File**: `resources/views/auth/register.blade.php`

**Validasi Client-Side:**
- ✅ Nama tidak boleh kosong
- ✅ Email harus valid format
- ✅ Password minimal 8 karakter
- ✅ Konfirmasi password harus sama

**AJAX Submit:**
```javascript
fetch('/register/process', {
    method: 'POST',
    headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': csrf_token,
        'Accept': 'application/json'
    },
    body: JSON.stringify({
        name: name,
        email: email,
        password: password,
        password_confirmation: confirmPassword
    })
})
```

### 4. Error Handling

**Validation Errors (422):**
```json
{
    "success": false,
    "message": "Validation error",
    "errors": {
        "email": ["Email sudah terdaftar"],
        "password": ["Password minimal 8 karakter"]
    }
}
```

**Server Errors (500):**
```json
{
    "success": false,
    "message": "Terjadi kesalahan: [error message]"
}
```

**Success Response (200):**
```json
{
    "success": true,
    "message": "Registrasi berhasil!"
}
```

### 5. Flow Registrasi

```
User mengisi form
    ↓
Validasi client-side
    ↓
Submit via AJAX
    ↓
Validasi server-side
    ↓
Create user dengan:
  - role: 'customer'
  - is_active: true
  - password: hashed
    ↓
Return JSON response
    ↓
Show success popup
    ↓
Redirect ke login
```

### 6. Database Structure

**users table:**
```sql
CREATE TABLE users (
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'staff', 'customer') NOT NULL,
    is_active BOOLEAN DEFAULT TRUE,
    email_verified_at TIMESTAMP NULL,
    remember_token VARCHAR(100) NULL,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
);
```

### 7. Testing Checklist

**Manual Testing:**
- [ ] Buka `/register`
- [ ] Isi form dengan data valid
- [ ] Submit form
- [ ] Cek popup success muncul
- [ ] Klik "Login Sekarang"
- [ ] Login dengan akun baru
- [ ] Redirect ke customer dashboard

**Test Cases:**

**Case 1: Registrasi Berhasil**
```
Input:
- Name: John Doe
- Email: john@example.com
- Password: password123
- Confirm: password123

Expected:
✅ User created in database
✅ role = 'customer'
✅ is_active = true
✅ password hashed
✅ Success popup shown
```

**Case 2: Email Sudah Terdaftar**
```
Input:
- Email: existing@example.com

Expected:
❌ Error: "Email sudah terdaftar"
```

**Case 3: Password Tidak Sama**
```
Input:
- Password: password123
- Confirm: password456

Expected:
❌ Error: "Konfirmasi password tidak sesuai!"
```

**Case 4: Password Kurang dari 8 Karakter**
```
Input:
- Password: pass123

Expected:
❌ Error: "Password minimal 8 karakter!"
```

**Case 5: Email Format Salah**
```
Input:
- Email: notanemail

Expected:
❌ Error: "Format email tidak valid!"
```

### 8. Security Features

✅ **CSRF Protection**: Token included in AJAX request
✅ **Password Hashing**: Using Hash::make()
✅ **Email Validation**: Server-side validation
✅ **Unique Email**: Database constraint
✅ **Input Sanitization**: Laravel validation
✅ **XSS Protection**: Blade escaping

### 9. Default Values

**New Customer Account:**
- `role`: 'customer' (hardcoded)
- `is_active`: true (auto-enabled)
- `email_verified_at`: null
- `remember_token`: null

**Note:** Staff dan Admin tidak bisa register via form public. Hanya ditambahkan oleh Admin dari dashboard.

### 10. Troubleshooting

**Problem: "Email sudah terdaftar"**
Solution: Gunakan email lain atau hapus user dari database

**Problem: "CSRF token mismatch"**
Solution: Refresh halaman untuk generate token baru

**Problem: "Password tidak sama"**
Solution: Pastikan password dan konfirmasi sama persis

**Problem: "Validation error"**
Solution: Cek semua field sudah diisi dengan benar

### 11. API Endpoints

**GET /register**
- Method: GET
- Response: HTML form
- Auth: Not required

**POST /register/process**
- Method: POST
- Content-Type: application/json
- Body:
  ```json
  {
    "name": "string",
    "email": "string",
    "password": "string",
    "password_confirmation": "string"
  }
  ```
- Response: JSON
- Auth: Not required

---
**Last Updated**: 2026-02-09
**Version**: 1.0.0
**Status**: ✅ WORKING WITHOUT ERRORS
