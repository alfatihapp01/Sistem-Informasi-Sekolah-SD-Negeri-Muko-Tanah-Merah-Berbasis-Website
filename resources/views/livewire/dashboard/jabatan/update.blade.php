<div>

    <?php include 'function/time.php'; ?>

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

    <form wire:submit.prevent="update({{ $idEdit }})">
        @csrf
        <div wire:ignore.self class="modal fade" id="editModal" data-bs-backdrop="static" data-bs-keyboard="false">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5><i class="bi bi-pencil"></i> Ubah nama jabatan</h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-floating mb-3">
                                        <input type="text"
                                            class="form-control @error('nama_jabatan')
                                                            is-invalid
                                                        @enderror"
                                            placeholder="Nama Kelas" name="nama_jabatan" id="nama_jabatan"
                                            wire:model="nama_jabatan">
                                        <label for="nama_jabatan">Nama Kelas</label>
                                        @error('nama_jabatan')
                                            <div class="invalid-feedback d-flex justify-content-star">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-end">
                        <button type="button" id="closeModal" class="btn bg-light border-primary px-4"
                            data-bs-dismiss="modal">Batal</button>
                        <button class="btn bg-light border-primary px-4" style="width: 100px;">
                            <span wire:loading.remove wire:target="update">Simpan</span>
                            <span wire:loading wire:target="update"
                                class="spinner-border spinner-border-sm text-primary" role="status" aria-hidden="true"
                                style="width: 12px; height: 12px;"></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    @if ($closeModal)
        <script>
            $(document).ready(function() {
                $('#editModal').modal('hide');
            })
        </script>
    @endif


</div>
