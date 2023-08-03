<div>
    @if (session()->has('message'))
        <div>
            <script>
                Swal.fire({
                    icon: 'success',
                    text: 'Data berhasil diubah',
                    allowOutsideClick: false
                })
            </script>
        </div>
    @endif

    <div wire:ignore.self class="modal fade" id="showModal" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-dialog-scrollable modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5><i class="bi bi-person-fill"></i> Detail data siswa</h5>
                    <button id="closeModal" type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">

                            <div class="d-flex justify-content-center">
                                <div class="card p-0">
                                    <img src="/assets/img/avatar.png" class="img-fluid card-img-top"
                                        style="width: 190px;height: 200px;">
                                </div>
                            </div>

                            <div class="table-responsive">
                                <style>
                                    #tabelShow tr {
                                        height: 50px;
                                    }

                                    #tabelShow tr th {
                                        vertical-align: middle;
                                    }

                                    #tabelShow tr td {
                                        vertical-align: middle;
                                    }
                                </style>
                                <table id="tabelShow" class="table table-striped  border-success" style="width: 100%;">
                                    <tr>
                                        <th style="width: 170px;">Nomor Induk Siswa</th>
                                        <td style="width: 10px;">:</td>
                                        <td style="text-align: left;">{{ $nomor_induk }}</td>
                                    </tr>
                                    <tr>
                                        <th style="width: 170px;">NISN</th>
                                        <td style="width: 10px;">:</td>
                                        <td style="text-align: left;">{{ $nisn }}</td>
                                    </tr>
                                    <tr>
                                        <th style="width: 170px;">NIK</th>
                                        <td style="width: 10px;">:</td>
                                        <td style="text-align: left;">{{ $nik }}</td>
                                    </tr>
                                    <tr>
                                        <th style="width: 170px;">Nama Siswa</th>
                                        <td style="width: 10px;">:</td>
                                        <td style="text-align: left;">{{ strtoupper($nama) }}</td>
                                    </tr>
                                    <tr>
                                        <th style="width: 170px;">Tempat Lahir</th>
                                        <td style="width: 10px;">:</td>
                                        <td style="text-align: left;">{{ $tempat_lahir }}</td>
                                    </tr>
                                    <tr>
                                        <th style="width: 170px;">Tanggal Lahir</th>
                                        <td style="width: 10px;">:</td>
                                        <td style="text-align: left;">{{ $tanggal_lahir }}</td>
                                    </tr>
                                    <tr>
                                        <th style="width: 170px;">Jenis Kelamin</th>
                                        <td style="width: 10px;">:</td>
                                        <td style="text-align: left;">{{ $jenis_kelamin }}</td>
                                    </tr>
                                    <tr>
                                        <th style="width: 170px;">Agama</th>
                                        <td style="width: 10px;">:</td>
                                        <td style="text-align: left;">{{ $agama }}</td>
                                    </tr>
                                    <tr>
                                        <th style="width: 170px;">Kelas</th>
                                        <td style="width: 10px;">:</td>
                                        <td style="text-align: left;">{{ $kelas }}</td>
                                    </tr>
                                    <tr>
                                        <th style="width: 170px;">Pendidikan Sebelumnya</th>
                                        <td style="width: 10px;">:</td>
                                        <td style="text-align: left;">{{ $pendidikan_sebelumnya }}</td>
                                    </tr>
                                    <tr>
                                        <th style="width: 170px;">Alamat Siswa</th>
                                        <td style="width: 10px;">:</td>
                                        <td style="text-align: left;">{{ $alamat }}</td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: left; padding-top: 20px;border: 0px;">Data Orang Tua/Wali
                                            :</td>
                                    </tr>
                                    <tr>
                                        <th style="width: 170px;">Nama Ayah</th>
                                        <td style="width: 10px;">:</td>
                                        <td style="text-align: left;">{{ $nama_ayah }}</td>
                                    </tr>
                                    <tr>
                                        <th style="width: 170px;">Nama Ibu</th>
                                        <td style="width: 10px;">:</td>
                                        <td style="text-align: left;">{{ $nama_ibu }}</td>
                                    </tr>
                                    <tr>
                                        <th style="width: 170px;">Pekerjaan Ayah</th>
                                        <td style="width: 10px;">:</td>
                                        <td style="text-align: left;">{{ $pekerjaan_ayah }}</td>
                                    </tr>
                                    <tr>
                                        <th style="width: 170px;">Pekerjaan Ibu</th>
                                        <td style="width: 10px;">:</td>
                                        <td style="text-align: left;">{{ $pekerjaan_ibu }}</td>
                                    </tr>
                                    <tr>
                                        <th style="width: 170px;">Alamat Jalan</th>
                                        <td style="width: 10px;">:</td>
                                        <td style="text-align: left;">{{ $jalan }}</td>
                                    </tr>
                                    <tr>
                                        <th style="width: 170px;">Kelurahan</th>
                                        <td style="width: 10px;">:</td>
                                        <td style="text-align: left;">{{ $kelurahan }}</td>
                                    </tr>
                                    <tr>
                                        <th style="width: 170px;">Kecamatan</th>
                                        <td style="width: 10px;">:</td>
                                        <td style="text-align: left;">{{ $kecamatan }}</td>
                                    </tr>
                                    <tr>
                                        <th style="width: 170px;">Kabupaten</th>
                                        <td style="width: 10px;">:</td>
                                        <td style="text-align: left;">{{ $kabupaten }}</td>
                                    </tr>
                                    <tr>
                                        <th style="width: 170px;">Provinsi</th>
                                        <td style="width: 10px;">:</td>
                                        <td style="text-align: left;">{{ $provinsi }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-end">
                    {{-- <button type="button" wire:click="showModalFalse" class="btn bg-secondary px-4"
                            data-bs-dismiss="modal">Batal</button>
                        <button class="btn bg-primary px-4">Update</button> --}}
                </div>
            </div>
        </div>
    </div>

    @if ($closeModal)
        <script>
            $(document).ready(function() {
                $('#showModal').modal('hide');
            })
        </script>
    @endif


</div>
