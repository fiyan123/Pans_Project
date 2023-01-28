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
            <h3>Data Nilai {{ $nilai->siswa->nama }}, Kelas {{ $nilai->kelas->kelas }}</h3>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Nama Guru</label>
                    <input type="text" class="form-control" name="id_guru" value="{{ $nilai->guru->nama }}" readonly>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nisn</label>
                    <input type="number" class="form-control" name="id_siswa" value="{{ $nilai->siswa->nis }}" readonly>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" class="form-control" name="id_siswa" value="{{ $nilai->siswa->nama }}" readonly>
                </div>

                <div class="mb-3">
                    <label class="form-label">Kelas</label>
                    <input type="text" class="form-control" name="id_kelas" value="{{ $nilai->kelas->kelas }}" readonly>
                </div>

                <div class="mb-3">
                    <label class="form-label">Jurusan</label>
                    <input type="text" class="form-control" name="id_kelas" value="{{ $nilai->kelas->jurusan }}" readonly>
                </div>

                <div class="mb-3">
                    <label class="form-label">Try Out 1</label>
                    <input type="number" class="form-control" name="to1" value="{{ $nilai->to1 }}" readonly>
                </div>

                <div class="mb-3">
                    <label class="form-label">Try Out 2</label>
                    <input type="number" class="form-control" name="to2" value="{{ $nilai->to2 }}" readonly>
                </div>

                <div class="mb-3">
                    <label class="form-label">Try Out 3</label>
                    <input type="number" class="form-control" name="to3" value="{{ $nilai->to3 }}" readonly>
                </div>

                <div class="mb-3">
                    <label class="form-label">Try Out 4</label>
                    <input type="number" class="form-control" name="to4" value="{{ $nilai->to4 }}" readonly>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nilai Akhir To</label>
                    <input type="number" class="form-control" name="nilai_akhir" value="{{ $nilai->nilai_akhir }}" readonly>
                </div>

                <div class="mb-3">
                    <label class="form-label">Grade Nilai</label>
                    <input type="text" class="form-control" name="nilai_grade" value="{{ $nilai->nilai_grade }}" readonly>
                </div>

                <div class="mb-3" align="right">
                    <a href="{{ route('nilai.index') }}" class="btn btn-dark" data-bs-toggle="tooltip"
                        data-bs-placement="top" title="Kembali"><i class="bi bi-back"></i></a>
                </div>
            </div>
        </div>
    </div>
@endsection
