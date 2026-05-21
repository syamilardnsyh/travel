<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Travel & Tour</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <!-- Icon -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

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
        <img src="{{asset('admin/dist/img/logo.png')}}" width="60" class="me-2">
        <a class="navbar-brand fw-bold">Erlangga Tour & Travel</a>

        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navMenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navMenu">
            <div class="ms-auto d-flex align-items-center">

                <ul id="navMenuList" class="navbar-nav me-3 position-relative">
                    <li class="nav-item"><a class="nav-link active" href="/welcome">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#paket">Paket</a></li>
                    <li class="nav-item"><a class="nav-link" href="/tentang">Tentang</a></li>
                    <li class="nav-item"><a class="nav-link" href="#kontak">Kontak</a></li>
                    <span class="nav-indicator"></span>                  
                </ul>

                <div class="input-group me-3" style="width: 200px;">
                    <input type="text" class="form-control" placeholder="Cari...">
                    <span class="input-group-text bg-white">
                        <i class="bi bi-search"></i>
                    </span>
                </div>
                @auth
                @if(Auth::user()->role == 'admin' || Auth::user()->role == 'staff')
                    <a href="/dashboard" class="btn btn-success">Dashboard</a>
                    <a href="/logout" class="btn btn-success">Logout</a>

                @else
                <div class="dropdown profile-dropdown">
                    <button class="btn btn-light dropdown-toggle profile-btn"
                            data-bs-toggle="dropdown">
                        <i class="bi bi-person-circle me-1"></i>
                        {{ Auth::user()->name }}
                    </button>

                    <ul class="dropdown-menu dropdown-menu-end shadow border-0">
                        <li>
                            <a class="dropdown-item" href="/profile">
                                <i class="bi bi-person-circle me-2"></i>
                                Profil Saya
                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item" href="{{ route('riwayat-pesanan') }}">
                                <i class="bi bi-receipt me-2"></i>
                                Riwayat Pesanan
                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item" href="{{ route('pembayaran.saya') }}">
                                <i class="bi bi-wallet2 me-2"></i>
                                Pembayaran
                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item" href="{{ route('bantuan') }}">
                                <i class="bi bi-headset me-2"></i>
                                Bantuan
                            </a>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <a class="dropdown-item text-danger" href="/logout">
                                <i class="bi bi-box-arrow-right me-2"></i>
                                Logout
                            </a>
                        </li>
                    </ul>
                </div>
                @endif
                @endauth

                @guest
                <a href="/login" class="btn btn-outline-light">Login</a>
                <a href="/register" class="btn btn-warning">Register</a>
                @endguest
            </div>
        </div>
    </div>
</nav>

<!-- Hero -->
<section id="home" class="hero">
    <div class="container">
        <h1 class="display-4 fw-bold" data-aos="fade-up">Jelajahi Dunia Bersama Kami</h1>
        <p data-aos="fade-up" data-aos-delay="200">Liburan mudah, cepat, dan terpercaya</p>
        <a href="#paket" class="btn btn-warning mt-3">Mulai Sekarang</a>
    </div>
</section>

<!-- Keunggulan -->
<section class="py-5 text-center">
    <div class="container">
        <h2 class="mb-4 fw-bold">Kenapa Pilih Kami?</h2>
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

