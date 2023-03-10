<div class="sidebar-wrapper active">
    <div class="sidebar-header">
        <div class="d-flex justify-content-center">
            <div class="logo">
                <a><img src="{{ asset('assetsm/images/logo/logo5.png') }}" alt="Logo" style="width: 230px; height:170px; padding-left:30px">
                    <p class="h5" align="center">Penilaian Akhir Nilai Siswa</p>
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

            @can('admin')
                <li class="sidebar-title">Admin Master</li>

                <li class="sidebar-item {{ Request::is('dashboard') ? 'active' : '' }}">
                    <a href="/dashboard" class="sidebar-link">
                        <dt class="the-icon"><span class="fa-fw select-all fas"></span></dt>
                        <span>Dashboard</span>
                    </a>
                </li>

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

            <li class="sidebar-title">Main Menu</li>

            @can('guru')
                <li class="sidebar-item {{ Request::is('guru/nilai*') ? 'active' : '' }}">
                    <a href="{{ route('nilai.index') }}" class="sidebar-link">
                        <dt class="the-icon"><span class="fa-fw select-all fas"></span></dt>
                        <span>Penilaian Siswa</span>
                    </a>
                </li>
            @endcan

            <li class="sidebar-item {{ Request::is('nilai_akhir*') ? 'active' : '' }}">
                <a href="{{ url('/nilai_akhir') }}" class="sidebar-link">
                    <dt class="the-icon"><span class="fa-fw select-all fas"></span></dt>
                    <span>Data Nilai Siswa</span>
                </a>
            </li>


            {{-- <li class="sidebar-item {{ Request::is('galeri') ? 'active' : '' }}">
                <a href="{{ url('/galeri') }}" class="sidebar-link">
                    <dt class="the-icon"><span class="fa-fw select-all fas"></span></dt>
                    <span>Galeri Sekolah</span>
                </a>
            </li> --}}

            <hr><li class="sidebar-item">  
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

