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
                        <label class="form-label">Try Out 1</label>
                        <input type="number" class="form-control  @error('to1') is-invalid @enderror"
                            name="to1" value="{{ old('to1') }}" placeholder="try out 1">
                        @error('to1')
                            <span class="invalid-feedback" role="alert">~
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Try Out 2</label>
                        <input type="number" class="form-control  @error('to2') is-invalid @enderror"
                            name="to2" value="{{ old('to2') }}" placeholder="try out 2">
                        @error('to2')
                            <span class="invalid-feedback" role="alert">~
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Try Out 3</label>
                        <input type="number" class="form-control  @error('to3') is-invalid @enderror" name="to3"
                            value="{{ old('to3') }}" placeholder="nilai to 3">
                        @error('to3')
                            <span class="invalid-feedback" role="alert">~
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Try Out 4</label>
                        <input type="number" class="form-control  @error('to4') is-invalid @enderror" name="to4"
                            value="{{ old('to4') }}" placeholder="nilai to 4">
                        @error('to4')
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
