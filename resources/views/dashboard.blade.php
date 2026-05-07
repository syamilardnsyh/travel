@extends('layout.master')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v1</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small box -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $total_order ?? 0 }}</h3>
                            <p>Total Riwayat Order</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                        <a href="#" class="small-box-footer">Lihat Semua Order <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ $total_paket ?? 0 }}</h3>
                            <p>Total Paket Wisata</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-map-marked-alt"></i>
                        </div>
                        <a href="/nambah-wisata" class="small-box-footer">Kelola Paket <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ $total_users }}</h3>
                            <p>Total Yang Daftar</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="/user" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{$pengunjung_hari_ini ?? 0 }}</h3>
                            <p>Pengunjung Hari Ini</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-eye"></i>
                        </div>
                        <a href="#" class="small-box-footer">Liat Statistik <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>

            <!-- Main row -->
        <div class="row">
            <section class="col-lg-7 connectedSortable">
                <!-- Charts with tabs-->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-chart-line mr-1"></i>
                            Laporan Pendapatan
                        </h3>
                        <div class="card-tools">
                            <ul class="nav nav-pills ml-auto">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#revenue-chart" data-toggle="tab">Bulanan</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#sales-chart" data-toggle="tab">Paket Terlaris</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="tab-content p-0">
                            <!-- Laporan Bulanan -->
                            <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;">
                                <canvas id="laporan-pendapatan-canvas" height="300" style="height: 300px;"></canvas>
                            </div>
                            <!-- Paket Terlaris -->
                            <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">
                                <canvas id="paket-terlaris-canvas" height="300" style="height: 300px;"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="col-lg-5 connectedSortable">
                <!-- Map card -->
                <div class="card bg-gradient-primary">
                    <div class="card-header border-0">
                        <h3 class="card-title">
                            <i class="fas fa-map-marker-alt mr-1"></i>
                            Destinasi Favorit
                        </h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-primary btn-sm" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div style="height: 250px; overflow-y: auto; padding-right: 10px;">
                            <!-- Destinasi 1 -->
                            <div class="progress-group text-white mb-4">
                                Bali (5 Hari 4 Malam)
                                <span class="float-right"><b>60</b> Order</span>
                                <div class="progress progress-sm" style="background-color: rgba(255,255,255,0.2);">
                                    <div class="progress-bar bg-white" style="width: 75%"></div>
                                </div>
                            </div>
                            <!-- Destinasi 2 -->
                            <div class="progress-group text-white mb-4">
                                Jogja (3 Hari 2 Malam)
                                <span class="float-right"><b>35</b> Order</span>
                                <div class="progress progress-sm" style="background-color: rgba(255,255,255,0.2);">
                                    <div class="progress-bar bg-white" style="width: 40%"></div>
                                </div>
                            </div>
                            <!-- Destinasi 3 -->
                            <div class="progress-group text-white mb-4">
                                Bromo (3 Hari 2 Malam)
                                <span class="float-right"><b>45</b> Order</span>
                                <div class="progress progress-sm" style="background-color: rgba(255,255,255,0.2);">
                                    <div class="progress-bar bg-white" style="width: 45%"></div>
                                </div>
                            </div>
                            <!-- Destinasi 4 -->
                            <div class="progress-group text-white mb-4">
                                Bandung (1 Hari)
                                <span class="float-right"><b>30</b> Order</span>
                                <div class="progress progress-sm" style="background-color: rgba(255,255,255,0.2);">
                                    <div class="progress-bar bg-white" style="width: 30%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-transparent">
                        <div class="row">
                            <div class="col-4 text-center">
                                <div class="text-white font-weight-bold" style="font-size: 1.2rem;">60</div>
                                <div class="text-white">Bali</div>
                            </div>
                            <!-- ./col -->
                            <div class="col-4 text-center">
                                <div class="text-white font-weight-bold" style="font-size: 1.2rem;">35</div>
                                <div class="text-white">Jogja</div>
                            </div>
                            <!-- ./col -->
                             <div class="col-4 text-center">
                                <div class="text-white font-weight-bold" style="font-size: 1.2rem;">45</div>
                                <div class="text-white">Bromo</div>
                            </div>
                        </div>
                        <!-- ./col -->
                             <div class="col-4 text-center">
                                <div class="text-white font-weight-bold" style="font-size: 1.2rem;">30</div>
                                <div class="text-white">Bandung</div>
                            </div>
                        </div>
                    </div>
                </div>

                    <!-- Calendar -->
                    <div class="card bg-gradient-success">
                        <div class="card-header border-0">
                            <h3 class="card-title">
                                <i class="far fa-calendar-alt"></i>
                                Calendar
                            </h3>
                            <div class="card-tools">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown" data-offset="-52">
                                        <i class="fas fa-bars"></i>
                                    </button>
                                    <div class="dropdown-menu" role="menu">
                                        <a href="#" class="dropdown-item">Add new event</a>
                                        <a href="#" class="dropdown-item">Clear events</a>
                                        <div class="dropdown-divider"></div>
                                        <a href="#" class="dropdown-item">View calendar</a>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-success btn-sm" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-success btn-sm" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <!--The calendar -->
                            <div id="calendar" style="width: 100%"></div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>
</div>
@endsection

@section('js')
<!-- ChartJS -->
<script src="{{asset('admin/plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('admin/plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('admin/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('admin/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('admin/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('admin/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('admin/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('admin/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>

<!-- Script Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    
    $(document).ready(function() {
        
        
        var dataPesanan = {!! json_encode($data_bulanan ?? [0,0,0,0,0,0,0,0,0,0,0,0]) !!};
        var labelTerlaris = {!! json_encode($label_terlaris ?? ['Belum Ada Data']) !!};
        var dataTerlaris = {!! json_encode($data_terlaris ?? [0]) !!};

        
        var canvasBulanan = document.getElementById('laporan-pendapatan-canvas');
        if (canvasBulanan) {
            var ctxBulanan = canvasBulanan.getContext('2d');
            new Chart(ctxBulanan, {
                type: 'line', 
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Ags', 'Sep', 'Okt', 'Nov', 'Des'],
                    datasets: [{
                        label: 'Total Pesanan Masuk',
                        data: dataPesanan, 
                        backgroundColor: 'rgba(60,141,188,0.2)',
                        borderColor: 'rgba(60,141,188,1)',
                        borderWidth: 2,
                        fill: true,
                        lineTension: 0.4
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        yAxes: [{
                            ticks: { beginAtZero: true }
                        }]
                    }
                }
            });
        }

        // 
        var canvasTerlaris = document.getElementById('paket-terlaris-canvas');
        if (canvasTerlaris) {
            var ctxTerlaris = canvasTerlaris.getContext('2d');
            new Chart(ctxTerlaris, {
                type: 'doughnut',
                data: {
                    labels: labelTerlaris, // 👈 Memasukkan variabel label destinasi
                    datasets: [{
                        data: dataTerlaris, // 👈 Memasukkan variabel angka pesanan
                        backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc'],
                        borderWidth: 0
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    legend: { position: 'right' }
                }
            });
        }

    });
</script>
@endsection