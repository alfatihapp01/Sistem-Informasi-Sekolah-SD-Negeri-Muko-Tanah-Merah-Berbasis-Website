<div>

    <title>{{ strtoupper($profil->nama_instansi) }} - {{ $title }}</title>

    <main id="main">

        <div wire:ignore.self class="container p-0" data-aos="fade-up" data-aos-duration="1000">

            <section wire:ignore.self class="breadcrumbs p-3 text-light" data-aos="fade-up" data-aos-duration="1000">
                <div class="d-flex justify-content-between align-items-center">
                    <h5><i class="bi bi-graph-down"></i> {{ $title }}</h5>
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

                            <div class="row justify-content-center">
                                <div class="col-md-3">
                                    <h6 class="text-center">STATISTIK GURU</h6>
                                    <hr>
                                </div>
                            </div>

                            <style>
                                .info-box.info-box-sm {
                                    min-height: 45px;
                                    margin-bottom: 15px;
                                    font-size: 15px;
                                    display: inline-flex;
                                }

                                .info-box.info-box-sm small {
                                    font-size: 12px;
                                }

                                .info-box.info-box-sm .info-box-icon {
                                    height: 60px;
                                    width: 52px;
                                    font-size: 27px;
                                    line-height: 52px;
                                    background-color: rgb(47, 160, 252);
                                }

                                .info-box.info-box-sm .info-box-content {
                                    margin-left: 10px;
                                    height: 60px;
                                }

                                .info-box .info-box-content .info-box-text {
                                    font-size: 12pt !important;
                                }

                                .info-box .info-box-content .info-box-number {
                                    font-size: 14pt !important;
                                }

                                .info-box.info-box-sm.dropdown {
                                    float: left;
                                }

                                .info-box.info-box-sm.dropdown .info-box-icon {
                                    /* background: blue; */
                                    display: inline-flex;
                                }

                                .info-box.info-box-sm.dropdown .info-box-content {
                                    width: 70%;
                                    /* background: red; */
                                    float: left;
                                }

                                .info-box.info-box-sm.dropdown .info-box-dropdown {
                                    float: right;
                                    /* background: blue; */
                                }
                            </style>

                            <div class="row justify-content-center">
                                <div class="col-md-4">
                                    <div class="row" style="">
                                        <div class="col-md-12">
                                            <div class="info-box info-box-sm dropdown"
                                                style="width: 100%;padding: 5px;border: 1px solid rgb(47, 160, 252);border-radius: 5px;">
                                                <div class="info-box-icon d-flex justify-content-center align-items-center"
                                                    style="border-radius: 5px;">
                                                    <i class="bi bi-people text-light"></i>
                                                </div>

                                                <div class="info-box-content d-flex align-items-center">
                                                    <div class="info-box-text">Total Guru</div>
                                                </div>

                                                <div class="info-box-dropdown">
                                                    <h1>{{ $guru->count() }}</h1>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="info-box info-box-sm dropdown"
                                                style="width: 100%;padding: 5px;border: 1px solid rgb(47, 160, 252);border-radius: 5px;">
                                                <div class="info-box-icon d-flex justify-content-center align-items-center"
                                                    style="border-radius: 5px;">
                                                    <i class="bi bi-person text-light"></i>
                                                </div>

                                                <div class="info-box-content d-flex align-items-center">
                                                    <div class="info-box-text">Jumlah Guru Laki-Laki</div>
                                                </div>

                                                <div class="info-box-dropdown">
                                                    <h1>{{ $guru->where('jenis_kelamin', 'Laki-Laki')->count() }}</h1>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="info-box info-box-sm dropdown"
                                                style="width: 100%;padding: 5px;border: 1px solid rgb(47, 160, 252);border-radius: 5px;">
                                                <div class="info-box-icon d-flex justify-content-center align-items-center"
                                                    style="border-radius: 5px;">
                                                    <i class="bi bi-person text-light"></i>
                                                </div>

                                                <div class="info-box-content d-flex align-items-center">
                                                    <div class="info-box-text">Jumlah Guru Perempuan</div>
                                                </div>

                                                <div class="info-box-dropdown">
                                                    <h1>{{ $guru->where('jenis_kelamin', 'Perempuan')->count() }}</h1>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="row justify-content-center">
                                        <div class="col-md-4">
                                            @if ($guru->count() > 0)
                                                {{-- <h6 class="text-center">Data Guru</h6> --}}
                                                <div class="chart-container" style="width: 90%;">
                                                    <canvas id="statistikGuru"></canvas>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-md-4">
                                            <div class="chart-container" style="width: 100%;">
                                                <canvas id="statistikGuruPerStatus"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row justify-content-center mt-4">
                                <div class="col-md-3">
                                    <h5 class="text-center">STATISTIK SISWA</h5>
                                    <hr>
                                </div>
                            </div>

                            <div class="row justify-content-center">
                                <div class="col-md-4">
                                    <div class="row" style="">
                                        <div class="col-md-12">
                                            <div class="info-box info-box-sm dropdown"
                                                style="width: 100%;padding: 5px;border: 1px solid rgb(47, 160, 252);border-radius: 5px;">
                                                <div class="info-box-icon d-flex justify-content-center align-items-center"
                                                    style="border-radius: 5px;">
                                                    <i class="bi bi-people text-light"></i>
                                                </div>

                                                <div class="info-box-content d-flex align-items-center">
                                                    <div class="info-box-text">Total Siswa</div>
                                                </div>

                                                <div class="info-box-dropdown">
                                                    <h1>{{ $siswa->count() }}</h1>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="info-box info-box-sm dropdown"
                                                style="width: 100%;padding: 5px;border: 1px solid rgb(47, 160, 252);border-radius: 5px;">
                                                <div class="info-box-icon d-flex justify-content-center align-items-center"
                                                    style="border-radius: 5px;">
                                                    <i class="bi bi-person text-light"></i>
                                                </div>

                                                <div class="info-box-content d-flex align-items-center">
                                                    <div class="info-box-text">Jumlah Siswa Laki-Laki</div>
                                                </div>

                                                <div class="info-box-dropdown">
                                                    <h1>{{ $siswa->where('jenis_kelamin', 'Laki-Laki')->count() }}</h1>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="info-box info-box-sm dropdown"
                                                style="width: 100%;padding: 5px;border: 1px solid rgb(47, 160, 252);border-radius: 5px;">
                                                <div class="info-box-icon d-flex justify-content-center align-items-center"
                                                    style="border-radius: 5px;">
                                                    <i class="bi bi-person text-light"></i>
                                                </div>

                                                <div class="info-box-content d-flex align-items-center">
                                                    <div class="info-box-text">Jumlah Siswa Perempuan</div>
                                                </div>

                                                <div class="info-box-dropdown">
                                                    <h1>{{ $siswa->where('jenis_kelamin', 'Perempuan')->count() }}</h1>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="row justify-content-center">
                                        @if ($siswa->count() > 0)
                                            <div class="col-md-4">
                                                {{-- <h6 class="text-center">Data Guru</h6> --}}
                                                <div class="chart-container" style="width: 100%;">
                                                    <canvas id="statistikSiswa"></canvas>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                {{-- <h6 class="text-center">Data Guru</h6> --}}
                                                <div class="chart-container" style="width: 100%;">
                                                    <canvas id="statistikSiswaPerAgama"></canvas>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row justify-content-center mt-4">
                                <div class="col-md-3">
                                    <h5 class="text-center">STATISTIK SISWA per KELAS</h5>
                                    <hr>
                                </div>
                            </div>

                            <div class="row">
                                @if ($kelas->count() > 0)
                                    @foreach ($kelas as $data)
                                        <div class="col-md-3">
                                            <h6 class="text-center">Statistik Siswa Kelas {{ $data->nama_kelas }}</h6>
                                            <div class="info-box info-box-sm dropdown"
                                                style="height: 30px; width: 100%;padding: 5px;border: 1px solid rgb(47, 160, 252);border-radius: 5px;">
                                                <div class="info-box-icon d-flex justify-content-center align-items-center"
                                                    style="border-radius: 5px;height: 30px">
                                                    <i class="bi bi-people text-light"></i>
                                                </div>

                                                <div class="info-box-content d-flex align-items-center"
                                                    style="height: 30px">
                                                    <div class="info-box-text">Total Siswa</div>
                                                </div>

                                                <div class="info-box-dropdown">
                                                    <h6>{{ $siswa->where('id_kelas', $data->id_kelas)->count() }}</h6>
                                                </div>
                                            </div>
                                            <div class="info-box info-box-sm dropdown"
                                                style="height: 30px; width: 100%;padding: 5px;border: 1px solid rgb(47, 160, 252);border-radius: 5px;">
                                                <div class="info-box-icon d-flex justify-content-center align-items-center"
                                                    style="border-radius: 5px;height: 30px">
                                                    <i class="bi bi-person text-light"></i>
                                                </div>

                                                <div class="info-box-content d-flex align-items-center"
                                                    style="height: 30px">
                                                    <div class="info-box-text">Jumlah Siswa Laki-Laki</div>
                                                </div>

                                                <div class="info-box-dropdown">
                                                    <h6>{{ $siswa->where('id_kelas', $data->id_kelas)->where('jenis_kelamin', 'Laki-Laki')->count() }}
                                                    </h6>
                                                </div>
                                            </div>
                                            <div class="info-box info-box-sm dropdown"
                                                style="height: 30px; width: 100%;padding: 5px;border: 1px solid rgb(47, 160, 252);border-radius: 5px;">
                                                <div class="info-box-icon d-flex justify-content-center align-items-center"
                                                    style="border-radius: 5px;height: 30px">
                                                    <i class="bi bi-person text-light"></i>
                                                </div>

                                                <div class="info-box-content d-flex align-items-center"
                                                    style="height: 30px">
                                                    <div class="info-box-text">Jumlah Siswa Perempuan</div>
                                                </div>

                                                <div class="info-box-dropdown">
                                                    <h6>{{ $siswa->where('id_kelas', $data->id_kelas)->where('jenis_kelamin', 'Perempuan')->count() }}
                                                    </h6>
                                                </div>
                                            </div>
                                            <div class="chart-container" style="width: 100%;">
                                                <canvas id="siswaKelas{{ $data->id_kelas }}"></canvas>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>

    {{-- chart --}}
    <script src="/vendor/chart/chart.js"></script>

    {{-- chart --}}
    <script>
        @foreach ($kelas as $data)
            const newChart{{ $data->id_kelas }} = document.getElementById('siswaKelas' + {{ $data->id_kelas }});

            const data{{ $data->id_kelas }} = {
                labels: [
                    'Laki-Laki',
                    'Perempuan',
                ],
                datasets: [{
                    label: 'Jumlah Siswa ',
                    data: [
                        '{{ $siswa->where('id_kelas', $data->id_kelas)->where('jenis_kelamin', 'Laki-Laki')->count() }}',
                        '{{ $siswa->where('id_kelas', $data->id_kelas)->where('jenis_kelamin', 'Perempuan')->count() }}',
                    ],
                    backgroundColor: [
                        @for ($i = 0; $i < 2; $i++)
                            '#{{ substr(md5(mt_rand()), 0, 6) }}',
                        @endfor
                    ],
                    hoverOffset: 4
                }]
            }

            new Chart(newChart{{ $data->id_kelas }}, {
                type: 'pie',
                data: data{{ $data->id_kelas }},
                options: {
                    animations: {
                        tension: {
                            duration: 1000,
                            easing: 'linear',
                            from: 1,
                            to: 0,
                            loop: true
                        }
                    },
                    scales: {
                        y: {
                            min: 0,
                            max: 100
                        },
                        x: {
                            min: 0,
                            max: 100
                        }
                    }
                }
            });
        @endforeach
    </script>

    <script>
        const statistikGuru = document.getElementById('statistikGuru');

        const dataStatistikGuru = {
            labels: [
                'Laki-Laki',
                'Perempuan',
            ],
            datasets: [{
                label: 'Jumlah guru ',
                data: [
                    '{{ $guru->where('jenis_kelamin', 'Laki-Laki')->count() }}',
                    '{{ $guru->where('jenis_kelamin', 'Perempuan')->count() }}',
                ],
                backgroundColor: [
                    @for ($i = 0; $i < 2; $i++)
                        '#{{ substr(md5(mt_rand()), 0, 6) }}',
                    @endfor
                ],
                hoverOffset: 4
            }],

            borderWidth: 1
        }

        new Chart(statistikGuru, {
            // type: 'bar',
            type: 'doughnut',
            // type: 'pie',
            data: dataStatistikGuru,
            options: {
                animations: {
                    tension: {
                        duration: 1000,
                        easing: 'linear',
                        from: 1,
                        to: 0,
                        loop: true
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

    <script>
        const statistikSiswa = document.getElementById('statistikSiswa');

        const dataStatistikSiswa = {
            labels: [
                'Laki-Laki',
                'Perempuan',
            ],
            datasets: [{
                label: 'Jumlah siswa ',
                data: [
                    '{{ $siswa->where('jenis_kelamin', 'Laki-Laki')->count() }}',
                    '{{ $siswa->where('jenis_kelamin', 'Perempuan')->count() }}',
                ],
                backgroundColor: [
                    @for ($i = 0; $i < 2; $i++)
                        '#{{ substr(md5(mt_rand()), 0, 6) }}',
                    @endfor
                ],
                hoverOffset: 4
            }],

            borderWidth: 1
        }

        new Chart(statistikSiswa, {
            // type: 'bar',
            type: 'doughnut',
            // type: 'pie',
            data: dataStatistikSiswa,
            options: {
                animations: {
                    tension: {
                        duration: 1000,
                        easing: 'linear',
                        from: 1,
                        to: 0,
                        loop: true
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

    <script>
        const statistikSiswaPerAgama = document.getElementById('statistikSiswaPerAgama');

        const dataStatistikSiswaPerAgama = {
            labels: [
                'Islam',
                'Protestan',
                'Katolik',
                'Hindu',
                'Budha',
                'Khonghucu',
                'Lain-Lain',
            ],
            datasets: [{
                label: 'Jumlah siswa ',
                data: [
                    '{{ $siswa->where('agama', 'Islam')->count() }}',
                    '{{ $siswa->where('agama', 'Protestan')->count() }}',
                    '{{ $siswa->where('agama', 'Katolik')->count() }}',
                    '{{ $siswa->where('agama', 'Hindu')->count() }}',
                    '{{ $siswa->where('agama', 'Budha')->count() }}',
                    '{{ $siswa->where('agama', 'Khonghucu')->count() }}',
                    '{{ $siswa->where('agama', 'Lain-Lain')->count() }}',
                ],
                backgroundColor: [
                    @for ($i = 0; $i < 8; $i++)
                        '#{{ substr(md5(mt_rand()), 0, 6) }}',
                    @endfor
                ],
                hoverOffset: 4
            }],

            borderWidth: 1
        }

        new Chart(statistikSiswaPerAgama, {
            // type: 'bar',
            type: 'doughnut',
            // type: 'pie',
            data: dataStatistikSiswaPerAgama,
            options: {
                animations: {
                    tension: {
                        duration: 1000,
                        easing: 'linear',
                        from: 1,
                        to: 0,
                        loop: true
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

    <script>
        const statistikGuruPerStatus = document.getElementById('statistikGuruPerStatus');

        const datastatistikGuruPerStatus = {
            labels: [
                'PNS',
                'PPPK',
                'Honor',
            ],
            datasets: [{
                label: 'Jumlah guru ',
                data: [
                    '{{ $guru->where('status', 'PNS')->count() }}',
                    '{{ $guru->where('status', 'PPPK')->count() }}',
                    '{{ $guru->where('status', 'Honor')->count() }}',
                ],
                backgroundColor: [
                    @for ($i = 0; $i < 3; $i++)
                        '#{{ substr(md5(mt_rand()), 0, 6) }}',
                    @endfor
                ],
                hoverOffset: 4
            }],

            borderWidth: 1
        }

        new Chart(statistikGuruPerStatus, {
            // type: 'bar',
            type: 'doughnut',
            // type: 'pie',
            data: datastatistikGuruPerStatus,
            options: {
                animations: {
                    tension: {
                        duration: 1000,
                        easing: 'linear',
                        from: 1,
                        to: 0,
                        loop: true
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

</div>
