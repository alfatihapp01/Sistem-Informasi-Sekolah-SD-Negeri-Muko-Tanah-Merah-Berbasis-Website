<div>

    <title>{{ ucwords($profil->nama_instansi) }} - {{ $title }}</title>

    <main id="main">

        <div wire:ignore.self class="container p-0" data-aos="fade-up" data-aos-duration="1000">

            <section wire:ignore.self class="breadcrumbs p-3 text-light" data-aos="fade-up" data-aos-duration="1000">
                <div class="d-flex justify-content-between align-items-center">
                    <h5><i class="bi bi-camera-video"></i> {{ $title }}</h5>
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
                        @if ($video->count())
                            @if ($video_opsi)

                                @php
                                    $judul = strtolower($video_opsi->judul);
                                    $tanggal = explode(' ', $video_opsi->created_at);
                                @endphp

                                <div class="card-body">

                                    <h5 class="card-title mb-2">{{ $tanggal[0] }} <span
                                            style="font-size: 10pt;font-style: italic;"
                                            class="text-secondary">{{ $video_opsi->created_at->diffForHumans() }}</span>
                                    </h5>

                                    <h4 style="font-weight: 700px;" class="mb-2">{{ ucwords($judul) }}</h4>

                                    <iframe width="100%" height="500"
                                        src="{{ asset('storage/' . $video_opsi->video) }}"></iframe>

                                    @if ($showFullText)
                                        {!! $video_opsi->isi !!}
                                        <div type="button" class="text-primary mb-3" wire:click="closeFullText"
                                            style="margin-top: -10px;">Lihat
                                            lebih sedikit
                                        </div>
                                    @else
                                        <p class="card-text">
                                            {{ $video_opsi->excerpt }}
                                            <span type="button" class="text-primary" wire:click="fullText">Lihat
                                                selengkapnya
                                            </span>
                                        </p>
                                    @endif

                                </div>
                            @else
                                @php
                                    $judul = strtolower($video_terbaru->judul);
                                    $tanggal = explode(' ', $video_terbaru->created_at);
                                @endphp

                                <div class="card-body">
                                    <h5 class="card-title mb-2">{{ $tanggal[0] }} <span
                                            style="font-size: 10pt;font-style: italic;"
                                            class="text-secondary">{{ $video_terbaru->created_at->diffForHumans() }}</span>
                                    </h5>

                                    <h4 style="font-weight: 700px;" class="mb-2">{{ ucwords($judul) }}</h4>
                                    <iframe width="100%" height="500"
                                        src="{{ asset('storage/' . $video_terbaru->video) }}"></iframe>

                                    @if ($showFullText)
                                        {!! $video_terbaru->isi !!}
                                        <div type="button" class="text-primary mb-3" wire:click="closeFullText"
                                            style="margin-top: -10px;">Lihat
                                            lebih sedikit
                                        </div>
                                    @else
                                        <p class="card-text">
                                            {{ $video_terbaru->excerpt }}
                                            <span type="button" class="text-primary" wire:click="fullText">Lihat
                                                selengkapnya
                                            </span>
                                        </p>
                                    @endif

                                </div>
                            @endif
                        @else
                            <p class="text-center text-secondary mt-3">Video kosong !</p>
                        @endif
                    </div>
                </div>
                <div class="col-md-4">
                    <div wire:ignore.self class="card mb-2" data-aos="fade-up" ddata-aos-duration="1000">
                        <div class="card-header">Video Lainnya</div>
                        <div class="card-body">
                            @foreach ($video as $data)
                                <div type="button" wire:click="video_opsi({{ $data->id_video }})">
                                    <div class="card mb-3" style="max-width: 540px;">
                                        <li class="list-group-item p-1 border-0 d-flex justify-content-between mb-2"
                                            style="border-top: 0px;border-right: 0px;">
                                            <div class="d-flex align-items-center" style="width: 35%;">
                                                <img src="/assets/svg/video.svg" class="img-fluid"
                                                    style="width: 100%;height: 100%;">
                                            </div>
                                            <div style="width: 75%;padding-left: 5px;">
                                                <p style="font-size: 11pt;">
                                                    {{ $data->judul }}
                                                    <span style="font-size: 10pt;" class="d-block">
                                                        <i class="bi bi-clock"></i>
                                                        {{ $data->created_at->diffForHumans() }}
                                                        <span wire:loading
                                                            wire:target="video_opsi({{ $data->id_video }})"
                                                            class="spinner-border spinner-border-sm text-primary"
                                                            role="status" aria-hidden="true" style="">
                                                        </span>
                                                    </span>
                                                </p>
                                                <a href="/media/video/{{ $data->slug }}"><small><i
                                                            class="bi bi-eye"></i> Lihat full halaman</small></a>
                                            </div>
                                        </li>
                                    </div>
                                </div>
                            @endforeach
                            <div class="d-flex justify-content-end">{{ $video->links() }}</div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>

    @if (session()->has('video_reload'))
        <div>
            <script>
                $(document).ready(function() {
                    // $('#video').reload();
                    document.getElementById("video").contentWindow.location.reload(true);
                    // alert(1);
                })
            </script>
        </div>
    @endif

</div>
