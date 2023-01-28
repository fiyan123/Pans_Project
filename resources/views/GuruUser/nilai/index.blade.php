@extends('layouts.mazer')
@section('content')

    <!-- Bootstrap CSS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    {{-- Error Page --}}
    @if ($errors->any())
        @php
            toast('Data Tidak Valid!', 'error');
        @endphp
    @endif

    <div class="page-heading">
        <h3>Table Data Nilai Siswa</h3>
    </div>

    <section class="section">
        <div class="card">
            @include('sweetalert::alert')
            <div class="card-body">
                <div class="card-title mb-3" align="right">
                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#nilaiModal"
                        data-bs-placement="top" data-bs-backdrop="false">
                        <dt class="the-icon"><span class="fa-fw select-all fas"></span> Tambah Data</dt>
                    </button>
                </div>
                <table class="table table-bordered-striped" id="table_id">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Guru</th>
                            <th>Nisn</th>
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>Jurusan</th>
                            <th>Nilai Akhir To</th>
                            <th>Grade</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($nilai as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->guru->nama }}</td>
                                <td><span class="badge bg-primary">{{ $data->siswa->nis }}</span></td>
                                <td>{{ $data->siswa->nama }}</td>
                                <td>{{ $data->kelas->kelas }}</td>
                                <td>{{ $data->kelas->jurusan }}</td>
                                <td>{{ $data->nilai_akhir }}</td>
                                <td>{{ $data->nilai_grade }}</td>
                                <td>
                                    <form action="{{ route('nilai.destroy', $data->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <a href="{{ route('nilai.edit', $data->id) }}"
                                            class="btn btn-outline-success btn-icon-text" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Ubah Data">
                                            <dt class="the-icon"><span class="fa-fw select-all fas"></span></dt>
                                        </a> |
                                        <a href="{{ route('nilai.show', $data->id) }}"
                                            class="btn btn-outline-info btn-icon-text" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Detail Data">
                                            <dt class="the-icon"><span class="fa-fw select-all fas"></span></dt>
                                        </a> |
                                        {{-- <button type="button" class="btn btn-outline-danger btn-icon-text" data-bs-toggle="modal"
                                            data-bs-target="#modalCenter">
                                            <dt class="the-icon"><span class="fa-fw select-all fas"></span></dt>
                                        </button> --}}
                                        <button type="submit" class="btn btn-outline-danger btn-icon-text"
                                            onclick="return confirm('Hapus Data Ini?')" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Hapus Data">
                                            <i class="bi bi-trash-fill"></i>
                                        </button>

                                        {{-- Modal Delete --}}
                                        <div class="modal fade" id="modalCenter" tabindex="-1"
                                            aria-hidden="true">
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

                <a href="/downloadExcel" class="btn btn-info" data-bs-toggle="tooltip" data-bs-placement="top" title="Download Excel">
                    <dt class="the-icon"><span class="fa-fw select-all fas"></span> Download</dt>
                </a>

            </div>
        </div>
    </section>
    @include('GuruUser.nilai.create')

@endsection
