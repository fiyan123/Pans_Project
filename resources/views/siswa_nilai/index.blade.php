@extends('layouts.mazer')
@section('content')

    <!-- Bootstrap CSS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <div class="page-heading">
        <h3>Table Nilai {{ Auth::user()->name }}</h3>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-body">
                <table class="table table-bordered-striped" id="table_id">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nis</th>
                            <th>Nama</th>
                            <th>Mata Pelajaran</th>
                            <th>Nilai Akhir</th> 
                            <th>Predikat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($nilais as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><span class="badge bg-primary">{{ $data->siswa->nis }}</span></td>
                                <td>{{ $data->siswa->nama }}</td>
                                <td>{{ $data->guru->mata_pelajaran }}</td>
                                <td>{{ $data->nilai_akhir }}</td>
                                <td>{{ $data->nilai_grade }}</td>
                                <td>
                                    <a href="{{ route('nilai_akhir.show', $data->id) }}"
                                        class="btn btn-outline-info btn-icon-text" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Detail Data">
                                        <dt class="the-icon"><span class="fa-fw select-all fas"></span></dt>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                
                {{-- Export Nilai --}}
                <a href="/exportNilaiExcel" class="btn btn-info" data-bs-toggle="tooltip" data-bs-placement="top" title="Download Excel">
                    <dt class="the-icon"><span class="fa-fw select-all fas"></span> Download</dt>
                </a>
                
            </div>
        </div>
    </section>
@endsection
