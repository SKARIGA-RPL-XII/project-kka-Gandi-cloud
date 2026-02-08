@extends('admin.layout')
@section('title','Pesan Masuk')

@section('content')
<div class="bg-white p-6 rounded shadow">
    <h2 class="text-xl font-bold mb-4">Pesan Kontak</h2>

    <table class="w-full border">
        <thead>
            <tr class="bg-gray-100">
                <th>Nama</th>
                <th>Email</th>
                <th>Subjek</th>
                <th>Pesan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        @foreach($contacts as $c)
            <tr class="border-t">
                <td>{{ $c->name }}</td>
                <td>{{ $c->email }}</td>
                <td>{{ $c->subject }}</td>
                <td>{{ $c->message }}</td>
                <td>
                    <form method="POST" action="{{ route('admin.contacts.delete',$c->id) }}">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-600">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
