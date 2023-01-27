<!-- Modal -->
<div class="modal fade" id="siswaModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Tambah Data Baru</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('siswa.store') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Nisn</label>
                        <input type="number" class="form-control @error('nis') is-invalid @enderror" name="nis"
                            id="nis" value="{{ old('nis') }}" placeholder="nis">

                        @error('nis')
                            <span class="invalid-feedback" role="alert">~
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nama</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama"
                            value="{{ old('nama') }}" placeholder="nama">

                        @error('nama')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Kelas</label>
                        <select name="id_kelas" class="form-control @error('id_kelas') is-invalid @enderror" id="" value="{{ old('id_kelas') }}">
                            <option value="" hidden>pilih kelas</option>
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
                        <label class="form-label">Jenis Kelamin</label>
                        <div class="form-check">
                            <input class="form-check-input @error('jenis_kelamin') is-invalid @enderror" type="radio"
                                name="jenis_kelamin" value="Laki-laki">
                            <label class="form-check-label">
                                Laki-laki
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input @error('jenis_kelamin') is-invalid @enderror" type="radio"
                                name="jenis_kelamin" value="Perempuan">
                            <label class="form-check-label">
                                Perempuan
                            </label>
                        </div>

                        @error('jenis_kelamin')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-warning" id="btnSimpan" data-bs-toggle="tooltip" data-bs-placement="top">
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
