<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Profil | GOCLEAN</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: 'Inter', sans-serif;
            background: #f8fafc;
            display: flex;
        }

        .sidebar {
            width: 280px;
            background: linear-gradient(135deg, #005c02 0%, #00f7ff 100%);
            height: 100vh;
            box-shadow: 0 10px 30px rgba(0, 0, 0, .1);
            padding: 0;
            position: fixed;
            overflow-y: auto;
        }

        .sidebar-header {
            padding: 30px 25px;
            text-align: center;
            border-bottom: 1px solid rgba(255, 255, 255, .1);
        }

        .sidebar h2 {
            color: white;
            font-size: 24px;
            font-weight: 700;
            margin: 0;
        }

        .sidebar-nav {
            padding: 20px 0;
        }

        .sidebar a {
            display: flex;
            align-items: center;
            padding: 15px 25px;
            color: rgba(255, 255, 255, .8);
            text-decoration: none;
            font-size: 15px;
            transition: .3s;
            border-left: 3px solid transparent;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background: rgba(255, 255, 255, .1);
            color: white;
            border-left-color: #fff;
        }

        .sidebar a i {
            width: 20px;
            margin-right: 12px;
        }

        .container {
            flex: 1;
            margin-left: 280px;
        }

        .nav {
            height: 70px;
            background: white;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 30px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, .05);
        }

        .nav-title {
            font-size: 20px;
            font-weight: 600;
            color: #2d3748;
        }

        .wrapper {
            padding: 30px;
            max-width: 1200px;
        }

        .card {
            background: white;
            border-radius: 16px;
            padding: 30px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, .06);
            margin-bottom: 20px;
        }

        .profile-header {
            display: flex;
            align-items: center;
            gap: 30px;
            margin-bottom: 30px;
            padding-bottom: 30px;
            border-bottom: 2px solid #f1f5f9;
        }

        .profile-photo {
            position: relative;
        }

        .photo-circle {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            background: linear-gradient(135deg, #005c02, #00f7ff);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 48px;
            font-weight: 700;
            overflow: hidden;
            border: 5px solid white;
            box-shadow: 0 8px 20px rgba(0, 0, 0, .1);
        }

        .photo-circle img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .upload-btn {
            position: absolute;
            bottom: 0;
            right: 0;
            width: 45px;
            height: 45px;
            border-radius: 50%;
            background: #00c853;
            border: 3px solid white;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            box-shadow: 0 4px 10px rgba(0, 200, 83, .3);
        }

        .upload-btn:hover {
            background: #00a843;
        }

        .upload-btn i {
            color: white;
            font-size: 18px;
        }

        .profile-info h2 {
            font-size: 28px;
            font-weight: 700;
            margin: 0 0 5px 0;
            color: #1f2937;
        }

        .profile-info p {
            color: #6b7280;
            margin: 0;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-weight: 600;
            color: #374151;
            margin-bottom: 8px;
            font-size: 14px;
        }

        .form-control {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e5e7eb;
            border-radius: 10px;
            font-size: 14px;
            transition: .3s;
        }

        .form-control:focus {
            outline: none;
            border-color: #00c853;
            box-shadow: 0 0 0 3px rgba(0, 200, 83, .1);
        }

        .form-control:disabled {
            background: #f9fafb;
            cursor: not-allowed;
        }

        .btn {
            padding: 12px 24px;
            border: none;
            border-radius: 10px;
            font-weight: 600;
            cursor: pointer;
            transition: .3s;
            font-size: 14px;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-primary {
            background: linear-gradient(135deg, #00c853, #005c02);
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0, 200, 83, .3);
        }

        .btn-secondary {
            background: #6b7280;
            color: white;
        }

        .btn-secondary:hover {
            background: #4b5563;
        }

        .btn-danger {
            background: #dc2626;
            color: white;
        }

        .btn-danger:hover {
            background: #b91c1c;
        }

        .btn-group {
            display: flex;
            gap: 10px;
            margin-top: 20px;
        }

        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .success-msg {
            background: #d1fae5;
            color: #059669;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 20px;
            display: none;
        }

        .error-msg {
            background: #fee2e2;
            color: #dc2626;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 20px;
            display: none;
        }

        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, .5);
            z-index: 1000;
            align-items: center;
            justify-content: center;
        }

        .modal-content {
            background: white;
            padding: 30px;
            border-radius: 16px;
            max-width: 400px;
            width: 90%;
            text-align: center;
        }

        .modal-content h3 {
            margin: 0 0 15px 0;
            color: #1f2937;
        }

        .modal-content p {
            color: #6b7280;
            margin: 0 0 20px 0;
        }
    </style>
</head>

