@extends('layout.master')

@section('content')

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">

            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">
                        Verifikasi Pembayaran
                    </h1>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="/dashboard">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">
                            Data Pesanan
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        Data Pesanan Customer
                    </h3>
                </div>

                <div class="card-body table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Paket</th>
                                <th>Total</th>
                                <th>Metode</th>
                                <th>Bukti</th>
                                <th>Status</th>
                                <th width="220">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($pesanans as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    {{ $item->nama_pemesan }}
                                </td>
                                <td>
                                    {{ $item->paket->nama_paket ?? '-' }}
                                </td>
                                <td>
                                    Rp {{ number_format($item->total_harga,0,',','.') }}
                                </td>
                                <td>
                                    {{ $item->metode_pembayaran ?? '-' }}
                                </td>
                                <td>

                                    @if($item->bukti_pembayaran)
                                        <a href="{{ asset('bukti/'.$item->bukti_pembayaran) }}"
                                           target="_blank">
                                            <img src="{{ asset('bukti/'.$item->bukti_pembayaran) }}"
                                                 width="90"
                                                 class="img-thumbnail">
                                        </a>
                                    @else
                                        <span class="badge badge-secondary">
                                            Belum Upload
                                        </span>
                                    @endif
                                </td>
                                <td>
                                    @if($item->status == 'pending')
                                        <span class="badge badge-warning">
                                            Pending
                                        </span>
                                    @elseif($item->status == 'menunggu_verifikasi')
                                        <span class="badge badge-info">
                                            Menunggu Verifikasi
                                        </span>
                                    @elseif($item->status == 'verified')
                                        <span class="badge badge-success">
                                            Verified
                                        </span>
                                    @else
                                        <span class="badge badge-danger">
                                            Ditolak
                                        </span>
                                    @endif

                                </td>
                                <td>

                                    <form action="{{ url('/admin/pesanan/'.$item->id.'/verifikasi') }}"
                                          method="POST"
                                          class="d-inline">
                                        @csrf
                                        <button type="submit"
                                        class="btn btn-success btn-sm">
                                            Verifikasi
                                        </button>
                                    </form>
                                    <form action="{{ url('/admin/pesanan/'.$item->id.'/tolak') }}"
                                          method="POST"
                                          class="d-inline">
                                        @csrf
                                        <button type="submit"
                                        class="btn btn-danger btn-sm">
                                            Tolak
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="8" class="text-center">
                                    Belum ada pesanan
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection