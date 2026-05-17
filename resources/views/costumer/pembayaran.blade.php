<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pembayaran</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background:#f4f7fb;">

<div class="container py-5">

    <div class="card border-0 shadow rounded-4">

        <div class="card-body p-4">

            <h3 class="fw-bold mb-4">
                Data Pembayaran
            </h3>

            @foreach($pesanan as $item)

            <div class="border rounded-4 p-3 mb-3 bg-light">

                <div class="d-flex justify-content-between align-items-center">

                    <div>
                        <h5 class="fw-bold mb-1">
                            {{ $item->paket->nama_paket }}
                        </h5>

                        <small class="text-muted">
                            {{ $item->tanggal }}
                        </small>
                    </div>

                    <div>
                        <h5 class="text-primary fw-bold">
                            Rp {{ number_format($item->paket->harga * $item->jumlah_orang,0,',','.') }}
                        </h5>
                    </div>

                </div>

            </div>

            @endforeach

        </div>

    </div>

</div>

</body>
</html>