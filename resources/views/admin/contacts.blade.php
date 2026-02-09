@extends('admin.layout')
@section('title','Pesan Masuk')

@section('content')
<div class="bg-white p-6 rounded shadow">
    <h2 class="text-xl font-bold mb-4">Pesan Kontak</h2>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <table class="w-full border">
        <thead>
            <tr class="bg-gray-100">
                <th class="px-4 py-2 border">Nama</th>
                <th class="px-4 py-2 border">Email</th>
                <th class="px-4 py-2 border">Subjek</th>
                <th class="px-4 py-2 border">Pesan</th>
                <th class="px-4 py-2 border">Aksi</th>
            </tr>
        </thead>
        <tbody>
        @forelse($contacts as $c)
            <tr class="border-t">
                <td class="px-4 py-2 border">{{ $c->name }}</td>
                <td class="px-4 py-2 border">{{ $c->email }}</td>
                <td class="px-4 py-2 border">{{ $c->subject }}</td>
                <td class="px-4 py-2 border">{{ $c->message }}</td>
                <td class="px-4 py-2 border text-center">
                    <form method="POST" action="{{ route('admin.contacts.delete',$c->id) }}" onsubmit="return confirm('Yakin hapus pesan ini?')">
                        @csrf
                        @method('DELETE')
                        <button class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">
                            <i class="fas fa-trash"></i> Hapus
                        </button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="px-4 py-8 text-center text-gray-500">
                    Belum ada pesan kontak
                </td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>
@endsection
