<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bantuan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>

        body{
            background: #f4f7fb;
            font-family: 'Poppins', sans-serif;
        }

        .help-header{
            background: linear-gradient(135deg,#0d6efd,#3b82f6);
            color: white;
            padding: 60px 20px;
            border-radius: 0 0 30px 30px;
        }

        .help-card{
            border: none;
            border-radius: 20px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.08);
            transition: 0.3s;
        }

        .help-card:hover{
            transform: translateY(-5px);
        }

        .icon-help{
            width: 70px;
            height: 70px;
            background: #eef4ff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            color: #0d6efd;
            margin: auto;
            margin-bottom: 15px;
        }

        .faq-item{
            border-radius: 15px;
            overflow: hidden;
            margin-bottom: 15px;
        }

        .btn-wa{
            background: #25D366;
            color: white;
            border-radius: 12px;
            padding: 12px;
            font-weight: 600;
            text-decoration: none;
            display: inline-block;
        }

        .btn-wa:hover{
            background: #1ebe5d;
            color: white;
        }
    </style>
</head>
<body>

<div class="help-header text-center">
    <h1 class="fw-bold">Pusat Bantuan</h1>
    <p class="mb-0">
        Kami siap membantu kebutuhan perjalanan Anda
    </p>
</div>

<div class="container py-5">
    <div class="row g-4 mb-5">
        <!-- CARD 1 -->
        <div class="col-md-4">
            <div class="card help-card p-4 text-center h-100">
                <div class="icon-help">
                    📦
                </div>
                <a href="/riwayat-pesanan" class="stretched-link"></a>
                <h5 class="fw-bold">
                    Status Pesanan
                </h5>
                <p class="text-muted">
                        Cek status booking dan pembayaran Anda.
                </p>
            </div>
        </div>

        <!-- CARD 2 -->
        <div class="col-md-4">
            <div class="card help-card p-4 text-center h-100">
                <div class="icon-help">
                    💳
                </div>
                <a href="/pembayaran.saya" class="stretched-link"></a>
                <h5 class="fw-bold">
                    Pembayaran
                </h5>
                <p class="text-muted">
                    Bantuan terkait transfer dan upload bukti pembayaran.
                </p>
            </div>
        </div>

        <!-- CARD 3 -->
        <div class="col-md-4">
            <div class="card help-card p-4 text-center h-100">
                <div class="icon-help">
                    ☎️
                </div>
                <a href="https://wa.me/6285882418210"
                   target="_blank"
                   class="stretched-link"></a>
                <h5 class="fw-bold">
                    Hubungi Admin
                </h5>
                <p class="text-muted">
                    Customer service siap membantu Anda.
                </p>
            </div>
        </div>
    </div>

    <!-- FAQ -->
    <h3 class="fw-bold mb-4">
        Frequently Asked Questions
    </h3>

    <div class="accordion" id="faqAccordion">
        <div class="accordion-item faq-item">
            <h2 class="accordion-header">
                <button class="accordion-button"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#faq1">
                    Bagaimana cara booking paket wisata?
                </button>
            </h2>

            <div id="faq1"
                 class="accordion-collapse collapse show">
                <div class="accordion-body">
                    Pilih paket wisata, isi data pemesan,
                    lalu lakukan pembayaran.
                </div>
            </div>
        </div>

        <div class="accordion-item faq-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#faq2">
                    Bagaimana cara upload bukti pembayaran?
                </button>
            </h2>

            <div id="faq2"
                 class="accordion-collapse collapse">
                <div class="accordion-body">
                    Setelah booking berhasil,
                    buka menu pembayaran lalu upload bukti transfer.
                </div>
            </div>
        </div>

        <div class="accordion-item faq-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#faq3">
                    Berapa lama verifikasi pembayaran?
                </button>
            </h2>

            <div id="faq3"
                 class="accordion-collapse collapse">
                <div class="accordion-body">
                    Maksimal 1x24 jam setelah bukti pembayaran dikirim.
                </div>
            </div>
        </div>
    </div>

    <!-- WA -->
    <div class="text-center mt-5">
        <h4 class="fw-bold mb-3">
            Masih butuh bantuan?
        </h4>
        <a href="https://wa.me/6285882418210"
           target="_blank"
           class="btn-wa">
            Chat WhatsApp Admin
        </a>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>