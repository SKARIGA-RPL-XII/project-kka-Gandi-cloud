<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Register - GOCLEAN</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: #f8fbff;
            display: flex;
            min-height: 100vh;
        }

        .left {
            flex: 1.2;
            background: linear-gradient(135deg, #005c02 0%, #00f7ff 100%);
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            padding: 40px;
        }
        
        @media (max-width: 768px) {
            body {
                flex-direction: column;
            }
            
            .left {
                padding: 2rem 1rem;
                min-height: 200px;
            }
            
            .left h1 {
                font-size: 2rem;
            }
            
            .left p {
                font-size: 0.9rem;
            }
            
            .right {
                padding: 1rem;
            }
            
            .card {
                padding: 1.5rem;
            }
        }

        .left h1 {
            font-size: 3rem;
            margin-bottom: 1rem;
            font-weight: 700;
        }

        .left p {
            font-size: 1.1rem;
            opacity: 0.9;
            text-align: center;
            max-width: 400px;
        }

        .right {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 2rem;
        }

        .card {
            width: 100%;
            max-width: 400px;
            background: white;
            border-radius: 16px;
            padding: 2rem;
            box-shadow: 0 10px 35px rgba(0, 0, 0, 0.1);
        }

        .card h2 {
            margin-bottom: 1.5rem;
            color: #1f2937;
            font-size: 1.5rem;
            font-weight: 600;
        }

        .form-group {
            margin-bottom: 1.2rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: #374151;
            font-weight: 500;
            font-size: 0.9rem;
        }

        input, select {
            width: 100%;
            padding: 0.8rem;
            border: 2px solid #e5e7eb;
            border-radius: 10px;
            font-size: 0.9rem;
            transition: all 0.3s ease;
        }

        input:focus, select:focus {
            outline: none;
            border-color: #00c853;
            box-shadow: 0 0 0 3px rgba(0, 200, 83, 0.1);
        }

        button {
            width: 100%;
            background: linear-gradient(135deg, #00c853, #005c02);
            border: none;
            padding: 0.8rem;
            color: white;
            border-radius: 10px;
            font-weight: 600;
            font-size: 1rem;
            margin-top: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        button:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0, 200, 83, 0.3);
        }

        .login-link {
            text-align: center;
            margin-top: 1.5rem;
            font-size: 0.9rem;
        }

        .login-link a {
            color: #00c853;
            text-decoration: none;
            font-weight: 600;
        }

        .login-link a:hover {
            text-decoration: underline;
        }

        .error-message {
            background: #fee2e2;
            color: #dc2626;
            padding: 0.8rem;
            border-radius: 8px;
            margin-bottom: 1rem;
            font-size: 0.9rem;
            display: none;
        }

        .popup {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }

        .popup-content {
            background: white;
            padding: 2rem;
            border-radius: 16px;
            text-align: center;
            max-width: 400px;
            width: 90%;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
        }

        .popup-content h3 {
            color: #059669;
            margin-bottom: 1rem;
            font-size: 1.3rem;
        }

        .popup-content p {
            margin-bottom: 1.5rem;
            color: #6b7280;
        }

        .popup-content button {
            background: #059669;
            margin-top: 0;
        }

        .role-note {
            background: #f0f9ff;
            border: 1px solid #bae6fd;
            padding: 0.8rem;
            border-radius: 8px;
            margin-top: 1rem;
            font-size: 0.85rem;
            color: #0369a1;
        }
    </style>
</head>
<body>

<div class="left">
    <h1><i class="fas fa-sparkles"></i> GOCLEAN</h1>
    <p>Bergabunglah dengan layanan pembersihan terpercaya dan nikmati kemudahan dalam menjaga kebersihan</p>
</div>

<div class="right">
    <form class="card" method="POST" action="/register/process" id="registerForm">
        @csrf
        <h2><i class="fas fa-user-plus"></i> Daftar Akun</h2>

        <div class="error-message" id="errorMessage"></div>

        <div class="form-group">
            <label for="name">Nama Lengkap</label>
            <input type="text" name="name" id="name" placeholder="Masukkan nama lengkap" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" placeholder="Masukkan email" required>
        </div>
        
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" placeholder="Minimal 8 karakter" required>
        </div>

        <div class="form-group">
            <label for="password_confirmation">Konfirmasi Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Ulangi password" required>
        </div>

        <button type="submit">
            <i class="fas fa-user-plus"></i> Daftar Sekarang
        </button>

        <div class="login-link">
            <p>Sudah punya akun? <a href="/login">Login sekarang</a></p>
        </div>

        <div class="role-note">
            <i class="fas fa-info-circle"></i>
            <strong>Catatan:</strong> Pendaftaran ini untuk customer. Staff ditambahkan oleh admin dari dashboard.
        </div>
    </form>
</div>

<div class="popup" id="successPopup">
    <div class="popup-content">
        <h3><i class="fas fa-check-circle"></i> Registrasi Berhasil!</h3>
        <p>Akun Anda telah berhasil dibuat. Silakan login untuk melanjutkan menggunakan layanan GOCLEAN.</p>
        <button onclick="redirectToLogin()">
            <i class="fas fa-sign-in-alt"></i> Login Sekarang
        </button>
    </div>
</div>

<script>
function showError(message) {
    const errorDiv = document.getElementById('errorMessage');
    errorDiv.textContent = message;
    errorDiv.style.display = 'block';
}

function hideError() {
    document.getElementById('errorMessage').style.display = 'none';
}

document.getElementById('registerForm').addEventListener('submit', function(e) {
    e.preventDefault();
    hideError();
    
    const formData = new FormData(this);
    const password = formData.get('password');
    const confirmPassword = formData.get('password_confirmation');
    const name = formData.get('name').trim();
    const email = formData.get('email').trim();
    
    if (!name || !email || !password || !confirmPassword) {
        showError('Semua field harus diisi!');
        return;
    }
    
    if (password.length < 8) {
        showError('Password minimal 8 karakter!');
        return;
    }
    
    if (password !== confirmPassword) {
        showError('Konfirmasi password tidak sesuai!');
        return;
    }
    
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        showError('Format email tidak valid!');
        return;
    }
    
    // Submit to server
    fetch('/register/process', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || ''
        },
        body: JSON.stringify({
            name: name,
            email: email,
            password: password,
            password_confirmation: confirmPassword
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            document.getElementById('successPopup').style.display = 'flex';
        } else {
            showError(data.message || 'Registrasi gagal!');
        }
    })
    .catch(error => {
        showError('Terjadi kesalahan. Silakan coba lagi.');
    });
});

function redirectToLogin() {
    window.location.href = '/login';
}
</script>

</body>
</html>