<!-- PAKET WISATA -->
<section id="paket" class="py-5 paket-section">
    <div class="container-fluid paket-container px-0">

        <!-- HEADER -->
        <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">
            <div>
                <h2 class="fw-bold paket-title">
                    Mau wisata kemana hari ini?
                </h2>

                <p class="text-muted mb-0">
                    Temukan destinasi terbaik dengan harga terjangkau
                </p>
            </div>

            <a href="#" class="btn btn-outline-primary rounded-pill px-4">
                Lihat Semua
            </a>
        </div>

        <!-- SWIPER -->
        <div class="swiper paketSwiper">
            <div class="swiper-wrapper">
                @foreach ($semua_paket as $paket)
               <div class="swiper-slide">
                        <div class="paket-card">

                            <!-- IMAGE -->
                            <img 
                                src="{{ asset('images/paket/' . $paket->gambar_paket) }}"
                                class="paket-image"
                                alt="{{ $paket->nama_paket }}">

                            <!-- OVERLAY -->
                            <div class="paket-overlay"></div>

                            <!-- CONTENT -->
                            <div class="paket-content">
                                <h3 class="paket-title">
                                    {{ $paket->nama_paket }}
                                </h3>
                                <a href="{{ route('detail', $paket->id) }}"
                                class="btn-paket">  
                                    Lihat paket
                                    <i class="bi bi-chevron-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- NAVIGATION -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>

        </div>
    </div>
</section>

 <section class="py-5 bg-light">
    <div class="container-fluid px-5">
        <h2 class="text-center mb-5 fw-bold">Pilihan Transportasi Bus</h2>

        <div class="row g-4">

            <!-- BUS 1 -->
            <div class="col-md-3">
                <div class="bus-card text-center">
                    <img src="{{ asset('admin/dist/img/bus1.png') }}" class="bus-img">

                    <h5 class="mt-3 fw-bold">Hiace Commuter</h5>
                    <p>Kapasitas 10 - 14 Orang</p>

                    <div class="bus-detail">
                        <p>✔ AC Full</p>
                        <p>✔ Reclining Seat</p>
                        <p>✔ Audio + Karaoke</p>
                        <p>✔ Driver Profesional</p>
                        <p>✔ BBM Include</p>
                    </div>

                    <div class="mt-3">
                        <small>Dalam Kota:</small>
                        <h6 class="fw-bold">Rp800.000</h6>

                        <small>Luar Kota:</small>
                        <h6 class="fw-bold">Rp1.200.000</h6>
                    </div>
                    @auth
                    <button onclick="bookingWA('Hiace Commuter','Dalam Kota: Rp 800.000 | Luar Kota: Rp 1.200.000')" class="btn btn-danger mt-3 w-100">Booking Sekarang</button>    
                    @endauth
                    @guest
                    <a href="/login" class="btn btn-warning w-100">Booking</a>
                    @endguest
                    
                </div>
            </div>

            <!-- BUS 2 -->
            <div class="col-md-3">
                <div class="bus-card text-center">
                    <img src="{{ asset('admin/dist/img/bus2.png') }}" class="bus-img">

                    <h5 class="mt-3 fw-bold">Bus Medium</h5>
                    <p>Kapasitas 25 - 30 Orang</p>

                    <div class="bus-detail">
                        <p>✔ AC</p>
                        <p>✔ Reclining Seat</p>
                        <p>✔ TV + Audio</p>
                        <p>✔ Charger USB</p>
                        <p>✔ Driver + BBM</p>
                    </div>

                    <div class="mt-3">
                        <small>Dalam Kota:</small>
                        <h6 class="fw-bold">Rp2.500.000</h6>

                        <small>Luar Kota:</small>
                        <h6 class="fw-bold">Rp3.500.000</h6>
                    </div>
                    @auth
                    <button onclick="bookingWA('Bus Medium','Dalam Kota: Rp 2.500.000 | Luar Kota: Rp 3.500.000')" class="btn btn-danger mt-3 w-100">Booking Sekarang</button>    
                    @endauth
                    @guest
                    <a href="/login" class="btn btn-warning w-100">Booking</a>
                    @endguest
                </div>
            </div>

            <!-- BUS 3 -->
            <div class="col-md-3">
                <div class="bus-card text-center">
                    <img src="{{asset('admin/dist/img/bus3.png')}}" class="bus-img">

                    <h5 class="mt-3 fw-bold">Big Bus Pariwisata</h5>
                    <p>Kapasitas 45 - 50 Orang</p>

                    <div class="bus-detail">
                        <p>✔ AC Full</p>
                        <p>✔ Reclining Seat</p>
                        <p>✔ TV + Karaoke</p>
                        <p>✔ Toilet (opsional)</p>
                        <p>✔ Driver + BBM</p>
                    </div>

                    <div class="mt-3">
                        <small>Dalam Kota:</small>
                        <h6 class="fw-bold">Rp3.500.000</h6>

                        <small>Luar Kota:</small>
                        <h6 class="fw-bold">Rp5.000.000</h6>
                    </div>
                    @auth
                    <button onclick="bookingWA('Big Bus Pariwisata','Dalam Kota: Rp 3.500.000 | Luar Kota: Rp 5.000.000')" class="btn btn-danger mt-3 w-100">Booking Sekarang</button>    
                    @endauth
                    @guest
                    <a href="/login" class="btn btn-warning w-100">Booking</a>
                    @endguest
                </div>
            </div>

            <!-- BUS 4 -->
            <div class="col-md-3">
                <div class="bus-card text-center">
                    <img src="{{ asset('admin/dist/img/bus4.png') }}" class="bus-img">

                    <h5 class="mt-3 fw-bold">Luxury Bus</h5>
                    <p>Kapasitas 40 - 55 Orang</p>

                    <div class="bus-detail">
                        <p>✔ AC Premium</p>
                        <p>✔ Sleeper Seat</p>
                        <p>✔ WiFi + TV</p>
                        <p>✔ Snack & Air Mineral</p>
                        <p>✔ Driver + BBM</p>
                    </div>

                    <div class="mt-3">
                        <small>Dalam Kota:</small>
                        <h6 class="fw-bold">Rp5.000.000</h6>

                        <small>Luar Kota:</small>
                        <h6 class="fw-bold">Rp7.000.000</h6>
                    </div>
                    @auth
                    <button onclick="bookingWA('Luxury Bus','Dalam Kota: Rp 5.000.000 | Luar Kota: Rp 7.000.000')" class="btn btn-danger mt-3 w-100">Booking Sekarang</button>    
                    @endauth
                    @guest
                    <a href="/login" class="btn btn-warning w-100">Booking</a>
                    @endguest
                </div>
            </div>

        </div>
    </div>
