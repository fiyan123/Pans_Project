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
            <h3>Data Dari Guru {{ $guru->nama }}</h3>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('guru.update', $guru->id) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label class="form-label">Nip</label>
                        <input type="number" class="form-control  @error('nip') is-invalid @enderror"
                            name="nip" value="{{ $guru->nip }}">
                        @error('nip')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama</label>
                        <input type="text" class="form-control  @error('nama') is-invalid @enderror"
                            name="nama" value="{{ $guru->nama }}">
                        @error('nama')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Mata Pelajaran</label>
                        <input type="text" class="form-control  @error('mata_pelajaran') is-invalid @enderror"
                            name="mata_pelajaran" value="{{ $guru->mata_pelajaran }}">
                        @error('mata_pelajaran')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                    <label class="form-label">Jenis Kelamin</label>
                        <div class="form-check">
                            <input class="form-check-input @error('jenis_kelamin') is-invalid @enderror"
                                type="radio" name="jenis_kelamin" value="Laki-laki"
                            @if ($guru->jenis_kelamin == 'Laki-laki') checked @endif>
                            <label class="form-check-label">
                                Laki-laki
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input @error('jenis_kelamin') is-invalid @enderror"
                                type="radio" name="jenis_kelamin" value="Perempuan"
                                @if ($guru->jenis_kelamin == 'Perempuan') checked @endif>
                            <label class="form-check-label">
                                Perempuan
                            </label>
                        </div>
                        @error('jenis_kelamin')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3" align="right">
                        <button class="btn btn-primary" type="submit" data-bs-toggle="tooltip"
                            data-bs-placement="top" title="Simpan"><i class="bi bi-pen-fill"></i></button>
                        <a href="{{ route('guru.index') }}" class="btn btn-dark"data-bs-toggle="tooltip"
                            data-bs-placement="top" title="Batal"><i class="bi bi-back"></i></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
        
@endsection
