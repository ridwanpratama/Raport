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

            @can('isAdmin')
                <li class="menu-header">Data Akademik</li>

                <li
                    class="nav-item dropdown {{ set_active(['siswa.index','siswa.create','siswa.edit','mapel.index','mapel.create','mapel.edit','kikd.index','kikid.create','kikd.edit','guru.index','guru.create','guru.edit','jurusan.index','jurusan.create','jurusan.edit','rombel.index','rombel.create','rombel.edit']) }}">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-database"></i><span>Data
                            Master</span></a>
                    <ul class="dropdown-menu" style="display: none;">
                        <li
                            class="nav-item dropdown {{ set_active(['siswa.index','siswa.edit','siswa.create']) }}">
                            <a href="{{ route('siswa.index') }}" class="nav-link">
                                <span>Data Siswa</span>
                            </a>
                        </li>

                        <li
                            class="nav-item dropdown {{ set_active(['mapel.index','mapel.edit','mapel.create']) }}">
                            <a class="nav-link" href="{{ route('mapel.index') }}">
                                <span>Data Mapel</span>
                            </a>
                        </li>

                        <li
                            class="nav-item dropdown {{ set_active(['kikd.index','kikd.edit','kikd.create']) }}">
                            <a class="nav-link" href="{{ route('kikd.index') }}">
                                <span>Data KI/KD</span>
                            </a>
                        </li>

                        <li
                            class="nav-item dropdown {{ set_active(['guru.index','guru.edit','guru.create']) }}">
                            <a href="{{ route('guru.index') }}" class="nav-link">
                                <span>Data Guru</span>
                            </a>
                        </li>

                        <li
                            class="nav-item dropdown {{ set_active(['jurusan.index','jurusan.edit','jurusan.create']) }}">
                            <a href="{{ route('jurusan.index') }}" class="nav-link">
                                <span>Data Jurusan</span>
                            </a>
                        </li>

                        <li
                            class="nav-item dropdown {{ set_active(['rombel.index','rombel.edit','rombel.create']) }}">
                            <a href="{{ route('rombel.index') }}" class="nav-link">
                                <span>Data Rombel</span>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="menu-header">Data Non Akademik</li>
                <li
                    class="nav-item dropdown {{ set_active(['rayon.index','rayon.create','rayon.edit','detail.index','detail.create','detail.edit','user.index','user.create','user.edit','tahun_ajaran.index','tahun_ajaran.create','tahun_ajaran.edit']) }}">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-server"></i><span>Data Master</span></a>
                    <ul class="dropdown-menu">
                        <li
                            class="nav-item dropdown {{ set_active(['rayon.index','rayon.create','rayon.edit']) }}">
                            <a href="{{ route('rayon.index') }}" class="nav-link">
                                <span>Data Rayon</span>
                            </a>
                        </li>

                        <li
                            class="nav-item dropdown {{ set_active(['detail.index','detail.create','detail.edit']) }}">
                            <a href="{{ route('detail.index') }}" class="nav-link">
                                <span>Data UPD</span>
                            </a>
                        </li>

                        <li
                            class="nav-item dropdown {{ set_active(['user.index','user.create','user.edit']) }}">
                            <a href="{{ route('user.index') }}" class="nav-link">
                                <span>Data User</span>
                            </a>
                        </li>

                        <li
                            class="nav-item dropdown {{ set_active(['tahun_ajaran.index','tahun_ajaran.create','tahun_ajaran.edit']) }}">
                            <a href="{{ route('tahun_ajaran.index') }}" class="nav-link">
                                <span>Tahun Ajaran</span>
                            </a>
                        </li>
                    </ul>
                </li>
            @endcan

            @can('isGuru')
                <li class="menu-header">Data Nilai</li>

            <li
                    class="nav-item dropdown {{ set_active(['absen.index','absen.edit','showAbsen','showUpd','upd.index','nilai.index','nilai_show','raport.index']) }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-edit"></i><span>Data Master</span></a>
                <ul class="dropdown-menu" style="display: none;">

                    <li
                        class="nav-item dropdown {{ set_active(['absen.index','absen.edit','showAbsen']) }}">
                        <a href="{{ route('absen.index') }}" class="nav-link">
                            <span>Data Absen</span>
                        </a>
                    </li>

                    <li class="nav-item dropdown {{ set_active(['upd.index','upd.edit','showUpd']) }}">
                      <a href="{{ route('upd.index') }}" class="nav-link">
                          <span>Data Nilai UPD</span>
                      </a>
                    </li>

                    <li class="nav-item dropdown {{ set_active(['nilai.index','nilai_show']) }}">
                        <a href="{{ route('nilai.index') }}" class="nav-link">
                            <span>Data Nilai</span>
                        </a>
                    </li>

                    <li class="nav-item dropdown {{ set_active(['raport.index']) }}">
                        <a href="{{ route('raport.index') }}" class="nav-link">
                            <span>Kelola Raport</span>
                        </a>
                    </li>

                </ul>
            </li>

            <li class="menu-header">Kelola Nilai</li>

            <li
                    class="nav-item dropdown {{ set_active(['pilih_jurusan','pilih_rombel','input_absen','data_jurusan','data_rombel','input_nilai_upd','upd.create','list_rombel','list_jurusan','input_nilai']) }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-edit"></i><span>Kelola Nilai</span></a>
                <ul class="dropdown-menu" style="display: none;">

                    <li
                        class="nav-item dropdown {{ set_active(['pilih_jurusan','pilih_rombel','input_absen']) }}">
                        <a href="{{ route('pilih_jurusan') }}" class="nav-link">
                            <span>Input Absen</span>
                        </a>
                    </li>

                    <li
                        class="nav-item dropdown {{ set_active(['data_jurusan','data_rombel','input_nilai_upd']) }}">
                        <a href="{{ route('data_jurusan') }}" class="nav-link">
                            <span>Input Nilai UPD</span>
                        </a>
                    </li>

                    <li class="nav-item dropdown {{ set_active(['list_rombel','list_jurusan','input_nilai']) }}">
                        <a href="{{ route('list_jurusan') }}" class="nav-link">
                            <span>Input Nilai</span>
                        </a>
                    </li>

                </ul>
            </li>
            @endcan

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