</section>

<!-- TESTIMONIAL -->
<section class="py-5 bg-light">
    <div class="container py-5">
        <h2 class="text-center fw-bold mb-5">Apa Kata Pelanggan Kami?</h2>

        <div class="testimonial-wrapper">
        <div class="swiper testimonialSwiper">
            <div class="swiper-wrapper">

                <!-- ITEM 1 -->
                <div class="swiper-slide">
                    <div class="testimonial-card text-center">
                        <img src="https://randomuser.me/api/portraits/men/32.jpg" class="testimonial-img">
                        <h5>Rizky Pratama</h5>
                        <small>Jakarta</small>
                        <div class="stars">★★★★★</div>
                        <p>"Pelayanan sangat memuaskan, perjalanan jadi lebih nyaman dan teratur!"</p>
                    </div>
                </div>

                <!-- ITEM 2 -->
                <div class="swiper-slide">
                    <div class="testimonial-card text-center">
                        <img src="https://randomuser.me/api/portraits/women/44.jpg" class="testimonial-img">
                        <h5>Siti Rahma</h5>
                        <small>Bandung</small>
                        <div class="stars">★★★★★</div>
                        <p>"Harga terjangkau tapi fasilitas lengkap, recommended banget!"</p>
                    </div>
                </div>

                <!-- ITEM 3 -->
                <div class="swiper-slide">
                    <div class="testimonial-card text-center">
                        <img src="https://randomuser.me/api/portraits/men/65.jpg" class="testimonial-img">
                        <h5>Andi Saputra</h5>
                        <small>Surabaya</small>
                        <div class="stars">★★★★★</div>
                        <p>"Admin fast response, booking mudah langsung ke WhatsApp."</p>
                    </div>
                </div>

                <!-- TAMBAHAN BIAR LOOP HALUS -->
                <div class="swiper-slide">
                    <div class="testimonial-card text-center">
                        <img src="https://randomuser.me/api/portraits/women/50.jpg" class="testimonial-img">
                        <h5>Dewi Lestari</h5>
                        <small>Yogyakarta</small>
                        <div class="stars">★★★★★</div>
                        <p>"Tour guide ramah dan profesional, perjalanan jadi menyenangkan."</p>
                    </div>
                </div>
                
                <div class="swiper-slide">
                    <div class="testimonial-card text-center">
                        <img src="https://i.pinimg.com/736x/a6/f1/91/a6f191c077d1c6737dbd97b2a7066208.jpg" class="testimonial-img">
                        <h5>Yanto</h5>
                        <small>Solo</small>
                        <div class="stars">★★★★★</div>
                        <p>"Sangat Mudah di jangkau, pelayanan terbaik!"</p>
                    </div>
            </div>
            <div class="swiper-slide">
                    <div class="testimonial-card text-center">
                        <img src="https://i.pinimg.com/736x/6b/a0/3c/6ba03cdbd6115e0ace705d1b8856e63a.jpg" class="testimonial-img">
                        <h5>Farid Jr</h5>
                        <small>Tangerang</small>
                        <div class="stars">★★★★★</div>
                        <p>"Website sangat mudah digunakan, pelayanan prima!"</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="newsletter-section text-white">
    <div class="container">
        <div class="row align-items-center">

            <!-- KIRI (TEXT) -->
            <div class="col-md-7" data-aos="fade-right">
                <h2 class="fw-bold">
                    Dapatkan info terbaru seputar tips perjalanan,
                    rekomendasi, serta promo.
                </h2>

                <div class="d-flex mt-4 newsletter-box">
                    <input type="email" class="form-control" placeholder="Alamat emailmu">
                    <button class="btn btn-warning ms-2">
                        Berlangganan
                    </button>
                </div>

                <p class="mt-3">
                    Semua pesanan dalam genggaman, selalu siap jalan-jalan.
                </p>
            </div>

            <!-- KANAN (IMAGE) -->
            <div class="col-md-5 text-center" data-aos="fade-left">
                <img src="{{ asset('admin/dist/img/phone.png') }}" 
                     class="img-fluid newsletter-img">
            </div>

        </div>
    </div>
