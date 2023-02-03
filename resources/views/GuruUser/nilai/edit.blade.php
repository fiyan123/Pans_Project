@extends('layouts.mazer')

@section('content')
    <div class="container">
        <div id="spinner"
            class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <span class="sr-only">Loading...</span>
            <img src="{{ asset('assetsm/vendors/svg-loaders/audio.svg') }}" class="me-4" style="width: 5rem" alt="audio">
        </div>
    </div>
    <div class="col-md-13">
        <div class="page-heading">
            <h3>Data Dari Nilai {{ $nilai->siswa->nama }}, Kelas {{ $nilai->kelas->kelas }}</h3>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('nilai.update', $nilai->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
        
                    <div class="mb-3">
                        <label class="form-label">Pilih Nama Siswa</label>
                        <select name="id_siswa" class="form-control @error('id_siswa') is-invalid @enderror">
                            @foreach ($siswa as $data)
                                <option value="{{ $data->id }}"
                                    {{ $data->id == $nilai->id_siswa ? 'selected' : '' }}>
                                    {{ $data->nama }}
                                </option>
                            @endforeach
                        </select>
                        @error('id_siswa')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Pilih Data Kelas</label>
                        <select name="id_kelas" class="form-control @error('id_kelas') is-invalid @enderror">
                            @foreach ($kelas as $data)
                                <option value="{{ $data->id }}"
                                    {{ $data->id == $nilai->id_kelas ? 'selected' : '' }}>
                                    {{ $data->kelas }}
                                </option>
                            @endforeach
                        </select>
                        @error('id_kelas')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Pilih Mata Pelajaran</label>
                        <select name="id_guru" class="form-control @error('id_guru') is-invalid @enderror">
                            @foreach ($guru as $data)
                                <option value="{{ $data->id }}"
                                    {{ $data->id == $nilai->id_guru ? 'selected' : '' }}>
                                    {{ $data->mata_pelajaran }}
                                </option>
                            @endforeach
                        </select>
                        @error('id_guru')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>


                    <div class="mb-3">
                        <label class="form-label">Nilai Pelajaran</label>
                        <input type="number" class="form-control  @error('to1') is-invalid @enderror"
                            name="to1" value="{{ $nilai->to1 }}">
                        @error('to1')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nilai Ujian</label>
                        <input type="number" class="form-control  @error('to2') is-invalid @enderror"
                            name="to2" value="{{ $nilai->to2 }}">
                        @error('to2')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nilai Keterampilan</label>
                        <input type="number" class="form-control  @error('to3') is-invalid @enderror"
                            name="to3" value="{{ $nilai->to3 }}">
                        @error('to3')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nilai Pengetauan</label>
                        <input type="number" class="form-control  @error('to4') is-invalid @enderror"
                            name="to4" value="{{ $nilai->to4 }}">
                        @error('to4')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3" align="right">
                        <button class="btn btn-primary" type="submit" data-bs-toggle="tooltip"
                            data-bs-placement="top" title="Simpan"><i class="bi bi-pen-fill"></i></button>
                        <a href="{{ route('nilai.index') }}" class="btn btn-dark" data-bs-toggle="tooltip"
                            data-bs-placement="top" title="Batal"><i class="bi bi-back"></i></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
