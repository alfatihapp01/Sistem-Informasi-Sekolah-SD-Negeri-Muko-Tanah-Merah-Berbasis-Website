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
                                $judul = strtolower($video->judul);
                                $tanggal = explode(' ', $video->created_at);
                            @endphp
                            <h5 class="card-title mb-2">{{ $tanggal[0] }} <span
                                    style="font-size: 10pt;font-style: italic;"
                                    class="text-secondary">{{ $video->created_at->diffForHumans() }}</span>
                            </h5>

                            <h4 style="font-weight: 700px;" class="mb-2">{{ ucwords($judul) }}</h4>
                            <iframe width="100%" height="500" src="{{ asset('storage/' . $video->video) }}"></iframe>

                            {!! $video->isi !!}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
@endsection
