<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nilai Akhir Siswa {{ Auth::user()->name }}</title>
</head>
<body onload="window.print()">
    <div class="col-12 table-responsive">
        <table class="table table-striped text-nowrap" border="1">
            <thead>
                <tr align="center">
                    <th>No</th>
                    <th>Nisn</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Kelas</th>
                    <th>Jurusan</th>
                    <th>Mata Pelajaran</th>
                    <th>Nilai Pelajaran</th>
                    <th>Nilai Keterampilan</th>
                    <th>Nilai Mata Pelajaran</th>
                    <th>Nilai Ujian</th>
                    <th>Nilai Akhir</th>
                    <th>Predikat</th>
                </tr>
            </thead>
            <tbody>
                @foreach($nilais as $data)
                    <tr align="center">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->siswa->nis }}</td>
                        <td>{{ $data->siswa->nama }}</td>
                        <td>{{ $data->siswa->jenis_kelamin }}</td>
                        <td>{{ $data->kelas->kelas }}</td>
                        <td>{{ $data->kelas->jurusan }}</td>
                        <td>{{ $data->guru->mata_pelajaran }}</td>
                        <td>{{ $data->nilai1 }}</td>
                        <td>{{ $data->nilai2 }}</td>
                        <td>{{ $data->nilai3 }}</td>
                        <td>{{ $data->nilai4 }}</td>
                        <td>{{ $data->nilai_akhir }}</td>
                        <td>{{ $data->nilai_grade }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>