</section>

<section id="kontak" class="py-5 bg-light">
    <div class="container">
        <h2 class="text-center fw-bold mb-5">Hubungi Kami</h2>

        <div class="row">

            <!-- FORM -->
            <div class="col-md-6">
                <form>
                    <div class="mb-3">
                        <label>Nama</label>
                        <input type="text" class="form-control" placeholder="Masukkan nama">
                    </div>

                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" class="form-control" placeholder="Masukkan email">
                    </div>

                    <div class="mb-3">
                        <label>Pesan</label>
                        <textarea class="form-control" rows="4" placeholder="Tulis pesan..."></textarea>
                    </div>

                    <button class="btn btn-warning w-100" onclick="kirimWA()">Kirim Pesan</button>
                </form>
            </div>

            <!-- INFO -->
            <div class="col-md-6">
                <h5 class="fw-bold">Erlangga Tour & Travel</h5>
                <p><i class="bi bi-geo-alt"></i> Tangerang, Indonesia</p>
                <p><i class="bi bi-whatsapp"></i> 0858-8241-8210</p>
                <p><i class="bi bi-envelope"></i> erlangga@gmail.com</p>

                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d247.9119190534424!2d106.465257586415!3d-6.185492784094582!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zNsKwMTEnMDcuNSJTIDEwNsKwMjcnNTQuOSJF!5e0!3m2!1sid!2sid!4v1776931214986!5m2!1sid!2sid"
                    width="100%" height="250" style="border:0; border-radius:10px;">
                </iframe>
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
                <h4 class="fw-bold">Erlangga Tour & Travel</h4>
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
            <small>&copy; 2026 PT. Erlangga Tour & Travel</small>
        </div>
    </div>
