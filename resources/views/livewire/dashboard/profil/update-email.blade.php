<div>
    @if (session()->has('message'))
        <div>
            <script>
                Swal.fire({
                    icon: 'success',
                    text: 'Data berhasil diubah',
                    allowOutsideClick: false
                }).then(() => {
                    location.reload();
                })
            </script>
        </div>
    @endif

    <form wire:submit.prevent="update">
        @csrf
        <div wire:ignore.self class="modal fade" id="updateUsernameModal" data-bs-backdrop="static"
            data-bs-keyboard="false">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5><i class="bi bi-pencil"></i> Ubah Email</h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-floating mb-3">
                                        <input type="text"
                                            class="form-control @error('email')
                                                    is-invalid
                                                @enderror"
                                            placeholder="Email" value="{{ old('email') }}" name="email"
                                            id="email" wire:model="email">
                                        <label for="email">Email</label>
                                        @error('email')
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
                        <button type="button" wire:click="showModalFalse" class="btn bg-secondary px-4"
                            data-bs-dismiss="modal">Batal</button>
                        <button class="btn bg-primary px-4" style="width: 100px;">
                            <span wire:loading.remove wire:target="update"><i class="bi bi-pencil"></i> Simpan</span>
                            <span wire:loading wire:target="update"
                                class="spinner-border spinner-border-sm text-primary" role="status"
                                aria-hidden="true"></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    @if ($showModal)
        <script>
            $(document).ready(function() {
                $('#updateUsernameModal').modal('show');
            })
        </script>
    @endif

    @if ($closeModal)
        <script>
            $(document).ready(function() {
                $('#updateUsernameModal').modal('hide');
            })
        </script>
    @endif

</div>
