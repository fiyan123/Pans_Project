@extends('layouts.mazer')
@section('content')

    <!-- Bootstrap CSS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    {{-- Error Page --}}
    @if ($errors->any())
        @php
            toast('Data tidak valid!', 'error');
        @endphp
    @endif

    <div class="page-heading">
        <h3>Table Data Siswa</h3>
    </div>

    <section class="section">
        <div class="card">
            @include('sweetalert::alert')
            <div class="card-body">
                <div class="card-title mb-3" align="right">
                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#siswaModal"
                        data-bs-placement="top" title="Tambah Data Baru">
                        <dt class="the-icon"><span class="fa-fw select-all fas"></span> Tambah Data</dt>
                    </button>
                </div>
                <table class="table table-striped-bordered" id="dataTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nisn</th>
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>Jurusan</th>
                            <th>Jenis Kelamin</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($siswa as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><span class="badge bg-warning">{{ $data->nis }}</span></td>
                                <td>{{ $data->nama }}</td>
                                <td>{{ $data->kelas->kelas }}</td>
                                <td>{{ $data->kelas->jurusan }}</td>
                                <td>{{ $data->jenis_kelamin }}</td>
                                <td>
                                    <form action="{{ route('siswa.destroy', $data->id) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <a href="{{ route('siswa.edit', $data->id) }}"
                                            class="btn btn-outline-success btn-icon-text" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Ubah Data">
                                            <dt class="the-icon"><span class="fa-fw select-all fas"></span></dt>
                                        </a> |
                                        <a href="{{ route('siswa.show', $data->id) }}"
                                            class="btn btn-outline-info btn-icon-text" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Detail Data">
                                            <dt class="the-icon"><span class="fa-fw select-all fas"></span></dt>
                                        </a> |
                                        <button type="submit" class="btn btn-outline-danger btn-icon-text"
                                            onclick="return confirm('Hapus Data Ini?')" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Hapus Data">
                                            <dt class="the-icon"><span class="fa-fw select-all fas"></span></dt>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="siswaModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">Tambah Data Baru</h4>
                </div>

                <div class="modal-body">
                    <form action="{{ route('siswa.store') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Nisn</label>
                            <input type="number" class="form-control @error('nis') is-invalid @enderror" name="nis"
                                id="nis" value="{{ old('nis') }}" placeholder="nis">

                            @error('nis')
                                <span class="invalid-feedback" role="alert">~
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Nama</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama"
                                value="{{ old('nama') }}" placeholder="nama">

                            @error('nama')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Kelas</label>
                            <select name="id_kelas" class="form-control @error('id_kelas') is-invalid @enderror" id="" value="{{ old('id_kelas') }}">
                                <option value="" hidden>pilih kelas</option>
                                @foreach ($kelas as $data)
                                    <option value="{{ $data->id }}">{{ $data->kelas }}</option>
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
                                <input class="form-check-input @error('jenis_kelamin') is-invalid @enderror" type="radio"
                                    name="jenis_kelamin" value="Laki-laki">
                                <label class="form-check-label">
                                    Laki-laki
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input @error('jenis_kelamin') is-invalid @enderror" type="radio"
                                    name="jenis_kelamin" value="Perempuan">
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
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-warning" id="btnSimpan" data-bs-toggle="tooltip" data-bs-placement="top">
                            <dt class="the-icon"><span class="fa-fw select-all fas"></span> Reset</dt>
                        </button>
                        <button type="submit" class="btn btn-primary" id="btnSimpan" data-bs-toggle="tooltip" data-bs-placement="top">
                            <dt class="the-icon"><span class="fa-fw select-all fas"></span> Simpan</dt>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        const simpanButton = document.getElementById("simpan");
        const nisButton = document.getElementById("nis");

        kelas.addEventListener("keyup", (e) => {
            const value = e.currentTarget.value;

            if (value === "") {
                simpanButton.disabled = true;
            } else {
                simpanButton.disabled = false;
            }
        });
    </script>
@endsection
