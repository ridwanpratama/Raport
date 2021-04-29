<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="#">SIM Raport</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="#">SIR</a>
        </div>
        <ul class="sidebar-menu">

            <li class="nav-item dropdown">
                <a href="{{ route('home') }}" class="nav-link ">
                    <i class="fas fa-home"></i>
                    <span>Home</span>
                </a>
            </li>

            @if (auth()->user()->level == 'admin')
                <li class="menu-header">Data Akademik</li>

                <li
                    class="nav-item dropdown {{ Request::is('siswa', 'siswa/create', 'mapel', 'mapel/create', 'guru', 'guru/create', 'jurusan', 'jurusan/create', 'siswa/trash', 'tahun_ajaran', 'tahun_ajaran/create') ? 'sidebar-item active' : '' }}">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-database"></i><span>Data
                            Master</span></a>
                    <ul class="dropdown-menu" style="display: none;">
                        <li
                            class="nav-item dropdown {{ Request::is('siswa', 'siswa/create', 'siswa/trash') ? 'sidebar-item active' : 'siswa.index' }}">
                            <a href="{{ route('siswa.index') }}" class="nav-link">
                                <span>Data Siswa</span>
                            </a>
                        </li>

                        <li
                            class="nav-item dropdown {{ Request::is('mapel', 'mapel/create') ? 'sidebar-item active' : '' }}">
                            <a class="nav-link" href="{{ route('mapel.index') }}">
                                <span>Data Mapel</span>
                            </a>
                        </li>

                        <li
                            class="nav-item dropdown {{ Request::is('guru', 'guru/create') ? 'sidebar-item active' : '' }}">
                            <a href="{{ route('guru.index') }}" class="nav-link">
                                <span>Data Guru</span>
                            </a>
                        </li>

                        <li
                            class="nav-item dropdown {{ Request::is('jurusan', 'jurusan/create') ? 'sidebar-item active' : '' }}">
                            <a href="{{ route('jurusan.index') }}" class="nav-link">
                                <span>Data Jurusan</span>
                            </a>
                        </li>

                        <li
                            class="nav-item dropdown {{ Request::is('rombel', 'rombel/create') ? 'sidebar-item active' : '' }}">
                            <a href="{{ route('rombel.index') }}" class="nav-link">
                                <span>Data Rombel</span>
                            </a>
                        </li>

                        <li
                            class="nav-item dropdown {{ Request::is('tahun_ajaran', 'tahun_ajaran/create') ? 'sidebar-item active' : '' }}">
                            <a href="{{ route('tahun_ajaran.index') }}" class="nav-link">
                                <span>Tahun Ajaran</span>
                            </a>
                        </li>

                    </ul>
                </li>
            @endif

            @if (auth()->user()->level == 'admin')
                <li class="menu-header">Data Non Akademik</li>
                <li
                    class="nav-item dropdown {{ Request::is('rayon', 'rayon/create', 'detail', 'detail/create', 'user', 'user/create') ? 'sidebar-item active' : '' }}">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-server"></i><span>Data Master</span></a>
                    <ul class="dropdown-menu">
                        <li
                            class="nav-item dropdown {{ Request::is('rayon', 'rayon/create') ? 'sidebar-item active' : '' }}">
                            <a href="{{ route('rayon.index') }}" class="nav-link">
                                <span>Data Rayon</span>
                            </a>
                        </li>

                        <li
                            class="nav-item dropdown {{ Request::is('detail', 'detail/create') ? 'sidebar-item active' : '' }}">
                            <a href="{{ route('detail.index') }}" class="nav-link">
                                <span>Data UPD</span>
                            </a>
                        </li>

                        <li
                            class="nav-item dropdown {{ Request::is('user', 'user/create') ? 'sidebar-item active' : '' }}">
                            <a href="{{ route('user.index') }}" class="nav-link">
                                <span>Data User</span>
                            </a>
                        </li>
                    </ul>
                </li>
            @endif

            <li class="menu-header">Kelola Nilai</li>

            <li
                class="nav-item dropdown {{ Request::is('nilai', 'nilai/create', 'raport', 'absen', 'absen/create', 'upd', 'upd/create', 'nilai/rombel', 'nilai/jurusan') ? 'sidebar-item active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-edit"></i><span>Kelola Nilai</span></a>
                <ul class="dropdown-menu" style="display: none;">

                    <li
                        class="nav-item dropdown {{ Request::is('absen', 'absen/create') ? 'sidebar-item active' : '' }}">
                        <a href="{{ route('absen.index') }}" class="nav-link">
                            <span>Data Absen</span>
                        </a>
                    </li>

                    <li
                        class="nav-item dropdown {{ Request::is('upd', 'upd/create') ? 'sidebar-item active' : '' }}">
                        <a href="{{ route('upd.index') }}" class="nav-link">
                            <span>Data Nilai UPD</span>
                        </a>
                    </li>

                    {{-- <li class="nav-item dropdown {{ Request::is('nilai/create') ? 'sidebar-item active' : '' }}">
                        <a href="{{ route('nilai.create') }}" class="nav-link">
                            <span>Input Nilai Mapel</span>
                        </a>
                    </li> --}}

                    <li class="nav-item dropdown {{ Request::is('nilai') ? 'sidebar-item active' : '' }}">
                        <a href="{{ route('nilai.index') }}" class="nav-link">
                            <span>Data Nilai</span>
                        </a>
                    </li>

                    <li class="nav-item dropdown {{ Request::is('raport') ? 'sidebar-item active' : '' }}">
                        <a href="{{ route('raport.index') }}" class="nav-link">
                            <span>Kelola Raport</span>
                        </a>
                    </li>

                    <li class="nav-item dropdown {{ Request::is('nilai/jurusan') ? 'sidebar-item active' : '' }}">
                        <a href="{{ route('list_jurusan') }}" class="nav-link">
                            <span>Input Nilai</span>
                        </a>
                    </li>

                </ul>
            </li>

            <li class="menu-header">Logout</li>

            <li class="nav-item dropdown">
                <a href="{{ route('logout') }}" class="nav-link"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                    <form action="{{ route('logout') }}" id="logout-form" method="POST">
                        @csrf
                    </form>
                </a>
            </li>

        </ul>
    </aside>
</div>
