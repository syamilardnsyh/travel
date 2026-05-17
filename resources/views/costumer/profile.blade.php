<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Profile</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<style>

body{
    background: #f3f7fd;
    font-family: 'Poppins', sans-serif;
}

/* HEADER */
.profile-banner{
    height: 280px;
    background:
    linear-gradient(rgba(0,0,0,0.45), rgba(0,0,0,0.45)),
    url('https://images.unsplash.com/photo-1507525428034-b723cf961d3e');
    background-size: cover;
    background-position: center;
    border-radius: 0 0 40px 40px;
    position: relative;
}

/* PROFILE CARD */
.profile-card{  
    background: rgba(255,255,255,0.85);
    backdrop-filter: blur(12px);
    border-radius: 30px;
    box-shadow:
    0 10px 35px rgba(0,0,0,0.08);
    margin-top: -100px;
    position: relative;
    z-index: 10;
    overflow: hidden;
}

/* PHOTO */
.profile-img{
    width: 140px;
    height: 140px;
    border-radius: 50%;
    object-fit: cover;
    border: 5px solid white;
    box-shadow:
    0 10px 25px rgba(0,0,0,0.15);
}

/* MENU */
.menu-card{
    border-radius: 25px;
    padding: 25px;
    background: white;
    transition: 0.3s;
    box-shadow:
    0 5px 18px rgba(0,0,0,0.06);
    text-decoration: none;
    color: black;
    display: block;
}

.menu-card:hover{
    transform: translateY(-7px);
    box-shadow:
    0 15px 30px rgba(0,0,0,0.12);
}

.menu-icon{
    width: 60px;
    height: 60px;
    border-radius: 20px;
    background: #eef4ff;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 26px;
    color: #0d6efd;
    margin-bottom: 15px;
}

/* STATS */
.stats-box{
    background: linear-gradient(135deg,#0d6efd,#2563eb);
    color: white;
    border-radius: 25px;
    padding: 25px;
    box-shadow:
    0 10px 30px rgba(13,110,253,0.25);
}

.stats-number{
    font-size: 32px;
    font-weight: bold;
}

/* BUTTON */
.btn-edit{
    border-radius: 50px;
    padding: 10px 22px;
    font-weight: 600;
}

/* INFO */
.info-box{
    background: white;
    border-radius: 20px;
    padding: 20px;

    box-shadow:
    0 5px 15px rgba(0,0,0,0.05);
}

.info-box p{
    margin-bottom: 10px;
}

</style>
</head>
<body>

<!-- BANNER -->
<div class="profile-banner"></div>
<div class="container">
    <div class="profile-card p-4 p-lg-5">

        <!-- TOP -->
        <div class="row align-items-center">
            <div class="col-lg-3 text-center">
                <img
                src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}&background=0D6EFD&color=fff&size=256"
                class="profile-img">
            </div>
            <div class="col-lg-6 mt-4 mt-lg-0">
                <h2 class="fw-bold">
                    {{ Auth::user()->name }}
                </h2>
                <p class="text-muted mb-2">
                    {{ Auth::user()->email }}
                </p>
                <span class="badge bg-primary px-3 py-2">
                    Customer Premium
                </span>
            </div>
            <div class="col-lg-3 text-lg-end mt-4 mt-lg-0">
                <button
                class="btn btn-primary btn-edit"
                data-bs-toggle="modal"
                data-bs-target="#editModal">
                    <i class="bi bi-pencil"></i>
                    Edit Profile
                </button>
            </div>
        </div>

        <!-- STATS -->
        <div class="row mt-5 g-4">
            <div class="col-md-4">
                <div class="stats-box text-center">
                    <div class="stats-number">
                        {{ $totalPesanan ?? 0 }}
                    </div>
                    <p class="mb-0">
                        Total Booking
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stats-box text-center">
                    <div class="stats-number">
                        {{ $totalSelesai ?? 0 }}
                    </div>
                    <p class="mb-0">
                        Pesanan Selesai
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stats-box text-center">
                    <div class="stats-number">
                        VIP
                    </div>
                    <p class="mb-0">
                        Membership
                    </p>
                </div>
            </div>
        </div>
        <!-- MENU -->
        <div class="row g-4 mt-4">
            <div class="col-md-4">
                <a href="/pesanan"
                class="menu-card">
                    <div class="menu-icon">
                        <i class="bi bi-clock-history"></i>
                    </div>
                    <h5 class="fw-bold">
                        Riwayat Pesanan
                    </h5>
                    <p class="text-muted mb-0">
                        Lihat semua booking perjalanan Anda
                    </p>
                </a>
            </div>
            <div class="col-md-4">
                <a href="/pembayaran"
                class="menu-card">
                    <div class="menu-icon">
                        <i class="bi bi-credit-card"></i>
                    </div>
                    <h5 class="fw-bold">
                        Pembayaran
                    </h5>
                    <p class="text-muted mb-0">
                        Kelola pembayaran dan tagihan
                    </p>
                </a>
            </div>
            <div class="col-md-4">
                <a href="/bantuan"
                class="menu-card">
                    <div class="menu-icon">
                        <i class="bi bi-headset"></i>
                    </div>
                    <h5 class="fw-bold">
                        Bantuan
                    </h5>
                    <p class="text-muted mb-0">
                        Hubungi customer service
                    </p>
                </a>
            </div>
        </div>

        <!-- INFO -->
        <div class="info-box mt-5">
            <h4 class="fw-bold mb-4">
                Informasi Akun
            </h4>
            <p>
                <b>Nama:</b>
                {{ Auth::user()->name }}
            </p>
            <p>
                <b>Email:</b>
                {{ Auth::user()->email }}
            </p>
            <p>
                <b>Role:</b>
                {{ Auth::user()->role }}
            </p>
        </div>
    </div>
</div>
<!-- MODAL EDIT -->
<div class="modal fade"
    id="editModal"
        tabindex="-1">
            <div class="modal-dialog">
            <div class="modal-content border-0 rounded-4">
                <form action="/update-profile" method="POST">
                @csrf
                <div class="modal-header border-0">
                    <h5 class="fw-bold">
                        Edit Profile
                    </h5>
                    <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Nama</label>
                        <input type="text"
                        name="name"
                        class="form-control"
                        value="{{ Auth::user()->name }}">
                    </div>
                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email"
                        name="email"
                        class="form-control"
                        value="{{ Auth::user()->email }}">
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button
                    class="btn btn-primary rounded-pill px-4">
                        Simpan Perubahan
                    </button>
                </div>
                </form>
            </div>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>