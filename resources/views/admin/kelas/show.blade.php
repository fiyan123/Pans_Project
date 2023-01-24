@extends('layouts.mazer')

@section('content')
    <div class="container">
        <div id="spinner"
            class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <span class="sr-only">Loading...</span>
            <img src="{{ asset('assetsm/vendors/svg-loaders/audio.svg') }}" class="me-4" style="width: 5rem" alt="audio">
        </div>
    </div>
 
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="page-heading">
            <h3>Data Kelas {{ $kelas->kelas }}</h3>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Kelas</label>
                    <input type="text" class="form-control " name="kelas" value="{{ $kelas->kelas }}" readonly>
                </div>

                <div class="mb-3">
                    <label class="form-label">Jurusan</label>
                    <input type="text" class="form-control" name="jurusan" value="{{ $kelas->jurusan }}"readonly>
                </div>

                <div class="mb-3" align="right">
                <a href="{{ route('kelas.index') }}" class="btn btn-dark" type="submit" data-bs-toggle="tooltip" data-bs-placement="top" title="Kembali"><i
                    class="bi bi-back"></i></a>
                </div>
            </div>
        </div>
    </div>
       
@endsection
