<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - GOCLEAN</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        *{margin:0;padding:0;box-sizing:border-box;}
        body{font-family:'Inter',sans-serif;background:linear-gradient(135deg,#005c02 0%,#00f7ff 100%);min-height:100vh;display:flex;align-items:center;justify-content:center;}
        .login-container{background:white;padding:3rem;border-radius:20px;box-shadow:0 20px 40px rgba(0,0,0,0.1);width:100%;max-width:400px;}
        .logo{text-align:center;margin-bottom:2rem;}
        .logo h1{font-size:2rem;font-weight:700;color:#005c02;margin-bottom:0.5rem;}
        .logo p{color:#6b7280;font-size:0.9rem;}
        .form-group{margin-bottom:1.5rem;}
        .form-group label{display:block;font-weight:600;color:#374151;margin-bottom:0.5rem;font-size:0.9rem;}
        .form-control{width:100%;padding:0.75rem 1rem;border:2px solid #e5e7eb;border-radius:10px;font-size:0.9rem;transition:0.3s;}
        .form-control:focus{outline:none;border-color:#00c853;box-shadow:0 0 0 3px rgba(0,200,83,0.1);}
        .btn{width:100%;padding:0.75rem;border:none;border-radius:10px;background:linear-gradient(135deg,#00ff9d,#00c853);color:white;font-weight:600;cursor:pointer;transition:0.3s;font-size:1rem;}
        .btn:hover{transform:translateY(-2px);box-shadow:0 8px 25px rgba(0,255,157,0.3);}
        .role-selector{display:grid;grid-template-columns:1fr 1fr 1fr;gap:0.5rem;margin-bottom:1.5rem;}
        .role-btn{padding:0.5rem;border:2px solid #e5e7eb;border-radius:8px;background:white;cursor:pointer;text-align:center;font-size:0.8rem;font-weight:500;transition:0.3s;}
        .role-btn.active{border-color:#00c853;background:#f0fdf4;color:#00c853;}
        .demo-info{background:#f8fafc;padding:1rem;border-radius:10px;margin-top:1.5rem;font-size:0.8rem;color:#6b7280;}
        .demo-info h4{color:#374151;margin-bottom:0.5rem;font-size:0.9rem;}
    </style>
</head>
<body>

<div class="login-container">
    <div class="logo">
        <h1><i class="fas fa-sparkles"></i> GOCLEAN</h1>
        <p>Masuk ke akun Anda</p>
    </div>

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

    <div class="demo-info">
        <h4>Demo Login:</h4>
        <p><strong>Customer:</strong> customer@test.com / password</p>
        <p><strong>Staff:</strong> staff@test.com / password</p>
        <p><strong>Admin:</strong> admin@test.com / password</p>
    </div>
</div>

<script>
let selectedRole = 'customer';

function selectRole(role) {
    selectedRole = role;
    document.querySelectorAll('.role-btn').forEach(btn => btn.classList.remove('active'));
    event.target.classList.add('active');
}

document.getElementById('loginForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    // Simulasi login berhasil
    if (selectedRole === 'customer') {
        window.location.href = '/customer/test';
    } else if (selectedRole === 'staff') {
        window.location.href = '/staff/test';
    } else if (selectedRole === 'admin') {
        window.location.href = '/admin/test';
    }
});
</script>

</body>
</html>