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
                    <label class="form-label">Nisn</label>
                    <input type="number" class="form-control" name="id_siswa" value="{{ $nilai->siswa->nis }}" readonly>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nama Siswa</label>
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
                    <label class="form-label">Mata Pelajaran</label>
                    <input type="text" class="form-control" name="id_guru" value="{{ $nilai->guru->mata_pelajaran }}" readonly>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nilai Pengetauan</label>
                    <input type="number" class="form-control" name="nilai4" value="{{ $nilai->nilai1 }}" readonly>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nilai Keterampilan</label>
                    <input type="number" class="form-control" name="nilai3" value="{{ $nilai->nilai2 }}" readonly>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nilai Mata Pelajaran</label>
                    <input type="number" class="form-control" name="nilai1" value="{{ $nilai->nilai3 }}" readonly>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nilai Ujian</label>
                    <input type="number" class="form-control" name="nilai2" value="{{ $nilai->nilai4 }}" readonly>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nilai Akhir</label>
                    <input type="number" class="form-control" name="nilai_akhir" value="{{ $nilai->nilai_akhir }}" readonly>
                </div>

                <div class="mb-3">
                    <label class="form-label">Predikat</label>
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
