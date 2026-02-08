<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - GOCLEAN</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #005c02 0%, #00f7ff 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-container {
            background: white;
            padding: 2.5rem;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
            width: 100%;
            max-width: 420px;
        }

        .logo {
            text-align: center;
            margin-bottom: 2rem;
        }

        .logo h1 {
            font-size: 2.2rem;
            font-weight: 700;
            color: #005c02;
            margin-bottom: 0.5rem;
        }

        .logo p {
            color: #6b7280;
            font-size: 0.95rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            font-weight: 600;
            color: #374151;
            margin-bottom: 0.5rem;
            font-size: 0.9rem;
        }

        .form-control {
            width: 100%;
            padding: 0.8rem 1rem;
            border: 2px solid #e5e7eb;
            border-radius: 12px;
            font-size: 0.95rem;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            outline: none;
            border-color: #00c853;
            box-shadow: 0 0 0 3px rgba(0, 200, 83, 0.1);
        }

        .btn {
            width: 100%;
            padding: 0.8rem;
            border: none;
            border-radius: 12px;
            background: linear-gradient(135deg, #00c853, #005c02);
            color: white;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 1rem;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0, 200, 83, 0.3);
        }

        .role-selector {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 0.5rem;
            margin-bottom: 1.5rem;
        }

        .role-btn {
            padding: 0.6rem;
            border: 2px solid #e5e7eb;
            border-radius: 10px;
            background: white;
            cursor: pointer;
            text-align: center;
            font-size: 0.85rem;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .role-btn:hover {
            border-color: #00c853;
        }

        .role-btn.active {
            border-color: #00c853;
            background: #f0fdf4;
            color: #00c853;
        }

        .demo-info {
            background: #f8fafc;
            padding: 1.2rem;
            border-radius: 12px;
            margin-top: 1.5rem;
            font-size: 0.85rem;
            color: #6b7280;
            border: 1px solid #e5e7eb;
        }

        .demo-info h4 {
            color: #374151;
            margin-bottom: 0.8rem;
            font-size: 0.95rem;
        }

        .demo-info p {
            margin-bottom: 0.3rem;
        }

        .register-link {
            text-align: center;
            margin-top: 1.5rem;
            font-size: 0.9rem;
        }

        .register-link a {
            color: #00c853;
            text-decoration: none;
            font-weight: 600;
        }

        .register-link a:hover {
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
    </style>
</head>

<body>
    <div class="login-container">
        <div class="logo">
            <h1><i class="fas fa-sparkles"></i> GOCLEAN</h1>
            <p>Masuk ke akun Anda</p>
        </div>

        <div class="error-message" id="errorMessage"></div>

        <form id="loginForm">
            <div class="form-group">
                <label>Pilih Role:</label>
                <div class="role-selector">
                    <div class="role-btn active" onclick="selectRole('customer')">Customer</div>
                    <div class="role-btn" onclick="selectRole('staff')">Staff</div>
                    <div class="role-btn" onclick="selectRole('admin')">Admin</div>
                </div>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" class="form-control" placeholder="Masukkan email Anda" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" class="form-control" placeholder="Masukkan password Anda" required>
            </div>

            <button type="submit" class="btn">
                <i class="fas fa-sign-in-alt"></i> Masuk
            </button>
        </form>

        <div class="register-link">
            <p>Belum punya akun? <a href="/register">Daftar sekarang</a></p>
        </div>

        <div class="demo-info">
            <h4><i class="fas fa-info-circle"></i> Demo Login:</h4>
            <p><strong>Customer:</strong> customer@test.com / password</p>
            <p><strong>Staff:</strong> staff@test.com / password</p>
            <p><strong>Admin:</strong> admin@goclean.com / goclean</p>
            <small style="color: #9ca3af; font-style: italic;">*Admin tidak dapat mendaftar, hanya 1 akun tetap</small>
        </div>
    </div>

    <script>
        let selectedRole = 'customer';

        function selectRole(role) {
            selectedRole = role;
            document.querySelectorAll('.role-btn').forEach(btn => btn.classList.remove('active'));
            event.target.classList.add('active');
            hideError();
        }

        function showError(message) {
            const errorDiv = document.getElementById('errorMessage');
            errorDiv.textContent = message;
            errorDiv.style.display = 'block';
        }

        function hideError() {
            document.getElementById('errorMessage').style.display = 'none';
        }

        document.getElementById('loginForm').addEventListener('submit', function (e) {
            e.preventDefault();
            hideError();
            
            const email = document.getElementById('email').value.trim();
            const password = document.getElementById('password').value;
            
            if (!email || !password) {
                showError('Email dan password harus diisi!');
                return;
            }
            
            const validUsers = [
                {email: 'customer@test.com', password: 'password', role: 'customer'},
                {email: 'staff@test.com', password: 'password', role: 'staff'},
                {email: 'admin@goclean.com', password: 'goclean', role: 'admin'}
            ];
            
            const newUser = localStorage.getItem('newUser');
            if (newUser) {
                const userData = JSON.parse(newUser);
                if (userData.role === 'customer' || userData.role === 'staff') {
                    validUsers.push({
                        email: userData.email,
                        password: 'password',
                        role: userData.role
                    });
                }
            }
            
            const user = validUsers.find(u => 
                u.email === email && 
                u.password === password && 
                u.role === selectedRole
            );
            
            if (user) {
                const redirects = {
                    'customer': '/customer/test',
                    'staff': '/staff/test',
                    'admin': '/admin/test'
                };
                window.location.href = redirects[user.role];
            } else {
                showError('Email, password, atau role tidak sesuai!');
            }
        });
    </script>
</body>
</html>