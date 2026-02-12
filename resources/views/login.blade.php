<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
            padding: 1rem;
        }

        .login-container {
            background: white;
            padding: 2.5rem;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
            width: 100%;
            max-width: 420px;
        }
        
        @media (max-width: 480px) {
            .login-container {
                padding: 1.5rem;
            }
            
            .logo h1 {
                font-size: 1.8rem;
            }
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

        .error-message {
            background: #fee2e2;
            color: #dc2626;
            padding: 0.8rem;
            border-radius: 8px;
            margin-bottom: 1rem;
            font-size: 0.9rem;
            display: none;
        }

        .success-message {
            background: #d1fae5;
            color: #059669;
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

        @if(session('error'))
            <div class="error-message" style="display:block;">{{ session('error') }}</div>
        @endif

        @if(session('success'))
            <div class="success-message" style="display:block;">{{ session('success') }}</div>
        @endif

        <div class="error-message" id="errorMessage"></div>

        <form method="POST" action="{{ route('login') }}" id="loginForm">
            @csrf

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="Masukkan email Anda"
                    required autofocus>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" class="form-control"
                    placeholder="Masukkan password Anda" required>
            </div>

            <button type="submit" class="btn">
                <i class="fas fa-sign-in-alt"></i> Masuk
            </button>
        </form>

        <div class="register-link">
            <p>Belum punya akun? <a href="/register">Daftar sekarang</a></p>
        </div>
    </div>
</body>

</html>