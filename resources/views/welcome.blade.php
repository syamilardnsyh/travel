<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Travel & Tour</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Icon -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <!-- AOS -->
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">

    <style>
        body { font-family: 'Poppins', sans-serif; }

        .navbar {
            transition: 0.4s;
            background: transparent;
        }

        .navbar.scrolled {
            background: #000 !important;
            box-shadow: 0 2px 10px rgba(0,0,0,0.3);
        }

        .nav-link:hover {
            color: orange !important;
        }

        .hero {
            background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)),
                        url('https://images.unsplash.com/photo-1507525428034-b723cf961d3e');
            background-size: cover;
            height: 90vh;
            color: white;
            display: flex;
            align-items: center;
            text-align: center;
        }

        .tour-card {
            overflow: hidden;
            position: relative;
            transition: 0.3s;
        }

        .card-detail {
            position: absolute;
            bottom: -200px;
            left: 0;
            width: 100%;
            background: white;
            padding: 15px;
            transition: 0.4s;
            min-height: 150px;
        }
        .card-img-top {
            width: 100%;
            height: 220px;      /* atur tinggi seragam */
            object-fit: cover;  /* biar tidak gepeng */
        }

        .tour-card:hover .card-detail {
            bottom: 0;
        }

        .tour-card:hover {
            transform: translateY(-10px);
        }

        html { scroll-behavior: smooth; }

        .icon-box {
            font-size: 40px;
            color: orange;
        }

        .testimonial {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
        }
        
        section h5 {
            margin-bottom: 15px;
        }

        section p {
            font-size: 14px;
            color: #ddd;
        }

        section i {
            margin-right: 8px;
            color: orange;
        }

        .contact-section {
            background: linear-gradient(to right, #000000, rgb(19, 18, 1));
            border-top: 2px solid #eee;
        }

        .map-container iframe {
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        }

        .contact-section h3 {
            font-weight: 600;
        }

        .contact-section::before {
            content: "";
            display: block;
            width: 80px;
            height: 4px;
            background: orange;
            margin-bottom: 20px;
        }
        
        .promo-section {
            background: url('https://images.unsplash.com/photo-1501785888041-af3ef285b470') center/cover;
            position: relative;
        }

        .promo-section::before {
            content: "";
            position: absolute;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.6);
            top: 0;
            left: 0;
        }

        .promo-section .container-fluid {
            position: relative;
            z-index: 2;
        }

        .footer-custom {
            background: #0b2c5a;
        }

        .footer-custom h5 {
            margin-bottom: 15px;
        }

        .footer-custom ul li {
            margin-bottom: 8px;
            cursor: pointer;
        }

        .footer-custom ul li:hover {
            color: orange;
        }

        .navbar .nav-link { margin-right: 10px; }
        .navbar .btn { margin-left: 5px; }
        .navbar-brand { margin-right: 30px; }
        .navbar .ms-auto {margin-left: auto !important;}
        .navbar { padding-left: 20px; padding-right: 20px;}
        .navbar .input-group {max-width: 220px;}
    </style>
</head>

<body>

<!-- Navbar -->
<nav id="navbar" class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container-fluid px-5">
        <a class="navbar-brand fw-bold">Erlangga Tour & Travel</a>

        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navMenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navMenu">
            <div class="ms-auto d-flex align-items-center">

                <ul class="navbar-nav me-3">
                    <li class="nav-item"><a class="nav-link active" href="#">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#paket">Paket</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Tentang</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Kontak</a></li>
                </ul>

                <div class="input-group me-3" style="width: 200px;">
                    <input type="text" class="form-control" placeholder="Cari...">
                    <span class="input-group-text bg-white">
                        <i class="bi bi-search"></i>
                    </span>
                </div>

                <a href="#" class="btn btn-outline-light">Login</a>
                <a href="#" class="btn btn-warning">Register</a>
            </div>
        </div>
    </div>
</nav>

<!-- Hero -->
<section class="hero">
    <div class="container">
        <h1 class="display-4 fw-bold" data-aos="fade-up">Jelajahi Dunia Bersama Kami</h1>
        <p data-aos="fade-up" data-aos-delay="200">Liburan mudah, cepat, dan terpercaya</p>
        <a href="#paket" class="btn btn-warning mt-3">Mulai Sekarang</a>
    </div>
</section>

<!-- Keunggulan -->
<section class="py-5 text-center">
    <div class="container">
        <h2 class="mb-4">Kenapa Pilih Kami?</h2>
        <div class="row">
            <div class="col-md-4" data-aos="zoom-in">
                <div class="icon-box"><i class="bi bi-globe"></i></div>
                <h5>Destinasi Lengkap</h5>
                <p>Banyak pilihan wisata menarik</p>
            </div>
            <div class="col-md-4" data-aos="zoom-in">
                <div class="icon-box"><i class="bi bi-cash"></i></div>
                <h5>Harga Terjangkau</h5>
                <p>Paket hemat & berkualitas</p>
            </div>
            <div class="col-md-4" data-aos="zoom-in">
                <div class="icon-box"><i class="bi bi-star"></i></div>
                <h5>Pelayanan Terbaik</h5>
                <p>Customer service 24 jam</p>
            </div>
        </div>
    </div>
</section>

