@extends('layouts.customer')

@section('content')
<div class="container">
    <h2>Buat Pesanan</h2>

    <form method="POST" action="{{ route('order.store') }}">
        @csrf

        <label>Layanan</label>
        <select name="service_id" class="form-control">
            @foreach($services as $service)
                <option value="{{ $service->id }}">{{ $service->name }}</option>
            @endforeach
        </select>

        <label>Jadwal</label>
        <input type="datetime-local" name="schedule" class="form-control">

        <button type="submit" class="btn btn-primary mt-3">Pesan</button>
    </form>
</div>
@endsection
