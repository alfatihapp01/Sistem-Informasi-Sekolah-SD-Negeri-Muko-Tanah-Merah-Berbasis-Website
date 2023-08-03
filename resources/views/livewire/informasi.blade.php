<div>

    <title>{{ ucwords($profil->nama_instansi) }} - {{ $title }}</title>

    <main id="main">

        <div wire:ignore.self class="container p-0" data-aos="fade-up" data-aos-duration="1000">

            <section wire:ignore.self class="breadcrumbs p-3 text-light" data-aos="fade-up" data-aos-duration="1000">
                <div class="d-flex justify-content-between align-items-center">
                    <h5><i class="bi bi-megaphone"></i> {{ $title }}</h5>
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
                        @if ($informasi->count())
                            @if ($informasi_opsi)
                                @php
                                    $judul = strtolower($informasi_opsi->judul);
                                    $tanggal = explode(' ', $informasi_opsi->created_at);
                                @endphp

                                <div class="card-body">
                                    <h6 class="card-title" style="font-size: 12pt;">
                                        {{ $tanggal[0] }} <span style="font-size: 10pt;font-style: italic;"
                                            class="text-secondary"> -
                                            {{ $informasi_opsi->created_at->diffForHumans() }}</span>
                                    </h6>
                                    <h4 class="mb-3" style="font-weight: 700px;">{{ ucwords($judul) }}</h4>

                                    {!! $informasi_opsi->isi !!}
                                </div>
                            @else
                                @php
                                    $judul = strtolower($informasi_terbaru->judul);
                                    $tanggal = explode(' ', $informasi_terbaru->created_at);
                                @endphp

                                <div class="card-body">
                                    <h6 class="card-title" style="font-size: 12pt;">
                                        {{ $tanggal[0] }} <span style="font-size: 10pt;font-style: italic;"
                                            class="text-secondary"> -
                                            {{ $informasi_terbaru->created_at->diffForHumans() }}</span>
                                    </h6>
                                    <h4 class="mb-3" style="font-weight: 700px;">{{ ucwords($judul) }}</h4>

                                    {!! $informasi_terbaru->isi !!}

                                </div>
                            @endif
                        @else
                            <p class="text-center text-secondary mt-3">Informasi Sekolah kosong !</p>
                        @endif
                    </div>
                </div>
                <div class="col-md-4">
                    <div wire:ignore.self class="card mb-2" data-aos="fade-up" ddata-aos-duration="1000">
                        <div class="card-header">Pengumuman Lainnya </div>
                        <div class="card-body">
                            @foreach ($informasi as $data)
                                <div type="button" wire:click="informasi_opsi({{ $data->id_informasi }})">
                                    <div class="card mb-3" style="max-width: 540px;">
                                        <div class="row g-0">
                                            {{-- <div class="col-md-4">
                                                <img src="{{ asset('storage/' . $data->image) }}" class="img-fluid"
                                                    style="height: 100%;">
                                            </div> --}}
                                            <div class="col-md-8">
                                                <div class="card-body">
                                                    @php
                                                        $judul = strtolower($data->judul);
                                                    @endphp
                                                    <h6 class="card-title">{{ ucwords($judul) }}</h6>
                                                    <p class="card-text"><small
                                                            class="text-muted">{{ $data->created_at->diffForHumans() }}</small>
                                                        <span wire:loading
                                                            wire:target="informasi_opsi({{ $data->id_informasi }})"
                                                            class="spinner-border spinner-border-sm text-primary"
                                                            role="status" aria-hidden="true" style="">
                                                        </span>
                                                    </p>
                                                    <a href="/media/informasi/{{ $data->slug }}" sty><small><i class="bi bi-eye"></i>  Lihat full halaman</small></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div class="d-flex justify-content-end">{{ $informasi->links() }}</div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>

</div>
