@extends('admin.layout')
@section('title', 'Kelola Users')

@section('content')

<div class="flex items-center justify-between mb-6">
    <div>
        <h2 class="text-xl font-bold text-gray-800">Kelola Users</h2>
        <p class="text-gray-500 text-sm mt-1">{{ $users->count() }} total users terdaftar</p>
    </div>
    <button onclick="document.getElementById('addStaffModal').classList.remove('hidden')"
        class="bg-green-600 hover:bg-green-700 text-white text-sm font-semibold px-4 py-2 rounded-xl transition flex items-center gap-2">
        <i class="fas fa-user-plus"></i> Tambah Staff
    </button>
</div>

{{-- Stats --}}
<div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
    @foreach([
        ['label'=>'Total Users','value'=>$users->count(),'color'=>'bg-gray-100 text-gray-600'],
        ['label'=>'Customer','value'=>$users->where('role','customer')->count(),'color'=>'bg-green-100 text-green-600'],
        ['label'=>'Staff','value'=>$users->where('role','staff')->count(),'color'=>'bg-blue-100 text-blue-600'],
        ['label'=>'Admin','value'=>$users->where('role','admin')->count(),'color'=>'bg-purple-100 text-purple-600'],
    ] as $s)
    <div class="bg-white rounded-2xl p-4 shadow-sm border border-gray-100 text-center">
        <p class="text-2xl font-bold text-gray-800">{{ $s['value'] }}</p>
        <span class="inline-block mt-1 text-xs px-2 py-0.5 rounded-full font-medium {{ $s['color'] }}">{{ $s['label'] }}</span>
    </div>
    @endforeach
</div>

{{-- Table --}}
<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-50 border-b border-gray-100">
                <tr>
                    <th class="px-5 py-3 text-left text-xs font-semibold text-gray-500 uppercase">User</th>
                    <th class="px-5 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Email</th>
                    <th class="px-5 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Role</th>
                    <th class="px-5 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Status</th>
                    <th class="px-5 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Bergabung</th>
                    <th class="px-5 py-3 text-center text-xs font-semibold text-gray-500 uppercase">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                @foreach($users as $user)
                @php
                    $roleColor = ['admin'=>'bg-purple-100 text-purple-700','staff'=>'bg-blue-100 text-blue-700','customer'=>'bg-green-100 text-green-700'];
                    $avatarColor = ['admin'=>'from-purple-400 to-purple-600','staff'=>'from-blue-400 to-blue-600','customer'=>'from-green-400 to-green-600'];
                @endphp
                <tr class="hover:bg-gray-50 transition" data-role="{{ $user->role }}">
                    <td class="px-5 py-4">
                        <div class="flex items-center gap-3">
                            <div class="w-9 h-9 bg-gradient-to-br {{ $avatarColor[$user->role] ?? 'from-gray-400 to-gray-600' }} rounded-full flex items-center justify-center text-white text-sm font-bold flex-shrink-0">
                                {{ strtoupper(substr($user->name, 0, 1)) }}
                            </div>
                            <p class="text-sm font-medium text-gray-800">{{ $user->name }}</p>
                        </div>
                    </td>
                    <td class="px-5 py-4 text-sm text-gray-600">{{ $user->email }}</td>
                    <td class="px-5 py-4">
                        <span class="text-xs px-2 py-1 rounded-full font-medium {{ $roleColor[$user->role] ?? 'bg-gray-100 text-gray-600' }}">
                            {{ ucfirst($user->role) }}
                        </span>
                    </td>
                    <td class="px-5 py-4">
                        @if($user->is_active)
                            <span class="text-xs px-2 py-1 rounded-full font-medium bg-green-100 text-green-700">Aktif</span>
                        @else
                            <span class="text-xs px-2 py-1 rounded-full font-medium bg-red-100 text-red-700">Nonaktif</span>
                        @endif
                    </td>
                    <td class="px-5 py-4 text-sm text-gray-500">{{ date('d M Y', strtotime($user->created_at)) }}</td>
                    <td class="px-5 py-4">
                        @if($user->role != 'admin')
                        <div class="flex items-center justify-center gap-2">

    {{-- Aktif / Nonaktif --}}
    <form action="{{ route('admin.users.toggle', $user->id) }}" method="POST">
        @csrf
        <button type="submit"
            class="{{ $user->is_active ? 'text-orange-400 hover:text-orange-600' : 'text-green-500 hover:text-green-600' }}">
            <i class="fas fa-{{ $user->is_active ? 'ban' : 'check-circle' }}"></i>
        </button>
    </form>

    {{-- Hapus --}}
    <form action="{{ route('admin.users.delete', $user->id) }}" method="POST">
        @csrf @method('DELETE')
        <button onclick="return confirm('Hapus user ini?')"
            class="text-red-400 hover:text-red-600">
            <i class="fas fa-trash"></i>
        </button>
    </form>