<!-- Paket -->
<section id="paket" class="py-5 bg-light">
    <div class="container">
        <h2 class="text-center mb-4 fw-bold">Paket Wisata Populer</h2>
        <div class="row">

            <!-- Card -->
            <div class="col-md-4" data-aos="fade-up">
                <div class="card tour-card shadow">
                    <img src="https://i.pinimg.com/1200x/6d/51/fa/6d51fa90807d982f6ded222a04e3558f.jpg" class="card-img-top">
                    <div class="card-body">
                        <h5>Bali Tour</h5>
                        <p>5 Hari 4 Malam</p>
                        <p><strong>Rp 1.500.000</strong></p>
                    </div>
                    <div class="card-detail">
                        <p>✔ Hotel</p>
                        <p>✔ Transportasi</p>
                        <p>✔ Guide</p>
                        <button class="btn btn-warning w-100">Booking</button>
                    </div>
                </div>
            </div>

            <div class="col-md-4" data-aos="fade-up">
                <div class="card tour-card shadow">
                    <img src="https://i.pinimg.com/1200x/d4/22/8f/d4228fb2dd84655e299f5450054036c3.jpg" class="card-img-top">
                    <div class="card-body">
                        <h5>Jogja Trip</h5>
                        <p>3 Hari 2 Malam</p>
                        <p><strong>Rp 1.000.000</strong></p>
                    </div>
                    <div class="card-detail">
                        <p>✔ Hotel</p>
                        <p>✔ Transportasi</p>
                        <p>✔ Guide</p>
                        <button class="btn btn-warning w-100">Booking</button>
                    </div>
                </div>
            </div>

            <div class="col-md-4" data-aos="fade-up">
                <div class="card tour-card shadow">
                    <img src="https://i.pinimg.com/1200x/49/0a/ed/490aedadacd1623e4a4a8125c1c98ecb.jpg" class="card-img-top">
                    <div class="card-body">
                        <h5>Bandung Tour</h5>
                        <p>1 Hari</p>
                        <p><strong>Rp 500.000</strong></p>
                    </div>
                    <div class="card-detail">
                        <p>✔ Transportasi</p>
                        <p>✔ Tiket Wisata</p>
                        <p>✔ Guide</p>
                        <button class="btn btn-warning w-100">Booking</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Kontak & Lokasi -->
<section class="promo-section text-white">
    <div class="container-fluid px-5 py-5">
        <div class="row align-items-center">

            <!-- Kiri (HP Image) -->
            <div class="col-md-4 text-center">
                <img src="https://i.imgur.com/3ZQ3Z6k.png" width="250">
            </div>

            <!-- Tengah (Text + Input) -->
            <div class="col-md-5">
                <h2 class="fw-bold mb-3">
                    Dapatkan info terbaru seputar tips perjalanan,
                    rekomendasi, serta promo.
                </h2>

                <div class="d-flex">
                    <input type="email" class="form-control me-2" placeholder="Alamat emailmu">
                    <button class="btn btn-warning">Berlangganan</button>
                </div>

                <p class="mt-4">
                    Semua pesanan dalam genggaman, selalu siap jalan-jalan.
                </p>

                <img src="https://upload.wikimedia.org/wikipedia/commons/7/78/Google_Play_Store_badge_EN.svg" width="120">
                <img src="https://developer.apple.com/assets/elements/badges/download-on-the-app-store.svg" width="120">
            </div>

        </div>
    </div>
</section>

<!-- Footer -->
<footer class="footer-custom text-white">
    <div class="container-fluid px-5 py-5">
        <div class="row">

            <!-- Logo -->
            <div class="col-md-3">
                <h3 class="fw-bold">Erlangga Travel</h3>
                <p>Partner perjalanan terpercaya Anda</p>

                <button class="btn btn-primary mt-3">
                    Jadi Partner
                </button>
            </div>

            <!-- Tentang -->
            <div class="col-md-3">
                <h5>Tentang</h5>
                <ul class="list-unstyled">
                    <li>Cara Pesan</li>
                    <li>Hubungi Kami</li>
                    <li>Pusat Bantuan</li>
                    <li>Karier</li>
                </ul>
            </div>

            <!-- Produk -->
            <div class="col-md-3">
                <h5>Produk</h5>
                <ul class="list-unstyled">
                    <li>Hotel</li>
                    <li>Sewa Bus</li>
                    <li>Paket Perjalanan Religi</li>
                    <li>Paket Wisata</li>
                </ul>
            </div>

            <!-- Lainnya -->
            <div class="col-md-3">
                <h5>Lainnya</h5>
                <ul class="list-unstyled">
                    <li>Affiliate</li>
                    <li>Blog</li>
                    <li>Privasi</li>
                    <li>Syarat & Ketentuan</li>
                </ul>
            </div>

        </div>

        <hr class="mt-4">

        <div class="text-center">
            <small>&copy; 2026 Erlangga Tour & Travel</small>
        </div>
    </div>
</footer>

<!-- JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>

<script>
AOS.init({
    duration: 1000,
    once: false,
    mirror: true
});

window.addEventListener("scroll", function() {
    let navbar = document.getElementById("navbar");
    if (window.scrollY > 50) {
        navbar.classList.add("scrolled");
    } else {
        navbar.classList.remove("scrolled");
    }
});
</script>

</body>
</html>