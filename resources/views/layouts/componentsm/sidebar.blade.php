<div class="sidebar-wrapper active">
    <div class="sidebar-header">
        <div class="d-flex justify-content-center">
            <div class="logo">
                <a><img src="{{ asset('assetsm/images/logo/logo4.png') }}" alt="Logo" style="width: 200px; height:130px">
                    <p class="h5 mt-2">Web Penilaian Akhir</p>
                </a>
            </div>
        </div>
    </div>
    <nav class="sidebar-menu">
        <ul class="menu">
            <li class="sidebar-title">Pengguna</li>
            <li class="sidebar-item">
                <a class='sidebar-link'>
                    <dt class="the-icon"><span class="fa-fw select-all fas"></span></dt>
                    <span>{{ Auth::user()->name }}</span>
                </a>
            </li>

            <li class="sidebar-title">Main Menu</li>
            <li class="sidebar-item {{ Request::is('dashboard') ? 'active' : '' }}">
                <a href="/dashboard" class="sidebar-link">
                    <dt class="the-icon"><span class="fa-fw select-all fas"></span></dt>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="sidebar-item {{ Request::is('galeri') ? 'active' : '' }}">
                <a href="{{ url('/galeri') }}" class="sidebar-link">
                    <dt class="the-icon"><span class="fa-fw select-all fas"></span></dt>
                    <span>Galeri Sekolah</span>
                </a>
            </li>

            @can('guru')
                <li class="sidebar-item {{ Request::is('walikelas/nilai*') ? 'active' : '' }}">
                    <a href="{{ route('nilai.index') }}" class="sidebar-link">
                        <dt class="the-icon"><span class="fa-fw select-all fas"></span></dt>
                        <span>Penilaian Hasil Akhir</span>
                    </a>
                </li>
            @endcan

            @can('admin')
                <li class="sidebar-title">Admin Master</li>

                <li class="sidebar-item {{ Request::is('admin/kelas*') ? 'active' : '' }}">
                    <a href="{{ route('kelas.index') }}" class="sidebar-link">
                        <dt class="the-icon"><span class="fa-fw select-all fas"></span></dt>
                        <span>Data Kelas</span>
                    </a>
                </li>

                <li class="sidebar-item {{ Request::is('admin/guru*') ? 'active' : '' }}">
                    <a href="{{ route('guru.index') }}" class="sidebar-link">
                        <dt class="the-icon"><span class="fa-fw select-all fas"></span></dt>
                        <span>Data Guru</span>
                    </a>
                </li>

                <li class="sidebar-item {{ Request::is('admin/siswa*') ? 'active' : '' }}">
                    <a href="{{ route('siswa.index') }}" class="sidebar-link">
                        <dt class="the-icon"><span class="fa-fw select-all fas"></span></dt>
                        <span>Data Siswa</span>
                    </a>
                </li>
            @endcan

            <li class="sidebar-title">Aktifitas</li>
                <li class="sidebar-item  ">
                   
                    <form id="logOut" action="/logout" method="POST">
                        @csrf
                        <a class="sidebar-link" id="logOut">
                            <dt class="the-icon"><span class="fa-fw select-all-fill fas"></span></dt>
                            <span>Keluar</span>
                        </a>
                    </form>
                </li>
            </ul>
        </nav>
    <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
</div>

<!-- Modal Logout -->
<div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" align="center">
            <div class="modal-body">
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <img src="{{ asset('assetsm/images/exit.png') }}" style="width:200px" class="mb-3">
                    <h3>Lanjutkan Keluar ?</h3><br>
                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Batal</button>&nbsp;
                    <button type="submit" class="btn btn-primary">Keluar</button>
                </form>
            </div>
        </div>
    </div>
</div>


{{-- Script Logout --}}
<script>
    const logOut = document.getElementById('logOut');
    logOut.addEventListener('click', function() {
    Swal.fire({
    title: 'Apa Anda Yakin?',
    icon: 'question',
    showCancelButton: true,
    confirmButtonColor: '#7066e0',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Keluar'
    }).then((result) => {
    if (result.isConfirmed) {
        $('#logOut').submit()
        }
    });
});
</script>

