<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran Saya</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icon -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>

body{
    background: #eef2ff;
    font-family: 'Poppins', sans-serif;
    overflow-x: hidden;
}

/* HEADER */
.payment-header{
    background:
    linear-gradient(rgba(0,0,0,0.45), rgba(0,0,0,0.55)),
    url('https://i1-e.pinimg.com/1200x/c9/42/d7/c942d777898a7c6881c2a296a00ec3d0.jpg');

    background-size: cover;
    background-position: center;

    padding: 100px 0;
    border-radius: 0 0 45px 45px;

    color: white;
    position: relative;
}

.payment-header h1{
    font-size: 45px;
    font-weight: 700;
}

.payment-header p{
    opacity: .9;
    font-size: 17px;
}

/* MAIN CARD */
.payment-card{
    background: white;
    border-radius: 30px;
    padding: 35px;
    margin-top: -70px;
    position: relative;
    z-index: 10;

    box-shadow:
    0 20px 40px rgba(0,0,0,0.08),
    0 5px 15px rgba(0,0,0,0.05);
}

/* IMAGE */
.trip-image{
    width: 100%;
    height: 320px;
    object-fit: cover;
    border-radius: 25px;

    box-shadow:
    0 15px 35px rgba(0,0,0,0.15);
}

/* TITLE */
.trip-title{
    font-size: 34px;
    font-weight: 700;
    margin-top: 25px;
    color: #111827;
}

/* INFO */
.trip-info{
    display: flex;
    align-items: center;
    gap: 12px;

    margin-bottom: 15px;

    color: #4b5563;
    font-size: 15px;
}

.trip-info i{
    color: #2563eb;
    font-size: 18px;
}

/* PAYMENT BOX */
.payment-box{
    background:
    linear-gradient(145deg,#f8fbff,#edf4ff);

    border-radius: 28px;
    padding: 30px;

    border: 1px solid #dbeafe;
}

/* TOTAL BOX */
.total-box{
    background:
    linear-gradient(135deg,#2563eb,#3b82f6);

    border-radius: 25px;
    padding: 28px;

    color: white;
    margin-bottom: 30px;

    box-shadow:
    0 15px 30px rgba(37,99,235,0.25);
}

.total-box small{
    opacity: .8;
    font-size: 14px;
}

.total-box h1{
    font-size: 42px;
    font-weight: 700;
    margin-top: 10px;
}

/* BANK CARD */
.bank-card{
    background: white;
    border-radius: 18px;
    padding: 18px;
    margin-bottom: 18px;

    border: 2px solid transparent;

    transition: .3s;
    cursor: pointer;
}

.bank-card:hover{
    transform: translateY(-5px);

    border-color: #2563eb;

    box-shadow:
    0 10px 20px rgba(0,0,0,0.08);
}

.bank-title{
    font-weight: 700;
    font-size: 17px;
    margin-bottom: 5px;
}

/* FORM */
.form-label{
    font-weight: 600;
    margin-bottom: 10px;
}

.form-control,
.form-select{
    border-radius: 15px;
    padding: 13px;

    border: 1px solid #d1d5db;
}

.form-control:focus,
.form-select:focus{
    border-color: #2563eb;

    box-shadow:
    0 0 0 4px rgba(37,99,235,0.15);
}

/* BUTTON */
.btn-upload{
    width: 100%;
    border: none;

    border-radius: 18px;
    padding: 15px;

    background:
    linear-gradient(135deg,#2563eb,#3b82f6);

    color: white;

    font-size: 16px;
    font-weight: 600;

    transition: .3s;
}

.btn-upload:hover{
    transform: translateY(-4px);

    box-shadow:
    0 12px 25px rgba(37,99,235,0.3);
}

/* ALERT */
.success-alert{
    border-radius: 16px;
    border: none;
}

/* RESPONSIVE */
@media(max-width:768px){

    .payment-header{
        padding: 70px 20px;
    }

    .payment-header h1{
        font-size: 30px;
    }

    .payment-card{
        margin-top: -45px;
        padding: 22px;
    }

    .trip-title{
        font-size: 25px;
    }

    .trip-image{
        height: 240px;
    }

    .total-box h1{
        font-size: 30px;
    }

}

</style>
</head>
<body>

<!-- HEADER -->
<div class="payment-header">
    <div class="container text-center">
        <h1>
            Pembayaran Saya
        </h1>
        <p>
            Lengkapi pembayaran dan upload bukti transfer
        </p>
    </div>
</div>

<!-- CONTENT -->
<div class="container pb-5">
    <div class="payment-card">

        @if(session('success'))
            <div class="alert alert-success success-alert mb-4">
                {{ session('success') }}
            </div>
        @endif
    
        @foreach ($pesanans as $pesanan)    
        <div class="row g-5">
            <!-- LEFT -->
            <div class="col-lg-6">

                <img
                    src="{{ asset('images/paket/' . $pesanan->paket->gambar_paket) }}"
                    class="trip-image">

                <h2 class="trip-title">
                    {{ $pesanan->paket->nama_paket }}
                </h2>

                <div class="mt-4">

                    <div class="trip-info">
                        <i class="bi bi-person-circle"></i>

                        <span>
                            {{ $pesanan->nama_pemesan }}
                        </span>
                    </div>

                    <div class="trip-info">
                        <i class="bi bi-people-fill"></i>

                        <span>
                            {{ $pesanan->jumlah_orang }} Orang
                        </span>
                    </div>

                    <div class="trip-info">
                        <i class="bi bi-calendar-event"></i>

                        <span>
                            {{ $pesanan->tanggal }}
                        </span>
                    </div>
                </div>
            </div>

            <!-- RIGHT -->
            <div class="col-lg-6">
                <div class="payment-box">

                    <!-- TOTAL -->
                    <div class="total-box">

                        <small>
                            Total Pembayaran
                        </small>

                        <h1>
                            Rp {{ number_format($pesanan->total_harga,0,',','.') }}
                        </h1>

                    </div>

                    <h5 class="fw-bold mb-4">
                        Pilih Metode Pembayaran
                    </h5>

                    <!-- BANK -->
                    <div class="bank-card">
                        <div class="bank-title">
                            BANK BCA
                        </div>

                        <div>
                            1234567890 a/n Erlangga Tour
                        </div>
                    </div>

                    <div class="bank-card">
                        <div class="bank-title">
                            BANK MANDIRI
                        </div>

                        <div>
                            9876543210 a/n Erlangga Tour
                        </div>
                    </div>

                    <!-- FORM -->
                    <form
                        action="{{ route('upload.bukti', $pesanan->id) }}"
                        method="POST"
                        enctype="multipart/form-data"
                        class="mt-4">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">
                                Metode Pembayaran
                            </label>
                            <select
                                name="metode_pembayaran"
                                class="form-select"
                                required>
                                <option value="">
                                    -- Pilih Bank --
                                </option>
                                <option value="BCA">
                                    BCA
                                </option>
                                <option value="Mandiri">
                                    Mandiri
                                </option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="form-label">
                                Upload Bukti Pembayaran
                            </label>

                            <input
                                type="file"
                                name="bukti_pembayaran"
                                class="form-control"
                                required>
                        </div>
                        <button
                            type="submit"
                            class="btn-upload">
                            Upload Bukti Pembayaran
                        </button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
</body>
</html>