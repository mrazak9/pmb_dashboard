<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="/"><img src="{{ asset('img/logo.png') }}" alt="logo" width="100" class="shadow-light"></a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="/"><img src="{{ asset('img/lpkia.png') }}" alt="logo" width="25"
                    class="shadow-light"></a>
        </div>
        @if (Auth::user()->role == 'admin')
            <ul class="sidebar-menu">
                <li class="menu-header">Dashboard</li>
                <li class="{{ Request::is('blank-page') ? 'active' : '' }}">
                    <a class="nav-link" href="/"><i class="fas fa-fire"></i>
                        <span>
                            Dashboard
                        </span>
                    </a>
                </li>

                <li class="menu-header">Master</li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-users"></i>
                        <span>Pengguna</span></a>

                    <ul class="dropdown-menu">
                        <li class="{{ Request::is('users*') ? 'active' : '' }}">
                            <a class="nav-link" href="#"><i class="fas fa-user-secret"></i>
                                <span>
                                    Users
                                </span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a href="#" class="nav-link has-dropdown"><i class="fa-solid fa-gear"></i>
                        <span>Master</span></a>
                    <ul class="dropdown-menu">
                        <li class="{{ Request::is('periods*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('study-systems.index') }}"><i
                                    class="fa-solid fa-gears"></i>
                                <span>
                                    Sistem Kuliah
                                </span>
                            </a>
                        </li>
                    </ul>
                    <ul class="dropdown-menu">
                        <li class="{{ Request::is('kuesioner*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('study-programs.index') }}"><i
                                    class="fa-solid fa-gears"></i>
                                <span>
                                    Program Studi
                                </span>
                            </a>
                        </li>
                    </ul>
                    <ul class="dropdown-menu">
                        <li class="{{ Request::is('fix*') ? 'active' : '' }}">
                            <a class="nav-link" href="#"><i class="fa-solid fa-gears"></i>
                                <span>
                                    Konsentrasi
                                </span>
                            </a>
                        </li>
                    </ul>
                </li>



            </ul>
        @elseif(Auth::user()->role == 'pjlub')
            <ul class="sidebar-menu">
                <br>
                <li class="menu-header">Dashboard</li>
                <li class="{{ Request::is('blank-page') ? 'active' : '' }}">
                    <a class="nav-link" href="/"><i class="fas fa-fire"></i>
                        <span>
                            Dashboard
                        </span>
                    </a>
                </li>
                <li class="menu-header">Laporan</li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link has-dropdown"><i class="fa-solid fa-gear"></i>
                        <span>Laporan</span></a>
                    <ul class="dropdown-menu">
                        <li class="{{ Request::is('report/per-shcedule') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('report.index') }}">Laporan Perjadwal</a>
                        </li>
                    </ul>
                    <ul class="dropdown-menu">
                        <li class="{{ Request::is('admin/settings') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('report.perstudent') }}">Laporan Per Mahasiswa</a>
                        </li>
                    </ul>
                    <ul class="dropdown-menu">
                        <li class="{{ Request::is('admin/settings') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('report.perlecturer') }}">Laporan Per Dosen</a>
                        </li>
                    </ul>
                </li>
            </ul>
        @elseif(Auth::user()->role == 'dosen')
            <ul class="sidebar-menu">
                <li class="menu-header">Laporan</li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link has-dropdown"><i class="fa-solid fa-gear"></i>
                        <span>Laporan</span></a>
                    <ul class="dropdown-menu">
                        <li class="{{ Request::is('report/dosen') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('report.lecturer') }}">Kuesioner per Dosen</a>
                        </li>
                    </ul>
                </li>
            </ul>
        @elseif(Auth::user()->role == 'dosen-wali')
            <ul class="sidebar-menu">
                <li class="menu-header">Laporan</li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link has-dropdown"><i class="fa-solid fa-gear"></i>
                        <span>Laporan</span></a>
                    <ul class="dropdown-menu">
                        <li class="{{ Request::is('report/dosen') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('report.lecturer') }}">Kuesioner per Dosen</a>
                        </li>
                    </ul>

                    <ul class="dropdown-menu">
                        <li class="{{ Request::is('admin/settings') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('report.perstudent') }}">Laporan Per Mahasiswa</a>
                        </li>
                    </ul>

                </li>
            </ul>
        @elseif(Auth::user()->role == 'ketua')
            <ul class="sidebar-menu">
                <li class="menu-header">Laporan</li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link has-dropdown"><i class="fa-solid fa-gear"></i>
                        <span>Laporan</span></a>

                    <ul class="dropdown-menu">
                        <li class="{{ Request::is('admin/settings') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('report.perstudent') }}">Laporan Per Mahasiswa</a>
                        </li>
                    </ul>

                    <ul class="dropdown-menu">
                        <li class="{{ Request::is('report/dosen') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('report.lecturer') }}">Kuesioner per Dosen</a>
                        </li>
                    </ul>

                    <ul class="dropdown-menu">
                        <li class="{{ Request::is('admin/settings') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('report.perlecturer') }}">Laporan Semua Dosen</a>
                        </li>
                    </ul>
                </li>
            </ul>
        @elseif(Auth::user()->role == 'student')
            <ul class="sidebar-menu">
                <br>
                <li class="menu-header">LUB SISWA</li>
                <ul class="sidebar-menu">
                    <li class="{{ Request::is('listLub*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('siswa.listLub') }}"><i
                                class="fa-solid fa-list-check"></i>
                            <span>
                                List LUB
                            </span>
                        </a>
                    </li>
                    <li class="{{ Request::is('users*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('users.show', auth()->id()) }}"><i
                                class="fa-solid fa-user"></i>
                            <span>
                                Profil
                            </span>
                        </a>
                    </li>
                </ul>
            </ul>
        @endif

        <div class="hide-sidebar-mini mt-4 mb-4 p-3">
            <a href="https://helpdesk.lpkia.ac.id" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-circle-question"></i>Helpdesk LPKIA
            </a>
        </div>
    </aside>
</div>
