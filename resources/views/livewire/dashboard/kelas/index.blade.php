<div>

    <title>{{ $title }}</title>

    @if (session()->has('import_success'))
        <div>
            <script>
                Swal.fire({
                    icon: 'success',
                    text: 'Import data berhasil',
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
                            <button wire:click="create" class="badge bg-light border-1 border-primary px-3 py-2 mb-1"
                                style="font-size: 10pt;font-weight: normal;width: 130px;">
                                <span wire:loading.remove wire:target="create"><i class="bi bi-plus-lg text-primary"></i>
                                    Tambah Data</span>
                                <span wire:loading wire:target="create"
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

                @if ($showLivewireCreate)
                    @livewire('dashboard.kelas.create')
                    <script>
                        $(document).ready(function() {
                            $('#createModal').modal('show');
                        });
                    </script>
                @endif
                @if ($showLivewireUpdate)
                    @livewire('dashboard.kelas.update', ['kelas' => $getKelas])
                    <script>
                        $(document).ready(function() {
                            $('#editModal').modal('show');
                        });
                    </script>
                @endif
                @if ($showLivewireDelete)
                    @livewire('dashboard.kelas.delete', ['kelas' => $getKelas])
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
                                <span class="d-inline" style="font-size:8.5pt;">Show : </span>
                                <select class="form-select sm w-auto d-inline" wire:model="paginate">
                                    <option value="15">15</option>
                                    <option value="20">20</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                            </div>
                            <div class="col">
                                <div class="input-group mb-3">
                                    <input wire:model="search" type="text" placeholder="Cari" class="form-control">
                                    <span class="input-group-text" id="basic-addon2"><i class="bi bi-search"></i></span>
                                </div>
                            </div>
                        </div>

                        @if ($kelas->count())
                            <div class="table-responsive">
                                <table class="table  table-bordered">
                                    <thead class="text-light">
                                        <tr>
                                            <th style="vertical-align: middle;text-align: center;">#</th>
                                            <th style="vertical-align: middle;text-align: center;text-align: center;">ID
                                                Kelas</th>
                                            <th style="vertical-align: middle;text-align: center;">Nama Kelas</th>
                                            <th style="width: 150px;text-align: center; vertical-align: middle;">Aksi
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($kelas as $data)
                                            <tr>
                                                <td style="vertical-align: middle;text-align: center;">
                                                    {{ $loop->iteration }}</td>
                                                <td style="vertical-align: middle;text-align: center;">
                                                    {{ $data->id_kelas }}
                                                </td>
                                                <td style="vertical-align: middle;text-align: center;">
                                                    {{ strtoupper($data->nama_kelas) }}
                                                </td>

                                                <td style="vertical-align: middle;text-align: center;">

                                                    <button style="width: 40px;"
                                                        class="badge bg-success mb-1 border-0 py-2"
                                                        wire:click="edit({{ $data->id_kelas }})" ata-bs-toggle="tooltip"
                                                        data-bs-placement="bottom" title="Ubah">
                                                        <span wire:loading.remove
                                                            wire:target="edit({{ $data->id_kelas }})"><i
                                                                class="bi bi-pencil-square"></i></span>
                                                        <span wire:loading wire:target="edit({{ $data->id_kelas }})"
                                                            class="spinner-border spinner-border-sm text-light"
                                                            role="status" aria-hidden="true"
                                                            style="width: 11px; height: 11px;"></span>
                                                    </button>

                                                    <button style="width: 40px;"
                                                        class="badge bg-danger mb-1 border-0 py-2"
                                                        wire:click="delete({{ $data->id_kelas }})"
                                                        ata-bs-toggle="tooltip" data-bs-placement="bottom"
                                                        title="Hapus">

                                                        <span wire:loading.remove
                                                            wire:target="delete({{ $data->id_kelas }})"><i
                                                                class="bi bi-trash"></i></span>
                                                        <span wire:loading wire:target="delete({{ $data->id_kelas }})"
                                                            class="spinner-border spinner-border-sm text-light"
                                                            role="status" aria-hidden="true"
                                                            style="width: 11px; height: 11px;"></span>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                    </div>
                    <div class="d-flex justify-content-end">{{ $kelas->links() }}</div>
                @else
                    <hr>
                    <p class="text-center text-secondary mt-5">Data tidak ditemukan !</p>
                    @endif
                </div>
            </div>
        </section>
    </div>


</div>
