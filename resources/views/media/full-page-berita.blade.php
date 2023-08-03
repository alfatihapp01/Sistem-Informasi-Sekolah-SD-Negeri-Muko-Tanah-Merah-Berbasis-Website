@extends('layouts.app')

@section('container')
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


            <div wire:ignore.self class="card" data-aos="fade-up" ddata-aos-duration="1000">
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-md-9">
                            @php
                                $judul = strtolower($berita->judul);
                                $tanggal = explode(' ', $berita->created_at);
                            @endphp
                            <h5 class="card-title mb-2">{{ $tanggal[0] }} <span
                                    style="font-size: 10pt;font-style: italic;"
                                    class="text-secondary">{{ $berita->created_at->diffForHumans() }}</span>
                            </h5>
                            <h4 class="mb-3" style="font-weight: 700px;">{{ strtoupper($judul) }}</h4>
                            <div id="carouselExampleSlidesOnly" class="carousel slide mb-3" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active"></div>
                                    <img src="{{ asset('storage/' . $berita->image) }}" class="d-block w-100 img-fluid"
                                        style="height: 350px;">
                                </div>
                            </div>
                            {!! $berita->isi !!}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
@endsection
