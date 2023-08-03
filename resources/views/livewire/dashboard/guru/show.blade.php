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
                    <h5><i class="bi bi-person-fill"></i> Detail data guru</h5>
                    <button id="closeModal" type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">

                            <div class="d-flex justify-content-center">
                                <div class="card p-0">
                                    @if ($image)
                                        <img src="{{ asset('storage/' . $image) }}" class="img-fluid card-img-top"
                                            style="width: 190px;height: 200px;">
                                    @else
                                        <img src="/assets/img/avatar.png" class="img-fluid card-img-top"
                                            style="width: 190px;height: 200px;">
                                    @endif
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
                                        <th style="width: 150px;">Nama Guru</th>
                                        <td style="width: 10px;">:</td>
                                        <td style="text-align: left;">{{ strtoupper($nama) }}</td>
                                    </tr>
                                    <tr>
                                        <th style="width: 150px;">NIP</th>
                                        <td style="width: 10px;">:</td>
                                        <td style="text-align: left;">{{ strtoupper($nip) }}</td>
                                    </tr>
                                    <tr>
                                        <th style="width: 150px;">Tempat Lahir</th>
                                        <td style="width: 10px;">:</td>
                                        <td style="text-align: left;">{{ $tempat_lahir }}</td>
                                    </tr>
                                    <tr>
                                        <th style="width: 150px;">Tanggal Lahir</th>
                                        <td style="width: 10px;">:</td>
                                        <td style="text-align: left;">{{ $tanggal_lahir }}</td>
                                    </tr>
                                    <tr>
                                        <th style="width: 150px;">Jenis Kelamin</th>
                                        <td style="width: 10px;">:</td>
                                        <td style="text-align: left;">{{ $jenis_kelamin }}</td>
                                    </tr>
                                    <tr>
                                        <th style="width: 150px;">Jabatan</th>
                                        <td style="width: 10px;">:</td>
                                        <td style="text-align: left;">{{ $jabatan }}</td>
                                    </tr>
                                    <tr>
                                        <th style="width: 150px;">Status Pegawai</th>
                                        <td style="width: 10px;">:</td>
                                        <td style="text-align: left;">{{ $status }}</td>
                                    </tr>
                                    <tr>
                                        <th style="width: 150px;">Nomor Telepon</th>
                                        <td style="width: 10px;">:</td>
                                        <td style="text-align: left;">{{ $nomor_telepon }}</td>
                                    </tr>
                                    <tr>
                                        <th style="width: 150px;">Email</th>
                                        <td style="width: 10px;">:</td>
                                        <td style="text-align: left;">{{ $email }}</td>
                                    </tr>
                                    <tr>
                                        <th style="width: 150px;">Alamat</th>
                                        <td style="width: 10px;">:</td>
                                        <td style="text-align: left;">{{ $alamat }}</td>
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
