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
                            <br>
                            <button wire:click="create_ekstrakurikuler"
                                class="badge bg-light border-1 border-primary px-3 py-2 mb-1 mt-1"
                                style="font-size: 10pt;font-weight: normal;width: 230px;">
                                <span wire:loading.remove wire:target="create_ekstrakurikuler"><i class="bi bi-pen text-primary"></i> Update Info Ekstrakurikuler</span>
                                <span wire:loading wire:target="create_ekstrakurikuler"
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

                @if ($showLivewireCreateEkstrakurikuler)
                @livewire('dashboard.informasi-kegiatan.update-info-extrakurikuler')
                    <script>
                        $(document).ready(function() {
                            $('#createModal').modal('show');
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
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <h4>Informasi Kegiatan Ekstrakurikuler</h4>
                                {!! $informasi_kegiatan->info_ektrakurikuler !!}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>

    </div>


</div>
