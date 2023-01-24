@extends('layouts.mazer')

@section('content')
    <div class="container">
        <div id="spinner"
            class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <span class="sr-only">Loading...</span>
            <img src="{{ asset('assetsm/vendors/svg-loaders/audio.svg') }}" class="me-4" style="width: 5rem" alt="audio">
        </div>
    </div>
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Galeri Photo Sekolah</h3>
                    <p class="text-subtitle text-muted">Kesempurnaan Dari Sebuah Keindahan</p>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Lainnya Dari Sekolah</h5>
                        </div>
                        <div class="card-body">
                            <div class="row gallery" data-bs-toggle="modal" data-bs-target="#galleryModal">
                                <div class="col-6 col-sm-6 col-lg-3 mt-2 mt-md-0 mb-md-0 mb-2">
                                    <a href="#">
                                        <img class="w-100 active"
                                            src="https://media.istockphoto.com/id/486325388/id/foto/guru-mendapatkan-jawaban-dari-siswa.jpg?s=612x612&w=0&k=20&c=kXw7ts3a5eyYyJuyeuo8xLBNNqPLxyLl6YcbdGK3KoA="
                                            data-bs-target="#Gallerycarousel" data-bs-slide-to="0">
                                    </a>
                                </div>
                                <div class="col-6 col-sm-6 col-lg-3 mt-2 mt-md-0 mb-md-0 mb-2">
                                    <a href="#">
                                        <img class="w-100"
                                            src="https://media.istockphoto.com/id/1306585157/id/foto/foto-stok-bocah-sekolah-bertopeng.jpg?s=612x612&w=0&k=20&c=bKxxnQ5LePGEOKBr9Z-fLT1T51ZC2k0fSVsHbAjGf9Y="
                                            data-bs-target="#Gallerycarousel" data-bs-slide-to="1">
                                    </a>
                                </div>
                                <div class="col-6 col-sm-6 col-lg-3 mt-2 mt-md-0 mb-md-0 mb-2">
                                    <a href="#">
                                        <img class="w-100"
                                            src="https://media.istockphoto.com/id/1279364053/id/foto/siswa-multi-etnis-mengenakan-masker-di-kelas.jpg?s=612x612&w=0&k=20&c=fsr9kA67k757paafcbL0wl1q5IQZ-ybd75JI5soQs4w="
                                            data-bs-target="#Gallerycarousel" data-bs-slide-to="2">
                                    </a>
                                </div>
                                <div class="col-6 col-sm-6 col-lg-3 mt-2 mt-md-0 mb-md-0 mb-2">
                                    <a href="#">
                                        <img class="w-100"
                                            src="https://media.istockphoto.com/id/1328820713/id/foto/guru-wanita-afrika-amerika-dengan-pengajaran-tablet-digital-di-kelas-di-sekolah-dasar.jpg?s=612x612&w=0&k=20&c=LAaIGuhJAWWgwPlMnqL4dUYpoAn7viZrX9f4FraUbAM="
                                            data-bs-target="#Gallerycarousel" data-bs-slide-to="3">
                                    </a>
                                </div>
                            </div>

                            <div class="row mt-2 mt-md-4 gallery" data-bs-toggle="modal" data-bs-target="#galleryModal">
                                <div class="col-6 col-sm-6 col-lg-3 mt-2 mt-md-0 mb-md-0 mb-2">
                                    <a href="#">
                                        <img class="w-100 active"
                                            src="https://media.istockphoto.com/id/170431767/id/foto/tampilan-belakang-siswa-yang-duduk-di-kelas.jpg?s=612x612&w=0&k=20&c=3f8RotxQc3RYhs7n4PfCpfmNR4PMqh0scBeiC6kjd00="
                                            data-bs-target="#Gallerycarousel" data-bs-slide-to="0">
                                    </a>
                                </div>
                                <div class="col-6 col-sm-6 col-lg-3 mt-2 mt-md-0 mb-md-0 mb-2">
                                    <a href="#">
                                        <img class="w-100"
                                            src="https://images.unsplash.com/photo-1646343251574-a7b03ee3dbaf?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8M3x8bGFwYW5nYW58ZW58MHx8MHx8&auto=format&fit=crop&w=500&q=60"
                                            data-bs-target="#Gallerycarousel" data-bs-slide-to="1">
                                    </a>
                                </div>
                                <div class="col-6 col-sm-6 col-lg-3 mt-2 mt-md-0 mb-md-0 mb-2">
                                    <a href="#">
                                        <img class="w-100"
                                            src="https://images.unsplash.com/photo-1632951634308-d7889939c125?ixid=MnwxMjA3fD=rb-1.2.1&auto=format&fit=crop&w=500&q=60"
                                            data-bs-target="#Gallerycarousel" data-bs-slide-to="2">
                                    </a>
                                </div>
                                <div class="col-6 col-sm-6 col-lg-3 mt-2 mt-md-0 mb-md-0 mb-2">
                                    <a href="#">
                                        <img class="w-100"
                                            src="https://media.istockphoto.com/id/502587608/id/foto/interior-ruang-makan-modern.jpg?s=612x612&w=0&k=20&c=n_sYzpK056zMKvJOGffCtPYF6xR6lxFqwXqBPkPA_0g="
                                            data-bs-target="#Gallerycarousel" data-bs-slide-to="3">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="modal fade" id="galleryModal" tabindex="-1" role="dialog" aria-labelledby="galleryModalTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="galleryModalTitle">Foto Galeri Sekolah</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">

                    <div id="Gallerycarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#Gallerycarousel" data-bs-slide-to="0" class="active"
                                aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#Gallerycarousel" data-bs-slide-to="1"
                                aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#Gallerycarousel" data-bs-slide-to="2"
                                aria-label="Slide 3"></button>
                            <button type="button" data-bs-target="#Gallerycarousel" data-bs-slide-to="3"
                                aria-label="Slide 4"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100"
                                    src="https://media.istockphoto.com/id/170431767/id/foto/tampilan-belakang-siswa-yang-duduk-di-kelas.jpg?s=612x612&w=0&k=20&c=3f8RotxQc3RYhs7n4PfCpfmNR4PMqh0scBeiC6kjd00=">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100"
                                    src="https://images.unsplash.com/photo-1646343251574-a7b03ee3dbaf?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8M3x8bGFwYW5nYW58ZW58MHx8MHx8&auto=format&fit=crop&w=500&q=60">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100"
                                    src="https://images.unsplash.com/photo-1632951634308-d7889939c125?ixid=MnwxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHw0M3x8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100"
                                    src="https://media.istockphoto.com/id/502587608/id/foto/interior-ruang-makan-modern.jpg?s=612x612&w=0&k=20&c=n_sYzpK056zMKvJOGffCtPYF6xR6lxFqwXqBPkPA_0g=">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#Gallerycarousel" role="button" type="button"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        </a>
                        <a class="carousel-control-next" href="#Gallerycarousel" role="button" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        </a>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection
