<div>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
        integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />

    <title>{{ $title }}</title>

    <div class="content-wrapper">
        <!-- title page -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h5 class="m-0">{!! $icon !!} {{ $title_page }}
                            <button wire:click="edit({{ $instansi->id }})"
                                class="badge bg-light border-1 border-primary px-3 py-2"
                                style="font-size: 10pt;font-weight: normal;width: 200px;">
                                <span wire:loading.remove wire:target="edit"><i class="bi bi-pencil text-primary"></i>
                                    Ubah Profil Instansi</span>
                                <span wire:loading wire:target="edit"
                                    class="spinner-border spinner-border-sm text-primary" role="status"
                                    aria-hidden="true" style="width: 13px; height: 13px;"></span>
                            </button>
                        </h5>
                    </div>
                </div>
            </div>
        </div>

        <!-- continer -->
        <section class="content">
            <div class="container-fluid">

                @if ($showLivewireUpdate)
                    @livewire('dashboard.profil-instansi.update', ['instansi' => $getInstansi])
                    <script>
                        $(document).ready(function() {
                            $('#editModal').modal('show');
                        });
                    </script>
                @endif
                <script>
                    $(document).on('click', '#closeModal', function() {
                        Livewire.emit('closeLivewire');
                    });
                </script>

                <div class="row mb-3">

                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    @if ($instansi->logo)
                                        <img class="img-fluid" src="{{ asset('storage/' . $instansi->logo) }}"
                                            style="width: 150px;">
                                    @else
                                        <img class="img-fluid" src="/assets/img/logo.png">
                                    @endif
                                </div>

                                <h5 class="text-center">{{ strtoupper($instansi->nama_instansi) }}</h5>


                                <ol class="list-group mt-3">
                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                        <div class="ms-2 me-auto">
                                            <div class="fw-bold">NPSN</div>
                                            {{ $instansi->npsn }}
                                        </div>
                                    </li>

                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                        <div class="ms-2 me-auto">
                                            <div class="fw-bold">Akreditas</div>
                                            {{ $instansi->akreditas }}
                                        </div>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                        <div class="ms-2 me-auto">
                                            <div class="fw-bold">Status</div>
                                            {{ $instansi->status }}
                                        </div>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                        <div class="ms-2 me-auto">
                                            <div class="fw-bold">No. SK Pendirian</div>
                                            {{ $instansi->no_sk_pendirian }}
                                        </div>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                        <div class="ms-2 me-auto">
                                            <div class="fw-bold">Tgl. SK Pendirian</div>
                                            {{ $instansi->tanggal_sk_pendirian }}
                                        </div>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                        <div class="ms-2 me-auto">
                                            <div class="fw-bold">No. SK Operasional</div>
                                            {{ $instansi->no_sk_operasional }}
                                        </div>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                        <div class="ms-2 me-auto">
                                            <div class="fw-bold">Tgl. SK Operasional</div>
                                            {{ $instansi->tanggal_sk_operasional }}
                                        </div>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                        <div class="me-auto">
                                            <div class="fw-bold">Nama Kepala Sekolah</div>
                                            {{ strtoupper($instansi->kepala_instansi) }}
                                        </div>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                        <div class="me-auto">
                                            <div class="fw-bold">NIP Kepala Sekolah</div>
                                            {{ strtoupper($instansi->nip) }}
                                        </div>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                        <div class="ms-2 me-auto">
                                            <div class="fw-bold">Operator</div>
                                            {{ $instansi->operator }}
                                        </div>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                        <div class="ms-2 me-auto">
                                            <div class="fw-bold">Kode POS</div>
                                            {{ $instansi->kode_pos }}
                                        </div>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                        <div class="ms-2 me-auto">
                                            <div class="fw-bold">Alamat</div>
                                            {{ $instansi->alamat }}
                                        </div>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                        <div class="ms-2 me-auto">
                                            <div class="fw-bold">Kelurahan</div>
                                            {{ $instansi->kelurahan }}
                                        </div>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                        <div class="ms-2 me-auto">
                                            <div class="fw-bold">Kecamatan</div>
                                            {{ $instansi->kecamatan }}
                                        </div>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                        <div class="ms-2 me-auto">
                                            <div class="fw-bold">Kabupaten</div>
                                            {{ $instansi->kabupaten }}
                                        </div>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                        <div class="ms-2 me-auto">
                                            <div class="fw-bold">Provinsi</div>
                                            {{ $instansi->provinsi }}
                                        </div>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                        <div class="ms-2 me-auto">
                                            <div class="fw-bold">E-Mail</div>
                                            {{ $instansi->email }}
                                        </div>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                        <div class="ms-2 me-auto">
                                            <div class="fw-bold">Facebook</div>
                                            {{ $instansi->facebook }}
                                        </div>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                        <div class="ms-2 me-auto">
                                            <div class="fw-bold">Instagram</div>
                                            {{ $instansi->instagram }}
                                        </div>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                        <div class="ms-2 me-auto">
                                            <div class="fw-bold">Telepon</div>
                                            {{ $instansi->telepon }}
                                        </div>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                        <div class="ms-2 me-auto">
                                            <div class="fw-bold">Website</div>
                                            {{ $instansi->web }}
                                        </div>
                                    </li>
                                </ol>
                                <div wire:ignore style="">
                                    <div wire:ignore.self id="address-map-container" class="mt-2"
                                        style="width:100%;height:250px; ">
                                        <div wire:ignore.self id="map" style="height: 250px;border-radius: 3px;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills" id="pills-tab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="pills-fasilitas-tab"
                                            data-bs-toggle="pill" data-bs-target="#pills-fasilitas" type="button"
                                            role="tab" aria-controls="pills-fasilitas"
                                            aria-selected="true">Fasilitas</button>
                                    </li>

                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="pills-struktur_organisasi-tab"
                                            data-bs-toggle="pill" data-bs-target="#pills-struktur_organisasi"
                                            type="button" role="tab" aria-controls="pills-struktur_organisasi"
                                            aria-selected="true">Str. Organisasi</button>
                                    </li>

                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="pills-visi-tab" data-bs-toggle="pill"
                                            data-bs-target="#pills-visi" type="button" role="tab"
                                            aria-controls="pills-visi" aria-selected="false">Visi & Misi</button>
                                    </li>

                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="pills-sejarah-tab" data-bs-toggle="pill"
                                            data-bs-target="#pills-sejarah" type="button" role="tab"
                                            aria-controls="pills-sejarah" aria-selected="false">Sejarah</button>
                                    </li>

                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="pills-sambutan-tab" data-bs-toggle="pill"
                                            data-bs-target="#pills-sambutan" type="button" role="tab"
                                            aria-controls="pills-sambutan" aria-selected="false">
                                            Sambutan</button>
                                    </li>

                                </ul>
                            </div>
                            <div class="card-body p-3">
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-fasilitas" role="tabpanel"
                                        aria-labelledby="pills-fasilitas-tab" tabindex="0">
                                        <h4 class="text-center">Fasilitas</h4>
                                        {!! $instansi->fasilitas !!}
                                    </div>

                                    <div class="tab-pane fade show" id="pills-struktur_organisasi" role="tabpanel"
                                        aria-labelledby="pills-struktur_organisasi-tab" tabindex="0">
                                        <div class="d-flex justify-content-center">
                                            @if ($instansi->struktur_organisasi)
                                                <img class="img-fluid"
                                                    src="{{ asset('storage/' . $instansi->struktur_organisasi) }}"
                                                    style="height: 600px;width: 100%;">
                                            @else
                                                <img class="img-fluid" src="/assets/img/logo.png">
                                            @endif
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="pills-visi" role="tabpanel"
                                        aria-labelledby="pills-visi-tab" tabindex="0">
                                        <h4 class="text-center">Visi</h4>
                                        {!! $instansi->visi !!}
                                        <h4 class="text-center">Misi</h4>
                                        {!! $instansi->misi !!}
                                    </div>

                                    <div class="tab-pane fade" id="pills-misi" role="tabpanel"
                                        aria-labelledby="pills-misi-tab" tabindex="0">{!! $instansi->misi !!}
                                    </div>

                                    <div class="tab-pane fade" id="pills-sejarah" role="tabpanel"
                                        aria-labelledby="pills-sejarah-tab" tabindex="0">{!! $instansi->sejarah !!}
                                    </div>

                                    <div class="tab-pane fade" id="pills-sambutan" role="tabpanel"
                                        aria-labelledby="pills-sambutan-tab" tabindex="0">{!! $instansi->kata_sambutan !!}
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </section>

    </div>

    <script>
        function logoPreview() {
            const logo = document.querySelector('#logo');
            const logoPreview = document.querySelector('.logo-preview');

            const oFReader = new FileReader();

            oFReader.readAsDataURL(logo.files[0]);

            oFReader.onload = function(oFREvent) {
                logoPreview.src = oFREvent.target.result;
            }
        }
    </script>

    <script>
        function strukturPreview() {
            const struktur = document.querySelector('#struktur_organisasi');
            const strukturPreview = document.querySelector('.struktur-preview');

            const oFReader = new FileReader();

            oFReader.readAsDataURL(struktur.files[0]);

            oFReader.onload = function(oFREvent) {
                strukturPreview.src = oFREvent.target.result;
            }
        }
    </script>

    <script>
        function petaPreview() {
            const peta = document.querySelector('#peta');
            const petaPreview = document.querySelector('.peta-preview');

            const oFReader = new FileReader();

            oFReader.readAsDataURL(peta.files[0]);

            oFReader.onload = function(oFREvent) {
                petaPreview.src = oFREvent.target.result;
            }
        }
    </script>

    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
        integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>

    <script>
        $(document).ready(function() {

            var myLocationLatitude = document.getElementById('myLocationLatitude');
            var myLocationLongitude = document.getElementById('myLocationLongitude');

            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            } else {
                alert("Sorry! your browser is not supporting");
            }

            function showPosition(position) {
                var latitude = {{ $instansi->latitude }};
                var longitude = {{ $instansi->longitude }};

                var map = L.map('map').setView([latitude, longitude],
                    18);

                googleHybrid = L.tileLayer('http://{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}', {
                    maxZoom: 20,
                    subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
                }).addTo(map);

                var marker = L.marker([latitude, longitude]).addTo(map);

                var circle = L.circle([latitude, longitude], {
                    color: 'red',
                    fillColor: '#f03',
                    fillOpacity: 0.5,
                    radius: 30
                }).addTo(map);

                map.scrollWheelZoom.disable();

                var popup = L.popup();

                function onMapClick(e) {
                    popup
                        .setLatLng(e.latlng)
                        .setContent("Koordinat  posisi. " + e.latlng)
                        .openOn(map);
                }

                map.on('click', onMapClick);

            }

        })
    </script>

</div>
