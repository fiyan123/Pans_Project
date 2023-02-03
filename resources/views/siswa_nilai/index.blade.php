@extends('layouts.siswa')
@section('content')

    <!-- Bootstrap CSS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <div class="text-center wow fadeInUp" data-wow-delay="0.1s" id="nilai">
        <h6 class="section-title bg-white text-center text-primary px-3">Data Nilai Akhir</h6>
        <h1 class="mb-3">Nilai Akhir Dari Siswa</h1>
    </div>
   
    <section class="section">
        <div class="card">
            <div class="card-body">
                <table class="table" id="dataTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nis</th>
                            <th>Nama</th>
                            <th>Kelas</th>
                            {{-- <th>Jurusan</th> --}}
                            <th>Mata Pelajaran</th>
                            <th>Nilai pengetauan</th>
                            <th>Nilai keterampilan</th>
                            <th>Nilai mata pelajaran</th>
                            <th>Nilai ujian</th>
                            <th>Nilai akhir</th>
                            {{-- <th>Grade</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($nilai as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><span class="badge bg-primary">{{ $data->siswa->nis }}</span></td>
                                <td>{{ $data->siswa->nama }}</td>
                                <td>{{ $data->kelas->kelas }}</td>
                                {{-- <td>{{ $data->kelas->jurusan }}</td> --}}
                                <td>{{ $data->guru->mata_pelajaran }}</td>
                                <td>{{ $data->to1 }}</td>
                                <td>{{ $data->to2}}</td>
                                <td>{{ $data->to3 }}</td>
                                <td>{{ $data->to4 }}</td>
                                <td>{{ $data->nilai_akhir }}</td>
                                {{-- <td>{{ $data->nilai_grade }}</td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
