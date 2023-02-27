 <!-- Create Modal -->
 <div class="modal fade" id="nilaiModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered"  data-bs-backdrop="false">

        {{-- Validasi Data Sama --}}
        <div class="alert alert-duplicate alert-danger fade show" hidden role="alert">
            <strong>Data Telah Ada!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" data-dismiss="alert" aria-label="Close"></button>
        </div>

        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Tambah Data Nilai Baru</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('nilai.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Kelas</label>
                        <select name="id_kelas" id="kelas"
                            class="form-select @error('id_kelas') is-invalid @enderror">
                            @foreach ($kelas as $data)
                                <option hidden>pilih kelas</option>
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
                        <label class="form-label">Nama Siswa</label>
                        <select name="id_siswa" id="siswa_kelas"
                            class="form-select @error('id_siswa') is-invalid @enderror">
                            <option value="" hidden>pilih kelas terlebih dahulu</option>
                        </select>
                        @error('id_siswa')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Mata Pelajaran</label>
                        <select name="id_guru" class="form-select @error('id_guru') is-invalid @enderror" id="id_guru">
                            <option aria-disabled="true" hidden>pilih mata pelajaran</option>
                            @foreach ($guru as $data)
                                <option value="{{ $data->id }}">{{ $data->mata_pelajaran }}</option>
                            @endforeach
                        </select>
                        @error('id_guru')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="row g-2">
                        <div class="col mb-3">
                            <label class="form-label">Nilai Pengetauan</label>
                            <input type="number" class="form-control @error('nilai1') is-invalid @enderror"
                                name="nilai1" value="{{ old('nilai1') }}" placeholder="input nilai" min="0" max="100" onkeypress="return hanyaAngka(event)">
                            @error('nilai1')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col mb-3">
                            <label class="form-label">Nilai Keterampilan</label>
                            <input type="number" class="form-control @error('nilai2') is-invalid @enderror" name="nilai2"
                                value="{{ old('nilai2') }}" placeholder="input nilai" min="0" max="100" onkeypress="return hanyaAngka(event)">
                            @error('nilai2')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row g-2">
                        <div class="col mb-3">
                            <label class="form-label">Nilai Mata pelajaran</label>
                            <input type="number" class="form-control @error('nilai3') is-invalid @enderror" name="nilai3"
                                value="{{ old('nilai3') }}" placeholder="input nilai" min="0" max="100" onkeypress="return hanyaAngka(event)">
                            @error('nilai3')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col mb-3">
                            <label class="form-label">Nilai ujian</label>
                            <input type="number" class="form-control @error('nilai4') is-invalid @enderror" name="nilai4"
                                value="{{ old('nilai4') }}" placeholder="input nilai" min="0" max="100" onkeypress="return hanyaAngka(event)">
                            @error('nilai4')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous">
</script>
    
{{-- Inputan Hanya Angka --}}
<script>
    function hanyaAngka(event) {
        var angka = (event.which) ? event.which : event.keyCode
        if (angka != 46 && angka > 31 && (angka < 48 || angka > 57))
            return false;
        return true;
    }

    $(document).ready(function() {
        $('#kelas').on('change', function() {
            var id_kelas = $(this).val();
            if (id_kelas) {
                $.ajax({
                    url: '/guru/getsiswa/' + id_kelas,
                    type: "GET",
                    data: {
                        "_token": "{{ csrf_token() }}"
                    },
                    dataType: "json",
                    success: function(data) {
                        if (data) {
                            $('#siswa_kelas').empty();
                            $('#siswa_kelas').append(
                                '<option hidden>pilih nama siswa</option>');
                            $.each(data, function(key, siswa_kelas) {
                                $('select[name="id_siswa"]').append(
                                    '<option value="' + siswa_kelas.id + '">' +
                                        siswa_kelas.nama + '</option>');
                            });
                        } else {
                            $('#siswa_kelas').empty();
                        }
                    }
                });
            } else {
                $('#siswa_kelas').empty();
            }
        });
    });
</script>
