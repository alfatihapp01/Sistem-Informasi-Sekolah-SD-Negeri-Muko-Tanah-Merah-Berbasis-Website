<div>

    <title>{{ ucwords($profil->nama_instansi) }} - {{ $title }}</title>

    <main id="main">

        <div wire:ignore.self class="container p-0" data-aos="fade-up" data-aos-duration="1000">

            <section wire:ignore.self class="breadcrumbs p-3 text-light" data-aos="fade-up" data-aos-duration="1000">
                <div class="d-flex justify-content-between align-items-center">
                    <h5><i class="bi bi-images"></i> {{ $title }}</h5>
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
                    <div wire:ignore.self class="card mb-2" data-aos="fade-up" ddata-aos-duration="1000">
                        <div class="card-body">
                            <div class="row">
                                @if ($galeri->count())
                                    @foreach ($galeri as $data)
                                        <div class="col-md-3 portfolio-item filter-app">

                                            <a href="{{ asset('storage/' . $data->image) }}"
                                                data-gallery="portfolioGallery"
                                                class="portfolio-lightbox preview-link d-block"
                                                title="{{ $data->judul }}">
                                                <div class="card mb-3">
                                                    <img src="{{ asset('storage/' . $data->image) }}"
                                                        class="img-fluid card-img-top" style="height: 250px;">
                                                    <div class="card-body">
                                                        <small
                                                            class="card-text text-center">{{ ucwords($data->judul) }}</small>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach
                                    <div class="d-flex justify-content-center">{{ $galeri->links() }}</div>
                                @else
                                    <p class="text-center text-secondary mt-3">Data galeri kosong !</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>

</div>
