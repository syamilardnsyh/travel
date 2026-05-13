<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Pembayaran</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background: #f4f7fb;
            font-family: 'Segoe UI', sans-serif;
        }

        .card-konfirmasi{
            border: none;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 8px 25px rgba(0,0,0,0.08);
        }

        .header-konfirmasi{
            background: linear-gradient(135deg,#0d6efd,#3b82f6);
            color: white;
            padding: 30px;
        }

        .bank-card{
            border: 1px solid #e5e7eb;
            border-radius: 15px;
            padding: 15px;
            margin-bottom: 15px;
            transition: 0.3s;
        }

        .bank-card:hover{
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
        }

        .btn-upload{
            background: #0d6efd;
            border: none;
            padding: 12px;
            border-radius: 12px;
            font-weight: 600;
        }

        .btn-upload:hover{
            background: #0b5ed7;
        }

        .total-box{
            background: #eef4ff;
            border-radius: 15px;
            padding: 20px;
        }

        .success-alert{
            border-radius: 12px;
        }
    </style>
</head>
<body>

<div class="container py-5">

    <div class="row justify-content-center">
        <div class="col-lg-8">

            <div class="card card-konfirmasi">

                <div class="header-konfirmasi">
                    <h2 class="fw-bold mb-2">Konfirmasi Pembayaran</h2>
                    <p class="mb-0">
                        Silakan lakukan pembayaran sesuai total tagihan berikut.
                    </p>
                </div>

                <div class="card-body p-4">

                    @if(session('success'))
                        <div class="alert alert-success success-alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="row mb-4">

                        <div class="col-md-6 mb-3">
                            <label class="text-muted">Paket Wisata</label>
                            <h5 class="fw-bold">
                                {{ $pesanan->paket->nama_paket }}
                            </h5>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="text-muted">Nama Pemesan</label>
                            <h5 class="fw-bold">
                                {{ $pesanan->nama_pemesan }}
                            </h5>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="text-muted">Jumlah Peserta</label>
                            <h5 class="fw-bold">
                                {{ $pesanan->jumlah_orang }} Orang
                            </h5>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="text-muted">Tanggal Keberangkatan</label>
                            <h5 class="fw-bold">
                                {{ $pesanan->tanggal }}
                            </h5>
                        </div>

                    </div>

                    <div class="total-box mb-4">
                        <label class="text-muted">Total Pembayaran</label>

                        <h1 class="fw-bold text-primary">
                            Rp {{ number_format($pesanan->harga,0,',','.') }}
                        </h1>
                    </div>

                    <h5 class="fw-bold mb-3">
                        Pilih Metode Pembayaran
                    </h5>

                    <div class="bank-card">
                        <h6 class="fw-bold mb-1">BANK BCA</h6>
                        <span>1234567890 a/n Erlangga Tour</span>
                    </div>

                    <div class="bank-card">
                        <h6 class="fw-bold mb-1">BANK MANDIRI</h6>
                        <span>9876543210 a/n Erlangga Tour</span>
                    </div>

                    <form action="{{ route('upload.bukti', $pesanan->id) }}"
                          method="POST"
                          enctype="multipart/form-data">

                        @csrf

                        <div class="mb-3">
                            <label class="form-label fw-semibold">
                                Metode Pembayaran
                            </label>

                            <select name="metode_pembayaran"
                                    class="form-select"
                                    required>

                                <option value="">-- Pilih Bank --</option>
                                <option value="BCA">BCA</option>
                                <option value="Mandiri">Mandiri</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-semibold">
                                Upload Bukti Pembayaran
                            </label>

                            <input type="file"
                                   name="bukti_pembayaran"
                                   class="form-control"
                                   required>
                        </div>

                        <button type="submit"
                                class="btn btn-primary btn-upload w-100">

                            Upload Bukti Pembayaran

                        </button>

                    </form>

                </div>

            </div>

        </div>
    </div>

</div>

</body>
</html>