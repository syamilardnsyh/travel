@extends('layout.master')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <h1 class="m-0">Form Kalkulator Metode SMART</h1>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            
            <!-- FORM INPUT MANUAL -->
            <div class="card card-primary shadow">
                <div class="card-header">
                    <h3 class="card-title">Masukkan Data Alternatif & Bobot Kriteria</h3>
                </div>
                
                <form action="/spk-smart" method="POST">
                    @csrf <!-- Wajib ada untuk form di Laravel -->
                    <div class="card-body">
                        
                        <!-- Input Bobot -->
                        <h5 class="text-primary font-weight-bold mb-3">1. Tentukan Bobot (Total Wajib 100%)</h5>
                        <div class="row mb-4">
                            <div class="col-md-4">
                                <label>Bobot Pesanan (%)</label>
                                <input type="number" name="bobot[pesanan]" class="form-control" value="{{ $bobot['pesanan'] }}" required>
                            </div>
                            <div class="col-md-4">
                                <label>Bobot Rating (%)</label>
                                <input type="number" name="bobot[rating]" class="form-control" value="{{ $bobot['rating'] }}" required>
                            </div>
                            <div class="col-md-4">
                                <label>Bobot Harga (%)</label>
                                <input type="number" name="bobot[harga]" class="form-control" value="{{ $bobot['harga'] }}" required>
                            </div>
                        </div>

                        <!-- Input Nilai Alternatif -->
                        <h5 class="text-primary font-weight-bold mb-3">2. Masukkan Nilai Destinasi</h5>
                        <table class="table table-bordered">
                            <thead class="bg-light">
                                <tr>
                                    <th>Nama Destinasi</th>
                                    <th>Jumlah Pesanan</th>
                                    <th>Rating (1.0 - 5.0)</th>
                                    <th>Harga Paket (Rp)</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($destinasi as $nama => $nilai)
                                <tr>
                                    <td class="align-middle font-weight-bold">{{ $nama }}</td>
                                    <td><input type="number" name="destinasi[{{ $nama }}][pesanan]" class="form-control" value="{{ $nilai['pesanan'] }}" required></td>
                                    <td><input type="number" step="0.1" name="destinasi[{{ $nama }}][rating]" class="form-control" value="{{ $nilai['rating'] }}" required></td>
                                    <td><input type="number" name="destinasi[{{ $nama }}][harga]" class="form-control" value="{{ $nilai['harga'] }}" required></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="card-footer text-center">
                        <button type="submit" class="btn btn-primary btn-lg"><i class="fas fa-calculator"></i> Hitung SPK Sekarang</button>
                    </div>
                </form>
            </div>

            @if(isset($ranking_spk))
                <div class="card card-success shadow mt-4">
                    <div class="card-header">
                        <h3 class="card-title">Hasil Keputusan Metode SMART</h3>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-striped text-center">
                            <thead>
                                <tr>
                                    <th>Ranking</th>
                                    <th>Nama Destinasi</th>
                                    <th>Nilai Akhir (Vi)</th>
                                    <th>Keputusan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($ranking_spk as $index => $hasil)
                                <tr>
                                    <td>
                                        @if($index == 0) <i class="fas fa-medal text-warning" style="font-size: 1.5rem;"></i> #1 
                                        @else #{{ $index + 1 }} @endif
                                    </td>
                                    <td class="font-weight-bold">{{ $hasil['nama'] }}</td>
                                    <td class="font-weight-bold text-success" style="font-size:1.2rem;">{{ $hasil['nilai'] }}</td>
                                    <td>
                                        @if($index == 0) <span class="badge badge-warning">Direkomendasikan</span> 
                                        @else <span class="badge badge-secondary">Alternatif</span> @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif

        </div>
    </section>
</div>
@endsection