</div>
                        @else
                            <span class="text-xs text-gray-400 italic">Protected</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

{{-- Modal Tambah Staff --}}
<div id="addStaffModal" class="hidden fixed inset-0 bg-black/50 flex items-center justify-center z-50 p-4">
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md p-6">
        <div class="flex items-center justify-between mb-5">
            <h3 class="text-lg font-bold text-gray-800">Tambah Staff Baru</h3>
            <button onclick="document.getElementById('addStaffModal').classList.add('hidden')" class="text-gray-400 hover:text-gray-600">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <form action="{{ route('admin.staff.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Nama Lengkap</label>
                <input type="text" name="name" required class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:border-green-500 focus:ring-2 focus:ring-green-100">
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Email</label>
                <input type="email" name="email" required class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:border-green-500 focus:ring-2 focus:ring-green-100">
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Password</label>
                <input type="password" name="password" required minlength="8" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:border-green-500 focus:ring-2 focus:ring-green-100">
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" required class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:border-green-500 focus:ring-2 focus:ring-green-100">
            </div>
            <div class="flex gap-3 pt-2">
                <button type="button" onclick="document.getElementById('addStaffModal').classList.add('hidden')"
                    class="flex-1 py-2.5 border border-gray-200 text-gray-600 rounded-xl text-sm font-medium hover:bg-gray-50 transition">Batal</button>
                <button type="submit" class="flex-1 py-2.5 bg-green-600 hover:bg-green-700 text-white rounded-xl text-sm font-semibold transition">Simpan</button>
            </div>
        </form>
    </div>
</div>

{{-- Modal Edit User --}}
<div id="editUserModal" class="hidden fixed inset-0 bg-black/50 flex items-center justify-center z-50 p-4">
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md p-6">
        <div class="flex items-center justify-between mb-5">
            <h3 class="text-lg font-bold text-gray-800">Edit User</h3>
            <button onclick="document.getElementById('editUserModal').classList.add('hidden')" class="text-gray-400 hover:text-gray-600">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <form id="editUserForm" method="POST" class="space-y-4">
            @csrf @method('PUT')
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Nama Lengkap</label>
                <input type="text" name="name" id="edit_name" required class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:border-green-500 focus:ring-2 focus:ring-green-100">
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Email</label>
                <input type="email" name="email" id="edit_email" required class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:border-green-500 focus:ring-2 focus:ring-green-100">
            </div>
            <div class="flex gap-3 pt-2">
                <button type="button" onclick="document.getElementById('editUserModal').classList.add('hidden')"
                    class="flex-1 py-2.5 border border-gray-200 text-gray-600 rounded-xl text-sm font-medium hover:bg-gray-50 transition">Batal</button>
                <button type="submit" class="flex-1 py-2.5 bg-blue-600 hover:bg-blue-700 text-white rounded-xl text-sm font-semibold transition">Update</button>
            </div>
        </form>
    </div>
</div>

<script>
function editUser(id, name, email) {
    document.getElementById('edit_name').value = name;
    document.getElementById('edit_email').value = email;
    document.getElementById('editUserForm').action = '/admin/users/' + id;
    document.getElementById('editUserModal').classList.remove('hidden');
}
</script>

@endsection
