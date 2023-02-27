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
            <h3>Detail Nilai Pelajaran {{ $nilais->guru->mata_pelajaran }}, Dari {{ $nilais->siswa->nama }}</h3>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Nisn</label>
                    <input type="text" class="form-control" name="nis" value="{{ $nilais->siswa->nis }}" readonly>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" class="form-control" name="nama" value="{{ $nilais->siswa->nama }}" readonly>
                </div>

                <div class="mb-3">
                    <label class="form-label">Jenis Kelamin</label>
                    <input type="text" class="form-control " name="nis" value="{{ $nilais->siswa->jenis_kelamin }}" readonly>
                </div>

                <div class="mb-3">
                    <label class="form-label">Kelas</label>
                    <input type="text" class="form-control" name="id_kelas" value="{{ $nilais->kelas->kelas }}" readonly>
                </div>

                <div class="mb-3">
                    <label class="form-label">Jurusan</label>
                    <input type="text" class="form-control" name="id_kelas" value="{{ $nilais->kelas->jurusan }}" readonly>
                </div>

                {{-- <div class="mb-3">
                    <label class="form-label">Mata Pelajaran</label>
                    <input type="text" class="form-control" name="id_kelas" value="{{ $nilais->guru->mata_pelajaran }}" readonly>
                </div> --}}

                <div class="mb-3">
                    <label class="form-label">Nilai Pengetauan</label>
                    <input type="text" class="form-control" name="nilai1" value="{{ $nilais->nilai1}}" readonly>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nilai Keterampilan</label>
                    <input type="text" class="form-control" name="nilai2" value="{{ $nilais->nilai2}}" readonly>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nilai Mata Pelajaran</label>
                    <input type="text" class="form-control" name="nilai3" value="{{ $nilais->nilai3}}" readonly>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nilai Ujian</label>
                    <input type="text" class="form-control" name="nilai4" value="{{ $nilais->nilai4}}" readonly>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nilai Akhir</label>
                    <input type="text" class="form-control" name="nilai_akhir" value="{{ $nilais->nilai_akhir}}" readonly>
                </div>

                <div class="mb-3">
                    <label class="form-label">Predikat</label>
                    <input type="text" class="form-control" name="nilai_grade" value="{{ $nilais->nilai_grade}}" readonly>
                </div>

                <div class="mb-3" align="right">
                    <a href="{{ url('nilai_akhir') }}" class="btn btn-dark" data-bs-toggle="tooltip"
                    data-bs-placement="top" title="Kembali"><i class="bi bi-back"></i></a>
                </div>
            </div>
        </div>
    </div>
@endsection
