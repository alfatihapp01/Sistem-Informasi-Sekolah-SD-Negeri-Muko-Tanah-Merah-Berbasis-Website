<div>

    <title>{{ $title }}</title>

    @php
        $message = explode('/', session('message'));
    @endphp
    @if (session()->has('message'))
        <div>
            <script>
                Swal.fire({
                    icon: '{{ $message[0] }}',
                    text: '{{ $message[1] }}',
                    allowOutsideClick: false
                })
            </script>
        </div>
    @endif

    <div class="content-wrapper">
        <!-- title page -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-md-12">
                        <h5 class="m-0">{!! $icon !!} {{ $title_page }}
                            <br>
                            <button wire:click="create" class="badge bg-light border-1 border-primary px-3 py-2 mb-1"
                                style="font-size: 10pt;font-weight: normal;width: 130px;">
                                <span wire:loading.remove wire:target="create"><i class="bi bi-plus-lg text-primary"></i> Tambah Data</span>
                                <span wire:loading wire:target="create"
                                    class="spinner-border spinner-border-sm text-primary" role="status"
                                    aria-hidden="true" style="width: 12px; height: 12px;"></span>
                            </button>
                            <button class="badge bg-light border-primary border-1 px-3 py-2 mr-2"
                                style="font-size: 10pt;font-weight: normal;" data-bs-toggle="modal"
                                data-bs-target="#importData">
                                <i class="bi bi-download text-primary"></i> Import Data
                            </button>
                            <button wire:click="ExportExcel"
                                class="mt-1 badge bg-light border-1 border-primary px-4 py-2"
                                style="font-size: 10pt;font-weight: normal;width: 130px;">
                                <span wire:loading.remove wire:target="ExportExcel"><i class="bi bi-upload text-primary"></i> Export Data</span>
                                <span wire:loading wire:target="ExportExcel"
                                    class="spinner-border spinner-border-sm text-primary" role="status"
                                    aria-hidden="true" style="width: 13px; height: 13px;"></span>
                            </button>

                            @if (count($id_siswa) > 0)
                                <button wire:click="update_kelas"
                                    class="badge bg-light border-1 border-primary px-3 py-2 mb-1"
                                    style="font-size: 10pt;font-weight: normal;width: 130px;">
                                    <span wire:loading.remove wire:target="update_kelas"><i class="bi bi-pen text-success"></i> Ubah kelas</span>
                                    <span wire:loading wire:target="update_kelas"
                                        class="spinner-border spinner-border-sm text-primary" role="status"
                                        aria-hidden="true" style="width: 12px; height: 12px;"></span>
                                </button>
                                <button wire:click="delete_array"
                                    class="badge bg-light border-1 border-primary px-3 py-2 mb-1"
                                    style="font-size: 10pt;font-weight: normal;width: 130px;">
                                    <span wire:loading.remove wire:target="delete_array"><i class="bi bi-trash text-danger"></i> Hapus</span>
                                    <span wire:loading wire:target="delete_array"
                                        class="spinner-border spinner-border-sm text-primary" role="status"
                                        aria-hidden="true" style="width: 12px; height: 12px;"></span>
                                </button>
                            @endif
                        </h5>
                    </div>
                </div>
            </div>
        </div>

        <!-- continer -->
        <section class="content">
            <div class="container-fluid">

                @if ($showLivewireCreate)
                    @livewire('dashboard.siswa.create')
                    <script>
                        $(document).ready(function() {
                            $('#createModal').modal('show');
                        });
                    </script>
                @endif
                @if ($showLivewireUpdate)
                    @livewire('dashboard.siswa.update', ['siswa' => $getSiswa])
                    <script>
                        $(document).ready(function() {
                            $('#editModal').modal('show');
                        });
                    </script>
                @endif
                @if ($showLivewireDelete)
                    @livewire('dashboard.siswa.delete', ['siswa' => $getSiswa])
                    <script>
                        $(document).ready(function() {
                            $('#deleteModal').modal('show');
                        });
                    </script>
                @endif
                @if ($showLivewireShow)
                    @livewire('dashboard.siswa.show', ['siswa' => $getSiswa])
                    <script>
                        $(document).ready(function() {
                            $('#showModal').modal('show');
                        });
                    </script>
                @endif
                @if ($showLivewireUpdateKelas)
                    @livewire('dashboard.siswa.update-kelas', ['siswa' => $getSiswa])
                    <script>
                        $(document).ready(function() {
                            $('#editModal').modal('show');
                        });
                    </script>
                @endif
                @if ($showLivewireDeleteArray)
                    @livewire('dashboard.siswa.delete-data-array', ['siswa' => $getSiswa])
                    <script>
                        $(document).ready(function() {
                            $('#deleteModal').modal('show');
                        });
                    </script>
                @endif
                <script>
                    $(document).on('click', '#closeModal', function() {
                        Livewire.emit('closeLivewire');
                    });
                </script>


                <div class="card pt-2">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col">
                                {{-- <span class="d-inline" style="font-size:8.5pt;">Show : </span> --}}
                                <select class="form-select sm w-auto" wire:model="paginate">
                                    <option value="15">15</option>
                                    <option value="20">20</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                            </div>
                            <div class="col">
                                <div wire:ignore.self>
                                    <div class="input-group mb-3">
                                        <input wire:model="search_nama" type="text" placeholder="Cari"
                                            class="form-control sm">
                                        <span class="input-group-text" id="basic-addon2"><i
                                                class="bi bi-search"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div wire:ignore>
                                    <select class="form-select d-inline sm" wire:model="search" id="search">
                                        <option value="">--Pilih Kelas--</option>
                                        @foreach ($dataKelas as $data)
                                            <option value="{{ $data->id_kelas }}">{{ $data->nama_kelas }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        @if ($siswa->count())
                            <div class="table-responsive">
                                <table class="table  table-bordered">
                                    <thead class="text-light">
                                        <tr>
                                            <th style="vertical-align: middle;text-align: center;">#</th>
                                            {{-- <th style="vertical-align: middle;text-align: center;">NIP</th> --}}
                                            <th style="vertical-align: middle;text-align: left;">Nama</th>
                                            <th style="vertical-align: middle;text-align: center;">Kelas</th>
                                            <th style="text-align: center; vertical-align: middle;">Aksi
                                            </th>
                                            <th style="text-align: center; vertical-align: middle;">Pilih
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($siswa as $data)
                                            <tr>
                                                <td style="vertical-align: middle;text-align: center;">
                                                    {{ $loop->iteration }}</td>
                                                {{-- <td style="vertical-align: middle; text-align: center;">
                                                    {{ $data->nip }}</td> --}}
                                                <td style="vertical-align: middle; text-align: left;">
                                                    {{ strtoupper($data->nama) }}</td>
                                                <td style="vertical-align: middle; text-align: center;">
                                                    {{ strtoupper($data->kelas->nama_kelas) }}</td>
                                                <td style="vertical-align: middle;text-align: center;">
                                                    <button style="width: 40px;"
                                                        class="badge bg-primary mb-1 border-0 py-2"
                                                        wire:click="show({{ $data->id_siswa }})" ata-bs-toggle="tooltip"
                                                        data-bs-placement="bottom" title="Lihat">
                                                        <span wire:loading.remove
                                                            wire:target="show({{ $data->id_siswa }})"><i
                                                                class="bi bi-eye"></i></span>
                                                        <span wire:loading wire:target="show({{ $data->id_siswa }})"
                                                            class="spinner-border spinner-border-sm text-light"
                                                            role="status" aria-hidden="true"
                                                            style="width: 10px; height: 10px;"></span>
                                                    </button>

                                                    <button style="width: 40px;"
                                                        class="badge bg-success mb-1 border-0 py-2"
                                                        wire:click="edit({{ $data->id_siswa }})" ata-bs-toggle="tooltip"
                                                        data-bs-placement="bottom" title="Ubah">
                                                        <span wire:loading.remove wire:target="edit({{ $data->id_siswa }})"><i class="bi bi-pen"></i></span>
                                                        <span wire:loading wire:target="edit({{ $data->id_siswa }})"
                                                            class="spinner-border spinner-border-sm text-light"
                                                            role="status" aria-hidden="true"
                                                            style="width: 10px; height: 10px;"></span>
                                                    </button>

                                                    <button style="width: 40px;"
                                                        class="badge bg-danger mb-1 border-0 py-2"
                                                        wire:click="delete({{ $data->id_siswa }})"
                                                        ata-bs-toggle="tooltip" data-bs-placement="bottom"
                                                        title="Hapus">
                                                        <span wire:loading.remove wire:target="delete({{ $data->id_siswa }})"><i class="bi bi-trash"></i></span>
                                                        <span wire:loading wire:target="delete({{ $data->id_siswa }})"
                                                            class="spinner-border spinner-border-sm text-light"
                                                            role="status" aria-hidden="true"
                                                            style="width: 10px; height: 10px;"></span>
                                                    </button>
                                                </td>
                                                <td style="width: 20px; text-align: center; vertical-align: middle;">
                                                    <input wire:ignore.self type="checkbox"
                                                        name="id_siswa.{{ $data->id_siswa }}"
                                                        id="id_siswa.{{ $data->id_siswa }}"
                                                        wire:model="id_siswa.{{ $loop->iteration }}"
                                                        value="{{ $data->id_siswa }}">
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="d-flex justify-content-end">{{ $siswa->links() }}</div>
                        @else
                            <hr>
                            <p class="text-center text-secondary mt-5">Data tidak ditemukan !</p>
                        @endif
                    </div>
                </div>

            </div>
        </section>

        <form action="/dashboard/siswa/import" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Modal import -->
            <div class="modal fade" id="importData" data-bs-backdrop="static" data-bs-keyboard="false"
                tabindex="-1" aria-labelledby="importDataLabel" aria-hidden="true">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="importDataLabel"><i class="bi bi-download"></i>
                                Import data siswa</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-12">


                                    <input type="file"
                                        class="hidden d-inline mb-1 @error('file') is-invalid @enderror"
                                        id="file" name="file" value="{{ old('file') }}">
                                    <label for="file"><span type="submit"
                                            class="badge bg-secondary py-2 px-3">Pilih
                                            File</span></label>
                                    @error('file')
                                        <div class="invalid-feedback mb-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <small class="text-secondary d-block">Pastikan format file yang dipilih
                                        adalah
                                        xlsx.</small>
                                    <small class="d-block text-secondary">Proses import data tidak akan
                                        berjalan jika penulisan tidak sesuai dengan template.</small>

                                    {{-- <h6 class="mt-3">Panduan pengisian data</h6>

                                    <ol class="list-group list-group-numbered">
                                        <li class="list-group-item d-flex justify-content-between align-items-start">
                                            <div class="ms-2 me-auto">
                                                <span>
                                                    Perhatikan ID kelas sebelum mengisi ID Kelas. <a
                                                        href="/dashboard/kelas"
                                                        class="
                                                    text-decoration-none">Lihat
                                                        Data Kelas</a>
                                                </span>
                                            </div>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-start">
                                            <div class="ms-2 me-auto">
                                                <span>
                                                    Nomor Induk Siswa (NIS) dan Nomor Induk Siswa Nasional (NISN) tidak
                                                    boleh sama dengan siswa yang lain.
                                                </span>
                                            </div>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-start">
                                            <div class="ms-2 me-auto">
                                                <span>
                                                    Beri tanda (-) jika siswa tidak mempunyai nomor telepon.
                                                </span>
                                            </div>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-start">
                                            <div class="ms-2 me-auto">
                                                <span>
                                                    Jangan merubah format penulisan pada jenis kelamin seperti
                                                    "Laki-Laki" menjadi "L" atau bentuk lainnya.
                                                </span>
                                            </div>
                                        </li>
                                    </ol> --}}

                                    <p class="mt-3">
                                        <a href="/template-file-import/template-data-siswa.xlsx"
                                            style="text-decoration: none;">
                                            Download
                                        </a> <span><small>template file excel.</small></span>
                                    </p>

                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="badge bg-light border-1 border-primary px-5 py-3"
                                style="font-size: 10pt;">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <div class="modal fade" id="errorImport" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="errorImportLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><i class="bi bi-download"></i> Laporan data import</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p class="text-secondary"><i class="bi bi-calendar2-check"></i> Data yang berhasil
                            ditambahkan adalah data yang telah terverifikasi oleh sistem</p>
                        <hr>
                        @if (session()->has('failures'))
                            <p class="text-secondary"><i class="bi bi-x-octagon"></i> Tabel perincian data
                                yang terjadi kesalahan :</p>
                            <table class="table">
                                <tr>
                                    <th style="text-align: center">Row</th>
                                    <th>Attribute</th>
                                    <th><i>Error</i></th>
                                    <th><i>Value</i></th>
                                </tr>
                                @foreach (session()->get('failures') as $validation)
                                    <tr>
                                        <td style="text-align: center;">{{ $validation->row() }}</td>
                                        <td>{{ $validation->attribute() }}</td>
                                        <td style="text-align: left;">
                                            @foreach ($validation->errors() as $e)
                                                <span class="text-danger"
                                                    style="font-style: italic;">{{ $e }}</span>
                                            @endforeach
                                        </td>
                                        <td class="text-danger">
                                            <i>{{ $validation->values()[$validation->attribute()] }}</i>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        @endif
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
            </div>
        </div>

        @error('file')
            <script>
                $(document).ready(function() {
                    $('#importData').modal('show');
                })
            </script>
        @enderror

        @if (session()->has('failures'))
            <script>
                $(document).ready(function() {
                    $('#errorImport').modal('show')
                })
            </script>
        @endif

    </div>


</div>
