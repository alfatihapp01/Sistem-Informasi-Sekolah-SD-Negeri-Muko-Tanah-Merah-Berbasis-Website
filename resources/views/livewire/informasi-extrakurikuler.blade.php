<div>

    <title>{{ ucwords($profil->nama_instansi) }} - {{ $title }}</title>

    <main id="main">

        <div wire:ignore.self class="container p-0" data-aos="fade-up" data-aos-duration="1000">

            <section wire:ignore.self class="breadcrumbs p-3 text-light" data-aos="fade-up" data-aos-duration="1000">
                <div class="d-flex justify-content-between align-items-center">
                    <h5><i class="bi bi-info-square"></i> {{ $title }}</h5>
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
                    <div wire:ignore.self id="" class="card mb-2" data-aos="fade-up" ddata-aos-duration="1000">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    @if ($informasi->info_ektrakurikuler)
                                        {!! $informasi->info_ektrakurikuler !!}
                                    @else
                                        <div style="height: 100px; width: 100%;"
                                            class="d-flex justify-content-center align-items-center">
                                            <span class="text-secondary">Data masih kosong !</span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>

</div>
