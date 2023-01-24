@extends('layouts.siswa')
@section('content')
    <!-- Bootstrap CSS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <div class="col-12" id="nilai">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3">Data Raport</h6>
            <h1 class="mb-3">Nilai Akhir Dari Siswa</h1>
        </div>
        <div class="card">
            <div class="card-body table-responsive">
                <table id="dataTable" class="table table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Guru</th>
                            <th>Nisn</th>
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>Jurusan</th>
                            <th>Nilai Kehadiran</th>
                            <th>Nilai Harian</th>
                            <th>Nilai Pas</th>
                            <th>Nilai Pat</th>
                            <th>Nilai Raport</th>
                            <th>Grade</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($nilai as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->guru->nama }}</td>
                                <td>{{ $data->siswa->nis }}</td>
                                <td>{{ $data->siswa->nama }}</td>
                                <td>{{ $data->kelas->kelas }}</td>
                                <td>{{ $data->kelas->jurusan }}</td>
                                <td>{{ $data->nilai_kehadiran }}</td>
                                <td>{{ $data->nilai_harian }}</td>
                                <td>{{ $data->pas }}</td>
                                <td>{{ $data->pat }}</td>
                                <td>{{ $data->raport }}</td>
                                <td>{{ $data->nilai_grade }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