</footer>

<a href="https://wa.me/6281234567890" target="_blank" class="wa-float">
    <i class="bi bi-whatsapp"></i>
</a>

<!-- JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>
var paketSwiper = new Swiper(".paketSwiper", {

    loop: true,
    centeredSlides: false,
    grabCursor: true,

    slidesPerView: 1,
    spaceBetween: 25,

    speed: 1000,

    autoplay: {
        delay: 2500,
        disableOnInteraction: false,
        pauseOnMouseEnter: true,
    },

    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },

    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },

    breakpoints: {

        576: {
            slidesPerView: 1.3,
        },

        768: {
            slidesPerView: 2,
        },

        992: {
            slidesPerView: 3,
        },

        1200: {
            slidesPerView: 4,
        }
    }
});
</script>
<script>
var testimonialSwiper = new Swiper(".testimonialSwiper", {

    loop: true,
    grabCursor: true,
    centeredSlides: true,

    slidesPerView: 1,
    spaceBetween: 30,

    autoplay: {
        delay: 3000,
        disableOnInteraction: false,
    },

    breakpoints: {

        768: {
            slidesPerView: 2,
        },

        1200: {
            slidesPerView: 3,
        }
    }
});
</script>

<script>
function bookingWA(namaPaket, harga) {
    let nomor = "6285882418210"; // GANTI dengan nomor WA kamu (pakai 62)

    let pesan = `Halo Admin Erlangga Tour & Travel,
Saya tertarik dengan paket:

Paket: ${namaPaket}
Harga: ${harga}

Mohon info lebih lanjut ya`;

    let url = `https://wa.me/${nomor}?text=${encodeURIComponent(pesan)}`;

    window.open(url, '_blank');
}
function kirimWA() {
    let nama = document.querySelector("input[type='text']").value;
    let pesan = document.querySelector("textarea").value;

    let url = `https://wa.me/6285882418210?text=Halo, saya ${nama}. ${pesan}`;
    window.open(url, '_blank');
}
</script>
<script>
const links = document.querySelectorAll("#navMenuList .nav-link");
const indicator = document.querySelector(".nav-indicator");

let lastActive = null;

function moveIndicator(el) {
    const parent = el.parentElement.parentElement;
    const rect = el.getBoundingClientRect();
    const parentRect = parent.getBoundingClientRect();

    indicator.style.width = rect.width + "px";
    indicator.style.left = (rect.left - parentRect.left) + "px";
}

// CLICK NAV
links.forEach(link => {
    link.addEventListener("click", function () {
        links.forEach(l => l.classList.remove("active"));
        this.classList.add("active");

        moveIndicator(this);
    });
});

// SCROLL DETECT
const sections = document.querySelectorAll("section");

window.addEventListener("scroll", () => {
    let currentSection = null;

    sections.forEach(sec => {
        const offset = sec.offsetTop - 150;
        const height = sec.offsetHeight;

        if (window.scrollY >= offset && window.scrollY < offset + height) {
            currentSection = sec.getAttribute("id");
        }
    });

    if (currentSection) {
        const targetLink = document.querySelector(`.nav-link[href="#${currentSection}"]`);

        if (targetLink && targetLink !== lastActive) {
            links.forEach(l => l.classList.remove("active"));
            targetLink.classList.add("active");

            moveIndicator(targetLink);
            lastActive = targetLink;
        }
    }
});

// DEFAULT POSISI AWAL
window.addEventListener("load", () => {
    const active = document.querySelector(".nav-link.active");
    if (active) moveIndicator(active);
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