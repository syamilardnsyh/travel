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

    <!-- CDN Swiper -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    
     @vite(['resources/css/app.css'])
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
                    <li class="nav-item"><a class="nav-link active" href="/welcome">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#paket">Paket</a></li>
                    <li class="nav-item"><a class="nav-link" href="#tentang">Tentang</a></li>
                    <li class="nav-item"><a class="nav-link" href="#kontak">Kontak</a></li>
                </ul>

                <div class="input-group me-3" style="width: 200px;">
                    <input type="text" class="form-control" placeholder="Cari...">
                    <span class="input-group-text bg-white">
                        <i class="bi bi-search"></i>
                    </span>
                </div>

                <a href="/login" class="btn btn-outline-light">Login</a>
                <a href="/register" class="btn btn-warning">Register</a>
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
    <div class="container-fluid px-5 position-relative">
        <h2 class="text-center mb-4">Paket Wisata Populer</h2>

        <!-- SWIPER -->
      <div class="swiper mySwiper">
    <div class="swiper-wrapper">

        <div class="swiper-slide">
            <div class="card tour-card shadow" onclick="toggleDetail(this)">
        
        <img src="https://i.pinimg.com/1200x/e2/06/85/e2068566c5245a9eb832e9c82945e166.jpg" class="card-img-top">

        <div class="card-body">
            <h5><b>Bali Tour</b></h5>
            <p>5 Hari 4 Malam</p>
            <p><strong>Rp 1.500.000</strong></p>
        </div>

        <div class="card-detail">
            <p>✔ Hotel Bintang 3</p>
            <p>✔ Transportasi</p>
            <p>✔ Tour Guide</p>
            <button class="btn btn-warning w-100">Booking</button>
        </div>

            </div>
        </div>

        <div class="swiper-slide">
            <div class="card tour-card shadow" onclick="toggleDetail(this)">
                <img src="https://images.unsplash.com/photo-1526778548025-fa2f459cd5c1" class="card-img-top">
                <div class="card-body">
                    <h5><b>Lombok Trip</b></h5>
                    <p>3 Hari 2 Malam</p>
                    <p><strong>Rp 1.200.000</strong></p>
                </div>
                <div class="card-detail">
                    <p>✔ Hotel Bintang 3</p>
                    <p>✔ Transportasi</p>
                    <p>✔ Tour Guide</p>
                    <button class="btn btn-warning w-100">Booking</button>
                </div>

            </div>
        </div>

        <div class="swiper-slide">
            <div class="card tour-card shadow" onclick="toggleDetail(this)">
                <img src="https://images.unsplash.com/photo-1500530855697-b586d89ba3ee" class="card-img-top">
                <div class="card-body">
                    <h5><b>Bandung Tour</b></h5>
                    <p>1 Hari</p>
                    <p><strong>Rp 500.000</strong></p>
                </div>
                <div class="card-detail">
                    <p>✔ Hotel Bintang 3</p>
                    <p>✔ Transportasi</p>
                    <p>✔ Tour Guide</p>
                    <button class="btn btn-warning w-100">Booking</button>
                </div>

            </div>
        </div>

        <div class="swiper-slide">
                    <div class="card tour-card shadow" onclick="toggleDetail(this)">
                        <img src="https://images.unsplash.com/photo-1518684079-3c830dcef090" class="card-img-top">
                        <div class="card-body">
                            <h5><b>Jogja Trip</b></h5>
                            <p>3 Hari 2 Malam</p>
                            <p><strong>Rp 1.000.000</strong></p>
                        </div>
                         <div class="card-detail">
                            <p>✔ Hotel Bintang 3</p>
                            <p>✔ Transportasi</p>
                            <p>✔ Tour Guide</p>
                            <button class="btn btn-warning w-100">Booking</button>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="card tour-card shadow" onclick="toggleDetail(this)">
                        <img src="https://images.unsplash.com/photo-1518684079-3c830dcef090" class="card-img-top">
                        <div class="card-body">
                            <h5><b>Jogja Trip</b></h5>
                            <p>3 Hari 2 Malam</p>
                            <p><strong>Rp 1.000.000</strong></p>
                        </div>
                         <div class="card-detail">
                            <p>✔ Hotel Bintang 3</p>
                            <p>✔ Transportasi</p>
                            <p>✔ Tour Guide</p>
                            <button class="btn btn-warning w-100">Booking</button>
                        </div>
                    </div>
                </div>
            </div>

            <section class="py-5">
    <div class="container-fluid px-5">
        <h2 class="text-center mb-4">Pilihan Transportasi Bus</h2>

        <div class="row">

            <div class="col-md-4">
                <div class="card shadow">
                    <div class="card-body">
                        <h5>Bus Ekonomi</h5>
                        <p>AC, kapasitas 40 orang</p>
                        <p><strong>Rp 2.000.000 / hari</strong></p>
                        <button class="btn btn-outline-primary w-100">Pilih</button>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow">
                    <div class="card-body">
                        <h5>Bus Medium</h5>
                        <p>AC + Reclining Seat</p>
                        <p><strong>Rp 3.500.000 / hari</strong></p>
                        <button class="btn btn-outline-primary w-100">Pilih</button>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow">
                    <div class="card-body">
                        <h5>Bus Luxury</h5>
                        <p>WiFi, TV, Recliner Seat</p>
                        <p><strong>Rp 5.000.000 / hari</strong></p>
                        <button class="btn btn-outline-primary w-100">Pilih</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

    <!-- tombol -->
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
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
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>
var swiper = new Swiper(".mySwiper", {
    slidesPerView: 3,
    spaceBetween: 20,
    loop: true,
    centeredSlides: true,
    speed: 800,

    // supaya bisa drag manual
    allowTouchMove: true,
    grabCursor: true,
    simulateTouch: true,

    // nonaktif autoplay:false kalo mau geser manual
    autoplay: {
    delay: 1000,
        disableOnInteraction: true,
        pauseOnMouseEnter: true, 
    },

    speed: 1000,
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },

    breakpoints: {
        768: { slidesPerView: 2 },
        1024: { slidesPerView: 3 }
    }
});
</script>
<script>
const swiperEl = document.querySelector(".mySwiper");

swiperEl.addEventListener("mouseenter", () => {
    swiper.autoplay.stop();
});

swiperEl.addEventListener("mouseleave", () => {
    swiper.autoplay.start();
});
</script>
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