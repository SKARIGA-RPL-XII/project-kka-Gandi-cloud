@extends('admin.layout')
@section('title', 'Kelola Akun')

@section('content')
<!-- Header Section -->
<div class="mb-6">
    <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">Kelola Akun</h2>
            <p class="text-gray-600 text-sm mt-1">Manajemen user, staff, dan customer</p>
        </div>
        <div class="flex flex-col sm:flex-row gap-2">
            <button class="bg-gradient-to-r from-green-600 to-green-700 hover:from-green-700 hover:to-green-800 text-white px-4 py-2 rounded-lg transition shadow-md" onclick="showAddStaffModal()">
                <i class="fas fa-user-plus mr-2"></i>Tambah Staff
            </button>
            <select class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" onchange="filterUsers(this.value)">
                <option value="">Semua Role</option>
                <option value="customer">Customer</option>
                <option value="staff">Staff</option>
                <option value="admin">Admin</option>
            </select>
        </div>
    </div>
</div>

@if(session('success'))
    <div class="bg-green-50 border-l-4 border-green-500 text-green-700 px-4 py-3 rounded-lg mb-6 shadow-sm animate-fade-in">
        <div class="flex items-center">
            <i class="fas fa-check-circle text-green-500 mr-3 text-xl"></i>
            <span class="font-medium">{{ session('success') }}</span>
        </div>
    </div>
@endif

@if(session('error'))
    <div class="bg-red-50 border-l-4 border-red-500 text-red-700 px-4 py-3 rounded-lg mb-6 shadow-sm animate-fade-in">
        <div class="flex items-center">
            <i class="fas fa-exclamation-circle text-red-500 mr-3 text-xl"></i>
            <span class="font-medium">{{ session('error') }}</span>
        </div>
    </div>
@endif

<!-- Users Table -->
<div class="bg-white rounded-xl shadow-lg overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gradient-to-r from-gray-50 to-gray-100">
                <tr>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-gray-700 uppercase">User</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-gray-700 uppercase">Email</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-gray-700 uppercase">Role</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-gray-700 uppercase">Bergabung</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-gray-700 uppercase">Status</th>
                    <th class="px-4 py-3 text-center text-xs font-semibold text-gray-700 uppercase">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($users as $user)
                <tr class="hover:bg-gray-50 transition" data-role="{{ $user->role }}">
                    <td class="px-4 py-3">
                        <div class="flex items-center">
                            <div class="h-10 w-10 rounded-full bg-gradient-to-br from-blue-500 to-blue-600 flex items-center justify-center text-white font-bold shadow-md flex-shrink-0">
                                {{ strtoupper(substr($user->name, 0, 1)) }}
                            </div>
                            <div class="ml-3">
                                <div class="text-sm font-semibold text-gray-900">{{ $user->name }}</div>
                                <div class="text-xs text-gray-500">ID: #{{ str_pad($user->id, 4, '0', STR_PAD_LEFT) }}</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-4 py-3">
                        <div class="text-sm text-gray-900">
                            <i class="fas fa-envelope text-gray-400 mr-1"></i>{{ $user->email }}
                        </div>
                    </td>
                    <td class="px-4 py-3">
                        @if($user->role == 'admin')
                            <span class="inline-flex items-center px-2 py-1 text-xs font-semibold rounded-full bg-purple-100 text-purple-800">
                                <i class="fas fa-crown mr-1"></i>Admin
                            </span>
                        @elseif($user->role == 'staff')
                            <span class="inline-flex items-center px-2 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800">
                                <i class="fas fa-user-tie mr-1"></i>Staff
                            </span>
                        @else
                            <span class="inline-flex items-center px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                                <i class="fas fa-user mr-1"></i>Customer
                            </span>
                        @endif
                    </td>
                    <td class="px-4 py-3">
                        <div class="text-sm text-gray-900">
                            <i class="fas fa-calendar text-gray-400 mr-1"></i>{{ date('d M Y', strtotime($user->created_at)) }}
                        </div>
                    </td>
                    <td class="px-4 py-3">
                        @if($user->is_active)
                            <span class="inline-flex items-center px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                                <i class="fas fa-check-circle mr-1"></i>Aktif
                            </span>
                        @else
                            <span class="inline-flex items-center px-2 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800">
                                <i class="fas fa-times-circle mr-1"></i>Nonaktif
                            </span>
                        @endif
                    </td>
                    <td class="px-4 py-3">
                        @if($user->role != 'admin')
                            <div class="flex justify-center gap-1">
                                <button onclick="editUser({{ $user->id }})" class="bg-yellow-500 hover:bg-yellow-600 text-white px-2 py-1 rounded text-xs transition" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </button>
                                
                                <form action="{{ route('admin.users.toggle', $user->id) }}" method="POST" class="inline">
                                    @csrf
                                    <button type="submit" class="bg-{{ $user->is_active ? 'orange' : 'green' }}-500 hover:bg-{{ $user->is_active ? 'orange' : 'green' }}-600 text-white px-2 py-1 rounded text-xs transition" title="{{ $user->is_active ? 'Nonaktifkan' : 'Aktifkan' }}">
                                        <i class="fas fa-{{ $user->is_active ? 'ban' : 'check' }}"></i>
                                    </button>
                                </form>

                                <form action="{{ route('admin.users.delete', $user->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Yakin ingin menghapus user ini?')" class="bg-red-500 hover:bg-red-600 text-white px-2 py-1 rounded text-xs transition" title="Hapus">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        @else
                            <span class="text-gray-400 text-xs italic">Protected</span>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-16 text-center">
                        <div class="text-gray-400">
                            <i class="fas fa-users text-6xl mb-4 opacity-50"></i>
                            <p class="text-lg font-medium text-gray-600">Belum ada users</p>
                            <p class="text-sm text-gray-500 mt-2">Data users akan muncul di sini</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- User Statistics -->
