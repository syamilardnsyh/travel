<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Tentang Kami - Erlangga Travel</title>

<!-- Font -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Icon -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

<!-- AOS -->
<link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">

@vite(['resources/css/apptentang.css'])

</head>
<body>

<!-- NAVBAR -->
<nav id="navbar" class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container-fluid px-5">
        <img src="{{ asset('admin/dist/img/logo.png') }}" width="60" class="me-2">
        <a class="navbar-brand fw-bold">Erlangga Tour & Travel</a>

        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navMenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navMenu">
            <div class="ms-auto d-flex align-items-center">

                <ul class="navbar-nav me-3">
                    <li class="nav-item"><a class="nav-link" href="/welcome">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="/welcome#paket">Paket</a></li>
                    <li class="nav-item"><a class="nav-link active" href="/tentang">Tentang</a></li>
                    <li class="nav-item"><a class="nav-link" href="/welcome#kontak">Kontak</a></li>
                </ul>
                    <span class="nav-indicator"></span>

                <@auth
                <span class="text-white me-3">Halo, {{ Auth::user()->name }}!</span>
                    <a href="/welcome" class="btn btn-success">Dashboard</a>
                    <a href="/logout" class="btn btn-success">Logout</a>
                @endauth

                @guest
                <a href="/login" class="btn btn-outline-light">Login</a>
                <a href="/register" class="btn btn-warning">Register</a>
                @endguest
            </div>
        </div>
    </div>
</nav>

<!-- HERO -->
<section id="home" class="hero">
    <div class="container">
        <div class="row align-items-center">

           <div class="col-md-6">
                <h1 class="display-4 mb-0 fw-bold">Tentang Kami</h1>
                <p class="mt-2">PT. ERLANGGA TOUR & TRAVEL</p>
            </div>
            <div class="col-md-6 text-md-end text-center">
                    <img src="/admin/dist/img/logo.png" alt="logo">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- VALUE -->
<section class="section text-center">
    <div class="container">
        <h2 class="section-title" data-aos="fade-up">Visi & Misi</h2>

        <div class="row text-start justify-content-center">

    <!-- VISI -->
    <div class="col-md-5 mb-4">
        <div class="card card-modern p-4 h-100">
            <div class="icon mb-3"><i class="bi bi-eye"></i></div>
            <h5>Visi</h5>
            <p>
                Menjadi perusahaan tour & travel terpercaya di Indonesia yang memberikan
                pengalaman perjalanan terbaik, aman, dan berkesan bagi setiap pelanggan.
            </p>
        </div>
    </div>

    <!-- MISI -->
    <div class="col-md-5 mb-4">
        <div class="card card-modern p-4 h-100">
            <div class="icon mb-3"><i class="bi bi-bullseye"></i></div>
            <h5>Misi</h5>
            <ul class="ps-3">
                <li>Menyediakan layanan perjalanan berkualitas tinggi</li>
                <li>Memberikan harga transparan dan kompetitif</li>
                <li>Mengutamakan kepuasan dan kenyamanan pelanggan</li>
                <li>Mengembangkan destinasi wisata lokal</li>
            </ul>
        </div>
    </div>
</div>
    </div>
</section>

<!-- STORY -->
<section class="section">
    <div class="container">
        <div class="row align-items-center">

            <div class="col-md-6" data-aos="fade-right">
                <h2 class="section-title">Cerita Kami</h2>
                <p>Kami berkembang dari travel kecil menjadi partner terpercaya ribuan pelanggan.</p>
            </div>

            <div class="col-md-6" data-aos="fade-left">
                <div class="stats text-center">
                    <div class="row">
                        <div class="col-6"><h2>500+</h2><p>Pelanggan</p></div>
                        <div class="col-6"><h2>120+</h2><p>Paket</p></div>
                        <div class="col-6"><h2>50+</h2><p>Destinasi</p></div>
                        <div class="col-6"><h2>5+</h2><p>Tahun</p></div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- TEAM --> 
 <section class="section-title team-section">
    <div class="overlay"></div>
<section class="section team text-center">
    <div class="container">
        <h2 class="section-title">Tim Profesional</h2>

        <!-- CEO -->
        <div class="row justify-content-center mb-5">
            <div class="col-md-3">
                <img src="{{ asset('admin/dist/img/Edi-Klimiz.jpeg') }}" width="130" class="rounded-circle">
                <h5 class="mt-3">Edi Klimiz</h5>
                <p class="section-subtitle text-murted">CEO</p>
            </div>
        </div>

        <!--TL -->
        <div class="row justify-content-center mb-5">
            <div class="col-md-3">
                <img src="{{ asset('admin/dist/img/Fauzi.jpeg') }}" width="120" class="rounded-circle">
                <h6 class="mt-3">Fauzi</h6>
                <p class="section-subtitle">Tour Leader</p>
            </div>
        </div>

        <!-- STAFF (3 ORANG) -->
        <div class="row justify-content-center">
            <div class="col-md-3">
                <img src="{{ asset('admin/dist/img/Erlangga.jpeg') }}" width="120" class="rounded-circle">
                <h6 class="mt-3">Erlangga</h6>
                <p class="section-subtitle">Dokumentasi 1</p>
            </div>

            <div class="col-md-3">
                <img src="{{ asset('admin/dist/img/Bashari.jpeg') }}" width="120" class="rounded-circle">
                <h6 class="mt-3">Bashari</h6>
                <p class="section-subtitle">Dokumentasi 2</p>
            </div>

            <div class="col-md-3">
                <img src="{{ asset('admin/dist/img/Ajililo.jpeg') }}" width="120" class="rounded-circle">
                <h6 class="mt-3">Ajililo</h6>
                <p class="section-subtitle">Dokumentasi 3</p>
            </div>
        </div>

    </div>
</section>
</section>
</section>

<!-- CTA -->
<section class="section">
    <div class="container">
        <div class="cta text-center" data-aos="zoom-in">
            <h2>Siap Liburan?</h2>
            <p>Mulai perjalanan terbaik bersama kami sekarang</p>
            <a href="/welcome#paket" class="btn btn-light">Lihat Paket</a>
        </div>
    </div>
</section>

<!-- FOOTER -->
<footer class="text-center py-4 bg-dark text-white">
    <small>&copy; 2026 Erlangga Travel</small>
</footer>

<!-- JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>

<script>
const links = document.querySelectorAll("#navMenuList .nav-link");
const indicator = document.querySelector(".nav-indicator");
const sections = document.querySelectorAll("section");

window.addEventListener("scroll", () => {
    let current = "";

    sections.forEach(sec => {
        const top = window.scrollY;
        const offset = sec.offsetTop - 100;
        const height = sec.offsetHeight;

        if (top >= offset && top < offset + height) {
            current = sec.getAttribute("id");
        }
    });

    links.forEach(link => {
        link.classList.remove("active");
        if (link.getAttribute("href") === "#" + current) {
            link.classList.add("active");
            moveIndicator(link);
        }
    });
});

function moveIndicator(el) {
    indicator.style.width = el.offsetWidth + "px";
    indicator.style.left = el.offsetLeft + "px";
}

// saat klik
links.forEach(link => {
    link.addEventListener("click", function () {
        links.forEach(l => l.classList.remove("active"));
        this.classList.add("active");

        moveIndicator(this);
    });
});

// set default (home)
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

// navbar scroll effect
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