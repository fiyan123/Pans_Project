<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nilai Akhir Siswa</title>
</head>
<body>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nisn Siswa</th>
                <th>Nama Siswa</th>
                <th>Jenis Kelamin</th>
                <th>Kelas</th>
                <th>Jurusan</th>
                <th>Mata Pelajaran</th>
                <th>Nilai Pengetauan</th>
                <th>Nilai Keterampilan</th>
                <th>Nilai Mata Pelajaran</th>
                <th>Nilai Ujian</th>
                <th>Nilai Akhir</th>
                <th>Predikat</th>
            </tr>
        </thead>
        <tbody>
            @foreach($nilais as $data)
                <tr>
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
</body>
</html>