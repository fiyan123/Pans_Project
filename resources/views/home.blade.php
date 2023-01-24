@extends('layouts.mazer')

@section('content')
<div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <span class="sr-only">Loading...</span>
    <img src="{{ asset('assetsm/vendors/svg-loaders/audio.svg') }}" class="me-4" style="width: 5rem" alt="audio">
</div>

<div class="row">
    <div class="col-lg-12 mb-4 order-0">
        <div class="card">
            <div class="d-flex align-items-end row">
                <div class="col-sm-7">
                <div class="card-body">
                    <h5 class="card-title text-primary- mb-5">Selamat Datang, {{ Auth::user()->name }}</h5>
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

@endsection
