@extends('layouts.mazer')
@section('content')

    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <span class="sr-only">Loading...</span>
        <img src="{{ asset('assetsm/vendors/svg-loaders/audio.svg') }}" class="me-4" style="width: 5rem" alt="audio">
    </div>

    <div class="page-heading">
        <h3>Data Sekolah Statistik</h3>
    </div>

    <div class="row">
        <div class="col-lg-12 mb-4 order-0">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-7">
                        <div class="card-body">
                            <h5 class="card-title text-primary- mb-5">Selamat Datang {{ Auth::user()->name }}!</h5>
                        </div>
                    </div>
                    <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                            <img
                            src="https://smpmuh12kalijambe.sch.id/wp-content/uploads/2021/07/peran-guru-penggerak.png"
                            height="150"
                            alt="View Badge User"
                            />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="page-content">
        <section class="row">
            <div class="col-12 col-lg-9">
                <div class="row">
                    <div class="col-6 col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-center ">
                                        <div class="stats-icon purple mb-2">
                                            <i class="iconly-boldChart"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="text-muted font-semibold">Total Kelas</h6>
                                        <h6 class="font-extrabold mb-0">{{ $kelas }} Kelas</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-center ">
                                        <div class="stats-icon blue mb-2">
                                            <i class="iconly-boldUser"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="text-muted font-semibold">Total Guru</h6>
                                        <h6 class="font-extrabold mb-0">{{ $gurus }} Guru</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-center ">
                                        <div class="stats-icon green mb-2">
                                            <i class="iconly-boldUser"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="text-muted font-semibold">Total Siswa</h6>
                                        <h6 class="font-extrabold mb-0">{{ $siswas }} Siswa</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-3">
                <div class="card">
                    <div class="card-body px-4 py-4-5">
                        <div class="row">
                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-center ">
                                <div class="stats-icon green mb-2">
                                    <i class="iconly-boldFolder"></i>
                                </div>
                            </div>
                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                <h6 class="text-muted font-semibold">Penilaian</h6>
                                <h6 class="font-extrabold mb-0">{{ $nilais }} Selesai</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div>
        <div id="chartNilai" class="mb-5"></div>
    </div>
    <div>
        <div id="chartNilai2"></div>
    </div>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script>
        Highcharts.chart('chartNilai', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Laporan Data Sekolah'
            },
            xAxis: {
                categories: [
                    'Kelas',
                    'Guru',
                    'Siswa',
                    'Penilaian Selesai',
                ],
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Jumlah data'
                }
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
                name: 'Jumlah Data',
                data: [
                    {{ $kelas }},
                    {{ $gurus }},
                    {{ $siswas }},
                    {{ $nilais }},
                ]
            }]
        });
    </script>
    <script>
        // Data retrieved from https://netmarketshare.com
        Highcharts.chart('chartNilai2', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Laporan Akhir Data Sekolah',
                align: 'left'
            },
            accessibility: {
                point: {
                    valueSuffix: '%'
                }
            },
            series: [{
                name: 'Jumlah data',
                colorByPoint: true,
                data: [{
                    name: 'Kelas',
                    y: {{ $kelas }},
                }, {
                    name: 'Guru',
                    y: {{ $gurus }}
                }, {
                    name: 'Siswa',
                    y: {{ $siswas }}
                }, {
                    name: 'Penilaian Selesai',
                    y: {{ $nilais }}
                }]
            }]
        });      
    </script>
@endsection
