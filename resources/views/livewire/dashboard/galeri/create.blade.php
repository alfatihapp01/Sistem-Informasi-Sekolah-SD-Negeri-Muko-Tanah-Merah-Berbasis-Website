<div>

    <?php include 'function/time.php'; ?>

    @if (session()->has('message'))
        <div>
            <script>
                Swal.fire({
                    icon: 'success',
                    text: 'Data berhasil ditambahkan',
                    allowOutsideClick: false
                })
            </script>
        </div>
    @endif

    <form wire:submit.prevent="store">
        @csrf
        <div wire:ignore.self class="modal fade" id="createModal" data-bs-backdrop="static" data-bs-keyboard="false">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5> <i class="bi bi-plus-lg"></i> Tambah data galeri</h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-floating mb-3">
                                        <input type="text"
                                            class="form-control @error('judul')
                                                            is-invalid
                                                        @enderror"
                                            placeholder="Judul Image" name="judul" id="judul" wire:model="judul">
                                        <label for="judul">Judul Image</label>
                                        @error('judul')
                                            <div class="invalid-feedback d-flex justify-content-star">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <input type="file" class="hidden d-inline mb-1" id="image"
                                            wire:model="image" style="" onchange="imgPreview()"
                                            style="height: 58px;">
                                        <label for="image"><span type="submit"
                                                class="badge bg-secondary py-2 px-3">Pilih
                                                Image</span></label>
                                        <span wire:loading wire:target="image" wire:key="image">
                                            <i class="spinner-border" role="status"
                                                style="margin-bottom: -7px; margin-left: 5px;"></i>
                                        </span>
                                        @error('image')
                                            <small class="text-danger d-block">{{ $message }}</small>
                                        @enderror
                                        <div wire:ignore>
                                            <img class="img-preview img-fluid d-block mt-2" style="width: 100px;"
                                                height="100">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-end">
                        <button type="button" id="closeModal" class="btn bg-light border-primary px-4"
                            data-bs-dismiss="modal">Batal</button>
                        <button class="btn bg-light px-4 border-primary" style="width: 100px;">
                            <span wire:loading.remove wire:target="store">Simpan</span>
                            <span wire:loading wire:target="store" class="spinner-border spinner-border-sm text-primary"
                                role="status" aria-hidden="true" style="width: 12px; height: 12px;"></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    @if ($closeModal)
        <script>
            $(document).ready(function() {
                $('#createModal').modal('hide');
            })
        </script>
    @endif


</div>
