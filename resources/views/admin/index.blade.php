<!DOCTYPE html>
<html>
<head>
    <title>Admin Booking</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h3>Data Booking</h3>

    <table class="table table-bordered">
        <tr>
            <th>Nama</th>
            <th>Paket/Bus</th>
            <th>Tanggal</th>
            <th>Jumlah</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>

        @foreach($bookings as $b)
        <tr>
            <td>{{ $b->nama }}</td>
            <td>{{ $b->type }} (ID: {{ $b->item_id }})</td>
            <td>{{ $b->tanggal }}</td>
            <td>{{ $b->jumlah_orang }}</td>
            <td>
                <span class="badge bg-info">{{ $b->status }}</span>
            </td>
            <td>
                <a href="/admin/bookings/{{ $b->id }}/diproses" class="btn btn-warning btn-sm">Proses</a>
                <a href="/admin/bookings/{{ $b->id }}/selesai" class="btn btn-success btn-sm">Selesai</a>
            </td>
        </tr>
        @endforeach

    </table>
</div>

</body>
</html>