<div>

    <?php include 'function/time.php'; ?>

    @if (session()->has('message'))
        <div>
            <script>
                Swal.fire({
                    icon: 'success',
                    text: 'Data berhasil diubah',
                    allowOutsideClick: false
                }).then(() => {
                    // window.location.reload();
                })
            </script>
        </div>
    @endif

    <form wire:submit.prevent="update({{ $idEdit }})">
        @csrf
        <div wire:ignore.self class="modal fade" id="editModal" data-bs-backdrop="static" data-bs-keyboard="false">
            <div class="modal-dialog modal-dialog-scrollable modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5><i class="bi bi-pencil"></i> Ubah data video</h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">

                                    <input type="hidden" name="video_old" id="video_old" wire:model="video_old">

                                    <div class="form-floating mb-3">
                                        <input type="text"
                                            class="form-control @error('judul')
                                                            is-invalid
                                                        @enderror"
                                            placeholder="Judul Video" name="judul" id="judul" wire:model="judul">
                                        <label for="judul">Judul Video</label>
                                        @error('judul')
                                            <div class="invalid-feedback d-flex justify-content-star">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <input type="file" class="hidden d-inline mb-1" id="video_update"
                                            wire:model="video" style="" onchange="imgPreview()"
                                            style="height: 58px;">
                                        <label for="video_update"><span type="submit"
                                                class="badge bg-secondary py-2 px-3">Pilih
                                                Video</span></label>
                                        <span wire:loading wire:target="video" wire:key="video">
                                            <i class="spinner-border" role="status"
                                                style="margin-bottom: -7px; margin-left: 5px;"></i>
                                        </span>
                                        @error('video')
                                            <small class="text-danger d-block">{{ $message }}</small>
                                        @enderror
                                        <div wire:ignore>
                                            <img class="img-preview img-fluid d-block mt-2" style="width: 100px;"
                                                height="100">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div wire:ignore>
                                            <textarea wire:model="keterangan" class="form-control" name="keterangan" id="keterangan"></textarea>
                                        </div>
                                        @error('keterangan')
                                            <small class="text-danger">
                                                {{ $message }}
                                            </small>
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

    <script>
        $(document).ready(function() {
            $('#editModal').modal('show');

            $('#keterangan').summernote({
                placeholder: 'Keterangan Video',
                tabsize: 2,
                height: 200,
                toolbar: [
                    ['groupName', ['list of button']],
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['fontname', ['fontname']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']],
                    ['insert', ['picture', 'math']]
                ],
                callbacks: {
                    onChange: function(contents) {
                        @this.set('keterangan', contents);
                    }
                },
            });

        });
    </script>

    @if ($closeModal)
        <script>
            $(document).ready(function() {
                $('#editModal').modal('hide');
            })
        </script>
    @endif


</div>
