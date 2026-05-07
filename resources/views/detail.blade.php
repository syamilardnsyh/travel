<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Detail Paket</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background:#f5f5f5;
        }

        .detail-card{
            background:white;
            border-radius:20px;
            padding:30px;
            box-shadow:0 5px 20px rgba(0,0,0,0.1);
        }

        .paket-img{
            width:100%;
            height:400px;
            object-fit:cover;
            border-radius:15px;
        }

        .booking-box{
            background:#f8f9fa;
            padding:25px;
            border-radius:20px;
        }

        .harga-card{
            border:1px solid #ddd;
            border-radius:15px;
            padding:20px;
            margin-bottom:15px;
        }
    </style>
</head>
<body>

<div class="container py-5">

    <div class="detail-card">

        <div class="row">

            <!-- KIRI -->
            <div class="col-md-7">

                <img src="{{ asset('images/paket/' . $paket->gambar_paket) }}"
                     class="paket-img">

                <h2 class="mt-4 fw-bold">
                    {{ $paket->nama_paket }}
                </h2>

                <p class="text-muted">
                    {{ $paket->destinasi }}
                </p>

                <hr>

                <div class="row">

                    <div class="col-md-4">
                        <h6>Durasi</h6>
                        <p>{{ $paket->durasi }}</p>
                    </div>

                    <div class="col-md-4">
                        <h6>Harga</h6>
                        <p>
                            Rp {{ number_format($paket->harga,0,',','.') }}
                        </p>
                    </div>

                    <div class="col-md-4">
                        <h6>Kategori</h6>
                        <p>Wisata</p>
                    </div>

                </div>

                <hr>

                <h4 class="fw-bold">
                    Deskripsi Paket
                </h4>

                <p>
                    {{ $paket->deskripsi }}
                </p>

                <hr>

                <h4 class="fw-bold">
                    Itinerary Perjalanan
                </h4>

                <ul>
                    <li>Hari 1 - Keberangkatan</li>
                    <li>Hari 2 - Wisata Utama</li>
                    <li>Hari 3 - Oleh-oleh & Pulang</li>
                </ul>

            </div>

            <!-- KANAN -->
            <div class="col-md-5">

                <div class="booking-box">

                    <h4 class="fw-bold mb-4">
                        Form Booking
                    </h4>

                    <form action="/booking/store" method="POST">
                        @csrf

                        <input type="hidden"
                               name="paket_id"
                               value="{{ $paket->id }}">

                        <div class="mb-3">
                            <label>Nama Lengkap</label>

                            <input type="text"
                                   name="nama"
                                   class="form-control"
                                   required>
                        </div>

                        <div class="mb-3">
                            <label>No Whatsapp</label>

                            <input type="text"
                                   name="whatsapp"
                                   class="form-control"
                                   required>
                        </div>

                        <div class="mb-3">
                            <label>Tanggal Keberangkatan</label>

                            <input type="date"
                                   name="tanggal"
                                   class="form-control"
                                   required>
                        </div>

                        <div class="mb-3">
                            <label>Jumlah Peserta</label>

                            <input type="number"
                                   name="jumlah"
                                   class="form-control"
                                   min="1"
                                   value="1">
                        </div>

                        <div class="harga-card">

                            <h5 class="fw-bold">
                                Total Harga
                            </h5>

                            <h3 class="text-success">
                                Rp {{ number_format($paket->harga,0,',','.') }}
                            </h3>

                        </div>

                        <button class="btn btn-warning w-100">
                            Booking Sekarang
                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>