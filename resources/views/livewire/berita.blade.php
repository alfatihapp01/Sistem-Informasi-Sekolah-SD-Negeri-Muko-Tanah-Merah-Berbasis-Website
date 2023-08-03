<div>

    <title>{{ strtoupper($profil->nama_instansi) }} - {{ $title }}</title>

    <main id="main">

        <div wire:ignore.self class="container p-0" data-aos="fade-up" data-aos-duration="1000">

            <section wire:ignore.self class="breadcrumbs p-3 text-light" data-aos="fade-up" data-aos-duration="1000">
                <div class="d-flex justify-content-between align-items-center">
                    <h5><i class="bi bi-newspaper"></i> {{ $title }}</h5>
                    <ol>
                        <li>
                            <a href="/" class="text-light"><i class="bi bi-house-fill"></i> Beranda</a>
                        </li>
                        {!! $subtitle !!}
                    </ol>
                </div>
            </section>

            <div class="row">
                <div class="col-md-8">
                    <div wire:ignore.self class="card mb-2" data-aos="fade-up" ddata-aos-duration="1000">
                        @if ($berita->count())
                            @if ($berita_opsi)
                                @php
                                    $judul = strtolower($berita_opsi->judul);
                                    $tanggal = explode(' ', $berita_opsi->created_at);
                                @endphp

                                <div class="card-body">
                                    <h5 class="card-title mb-2">{{ $tanggal[0] }} <span
                                            style="font-size: 10pt;font-style: italic;"
                                            class="text-secondary">{{ $berita_opsi->created_at->diffForHumans() }}</span>
                                    </h5>
                                    <h4 class="mb-3" style="font-weight: 700px;">{{ strtoupper($judul) }}</h4>
                                    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                                        <div class="carousel-inner">
                                            <div class="carousel-item active"></div>
                                            <img src="{{ asset('storage/' . $berita_opsi->image) }}"
                                                class="d-block w-100 img-fluid" style="height: 310px;">
                                        </div>
                                    </div>

                                    @if ($showFullText)
                                        <div class="row">
                                            <div class="col-md-12">
                                                {!! $berita_opsi->isi !!}
                                            </div>
                                        </div>
                                        <a type="button" class="text-primary mb-3" wire:click="closeFullText"
                                            style="margin-top: px;">Lihat
                                            lebih sedikit
                                            <span wire:loading wire:target="closeFullText"
                                                class="spinner-border spinner-border-sm text-primary" role="status"
                                                aria-hidden="true" style="">
                                            </span>
                                        </a>
                                    @else
                                        <p class="card-text">
                                            {{ $berita_opsi->excerpt }}
                                            <a type="button" class="text-primary" wire:click="fullText">Lihat
                                                selengkapnya
                                            </a>
                                            <span wire:loading wire:target="fullText"
                                                class="spinner-border spinner-border-sm text-primary" role="status"
                                                aria-hidden="true" style="">
                                            </span>
                                        </p>
                                    @endif

                                </div>
                            @else
                                @php
                                    $judul = strtolower($berita_terbaru->judul);
                                    $tanggal = explode(' ', $berita_terbaru->created_at);
                                @endphp

                                <div class="card-body">
                                    <h5 class="card-title mb-2">{{ $tanggal[0] }} <span
                                            style="font-size: 10pt;font-style: italic;"
                                            class="text-secondary">{{ $berita_terbaru->created_at->diffForHumans() }}</span>
                                    </h5>
                                    <h4 class="mb-3" style="font-weight: 700px;">{{ strtoupper($judul) }}</h4>

                                    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                                        <div class="carousel-inner">
                                            <div class="carousel-item active"></div>
                                            <img src="{{ asset('storage/' . $berita_terbaru->image) }}"
                                                class="d-block w-100 img-fluid" style="height: 310px;">
                                        </div>
                                    </div>


                                    @if ($showFullText)
                                        <div class="row">
                                            <div class="col-md-12">
                                                {!! $berita_terbaru->isi !!}
                                            </div>
                                        </div>
                                        <div type="button" class="text-primary mb-3" wire:click="closeFullText"
                                            style="margin-top: px;">Lihat
                                            lebih sedikit
                                            <span wire:loading wire:target="closeFullText"
                                                class="spinner-border spinner-border-sm text-primary" role="status"
                                                aria-hidden="true" style="">
                                            </span>
                                        </div>
                                    @else
                                        <p class="card-text">
                                            {{ $berita_terbaru->excerpt }}
                                            <span type="button" class="text-primary" wire:click="fullText">Lihat
                                                selengkapnya
                                            </span>
                                            <span wire:loading wire:target="fullText"
                                                class="spinner-border spinner-border-sm text-primary" role="status"
                                                aria-hidden="true" style="">
                                            </span>
                                        </p>
                                    @endif

                                </div>
                            @endif
                        @else
                            <p class="text-center text-secondary mt-3">Berita kosong !</p>
                        @endif
                    </div>
                </div>
                <div class="col-md-4">
                    <div wire:ignore.self class="card mb-2" data-aos="fade-up" ddata-aos-duration="1000">
                        <div class="card-header">Berita Lainnya</div>
                        <div class="card-body">
                            @foreach ($berita as $data)
                                <div type="button" wire:click="berita_opsi({{ $data->id_berita }})">
                                    <div class="card mb-3" style="max-width: 540px;">
                                        <li class="list-group-item p-1 border-0 d-flex justify-content-between mb-2"
                                            style="border-top: 0px;border-right: 0px;">
                                            <div class="d-flex align-items-center" style="width: 35%;">
                                                <img src="{{ asset('storage/' . $data->image) }}" class="img-fluid"
                                                    style="width: 100%;height: 100%;">
                                            </div>
                                            <div style="width: 75%;padding-left: 5px;">
                                                <p style="font-size: 11pt;">
                                                    {{ $data->judul }}
                                                    <span style="font-size: 10pt;" class="d-block">
                                                        <i class="bi bi-clock"></i>
                                                        {{ $data->created_at->diffForHumans() }}
                                                        <span wire:loading
                                                            wire:target="berita_opsi({{ $data->id_berita }})"
                                                            class="spinner-border spinner-border-sm text-primary"
                                                            role="status" aria-hidden="true" style="">
                                                        </span>
                                                    </span>
                                                </p>
                                                <a href="/media/berita/{{ $data->slug }}"><small><i class="bi bi-eye"></i> Lihat full halaman</small></a>
                                            </div>
                                        </li>
                                    </div>
                                </div>
                            @endforeach
                            <div class="d-flex justify-content-end">{{ $berita->links() }}</div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>

</div>
