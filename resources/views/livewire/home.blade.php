<div>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
        integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />

    <title>{{ strtoupper($profil->nama_instansi) }} - {{ $title }}</title>

    <main id="main">

        <div wire:ignore.self class="container" data-aos="fade-up" data-aos-duration="1000"
            style="background-color: whitesmoke;">

            <div id="carouselExampleCaptions"class="carousel slide mb-4" data-bs-ride="carousel">
                <div class="carousel-inner border-danger" style="border-top: 2px solid;">
                    @if ($galeri->count() > 0)
                        @foreach ($galeri as $data)
                            <div class="carousel-item @if ($data->id_galeri == $galeri[0]->id_galeri) active @endif ">
                                <img src="{{ 'storage/' . $data->image }}" class="img-fluid mb-2 d-block w-100"
                                    style="filter: brightness(100%)">
                                <div class="carousel-caption" style="margin-bottom: -55px;">
                                    <p class="bg-light text-dark p-2 rounded border-danger"
                                        style="opacity: 0.8;border: 1px solid; font-size: pt;">
                                        {{ $data->judul }}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="carousel-item active mt-5">
                            <h5 class="text-center text-secondary">Galei Masih kosong</h5>
                            <div class="carousel-caption">
                            </div>
                        </div>
                    @endif
                </div>
                <button class="carousel-control-prev d-flex justify-content-start" type="button"
                    data-bs-target="#carouselExampleCaptions" data-bs-slide="prev" style="">
                    <span class="bg-danger p-1" aria-hidden="true">
                        <i class="bi bi-chevron-left"></i></span>
                    </span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next d-flex justify-content-end" type="button"
                    data-bs-target="#carouselExampleCaptions" data-bs-slide="next" style="">
                    <span class="bg-danger p-1" aria-hidden="false">
                        <i class="bi bi-chevron-right"></i></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-12">
                    <h5 class="text-danger text-center mt-4 mb-4" style="font-weight: 700;margin-left: 18px;">
                        SAMBUTAN KEPALA SEKOLAH
                    </h5>
                    <div class="d-flex justify-content-between mb-3" style="margin-top: -15px;">
                        <div class="border-danger"
                            style="width: 20px; height: 20px; border: 3px solid;border-radius: 50%;">
                        </div>
                        <div class="me-auto bg-danger" style="margin-top:10px;width: 100%; height: 2px;">
                        </div>
                        <div class="border-danger"
                            style="width: 20px; height: 20px; border: 3px solid;border-radius: 50%;">
                        </div>
                    </div>
                </div>
            </div>
            @if ($bacaSambutan)
                {!! $profil->kata_sambutan !!}
                <span wire:click="tutupSambutan" class="badge bg-danger" type="button" style="width: 130px;">
                    <span wire:loading.remove wire:target="tutupSambutan">Tutup sambutan</span>
                    <span wire:loading wire:target="tutupSambutan" class="spinner-border spinner-border-sm text-light"
                        role="status" aria-hidden="true" style="width: 10px;height: 10px;"></span>
                </span>
            @else
                <p style="text-align: left;">
                    Sambutan adalah salah satu jenis pidato yang memuat suatu rangkaian kalimat yang disampaikan secara
                    tertulis maupun secara lisan dalam menyambut suatu acara atau kegiatan yang akan dilaksanakan.
                    <span wire:click="bacaSambutan" class="badge bg-danger" type="button" style="width: 130px;">
                        <span wire:loading.remove wire:target="bacaSambutan">Baca sambutan</span>
                        <span wire:loading wire:target="bacaSambutan"
                            class="spinner-border spinner-border-sm text-light" role="status" aria-hidden="true"
                            style="width: 10px;height: 10px;"></span>
                    </span>
                </p>
            @endif

            <div class="row justify-content-center">
                <div class="col-md-12">
                    <h5 class="text-danger text-center mt-5 mb-4" style="font-weight: 700;margin-left: 18px;">
                        PROFIL SINGKAT SEKOLAH
                    </h5>
                    <div class="d-flex justify-content-between mb-3" style="margin-top: -15px;">
                        <div class="border-danger"
                            style="width: 20px; height: 20px; border: 3px solid;border-radius: 50%;">
                        </div>
                        <div class="me-auto bg-danger" style="margin-top:10px;width: 100%; height: 2px;">
                        </div>
                        <div class="border-danger"
                            style="width: 20px; height: 20px; border: 3px solid;border-radius: 50%;">
                        </div>
                    </div>
                </div>
            </div>
            <ol class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="me-auto">
                        <div class="fw-bold">NPSN</div>
                    </div>
                    <span class="text-secondary">{{ $profil->npsn }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="me-auto">
                        <div class="fw-bold">Akreditas</div>
                    </div>
                    <span class="text-secondary">{{ $profil->akreditas }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="me-auto">
                        <div class="fw-bold">Kepala Sekolah</div>
                    </div>
                    <span class="text-secondary">{{ $profil->kepala_instansi }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="me-auto">
                        <div class="fw-bold">Alamat</div>
                        <span
                            class="text-secondary">{{ $profil->alamat . ', Kel. ' . $profil->kelurahan . ', Kec. ' . $profil->kecamatan . ', Kab. ' . $profil->kabupaten . '-' . $profil->provinsi }}</span>
                    </div>
                </li>
                {{-- <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="me-auto">
                        <div class="fw-bold">Fasilitas Sekolah</div>
                        <span class="text-secondary">{!! $profil->fasilitas !!}</span>
                    </div>
                </li> --}}
            </ol>

            <div class="row justify-content-center">
                <div class="col-md-12">
                    <h5 class="text-danger text-center mt-5 mb-4" style="font-weight: 700;margin-left: 18px;">
                        STATISTIK UMUM
                    </h5>
                    <div class="d-flex justify-content-between mb-3" style="margin-top: -15px;">
                        <div class="border-danger"
                            style="width: 20px; height: 20px; border: 3px solid;border-radius: 50%;">
                        </div>
                        <div class="me-auto bg-danger" style="margin-top:10px;width: 100%; height: 2px;">
                        </div>
                        <div class="border-danger"
                            style="width: 20px; height: 20px; border: 3px solid;border-radius: 50%;">
                        </div>
                    </div>
                </div>
            </div>
            <ol class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="me-auto">
                        <div class="fw-normal">
                            <i class="bi bi-people fw-bold text-danger"></i> Jumlah Guru
                        </div>
                    </div>
                    <span class="text-secondary">{{ $guru->count() }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="me-auto">
                        <div class="fw-normal">
                            <i class="bi bi-people fw-bold text-danger"></i> Jumlah Siswa
                        </div>
                    </div>
                    <span class="text-secondary">{{ $siswa->count() }}</span>
                </li>
            </ol>


            @if ($informasi)
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <h5 class="text-danger text-center mt-5 mb-4" style="font-weight: 700;margin-left: 18px;">
                            INFORMASI SEKOLAH TERKINI
                        </h5>
                        <div class="d-flex justify-content-between mb-3" style="margin-top: -15px;">
                            <div class="border-danger"
                                style="width: 20px; height: 20px; border: 3px solid;border-radius: 50%;">
                            </div>
                            <div class="me-auto bg-danger" style="margin-top:10px;width: 100%; height: 2px;">
                            </div>
                            <div class="border-danger"
                                style="width: 20px; height: 20px; border: 3px solid;border-radius: 50%;">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="px-3">
                    <h5 style="font-weight: 600">{{ strtoupper($informasi->judul) }}
                        <span class="fw-normal text-secondary d-block" style="font-size: 10pt;">
                            <i class="bi bi-clock"></i> {{ $informasi->created_at }}
                        </span>
                    </h5>
                    {!! $informasi->isi !!}
                    <a href="/media/informasi-sekolah" class="fw-bold">Informasi Lainnya</a>
                </div>
            @else
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <h5 class="text-danger text-center mt-5 mb-4" style="font-weight: 700;margin-left: 18px;">
                            INFORMASI SEKOLAH TERKINI
                        </h5>
                        <div class="d-flex justify-content-between mb-3" style="margin-top: -15px;">
                            <div class="border-danger"
                                style="width: 20px; height: 20px; border: 3px solid;border-radius: 50%;">
                            </div>
                            <div class="me-auto bg-danger" style="margin-top:10px;width: 100%; height: 2px;">
                            </div>
                            <div class="border-danger"
                                style="width: 20px; height: 20px; border: 3px solid;border-radius: 50%;">
                            </div>
                        </div>
                    </div>
                </div>
                <h6 class="text-center text-secondary">Informasi kosong !</h6>
            @endif

            @if ($berita)
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <h5 class="text-danger text-center mt-5 mb-4" style="font-weight: 700;margin-left: 18px;">
                            BERITA TERKINI
                        </h5>
                        <div class="d-flex justify-content-between mb-3" style="margin-top: -15px;">
                            <div class="border-danger"
                                style="width: 20px; height: 20px; border: 3px solid;border-radius: 50%;">
                            </div>
                            <div class="me-auto bg-danger" style="margin-top:10px;width: 100%; height: 2px;">
                            </div>
                            <div class="border-danger"
                                style="width: 20px; height: 20px; border: 3px solid;border-radius: 50%;">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="px-3">
                    <h5 style="font-weight: 600">{{ strtoupper($berita->judul) }}
                        <span class="fw-normal text-secondary d-block" style="font-size: 10pt;">
                            <i class="bi bi-clock"></i> {{ $berita->created_at }}
                        </span>
                    </h5>
                    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active"></div>
                            <img src="{{ asset('storage/' . $berita->image) }}" class="d-block w-100 img-fluid">
                        </div>
                    </div>
                    {!! substr($berita->isi, 0, 1000) !!}
                    <a href=""></a>
                    <a href="/media/berita" class="fw-bold">Lihat selengkapnya</a>
                </div>
            @else
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <h5 class="text-danger text-center mt-5 mb-4" style="font-weight: 700;margin-left: 18px;">
                            BERITA TERKINI
                        </h5>
                        <div class="d-flex justify-content-between mb-3" style="margin-top: -15px;">
                            <div class="border-danger"
                                style="width: 20px; height: 20px; border: 3px solid;border-radius: 50%;">
                            </div>
                            <div class="me-auto bg-danger" style="margin-top:10px;width: 100%; height: 2px;">
                            </div>
                            <div class="border-danger"
                                style="width: 20px; height: 20px; border: 3px solid;border-radius: 50%;">
                            </div>
                        </div>
                    </div>
                </div>
                <h6 class="text-center text-secondary">Berita kosong !</h6>
            @endif

            <div class="row justify-content-center">
                <div class="col-md-12">
                    <h5 class="text-danger text-center mt-5 mb-4" style="font-weight: 700;margin-left: 18px;">
                        KALENDER TAHUN {{ date('Y') }}
                    </h5>
                    <div class="d-flex justify-content-between" style="margin-top: -15px;">
                        <div class="border-danger"
                            style="width: 20px; height: 20px; border: 3px solid;border-radius: 50%;">
                        </div>
                        <div class="me-auto bg-danger" style="margin-top:10px;width: 100%; height: 2px;">
                        </div>
                        <div class="border-danger"
                            style="width: 20px; height: 20px; border: 3px solid;border-radius: 50%;">
                        </div>
                    </div>
                </div>
            </div>
            <style>
                .datepicker,
                .table-condensed {
                    width: 100%;
                    height: 200px;
                    line-height: 35px;
                    font-size: 11pt;
                    /* padding-bottom: 100px; */
                }
            </style>
            <div style="padding-bottom:170px;" class="d-flex justify-content-center">
                <div id="datepicker" class="datepicker" size="30">
                    <span class="add-on">
                        <i class="icon-th"></i>
                    </span>
                </div>
            </div>

        </div>

        {{-- time --}}
        <script>
            $(function() {
                $(".datepicker").datepicker({
                    format: 'yyyy-mm-dd',
                    autoclose: true,
                    todayHighlight: true,
                });
            });
        </script>

    </main>

</div>