<div class="mt-8 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
    <div class="bg-gradient-to-br from-green-500 to-green-600 p-6 rounded-xl shadow-lg text-white transform hover:scale-105 transition duration-300">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-green-100 text-sm font-medium">Total Users</p>
                <p class="text-4xl font-bold mt-2">{{ $users->count() }}</p>
            </div>
            <div class="bg-white bg-opacity-20 p-4 rounded-full">
                <i class="fas fa-users text-3xl"></i>
            </div>
        </div>
    </div>

    <div class="bg-gradient-to-br from-blue-500 to-blue-600 p-6 rounded-xl shadow-lg text-white transform hover:scale-105 transition duration-300">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-blue-100 text-sm font-medium">Staff</p>
                <p class="text-4xl font-bold mt-2">{{ $users->where('role', 'staff')->count() }}</p>
            </div>
            <div class="bg-white bg-opacity-20 p-4 rounded-full">
                <i class="fas fa-user-tie text-3xl"></i>
            </div>
        </div>
    </div>

    <div class="bg-gradient-to-br from-yellow-500 to-yellow-600 p-6 rounded-xl shadow-lg text-white transform hover:scale-105 transition duration-300">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-yellow-100 text-sm font-medium">Customer</p>
                <p class="text-4xl font-bold mt-2">{{ $users->where('role', 'customer')->count() }}</p>
            </div>
            <div class="bg-white bg-opacity-20 p-4 rounded-full">
                <i class="fas fa-user text-3xl"></i>
            </div>
        </div>
    </div>

    <div class="bg-gradient-to-br from-purple-500 to-purple-600 p-6 rounded-xl shadow-lg text-white transform hover:scale-105 transition duration-300">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-purple-100 text-sm font-medium">Admin</p>
                <p class="text-4xl font-bold mt-2">{{ $users->where('role', 'admin')->count() }}</p>
            </div>
            <div class="bg-white bg-opacity-20 p-4 rounded-full">
                <i class="fas fa-crown text-3xl"></i>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah Staff -->
<div id="addStaffModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white rounded-lg p-8 max-w-md w-full mx-4">
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-xl font-bold text-gray-800">Tambah Staff Baru</h3>
            <button onclick="closeAddStaffModal()" class="text-gray-500 hover:text-gray-700">
                <i class="fas fa-times text-xl"></i>
            </button>
        </div>
        
        <form action="{{ route('admin.staff.store') }}" method="POST" id="addStaffForm">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2">Nama Lengkap</label>
                <input type="text" name="name" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-green-500" required>
            </div>
            
            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2">Email</label>
                <input type="email" name="email" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-green-500" required>
            </div>
            
            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2">Password</label>
                <input type="password" name="password" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-green-500" required minlength="8">
                <p class="text-sm text-gray-500 mt-1">Minimal 8 karakter</p>
            </div>
            
            <div class="mb-6">
                <label class="block text-gray-700 font-medium mb-2">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-green-500" required minlength="8">
            </div>
            
            <div class="flex space-x-3">
                <button type="button" onclick="closeAddStaffModal()" class="flex-1 bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded-lg font-medium">
                    Batal
                </button>
                <button type="submit" class="flex-1 bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg font-medium">
                    <i class="fas fa-save"></i> Simpan
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Edit User -->
<div id="editUserModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white rounded-lg p-8 max-w-md w-full mx-4">
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-xl font-bold text-gray-800">Edit User</h3>
            <button onclick="closeEditUserModal()" class="text-gray-500 hover:text-gray-700">
                <i class="fas fa-times text-xl"></i>
            </button>
        </div>
        
        <form id="editUserForm" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2">Nama Lengkap</label>
                <input type="text" name="name" id="edit_name" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-green-500" required>
            </div>
            
            <div class="mb-6">
                <label class="block text-gray-700 font-medium mb-2">Email</label>
                <input type="email" name="email" id="edit_email" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-green-500" required>
            </div>
            
            <div class="flex space-x-3">
                <button type="button" onclick="closeEditUserModal()" class="flex-1 bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded-lg font-medium">
                    Batal
                </button>
                <button type="submit" class="flex-1 bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-medium">
                    <i class="fas fa-save"></i> Update
                </button>
            </div>
        </form>
    </div>
</div>

<script>
function showAddStaffModal() {
    document.getElementById('addStaffModal').classList.remove('hidden');
}

function closeAddStaffModal() {
    document.getElementById('addStaffModal').classList.add('hidden');
    document.getElementById('addStaffForm').reset();
}

function editUser(id) {
    fetch(`/admin/users/${id}/edit`)
        .then(res => res.json())
        .then(user => {
            document.getElementById('edit_name').value = user.name;
            document.getElementById('edit_email').value = user.email;
            document.getElementById('editUserForm').action = `/admin/users/${id}`;
            document.getElementById('editUserModal').classList.remove('hidden');
        });
}

function closeEditUserModal() {
    document.getElementById('editUserModal').classList.add('hidden');
}

function filterUsers(role) {
    const rows = document.querySelectorAll('tbody tr[data-role]');
    rows.forEach(row => {
        if (role === '' || row.dataset.role === role) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
}
</script>
@endsection
