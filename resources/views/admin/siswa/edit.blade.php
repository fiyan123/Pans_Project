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
            <h3>Data Dari Siswa {{ $siswa->nama }}</h3>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('siswa.update', $siswa->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label class="form-label">Nisn</label>
                        <input type="text" class="form-control  @error('nis') is-invalid @enderror" name="nis" value="{{ $siswa->nis }}" onkeypress="return hanyaAngka(event)" min="0">
                        @error('nis')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama</label>
                        <input type="text" class="form-control  @error('nama') is-invalid @enderror" name="nama" value="{{ $siswa->nama }}">
                        @error('nama')
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
                                    {{ $data->id == $siswa->id_kelas ? 'selected' : '' }}>
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
                        <label class="form-label">Jenis Kelamin</label>
                        <div class="form-check">
                            <input class="form-check-input @error('jenis_kelamin') is-invalid @enderror" type="radio" name="jenis_kelamin" value="Laki-laki"
                                @if ($siswa->jenis_kelamin == 'Laki-laki') checked @endif>
                            <label class="form-check-label">
                                Laki-laki
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input @error('jenis_kelamin') is-invalid @enderror" type="radio" name="jenis_kelamin" value="Perempuan"
                                 @if ($siswa->jenis_kelamin == 'Perempuan') checked @endif>
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
                    <button class="btn btn-primary" type="submit" data-bs-toggle="tooltip" data-bs-placement="top" title="Simpan"><i class="bi bi-pen-fill"></i></button>
                    <a href="{{ route('siswa.index') }}" class="btn btn-dark" data-bs-toggle="tooltip"
                        data-bs-placement="top" title="Batal"><i class="bi bi-back"></i></a>
                    </div>
                </form>
            </div>
        </div>
    </div>

{{-- Inputan Hanya Angka --}}
<script>
    function hanyaAngka(event) {
        var angka = (event.which) ? event.which : event.keyCode
        if (angka != 46 && angka > 31 && (angka < 48 || angka > 57))
            return false;
        return true;
    }
</script>
@endsection
