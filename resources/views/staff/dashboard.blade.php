<h2>Daftar Order Masuk</h2>

<table border="1" cellpadding="8">
    <tr>
        <th>Customer</th>
        <th>Layanan</th>
        <th>Tanggal</th>
        <th>Alamat</th>
        <th>Status</th>
        <th>Aksi</th>
    </tr>

    @foreach($orders as $order)
    <tr>
        <td>{{ $order->user->name }}</td>
        <td>{{ $order->layanan }}</td>
        <td>{{ $order->tanggal }}</td>
        <td>{{ $order->alamat }}</td>
        <td>{{ $order->status }}</td>
        <td>
            @if($order->status == 'pending')
                <form action="{{ route('order.accept', $order->id) }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit">Terima</button>
                </form>

                <form action="{{ route('order.reject', $order->id) }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit">Tolak</button>
                </form>
            @else
                {{ $order->status }}
            @endif
        </td>
    </tr>
    @endforeach
</table>
