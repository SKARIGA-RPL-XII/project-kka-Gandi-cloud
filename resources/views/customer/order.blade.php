@extends('customer.layouts.app')

@section('title', 'Buat Pesanan')

@section('content')
<div class="container p-4 max-w-lg mx-auto">

    @if(session('success'))
        <div class="bg-green-500 text-white p-2 mb-3">{{ session('success') }}</div>
    @endif

    <div class="bg-white shadow p-4 rounded">
        <form method="POST" action="{{ route('order.store') }}">
            @csrf

            <label>Layanan</label>
            <select name="layanan" class="w-full border p-2 rounded mb-2">
                <option>Cleaning Room</option>
                <option>Cleaning House</option>
                <option>Cleaning Office</option>
            </select>

            <label>Tanggal</label>
            <input type="date" name="tanggal" class="w-full border p-2 rounded mb-2">

            <label>Alamat</label>
            <textarea name="alamat" class="w-full border p-2 rounded mb-2"></textarea>

            <button class="bg-blue-600 text-white w-full p-2 rounded">
                Pesan Sekarang
            </button>
        </form>
    </div>

</div>
@endsection
