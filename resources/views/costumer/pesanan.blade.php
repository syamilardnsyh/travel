<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Pesanan</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background: #f4f7fb;
            font-family: 'Poppins', sans-serif;
        }

        .page-header{
            background: linear-gradient(135deg,#0d6efd,#2563eb);
            padding: 50px;
            border-radius: 25px;
            color: white;
            margin-bottom: 40px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        .page-header h1{
            font-weight: 700;
        }

        .history-card{
            background: white;
            border-radius: 22px;
            padding: 25px;
            margin-bottom: 25px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.06);
            transition: 0.3s;
            border: 1px solid #eef2f7;
        }

        .history-card:hover{
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0,0,0,0.08);
        }

        .paket-img{
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-radius: 18px;
        }

        .status-badge{
            padding: 10px 18px;
            border-radius: 50px;
            font-size: 13px;
            font-weight: 600;
        }

        .status-pending{
            background: #fff7ed;
            color: #ea580c;
        }

        .status-diterima{
            background: #ecfdf3;
            color: #16a34a;
        }

        .status-ditolak{
            background: #fef2f2;
            color: #dc2626;
        }

        .detail-item{
            margin-bottom: 12px;
        }

        .detail-label{
            color: #94a3b8;
            font-size: 14px;
        }

        .detail-value{
            font-weight: 600;
            font-size: 16px;
        }

        .btn-detail{
            border-radius: 12px;
            padding: 10px 18px;
            font-weight: 600;
        }

        .empty-box{
            background: white;
            border-radius: 25px;
            padding: 60px 30px;
            text-align: center;
            box-shadow: 0 8px 20px rgba(0,0,0,0.05);
        }

        .empty-box img{
            width: 180px;
            margin-bottom: 20px;
        }

    </style>
</head>
<body>
<div class="container py-5">

    <!-- HEADER -->
    <div class="page-header">
        <h1>Riwayat Pesanan</h1>
        <p class="mb-0">
            Lihat seluruh perjalanan dan status booking Anda.
        </p>
    </div>
    @forelse($pesanan as $item)
    <div class="history-card">
        <div class="row align-items-center">

            <!-- IMAGE -->
            <div class="col-md-4 mb-3 mb-md-0">
                <img 
                    src="{{ asset('images/paket/' . $item->paket->gambar_paket) }}"
                    class="paket-img">
            </div>

            <!-- DETAIL -->
            <div class="col-md-5">
                <h3 class="fw-bold mb-3">
                    {{ $item->paket->nama_paket }}
                </h3>
                <div class="detail-item">
                    <div class="detail-label">
                        Nama Pemesan
                    </div>

                    <div class="detail-value">
                        {{ $item->nama_pemesan }}
                    </div>
                </div>
                <div class="detail-item">
                    <div class="detail-label">
                        Jumlah Peserta
                    </div>
                    <div class="detail-value">
                        {{ $item->jumlah_orang }} Orang
                    </div>
                </div>
                <div class="detail-item">
                    <div class="detail-label">
                        Tanggal Keberangkatan
                    </div>
                    <div class="detail-value">
                        {{ $item->tanggal }}
                    </div>
                </div>
                <div class="detail-item">
                    <div class="detail-label">
                        Total Pembayaran
                    </div>
                    <div class="detail-value text-primary">
                        Rp {{ number_format($item->paket->harga * $item->jumlah_orang,0,',','.') }}
                    </div>
                </div>
            </div>

            <!-- STATUS -->
            <div class="col-md-3 text-center mt-4 mt-md-0">
                @if($item->status == 'pending')
                <div class="status pending">
                    ⏳ Menunggu Verifikasi Admin
                </div>
            @elseif($item->status == 'dikonfirmasi')
                <div class="status success">
                    ✅ Pesanan Dikonfirmasi
                </div>
            @elseif($item->status == 'ditolak')
                <div class="status danger">
                    ❌ Pesanan Ditolak
                </div>
            @else
                <div class="status upload">
                    📄 Belum Upload Bukti
                </div>
            @endif
                        </div>
                        <div>
                    <a href="/konfirmasi/{{ $item->id }}"
                    class="btn btn-primary btn-detail">
                        Detail Pesanan
                    </a>
                </div>
                    </div>
                </div>
                @empty
                <div class="empty-box">
                    <img src="https://cdn-icons-png.flaticon.com/512/7486/7486740.png">
                    <h3 class="fw-bold">
                        Belum Ada Pesanan
                    </h3>
                    <p class="text-muted">
                        Yuk mulai booking perjalanan impianmu sekarang.
                    </p>
                    <a href="/welcome" class="btn btn-primary px-4 py-2 rounded-pill">
                        Jelajahi Paket Wisata
                    </a>
                </div>
            </div>
        @endforelse
    </div>
</body>
</html>