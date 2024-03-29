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
                    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">
                        Import Excel
                    </button>
                </div>
                <table class="table" id="table_id">
                    <thead>
                        <tr>
                            <th>No</th>
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
                                        {{-- <button type="button"  class="btn btn-outline-danger btn-icon-text" data-bs-toggle="modal"
                                            data-bs-target="#modalCenter">
                                            <dt class="the-icon"><span class="fa-fw select-all fas"></span></dt>
                                        </button> --}}
                                        <button type="submit" class="btn btn-outline-danger btn-icon-text"
                                            onclick="return confirm('Hapus Data Ini?')" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Hapus Data">
                                            <i class="bi bi-trash-fill"></i>
                                        </button>

                                        {{-- Modal Delete --}}
                                        <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="modalCenterTitle">Apakah Anda
                                                            Yakin?
                                                        </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">
                                                            Kembali
                                                        </button>
                                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>


    <!-- Modal Import -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Pilih File Yang Akan Di Import</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('ImportKelas') }}" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        <input type="file" name="file" id="">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="sumbit" class="btn btn-primary">Import File</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @include('admin.kelas.create')

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
        var btnKirim = document.getElementById('btnKirim');
        var btnLoading = document.getElementById('btnLoading');

        // Periksa apakah elemen ditemukan sebelum mencoba mengakses properti 'style'
        if (btnKirim !== null && btnLoading !== null) {
            btnLoading.style.display = 'none';

            function startProses() {
                if (btnKirim !== null && btnLoading !== null) {
                    btnKirim.style.display = 'none';
                    btnLoading.style.display = 'block';
                } else {
                    console.error("Elemen tidak ditemukan.");
                }
            }
        } else {
            console.error("Elemen tidak ditemukan.");
        }
    </script>
@endsection
