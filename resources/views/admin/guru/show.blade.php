@extends('layouts.mazer')

@section('content')
    <div class="container">
        <div id="spinner"
            class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <span class="sr-only">Loading...</span>
            <img src="{{ asset('assetsm/vendors/svg-loaders/audio.svg') }}" class="me-4" style="width: 5rem" alt="audio">
        </div>
    </div>
    <div class="col-md-12">
        <div class="page-heading">
            <h3>Data Guru {{ $guru->nama }}</h3>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Nip</label>
                    <input type="number" class="form-control " name="nip" value="{{ $guru->nip }}" readonly>
                </div>
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" class="form-control " name="nama" value="{{ $guru->nama }}" readonly>
                </div>
                <div class="mb-3">
                    <label class="form-label">Mata Pelajaran</label>
                    <input type="text" class="form-control " name="mata_pelajaran" value="{{ $guru->mata_pelajaran }}" readonly>
                </div>
                <div class="mb-3">
                    <label class="form-label">Jenis Kelamin</label>
                    <input type="text" class="form-control " name="jenis_kelamin" value="{{ $guru->jenis_kelamin }}" readonly>
                </div>
                <div class="mb-3" align="right">
                    <a href="{{ route('guru.index') }}" class="btn btn-dark" type="submit" data-bs-toggle="tooltip"
                        data-bs-placement="top" title="Kembali"><i class="bi bi-back"></i></a>
                    </div>
                </div>
            </div>
    </div>
@endsection