<body>

    <div class="sidebar">
        <div class="sidebar-header">
            <h2><i class="fas fa-sparkles"></i> GOCLEAN</h2>
        </div>
        <div class="sidebar-nav">
            <a href="/customer/dashboard"><i class="fas fa-home"></i> Dashboard</a>
            <a href="/order/create"><i class="fas fa-plus-circle"></i> Buat Pesanan</a>
            <a href="/order/history"><i class="fas fa-history"></i> Histori Pesanan</a>
            <a href="/customer/profile" class="active"><i class="fas fa-user"></i> Profil</a>
            <a href="/help"><i class="fas fa-headset"></i> Bantuan</a>
        </div>
    </div>

    <div class="container">
        <div class="nav">
            <div class="nav-title">Profil Saya</div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="btn btn-secondary" style="padding:8px 16px;font-size:12px;">Logout</button>
            </form>
        </div>

        <div class="wrapper">
            <div class="success-msg" id="successMsg"></div>
            <div class="error-msg" id="errorMsg"></div>

            <div class="card">
                <div class="profile-header">
                    <div class="profile-photo">
                        <div class="photo-circle" id="photoPreview">
                            <span id="photoInitial">{{ substr(auth()->user()->name ?? 'U', 0, 1) }}</span>
                            <img id="photoImage" src="" style="display:none;">
                        </div>
                        <label for="photoUpload" class="upload-btn">
                            <i class="fas fa-camera"></i>
                        </label>
                        <input type="file" id="photoUpload" accept="image/*" style="display:none;">
                    </div>
                    <div class="profile-info">
                        <h2 id="displayName">{{ auth()->user()->name ?? 'User' }}</h2>
                        <p id="displayEmail">{{ auth()->user()->email ?? 'email@example.com' }}</p>
                        <p style="margin-top:5px;"><span
                                style="background:#dbeafe;color:#2563eb;padding:4px 12px;border-radius:20px;font-size:12px;font-weight:600;">{{ ucfirst(auth()->user()->role ?? 'customer') }}</span>
                        </p>
                    </div>
                </div>

                <form id="profileForm">
                    <h3 style="font-size:20px;font-weight:600;margin:0 0 20px 0;color:#1f2937;">Informasi Pribadi</h3>

                    <div class="info-grid">
                        <div class="form-group">
                            <label for="name">Nama Lengkap</label>
                            <input type="text" id="name" class="form-control" value="{{ auth()->user()->name ?? '' }}"
                                disabled>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" class="form-control"
                                value="{{ auth()->user()->email ?? '' }}" disabled>
                        </div>
                    </div>

                    <div class="info-grid">
                        <div class="form-group">
                            <label for="phone">No. Telepon</label>
                            <input type="tel" id="phone" class="form-control" placeholder="08xx-xxxx-xxxx" disabled>
                        </div>
                        <div class="form-group">
                            <label for="birthdate">Tanggal Lahir</label>
                            <input type="date" id="birthdate" class="form-control" disabled>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="address">Alamat Lengkap</label>
                        <textarea id="address" class="form-control" rows="3" placeholder="Masukkan alamat lengkap"
                            disabled></textarea>
                    </div>

                    <div class="btn-group">
                        <button type="button" class="btn btn-primary" id="editBtn" onclick="enableEdit()">
                            <i class="fas fa-edit"></i> Edit Profil
                        </button>
                        <button type="submit" class="btn btn-primary" id="saveBtn" style="display:none;">
                            <i class="fas fa-save"></i> Simpan Perubahan
                        </button>
                        <button type="button" class="btn btn-secondary" id="cancelBtn" style="display:none;"
                            onclick="cancelEdit()">
                            <i class="fas fa-times"></i> Batal
                        </button>
                        <button type="button" class="btn btn-danger" onclick="confirmDelete()">
                            <i class="fas fa-trash"></i> Hapus Akun
                        </button>
                    </div>
                </form>
            </div>

            <div class="card">
                <h3 style="font-size:20px;font-weight:600;margin:0 0 20px 0;color:#1f2937;">Ubah Password</h3>
                <form id="passwordForm">
                    <div class="form-group">
                        <label for="current_password">Password Saat Ini</label>
                        <input type="password" id="current_password" class="form-control"
                            placeholder="Masukkan password saat ini">
                    </div>
                    <div class="form-group">
                        <label for="new_password">Password Baru</label>
                        <input type="password" id="new_password" class="form-control" placeholder="Minimal 8 karakter">
                    </div>
                    <div class="form-group">
                        <label for="confirm_password">Konfirmasi Password Baru</label>
                        <input type="password" id="confirm_password" class="form-control"
                            placeholder="Ulangi password baru">
                    </div>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-key"></i> Ubah Password
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal" id="deleteModal">
        <div class="modal-content">
            <h3><i class="fas fa-exclamation-triangle" style="color:#dc2626;"></i> Konfirmasi Hapus</h3>
            <p>Apakah Anda yakin ingin menghapus akun? Tindakan ini tidak dapat dibatalkan.</p>
            <div class="btn-group" style="justify-content:center;">
                <button class="btn btn-danger" onclick="deleteAccount()">Ya, Hapus</button>
                <button class="btn btn-secondary" onclick="closeModal()">Batal</button>
            </div>
        </div>
    </div>

    <script>
        // Load profile data from localStorage
        window.onload = function () {
            const profile = JSON.parse(localStorage.getItem('userProfile') || '{}');
            if (profile.phone) document.getElementById('phone').value = profile.phone;
            if (profile.birthdate) document.getElementById('birthdate').value = profile.birthdate;
            if (profile.address) document.getElementById('address').value = profile.address;
            if (profile.photo) {
                document.getElementById('photoImage').src = profile.photo;
                document.getElementById('photoImage').style.display = 'block';
                document.getElementById('photoInitial').style.display = 'none';
            }
        };

        // Photo upload
        document.getElementById('photoUpload').addEventListener('change', function (e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    const photo = e.target.result;
                    document.getElementById('photoImage').src = photo;
                    document.getElementById('photoImage').style.display = 'block';
                    document.getElementById('photoInitial').style.display = 'none';

                    // Save to localStorage
                    const profile = JSON.parse(localStorage.getItem('userProfile') || '{}');
                    profile.photo = photo;
                    localStorage.setItem('userProfile', JSON.stringify(profile));

                    showSuccess('Foto profil berhasil diupdate!');
                };
                reader.readAsDataURL(file);
            }
        });

        // Enable edit mode
        function enableEdit() {
            document.getElementById('name').disabled = false;
            document.getElementById('phone').disabled = false;
            document.getElementById('birthdate').disabled = false;
            document.getElementById('address').disabled = false;

            document.getElementById('editBtn').style.display = 'none';
            document.getElementById('saveBtn').style.display = 'inline-flex';
            document.getElementById('cancelBtn').style.display = 'inline-flex';
        }

        // Cancel edit
        function cancelEdit() {
            document.getElementById('name').disabled = true;
            document.getElementById('phone').disabled = true;
            document.getElementById('birthdate').disabled = true;
            document.getElementById('address').disabled = true;

            document.getElementById('editBtn').style.display = 'inline-flex';
            document.getElementById('saveBtn').style.display = 'none';
            document.getElementById('cancelBtn').style.display = 'none';

            // Reload data
            window.onload();
        }

        // Save profile
        document.getElementById('profileForm').addEventListener('submit', function (e) {
            e.preventDefault();

            const profile = {
                name: document.getElementById('name').value,
                phone: document.getElementById('phone').value,
                birthdate: document.getElementById('birthdate').value,
                address: document.getElementById('address').value,
                photo: JSON.parse(localStorage.getItem('userProfile') || '{}').photo || ''
            };

            localStorage.setItem('userProfile', JSON.stringify(profile));

            // Update display
            document.getElementById('displayName').textContent = profile.name;

            cancelEdit();
            showSuccess('Profil berhasil diupdate!');
        });

        // Change password
        document.getElementById('passwordForm').addEventListener('submit', function (e) {
            e.preventDefault();

            const current = document.getElementById('current_password').value;
            const newPass = document.getElementById('new_password').value;
            const confirm = document.getElementById('confirm_password').value;

            if (!current || !newPass || !confirm) {
                showError('Semua field harus diisi!');
                return;
            }

            if (newPass.length < 8) {
                showError('Password baru minimal 8 karakter!');
                return;
            }

            if (newPass !== confirm) {
                showError('Konfirmasi password tidak sesuai!');
                return;
            }

            // Simulate password change
            showSuccess('Password berhasil diubah!');
            this.reset();
        });

        // Delete account
        function confirmDelete() {
            document.getElementById('deleteModal').style.display = 'flex';
        }

        function closeModal() {
            document.getElementById('deleteModal').style.display = 'none';
        }

        function deleteAccount() {
            // Clear all data
            localStorage.removeItem('userProfile');

            // Redirect to login
            showSuccess('Akun berhasil dihapus. Mengalihkan...');
            setTimeout(() => {
                window.location.href = '/login';
            }, 1500);
        }

        // Helper functions
        function showSuccess(message) {
            const el = document.getElementById('successMsg');
            el.textContent = message;
            el.style.display = 'block';
            setTimeout(() => el.style.display = 'none', 3000);
        }

        function showError(message) {
            const el = document.getElementById('errorMsg');
            el.textContent = message;
            el.style.display = 'block';
            setTimeout(() => el.style.display = 'none', 3000);
        }
    </script>

</body>

</html>