<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <div class="text-center mt-3 mb-3">
        <img src="{{ asset('storage/'.$profil->logo) }}" alt="Logo" class="brand-text" style="width: 100px;">
        <div class="brand-text mt-2">
            <h6 class="text-light">{{ strtoupper($profil->nama_instansi) }}</h6>
        </div>
    </div>

    <!-- Sidebar -->
    <div class="sidebar" style="margin-top: -10px;">

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
                <li class="nav-item nav-active">
                    <a href="/dashboard"
                        class="nav-link {{ Request::is('dashboard') ? 'bg-secondary bg-opacity-50 active active' : '' }}">
                        <i class="nav-icon bi bi-layout-text-sidebar-reverse"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li
                    class="nav-item has-treeview
                    {{ Request::is('dashboard/master*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-folder2-open"></i>
                        <p>
                            Data Master
                            <i class="bi bi-chevron-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item nav-active">
                            <a href="/dashboard/master/jabatan"
                                class="nav-link {{ Request::is('dashboard/master/jabatan') ? 'bg-secondary bg-opacity-50 active active' : '' }}">
                                <i class="nav-icon bi bi-arrow-return-right"></i>
                                <p>
                                    Jabatan Fungsional
                                </p>
                            </a>
                        </li>
                        <li class="nav-item nav-active">
                            <a href="/dashboard/master/guru"
                                class="nav-link {{ Request::is('dashboard/master/guru') ? 'bg-secondary bg-opacity-50 active active' : '' }}">
                                <i class="nav-icon bi bi-arrow-return-right"></i>
                                <p>
                                    Data Guru
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/dashboard/master/siswa"
                                class="nav-link {{ Request::is('dashboard/master/siswa*') ? 'bg-secondary bg-opacity-50 active' : '' }}">
                                <i class="nav-icon bi bi-arrow-return-right"></i>
                                <p>
                                    Data Siswa
                                </p>
                            </a>
                        </li>
                        <li class="nav-item nav-active">
                            <a href="/dashboard/master/kelas"
                                class="nav-link {{ Request::is('dashboard/master/kelas') ? 'bg-secondary bg-opacity-50 active active' : '' }}">
                                <i class="nav-icon bi bi-arrow-return-right"></i>
                                <p>
                                    Kelas Belajar
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/dashboard/master/user"
                                class="nav-link {{ Request::is('dashboard/master/user') ? 'bg-secondary bg-opacity-50 active' : '' }}">
                                <i class="nav-icon bi bi-arrow-return-right"></i>
                                <p>
                                    Data User
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview {{ Request::is('dashboard/media*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-film"></i>
                        <p>
                            Data Media
                            <i class="bi bi-chevron-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/dashboard/media/berita"
                                class="nav-link {{ Request::is('dashboard/media/berita*') ? 'bg-secondary bg-opacity-50 active active' : '' }}">
                                <i class="nav-icon bi bi-arrow-return-right"></i>
                                <p>
                                    Berita
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/dashboard/media/pengumuman-sekolah"
                                class="nav-link {{ Request::is('dashboard/media/pengumuman-sekolah*') ? 'bg-secondary bg-opacity-50 active active' : '' }}">
                                <i class="nav-icon bi bi-arrow-return-right"></i>
                                <p>
                                    Pengumuman Sekolah
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/dashboard/media/extrakurikuler"
                                class="nav-link {{ Request::is('dashboard/media/extrakurikuler') ? 'bg-secondary bg-opacity-50 active' : '' }}">
                                <i class="nav-icon bi bi-arrow-return-right"></i>
                                <p>
                                    Kegiatan Extrakurikuler
                                </p>
                            </a>
                        </li>
                        <li class="nav-item nav-active">
                            <a href="/dashboard/media/galeri"
                                class="nav-link {{ Request::is('dashboard/media/galeri*') ? 'bg-secondary bg-opacity-50 active active' : '' }}">
                                <i class="nav-icon bi bi-arrow-return-right"></i>
                                <p>
                                    Galeri Instansi
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/dashboard/media/video"
                                class="nav-link {{ Request::is('dashboard/media/video*') ? 'bg-secondary bg-opacity-50 active active' : '' }}">
                                <i class="nav-icon bi bi-arrow-return-right"></i>
                                <p>
                                    Video Dokumentasi
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="/dashboard/profil-instansi"
                        class="nav-link {{ Request::is('dashboard/profil-instansi*') ? 'bg-secondary bg-opacity-50 active' : '' }}">
                        <i class="nav-icon bi bi-info-square"></i>
                        <p>
                            Profil Instansi
                        </p>
                    </a>
                </li>

                <br><br><br><br><br><br><br>

            </ul>
        </nav>

    </div>
</aside>
