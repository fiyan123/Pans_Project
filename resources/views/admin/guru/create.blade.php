 <!-- Modal -->
 <div class="modal fade" id="guruModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Tambah Data Siswa</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form action="{{ route('guru.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Nip</label>
                        <input type="number" class="form-control  @error('nip') is-invalid @enderror" name="nip"
                            id="nip" value="{{ old('nip') }}" placeholder="nip" min="0" onkeypress="return hanyaAngka(event)">
                        @error('nip')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama</label>
                        <input type="text" class="form-control  @error('nama') is-invalid @enderror" name="nama"
                            value="{{ old('nama') }}" placeholder="nama">
                        @error('nama')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Mata Pelajaran</label>
                        <input type="text" class="form-control  @error('mata_pelajaran') is-invalid @enderror"
                            name="mata_pelajaran" value="{{ old('mata_pelajaran') }}" placeholder="mata pelajaran">
                        @error('mata_pelajaran')
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
                    <button type="reset" class="btn btn-light-secondary" id="btnReset" data-bs-toggle="tooltip" data-bs-placement="top">
                        <dt class="the-icon"><span class="fa-fw select-all fas"></span> Reset</dt>
                    </button>
                    <button type="submit" class="btn btn-primary" id="btnSimpan" data-bs-toggle="tooltip" data-bs-placement="top" disabled>
                        <dt class="the-icon"><span class="fa-fw select-all fas"></span> Simpan</dt>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Inputan Hanya Angka --}}
<script>
    function hanyaAngka(event) {
        var angka = (event.which) ? event.which : event.keyCode
        if (angka != 46 && angka > 31 && (angka < 48 || angka > 57))
            return false;
        return true;
    }
</script>
