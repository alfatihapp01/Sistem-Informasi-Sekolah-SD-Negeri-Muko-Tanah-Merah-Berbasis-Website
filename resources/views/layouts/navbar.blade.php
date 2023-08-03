<div style="background-color: rgb(220, 53, 69);">
    <header id="header" class="px-3 d-flex align-items-center container">
        <div class="container d-flex align-items-center justify-content-between">

            <div class="logo me-auto" style="width: 100%;">
                <table>
                    <tr>
                        <td style="width: 50px;">
                            <a href="/">
                                <img class="" src="{{ asset('storage/' . $profil->logo) }}" class="img-fluid">
                            </a>
                        </td>
                        <td>
                            <span
                                style="font-size: 12pt;font-weight: bolder;">{{ strtoupper($profil->nama_instansi) }}</span>
                        </td>
                    </tr>
                </table>
            </div>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto {{ Request::is('/') ? 'active' : ' ' }}" href="/">Beranda</a>
                    </li>
                    <li><a class="nav-link scrollto {{ Request::is('profil-sekolah') ? 'active' : ' ' }}"
                            href="/profil-sekolah">Profil Sekolah</a>
                    </li>
                    <li class="dropdown">
                        <a href="#"><span>Data Sekolah</span> <i class="bi bi-chevron-down"></i>
                        </a>
                        <ul>
                            <li><a class="nav-link scrollto {{ Request::is('data-sekolah/tenaga-pendidik') ? 'active' : ' ' }}"
                                    href="/data-sekolah/tenaga-pendidik">Tenaga Pendidik</a>
                            </li>
                            <li><a class="nav-link scrollto {{ Request::is('data-sekolah/statistik-sekolah') ? 'active' : ' ' }}"
                                    href="/data-sekolah/statistik-sekolah">Statistik Sekolah</a>
                            </li>
                            <li><a class="nav-link scrollto {{ Request::is('data-sekolah/cek-peserta-didik') ? 'active' : ' ' }}"
                                    href="/data-sekolah/cek-peserta-didik">Cek Peserta Didik</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#"><span>Media</span> <i class="bi bi-chevron-down"></i>
                        </a>
                        <ul>
                            <li><a class="nav-link scrollto {{ Request::is('media/berita') ? 'active' : ' ' }}"
                                    href="/media/berita">Berita</a></li>
                            <li><a class="nav-link scrollto {{ Request::is('media/pengumuman-sekolah') ? 'active' : ' ' }}"
                                    href="/media/pengumuman-sekolah">Pengumuman Sekolah</a></li>
                            <li><a class="nav-link scrollto {{ Request::is('media/video-dokumentasi') ? 'active' : ' ' }}"
                                    href="/media/video-dokumentasi">Video Dokumentasi</a></li>
                            <li><a class="nav-link scrollto {{ Request::is('media/galeri-sekolah') ? 'active' : ' ' }}"
                                    href="/media/galeri-sekolah">Galeri Sekolah</a></li>
                        </ul>
                    </li>
                    <li><a class="nav-link scrollto {{ Request::is('informasi-ekstrakurikuler') ? 'active' : ' ' }}"
                            href="/informasi-ekstrakurikuler">Extrakurikuler</a>
                    </li>
                    @auth
                        <li><a class="nav-link scrollto" href="#" id="dashboard">My Dashboard</a></li>
                        <li><a class="nav-link scrollto text-danger" href="#" id="logout">Logout</a></li>
                    @else
                        <li><a class="nav-link scrollto {{ Request::is('administrator') ? 'active' : ' ' }}"
                                href="/administrator">Administrator</a>
                        </li>
                    @endauth
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>
        </div>
    </header>
</div>

<form action="/logout" method="post" id="formLogout">
    @csrf
</form>

<script>
    $(document).on('click', '#dashboard', function() {
        window.location.href = '/dashboard';
    })
    $(document).on('click', '#logout', function() {
        $('#formLogout').submit();
    })
</script>
