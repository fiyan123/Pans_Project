 <!-- Create Modal -->
 <div class="modal fade" id="nilaiModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered"  data-bs-backdrop="false">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel" style="color: black">Tambah Data Baru</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('nilai.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Nama Guru</label>
                        <select name="id_guru" class="form-control @error('id_guru') is-invalid @enderror" id="id_guru">
                            <option aria-disabled="true" hidden>pilih nama guru</option>
                            @foreach ($guru as $data)
                                <option value="{{ $data->id }}">{{ $data->nama }}</option>
                            @endforeach
                        </select>
                        @error('id_guru')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nama Siswa</label>
                        <select name="id_siswa" class="form-control @error('id_siswa') is-invalid @enderror" id="">
                            <option aria-disabled="true" hidden>pilih nama siswa</option>
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
                        <label class="form-label">Kelas</label>
                        <select name="id_kelas" class="form-control @error('id_kelas') is-invalid @enderror" id="">
                            <option aria-disabled="true" hidden>pilih kelas</option>
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
                        <label class="form-label">Nilai Kehadiran</label>
                        <input type="number" class="form-control  @error('nilai_kehadiran') is-invalid @enderror"
                            name="nilai_kehadiran" value="{{ old('nilai_kehadiran') }}" placeholder="nilai kehadiran">
                        @error('nilai_kehadiran')
                            <span class="invalid-feedback" role="alert">~
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nilai Harian</label>
                        <input type="number" class="form-control  @error('nilai_harian') is-invalid @enderror"
                            name="nilai_harian" value="{{ old('nilai_harian') }}" placeholder="nilai harian">
                        @error('nilai_harian')
                            <span class="invalid-feedback" role="alert">~
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nilai Pas</label>
                        <input type="number" class="form-control  @error('pas') is-invalid @enderror" name="pas"
                            value="{{ old('pas') }}" placeholder="nilai pas">
                        @error('pas')
                            <span class="invalid-feedback" role="alert">~
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nilai Pat</label>
                        <input type="number" class="form-control  @error('pat') is-invalid @enderror" name="pat"
                            value="{{ old('pat') }}" placeholder="nilai pat">
                        @error('pat')
                            <span class="invalid-feedback" role="alert">~
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-light-secondary" id="btnSimpan" data-bs-toggle="tooltip" data-bs-placement="top">
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
