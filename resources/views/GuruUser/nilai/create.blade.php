@extends('layouts.guru')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @include('layouts/_flash')
                <div class="card">
                    <div class="card-header bg-primary mb-2" align="center" style="color: white">
                        DATA DARI SISWA
                    </div>
                    <div class="card-body">
                        <form action="{{ route('data_nilai.store') }}" method="post">
                            @csrf
                              <div class="mb-3">
                                <label class="form-label">NIP GURU</label>
                                <select name="id_guru" class="form-control @error('id_guru') is-invalid @enderror"
                                    id="">
                                    @foreach ($guru as $data)
                                        <option value="{{ $data->id }}">{{ $data->nip }}</option>
                                    @endforeach
                                </select>
                                @error('id_guru')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                              <div class="mb-3">
                                <label class="form-label">NISN SISWA</label>
                                <select name="id_siswa" class="form-control @error('id_siswa') is-invalid @enderror"
                                    id="">
                                    @foreach ($siswa as $data)
                                        <option value="{{ $data->id }}">{{ $data->nis }}</option>
                                    @endforeach
                                </select>
                                @error('id_siswa')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="mb-3">
                                <label class="form-label">NAMA SISWA</label>
                                <select name="id_siswa" class="form-control @error('id_siswa') is-invalid @enderror"
                                    id="">
                                    @foreach ($siswa as $data)
                                        <option value="{{ $data->id }}">{{ $data->nama }}</option>
                                    @endforeach
                                </select>
                                @error('id_siswa')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                             <div class="mb-3">
                                <label class="form-label">KELAS</label>
                                <select name="id_kelas" class="form-control @error('id_kelas') is-invalid @enderror"
                                    id="">
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
                                <label class="form-label">JURUSAN</label>
                                <select class="form-control @error('id_kelas') is-invalid @enderror"
                                    id="">
                                    @foreach ($kelas as $data)
                                        <option value="{{ $data->id }}">{{ $data->jurusan }}</option>
                                    @endforeach
                                </select>
                                @error('id_kelas')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <br>
                            <div align="center"><h3><u>DATA NILAI SISWA</u></h3></div>
                            <br>

                            <div class="mb-3">
                                <label class="form-label">NILAI KEHADIRAN</label>
                                <input type="number" class="form-control  @error('nilai_kehadiran') is-invalid @enderror"
                                    name="nilai_kehadiran">
                                @error('nilai_kehadiran')
                                    <span class="invalid-feedback" role="alert">~
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">NILAI HARIAN</label>
                                <input type="number" class="form-control  @error('nilai_harian') is-invalid @enderror"
                                    name="nilai_harian">
                                @error('nilai_harian')
                                    <span class="invalid-feedback" role="alert">~
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">NILAI PAS</label>
                                <input type="number" class="form-control  @error('pas') is-invalid @enderror"
                                    name="pas">
                                @error('pas')
                                    <span class="invalid-feedback" role="alert">~
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">NILAI PAT</label>
                                <input type="number" class="form-control  @error('pat') is-invalid @enderror"
                                    name="pat">
                                @error('pat')
                                    <span class="invalid-feedback" role="alert">~
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <div class="d-grid gap-2">
                                    <button class="btn btn-info" type="submit">SIMPAN</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection