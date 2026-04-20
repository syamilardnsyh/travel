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

                <a href="/login" class="btn btn-outline-light me-2">Login</a>
                <a href="/register" class="btn btn-warning">Register</a>
            </div>
        </div>
    </div>
</nav>

<!-- HERO -->
<section class="hero">
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
<section class="section team text-center">
    <div class="container">
        <h2 class="section-title">Tim Profesional</h2>

        <!-- CEO -->
        <div class="row justify-content-center mb-5">
            <div class="col-md-3">
                <img src="https://randomuser.me/api/portraits/men/32.jpg" width="130" class="rounded-circle">
                <h5 class="mt-3">Andi Pratama</h5>
                <p class="text-muted">CEO</p>
            </div>
        </div>

        <!-- MANAGER -->
        <div class="row justify-content-center mb-5">
            <div class="col-md-3">
                <img src="https://randomuser.me/api/portraits/women/44.jpg" width="130" class="rounded-circle">
                <h5 class="mt-3">Siti Rahma</h5>
                <p class="text-muted">Manager Operasional</p>
            </div>
        </div>

        <!-- STAFF (3 ORANG) -->
        <div class="row justify-content-center">
            <div class="col-md-3">
                <img src="https://randomuser.me/api/portraits/men/65.jpg" width="120" class="rounded-circle">
                <h6 class="mt-3">Budi Santoso</h6>
                <p class="text-muted">Tour Guide</p>
            </div>

            <div class="col-md-3">
                <img src="https://randomuser.me/api/portraits/women/68.jpg" width="120" class="rounded-circle">
                <h6 class="mt-3">Dewi Lestari</h6>
                <p class="text-muted">Customer Service</p>
            </div>

            <div class="col-md-3">
                <img src="https://randomuser.me/api/portraits/men/75.jpg" width="120" class="rounded-circle">
                <h6 class="mt-3">Rizky Saputra</h6>
                <p class="text-muted">Marketing</p>
            </div>
        </div>

    </div>
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