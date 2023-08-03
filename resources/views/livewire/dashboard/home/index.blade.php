<div>
    <?php include 'function/time.php'; ?>

    <title>SD Muhammadiyah Ambon | Dashboard </title>

    @if (session()->has('message'))
        <script>
            let timerInterval
            Swal.fire({
                title: 'Selamat Datang !',
                html: 'Silahkan tunggu beberapa detik',
                timer: 1000,
                timerProgressBar: true,
                didOpen: () => {
                    Swal.showLoading()
                    const b = Swal.getHtmlContainer().querySelector('b')
                    timerInterval = setInterval(() => {
                        b.textContent = Swal.getTimerLeft()
                    }, 100)
                },
                willClose: () => {
                    clearInterval(timerInterval)
                }
            }).then(() => {
                // location.reload();
            })
        </script>
    @endif

    <div class="content-wrapper">
        <!-- title page -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h5 class="m-0">{!! $icon !!} {{ $title_page }} </h5>
                    </div>
                </div>
            </div>
        </div>

        <!-- continer -->
        <section class="content">
            <div class="container-fluid">

                <div class="card">
                    <div class="card-header">
                        Statistik Data Siswa
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="bi bi-x-lg text-secondary"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row" style="">
                            <div class="col-md-4">
                                <div class="info-box" style="border: 1px solid rgb(47, 160, 252);">
                                    <span class="info-box-icon text-light elevation-1"
                                        style="background-color: rgb(47, 160, 252);;"><i class="bi bi-people"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">TOTAL JUMLAH SISWA</span>
                                        <span class="info-box-number">
                                            {{ $siswa->count() }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="info-box" style="border: 1px solid rgb(47, 160, 252);">
                                    <span class="info-box-icon text-light elevation-1"
                                        style="background-color: rgb(47, 160, 252);;"><i class="bi bi-people"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">TOTAL SISWA LAKI-LAKI</span>
                                        <span class="info-box-number">
                                            {{ $siswa->where('jenis_kelamin', 'Laki-Laki')->count() }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="info-box" style="border: 1px solid rgb(47, 160, 252);">
                                    <span class="info-box-icon text-light elevation-1"
                                        style="background-color: rgb(47, 160, 252);;"><i class="bi bi-people"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">TOTAL SISWA PEREMPUAN</span>
                                        <span class="info-box-number">
                                            {{ $siswa->where('jenis_kelamin', 'Perempuan')->count() }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            @if ($kelas)
                                @foreach ($kelas as $data)
                                    <div class="col-md-3">
                                        <h6 class="text-center">Data Siswa Kelas {{ $data->nama_kelas }}</h6>
                                        <div class="chart-container" style="width: 100%;">
                                            <canvas id="siswaKelas{{ $data->id_kelas }}"></canvas>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        Statistik Data Guru
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="bi bi-x-lg text-secondary"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row" style="">
                            <div class="col-md-4">
                                <div class="info-box" style="border: 1px solid rgb(47, 160, 252);">
                                    <span class="info-box-icon text-light elevation-1"
                                        style="background-color: rgb(47, 160, 252);;"><i class="bi bi-people"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">TOTAL JUMLAH GURU</span>
                                        <span class="info-box-number">
                                            {{ $guru->count() }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="info-box" style="border: 1px solid rgb(47, 160, 252);">
                                    <span class="info-box-icon text-light elevation-1"
                                        style="background-color: rgb(47, 160, 252);;"><i class="bi bi-people"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">JUMLAH GURU LAKI-LAKI</span>
                                        <span class="info-box-number">
                                            {{ $guru->where('jenis_kelamin', 'Laki-Laki')->count() }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="info-box" style="border: 1px solid rgb(47, 160, 252);">
                                    <span class="info-box-icon text-light elevation-1"
                                        style="background-color: rgb(47, 160, 252);;"><i class="bi bi-people"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">JUMLAH GURU PEREMPUAN</span>
                                        <span class="info-box-number">
                                            {{ $guru->where('jenis_kelamin', 'Perempuan')->count() }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            @if ($guru->count() > 0)
                                <div class="col-md-4">
                                    {{-- <h6 class="text-center">Data Guru</h6> --}}
                                    <div class="chart-container" style="width: 100%;">
                                        <canvas id="statistikGuru"></canvas>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card border-0 pt-0">
                            <div class="card-header">
                                Waktu & Kalender {{ $tahun }}
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="bi bi-x-lg text-secondary"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="row">

                                    <div class="col-sm-8">
                                        <style>
                                            .datepicker,
                                            .table-condensed {
                                                width: 100%;
                                                height: 400px;
                                                line-height: 50px;
                                                font-size: 12pt;
                                            }
                                        </style>
                                        <div id="datepicker" class="datepicker mb-5" size="30">
                                            <span class="add-on">
                                                <i class="icon-th"></i>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <?php include 'function/jam-analog.php'; ?>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>

    </div>

</div>

<script>
    $(function() {
        $(".datepicker").datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            todayHighlight: true,
        });
    });
</script>

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
