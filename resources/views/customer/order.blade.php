@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Pesan Layanan</h2>

    @if(session('success'))
        <div style="color:green;">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="/order">
        @csrf

        <label>Layanan</label>
        <select name="service_id" required>
            @foreach($services as $service)
                <option value="{{ $service->id }}">
                    {{ $service->name }} - Rp{{ $service->price }}
                </option>
            @endforeach
        </select><br><br>

        <label>Tanggal</label>
        <input type="date" name="order_date" required><br><br>

        <label>Alamat</label>
        <textarea name="address" required></textarea><br><br>

        <button type="submit">Pesan</button>
    </form>
</div>
@endsection