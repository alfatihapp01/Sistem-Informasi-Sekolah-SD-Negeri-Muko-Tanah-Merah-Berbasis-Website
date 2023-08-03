<div>

    <title>{{ strtoupper($profil->nama_instansi) }} - {{ $title }}</title>

    <main id="main">

        <div wire:ignore.self class="container p-0" data-aos="fade-up" data-aos-duration="1000">

            <section wire:ignore.self class="breadcrumbs p-3 text-light" data-aos="fade-up" data-aos-duration="1000">
                <div class="d-flex justify-content-between align-items-center">
                    <h5><i class="bi bi-building"></i> {{ $title }}</h5>
                    <ol>
                        <li>
                            <a href="/" class="text-light"><i class="bi bi-house-fill"></i> Beranda</a>
                        </li>
                        {!! $subtitle !!}
                    </ol>
                </div>
            </section>

            <div class="row">
                <div class="col-md-12">
                    <div wire:ignore.self class="card mb-2" data-aos="fade-up" data-aos-duration="1000">
                        <div class="card-body">
                            <nav style="font-size: 10pt;">
                                <div class="nav nav-tabs" id="nav-tab" role="tablist" style="">
                                    <button class="nav-link active" id="nav-info-tab" data-bs-toggle="tab"
                                        data-bs-target="#nav-info" type="button" role="tab"
                                        aria-controls="nav-info" aria-selected="false">Biodata
                                        Sekolah</button>
                                    <button class="nav-link" id="nav-fasilitas-tab" data-bs-toggle="tab"
                                        data-bs-target="#nav-fasilitas" type="button" role="tab"
                                        aria-controls="nav-fasilitas" aria-selected="false">Fasilitas</button>
                                    <button class="nav-link" id="nav-visi-tab" data-bs-toggle="tab"
                                        data-bs-target="#nav-visi" type="button" role="tab"
                                        aria-controls="nav-visi" aria-selected="true">Visi & Misi</button>
                                    <button class="nav-link" id="nav-sejarah-tab" data-bs-toggle="tab"
                                        data-bs-target="#nav-sejarah" type="button" role="tab"
                                        aria-controls="nav-sejarah" aria-selected="false">Sejarah</button>
                                    <button class="nav-link" id="nav-sambutan-tab" data-bs-toggle="tab"
                                        data-bs-target="#nav-sambutan" type="button" role="tab"
                                        aria-controls="nav-sambutan" aria-selected="false">Kata
                                        Sambutan</button>
                                    <button class="nav-link" id="nav-struktur-tab" data-bs-toggle="tab"
                                        data-bs-target="#nav-struktur" type="button" role="tab"
                                        aria-controls="nav-struktur" aria-selected="false">Struktur
                                        Organisasi</button>
                                </div>
                            </nav>
                            <div class="tab-content pt-3" id="nav-tabContent">
                                <div class="tab-pane fade" id="nav-visi" role="tabpanel"
                                    aria-labelledby="nav-visi-tab" tabindex="0">
                                    <h5 class="card-title text-center">Visi</h5>
                                    {!! $profil->visi !!}

                                    <h5 class="card-title text-center">Misi</h5>
                                    {!! $profil->misi !!}
                                </div>
                                <div class="tab-pane fade" id="nav-fasilitas" role="tabpanel"
                                    aria-labelledby="nav-fasilitas-tab" tabindex="0">
                                    <h5 class="card-title">Fasilitas</h5>
                                    {!! $profil->fasilitas !!}
                                </div>
                                <div class="tab-pane fade" id="nav-sejarah" role="tabpanel"
                                    aria-labelledby="nav-sejarah-tab" tabindex="0">
                                    <h5 class="card-title text-center">Sejarah Singkat</h5>
                                    {!! $profil->sejarah !!}
                                </div>
                                <div class="tab-pane fade" id="nav-sambutan" role="tabpanel"
                                    aria-labelledby="nav-sambutan-tab" tabindex="0">
                                    <h5 class="card-title text-center">Kata Sambutan</h5>
                                    {!! $profil->kata_sambutan !!}
                                </div>
                                <div class="tab-pane fade" id="nav-struktur" role="tabpanel"
                                    aria-labelledby="nav-struktur-tab" tabindex="0">
                                    <center>
                                        <h5 class="card-title text-center mb-3">Struktur Organisasi</h5>
                                    </center>
                                    <div class="d-flex justify-content-center">
                                        @if ($profil->struktur_organisasi)
                                            <img class="img-fluid"
                                                src="{{ asset('storage/' . $profil->struktur_organisasi) }}"
                                                style="height: 500px;width: 80%;">
                                        @else
                                            <img class="img-fluid" src="/assets/img/logo.png">
                                        @endif
                                    </div>
                                </div>
                                <div class="tab-pane fade show active" id="nav-info" role="tabpanel"
                                    aria-labelledby="nav-info-tab" tabindex="0">
                                    <div class="d-flex justify-content-center">
                                        @if ($profil->logo)
                                            <img class="img-fluid" src="{{ asset('storage/' . $profil->logo) }}"
                                                style="width: 150px;">
                                        @else
                                            <img class="img-fluid" src="/assets/img/logo.png">
                                        @endif
                                    </div>
                                    <h3 class="misi-username text-center">
                                        {{ strtoupper($profil->nama_instansi) }}
                                    </h3>
                                    <div class="row mt-3 justify-content-center">
                                        <div class="col-md-6">
                                            <ol class="list-group mt-3">
                                                <li
                                                    class="list-group-item d-flex justify-content-between align-items-start">
                                                    <div class="me-auto">
                                                        <div class="fw-bold">NPSN</div>
                                                        {{ strtoupper($profil->npsn) }}
                                                    </div>
                                                </li>
                                                <li
                                                    class="list-group-item d-flex justify-content-between align-items-start">
                                                    <div class="me-auto">
                                                        <div class="fw-bold">Akreditas</div>
                                                        {{ strtoupper($profil->akreditas) }}
                                                    </div>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                                    <div class="me-auto">
                                                        <div class="fw-bold">Status</div>
                                                        {{ $profil->status }}
                                                    </div>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                                    <div class="me-auto">
                                                        <div class="fw-bold">No. SK Pendirian</div>
                                                        {{ $profil->no_sk_pendirian }}
                                                    </div>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                                    <div class="me-auto">
                                                        <div class="fw-bold">Tgl. SK Pendirian</div>
                                                        {{ $profil->tanggal_sk_pendirian }}
                                                    </div>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                                    <div class="me-auto">
                                                        <div class="fw-bold">No. SK Operasional</div>
                                                        {{ $profil->no_sk_operasional }}
                                                    </div>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                                    <div class="me-auto">
                                                        <div class="fw-bold">Tgl. SK Operasional</div>
                                                        {{ $profil->tanggal_sk_operasional }}
                                                    </div>
                                                </li>
                                                <li
                                                    class="list-group-item d-flex justify-content-between align-items-start">
                                                    <div class="me-auto">
                                                        <div class="fw-bold">Nama Kepala Sekolah</div>
                                                        {{ strtoupper($profil->kepala_instansi) }}
                                                    </div>
                                                </li>
                                                <li
                                                    class="list-group-item d-flex justify-content-between align-items-start">
                                                    <div class="me-auto">
                                                        <div class="fw-bold">NIP Kepala Sekolah</div>
                                                        {{ strtoupper($profil->nip) }}
                                                    </div>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                                    <div class="me-auto">
                                                        <div class="fw-bold">Operator</div>
                                                        {{ $profil->operator }}
                                                    </div>
                                                </li>
                                                <li
                                                    class="list-group-item d-flex justify-content-between align-items-start">
                                                    <div class="me-auto">
                                                        <div class="fw-bold">Kode POS</div>
                                                        {{ $profil->kode_pos }}
                                                    </div>
                                                </li>
                                                <li
                                                    class="list-group-item d-flex justify-content-between align-items-start">
                                                    <div class="me-auto">
                                                        <div class="fw-bold">Alamat</div>
                                                        {{ ucwords($profil->alamat . ', ' . $profil->kelurahan . ', ' . $profil->kecamatan . ', ' . $profil->kabupaten . ' - ' . $profil->provinsi) }}
                                                    </div>
                                                </li>
                                                <li
                                                    class="list-group-item d-flex justify-content-between align-items-start">
                                                    <div class="me-auto">
                                                        <div class="fw-bold">Nomor Telepon</div>
                                                        {{ $profil->telepon }}
                                                    </div>
                                                </li>
                                                <li
                                                    class="list-group-item d-flex justify-content-between align-items-start">
                                                    <div class="me-auto">
                                                        <div class="fw-bold">Alamat Email</div>
                                                        <a style="font-size: 10pt;"
                                                            href="mailto:{{ strtolower($profil->email) }}">{{ strtolower($profil->email) }}</a>
                                                    </div>
                                                </li>
                                                <li
                                                    class="list-group-item d-flex justify-content-between align-items-start">
                                                    <div class="me-auto">
                                                        <div class="fw-bold">Facebook</div>
                                                        {{ strtolower($profil->facebook) }}
                                                    </div>
                                                </li>
                                                <li
                                                    class="list-group-item d-flex justify-content-between align-items-start">
                                                    <div class="me-auto">
                                                        <div class="fw-bold">Instagram</div>
                                                        {{ strtolower($profil->instagram) }}
                                                    </div>
                                                </li>
                                                <li
                                                    class="list-group-item d-flex justify-content-between align-items-start">
                                                    <div class="me-auto">
                                                        <div class="fw-bold">Koordinat Latitude</div>
                                                        {{ $profil->latitude }}
                                                    </div>
                                                </li>
                                                <li
                                                    class="list-group-item d-flex justify-content-between align-items-start">
                                                    <div class="me-auto">
                                                        <div class="fw-bold">Koordinat Longitude</div>
                                                        {{ $profil->longitude }}
                                                    </div>
                                                </li>
                                            </ol>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
</div>
