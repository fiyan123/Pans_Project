@extends('layouts.mazer')
@section('content')

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
        <h3>Table Data Kelas</h3>
    </div>

    <section class="section">
        <div class="card">
            @include('sweetalert::alert')
            <div class="card-body">
                <div class="card-title mb-3" align="right">
                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#kelasModal"
                        data-bs-placement="top" title="Tambah Data Baru">
                        <dt class="the-icon"><span class="fa-fw select-all fas"></span> Tambah Data</dt>
                    </button>
                </div>
                <table class="table table-striped-bordered" id="table1">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Kelas</th>
                            <th>Jurusan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kelas as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->kelas }}</td>
                                <td>{{ $data->jurusan }}</td>
                                <td>
                                    <form action="{{ route('kelas.destroy', $data->id) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <a href="{{ route('kelas.edit', $data->id) }}"
                                            class="btn btn-outline-success btn-icon-text" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Ubah Data">
                                            <dt class="the-icon"><span class="fa-fw select-all fas"></span></dt>
                                        </a> |
                                        <a href="{{ route('kelas.show', $data->id) }}"
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


    <!-- Modal Create Data -->
    <div class="modal fade" id="kelasModal" tabindex="-1" aria-labelledby="kelasModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" style="color: black">Tambah Data Baru</h5>
                </div>

                <div class="modal-body">
                    <form action="{{ route('kelas.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Kelas</label>
                            <input type="text" class="form-control  @error('kelas') is-invalid @enderror" name="kelas"
                                id="kelas" value="{{ old('kelas') }}" placeholder="kelas">
                            @error('kelas')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Jurusan</label>
                            <input type="text" class="form-control  @error('jurusan') is-invalid @enderror"
                                name="jurusan" id="jurusan" value="{{ old('jurusan') }}" placeholder="jurusan">
                            @error('jurusan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-warning" id="btnReset" data-bs-toggle="tooltip" data-bs-placement="top">
                            <dt class="the-icon"><span class="fa-fw select-all fas"></span> Reset</dt>
                        </button>
                        <button type="submit" class="btn btn-primary" id="btnSimpan" data-bs-toggle="tooltip" data-bs-placement="top" disabled>
                            <dt class="the-icon"><span class="fa-fw select-all fas"></span> Simpan</dt>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    {{-- Script Button --}}
    <script>
        const simpanButton = document.getElementById("btnSimpan");
        const kelasButton = document.getElementById("kelas");

        kelas.addEventListener("keyup", (e) => {
            const value = e.currentTarget.value;

            if (value === "") {
                simpanButton.disabled = true;
            } else {
                simpanButton.disabled = false;
            }
        });

        // Button hapus
        function enable() {
            var check = document.getElementById('check');
            var btnHapus = document.getElementById('btnHapus');

            if (check.checked) {
                btnHapus.removeAttribute("disabled");
            } else {
                btnHapus.disabled = "true";
            }
        };

        // Button Loading
        var btnKirim   = document.getElementById('btnKirim');
        var btnLoading = document.getElementById('btnLoading');

        btnLoading.style.display = 'none';

        function startProses() {
            btnKirim.style.display = 'none';
            btnLoading.style.display = 'block';
        }
    </script>
@endsection
