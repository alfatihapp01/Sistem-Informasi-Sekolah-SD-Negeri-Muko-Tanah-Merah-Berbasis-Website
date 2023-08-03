<div>

    <title>{{ strtoupper($profil->nama_instansi) }} - {{ $title }}</title>

    <main id="main">

        <div wire:ignore.self class="container p-0" data-aos="fade-up" data-aos-duration="1000">

            <section wire:ignore.self class="breadcrumbs p-3 text-light" data-aos="fade-up" data-aos-duration="1000">
                <div class="d-flex justify-content-between align-items-center">
                    <h5><i class="bi bi-person-fill"></i> {{ $title }}</h5>
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
                                <div class="col-md-6">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="Masukan NISN atau NIK"
                                            name="nisn_atau_nik" wire:model="nisn_atau_nik">
                                        <button wire:click="cekDataSiswa" class="btn btn-danger" type="submit"
                                            style="width: 100px;">
                                            <span wire:loading.remove wire:target="cekDataSiswa">Cek Data</span>
                                            <span wire:loading wire:target="cekDataSiswa"
                                                class="spinner-border spinner-border-sm text-light" role="status"
                                                aria-hidden="true"></span>
                                        </button>
                                    </div>
                                    @error('nisn_atau_nik')
                                        <div class="invalid-feedback d-flex justify-content-star">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    @if ($validate_siswa)
                                        <h4 class="text-danger text-center mt-4 mb-5">data siswa tidak ditemukan !</h4>
                                    @else
                                    @endif

                                    @if ($siswa != null)
                                        <h6><i class="bi bi-check-lg text-success"></i> Data Ditemukan</h6>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <ol class="list-group">
                                                    <li
                                                        class="list-group-item d-flex justify-content-between align-items-start">
                                                        <div class="me-auto">
                                                            <div class="fw-bold">NOMOR INDUK</div>
                                                            <span class="text-secondary">{{ $siswa->induk }}</span>
                                                        </div>
                                                    </li>
                                                    <li
                                                        class="list-group-item d-flex justify-content-between align-items-start">
                                                        <div class="me-auto">
                                                            <div class="fw-bold">NISN</div>
                                                            <span class="text-secondary">{{ $siswa->nsn }}</span>
                                                        </div>
                                                    </li>
                                                    <li
                                                        class="list-group-item d-flex justify-content-between align-items-start">
                                                        <div class="me-auto">
                                                            <div class="fw-bold">NIK</div>
                                                            <span class="text-secondary">{{ $siswa->nsn }}</span>
                                                        </div>
                                                    </li>
                                                    <li
                                                        class="list-group-item d-flex justify-content-between align-items-start">
                                                        <div class="me-auto">
                                                            <div class="fw-bold">NAMA SISWA</div>
                                                            <span class="text-secondary">{{ $siswa->nama }}</span>
                                                        </div>
                                                    </li>
                                                    <li
                                                        class="list-group-item d-flex justify-content-between align-items-start">
                                                        <div class="me-auto">
                                                            <div class="fw-bold">TEMPAT LAHIR</div>
                                                            <span
                                                                class="text-secondary">{{ $siswa->tempat_lahir }}</span>
                                                        </div>
                                                    </li>
                                                    <li
                                                        class="list-group-item d-flex justify-content-between align-items-start">
                                                        <div class="me-auto">
                                                            <div class="fw-bold">TANGGAL LAHIR</div>
                                                            <span
                                                                class="text-secondary">{{ $siswa->tanggal_lahir }}</span>
                                                        </div>
                                                    </li>
                                                    <li
                                                        class="list-group-item d-flex justify-content-between align-items-start">
                                                        <div class="me-auto">
                                                            <div class="fw-bold">JENIS KELAMIN</div>
                                                            <span
                                                                class="text-secondary">{{ $siswa->jenis_kelamin }}</span>
                                                        </div>
                                                    </li>
                                                    <li
                                                        class="list-group-item d-flex justify-content-between align-items-start">
                                                        <div class="me-auto">
                                                            <div class="fw-bold">AGAMA</div>
                                                            <span class="text-secondary">{{ $siswa->agama }}</span>
                                                        </div>
                                                    </li>
                                                    <li
                                                        class="list-group-item d-flex justify-content-between align-items-start">
                                                        <div class="me-auto">
                                                            <div class="fw-bold">PENDIDIKAN SEBELUMNYA</div>
                                                            <span
                                                                class="text-secondary">{{ $siswa->pendidikan_sebelumnya }}</span>
                                                        </div>
                                                    </li>
                                                    <li
                                                        class="list-group-item d-flex justify-content-between align-items-start">
                                                        <div class="me-auto">
                                                            <div class="fw-bold">ALAMAT SISWA</div>
                                                            <span class="text-secondary">{{ $siswa->alamat }}</span>
                                                        </div>
                                                    </li>
                                                    <li
                                                        class="list-group-item d-flex justify-content-between align-items-start">
                                                        <div class="me-auto">
                                                            <div class="fw-bold">KELAS</div>
                                                            <span
                                                                class="text-secondary">{{ $siswa->kelas->nama_kelas }}</span>
                                                        </div>
                                                    </li>
                                                </ol>
                                            </div>
                                            <div class="col-md-6">
                                                <ol class="list-group">
                                                    <li
                                                        class="list-group-item d-flex justify-content-between align-items-start">
                                                        <div class="me-auto">
                                                            <div class="fw-bold">NAMA ORANG TUA/WALI :</div>
                                                            <span></span>
                                                        </div>
                                                    </li>
                                                    <li
                                                        class="list-group-item d-flex justify-content-between align-items-start">
                                                        <div class="me-auto">
                                                            <div class="ms-3 fw-bold">NAMA AYAH</div>
                                                            <span class="ms-3 text-secondary">{{ $siswa->nama_ayah }}</span>
                                                        </div>
                                                    </li>
                                                    <li
                                                        class="list-group-item d-flex justify-content-between align-items-start">
                                                        <div class="me-auto">
                                                            <div class="ms-3 fw-bold">NAMA IBU</div>
                                                            <span class="ms-3 text-secondary">{{ $siswa->nama_ibu }}</span>
                                                        </div>
                                                    </li>
                                                    <li
                                                        class="list-group-item d-flex justify-content-between align-items-start mt-4">
                                                        <div class="me-auto">
                                                            <div class="fw-bold">PEKERJAAN ORANG TUA/WALI :</div>
                                                        </div>
                                                    </li>
                                                    <li
                                                        class="list-group-item d-flex justify-content-between align-items-start">
                                                        <div class="me-auto">
                                                            <div class="ms-3 fw-bold">AYAH</div>
                                                            <span
                                                                class="ms-3 text-secondary">{{ $siswa->pekerjaan_ayah }}</span>
                                                        </div>
                                                    </li>
                                                    <li
                                                        class="list-group-item d-flex justify-content-between align-items-start">
                                                        <div class="me-auto">
                                                            <div class="ms-3 fw-bold">IBU</div>
                                                            <span
                                                                class="ms-3 text-secondary">{{ $siswa->pekerjaan_ibu }}</span>
                                                        </div>
                                                    </li>
                                                </ol>
                                            </div>
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
