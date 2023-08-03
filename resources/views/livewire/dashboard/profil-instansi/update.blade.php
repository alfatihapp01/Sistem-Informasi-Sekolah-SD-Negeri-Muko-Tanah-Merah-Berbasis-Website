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

    <form wire:submit.prevent="update({{ $idEdit }})">
        @csrf
        <div wire:ignore.self class="modal fade" id="editModal" data-bs-backdrop="static" data-bs-keyboard="false">
            <div class="modal-dialog modal-dialog-scrollable modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5><i class="bi bi-pencil"></i> Ubah profil instansi</h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">

                            <input type="hidden" wire:model="logo_old">
                            <input type="hidden" wire:model="struktur_organisasi_old">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text"
                                            class="form-control @error('nama_instansi')
                                                        is-invalid
                                                    @enderror"
                                            placeholder="Nama Instansi" name="nama_instansi" id="nama_instansi"
                                            wire:model="nama_instansi">
                                        <label for="nama_instansi">Nama Instansi</label>
                                        @error('nama_instansi')
                                            <div class="invalid-feedback d-flex justify-content-star">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text"
                                            class="form-control @error('npsn')
                                                        is-invalid
                                                    @enderror"
                                            placeholder="NPSN" name="npsn" id="npsn" wire:model="npsn">
                                        <label for="npsn">NPSN</label>
                                        @error('npsn')
                                            <div class="invalid-feedback d-flex justify-content-star">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>


                                    <div class="form-floating mb-3">
                                        <input type="text"
                                            class="form-control @error('akreditas')
                                                        is-invalid
                                                    @enderror"
                                            placeholder="Akreditas" name="akreditas" id="akreditas" wire:model="akreditas">
                                        <label for="akreditas">Akreditas</label>
                                        @error('akreditas')
                                            <div class="invalid-feedback d-flex justify-content-star">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text"
                                            class="form-control @error('status')
                                                        is-invalid
                                                    @enderror"
                                            placeholder="Status" name="status" id="status" wire:model="status">
                                        <label for="status">Status</label>
                                        @error('status')
                                            <div class="invalid-feedback d-flex justify-content-star">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text"
                                            class="form-control @error('no_sk_pendirian')
                                                        is-invalid
                                                    @enderror"
                                            placeholder="No. SK Pendirian Sekolah" name="no_sk_pendirian" id="no_sk_pendirian" wire:model="no_sk_pendirian">
                                        <label for="no_sk_pendirian">No. SK Pendirian Sekolah</label>
                                        @error('no_sk_pendirian')
                                            <div class="invalid-feedback d-flex justify-content-star">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text"
                                            class="form-control @error('tanggal_sk_pendirian')
                                                        is-invalid
                                                    @enderror"
                                            placeholder="Tgl. SK Pendirian" name="tanggal_sk_pendirian" id="tanggal_sk_pendirian" wire:model="tanggal_sk_pendirian">
                                        <label for="tanggal_sk_pendirian">Tgl. SK Pendirian</label>
                                        @error('tanggal_sk_pendirian')
                                            <div class="invalid-feedback d-flex justify-content-star">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text"
                                            class="form-control @error('no_sk_operasional')
                                                        is-invalid
                                                    @enderror"
                                            placeholder="No. SK Operasional" name="no_sk_operasional" id="no_sk_operasional" wire:model="no_sk_operasional">
                                        <label for="no_sk_operasional">No. SK Operasional</label>
                                        @error('no_sk_operasional')
                                            <div class="invalid-feedback d-flex justify-content-star">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text"
                                            class="form-control @error('tanggal_sk_operasional')
                                                        is-invalid
                                                    @enderror"
                                            placeholder="Tgl. SK Operasional" name="tanggal_sk_operasional" id="tanggal_sk_operasional" wire:model="tanggal_sk_operasional">
                                        <label for="tanggal_sk_operasional">Tgl. SK Operasional</label>
                                        @error('tanggal_sk_operasional')
                                            <div class="invalid-feedback d-flex justify-content-star">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>



                                    <div class="form-floating mb-3">
                                        <input type="text"
                                            class="form-control @error('kepala_instansi')
                                                        is-invalid
                                                    @enderror"
                                            placeholder="Kepala Instansi" name="kepala_instansi" id="kepala_instansi"
                                            wire:model="kepala_instansi">
                                        <label for="kepala_instansi">Kepala Instansi</label>
                                        @error('kepala_instansi')
                                            <div class="invalid-feedback d-flex justify-content-star">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text"
                                            class="form-control @error('nip')
                                                        is-invalid
                                                    @enderror"
                                            placeholder="NIP" name="nip" id="nip" wire:model="nip">
                                        <label for="nip">NIP</label>
                                        @error('nip')
                                            <div class="invalid-feedback d-flex justify-content-star">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text"
                                            class="form-control @error('operator')
                                                        is-invalid
                                                    @enderror"
                                            placeholder="Nama Operator" name="operator" id="operator" wire:model="operator">
                                        <label for="operator">Nama Operator</label>
                                        @error('operator')
                                            <div class="invalid-feedback d-flex justify-content-star">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text"
                                            class="form-control @error('facebook')
                                                        is-invalid
                                                    @enderror"
                                            placeholder="Facebook" name="facebook" id="facebook" wire:model="facebook">
                                        <label for="facebook">Facebook</label>
                                        @error('facebook')
                                            <div class="invalid-feedback d-flex justify-content-star">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text"
                                            class="form-control @error('instagram')
                                                        is-invalid
                                                    @enderror"
                                            placeholder="Instagram" name="instagram" id="instagram" wire:model="instagram">
                                        <label for="instagram">Instagram</label>
                                        @error('instagram')
                                            <div class="invalid-feedback d-flex justify-content-star">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text"
                                            class="form-control @error('latitude')
                                                        is-invalid
                                                    @enderror"
                                            placeholder="Koordinat Latitude" name="latitude" id="latitude"
                                            wire:model="latitude">
                                        <label for="latitude">Koordinat Latitude</label>
                                        @error('latitude')
                                            <div class="invalid-feedback d-flex justify-content-star">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text"
                                            class="form-control @error('longitude')
                                                        is-invalid
                                                    @enderror"
                                            placeholder="Koordinat Longitude" name="longitude" id="longitude"
                                            wire:model="longitude">
                                        <label for="longitude">Koordinat Longitude</label>
                                        @error('longitude')
                                            <div class="invalid-feedback d-flex justify-content-star">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text"
                                            class="form-control @error('kode_pos')
                                                        is-invalid
                                                    @enderror"
                                            placeholder="Kode POS" name="kode_pos" id="kode_pos" wire:model="kode_pos">
                                        <label for="kode_pos">Kode POS</label>
                                        @error('kode_pos')
                                            <div class="invalid-feedback d-flex justify-content-star">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text"
                                            class="form-control @error('alamat')
                                                        is-invalid
                                                    @enderror"
                                            placeholder="Alamat" name="alamat" id="alamat" wire:model="alamat">
                                        <label for="alamat">Alamat</label>
                                        @error('alamat')
                                            <div class="invalid-feedback d-flex justify-content-star">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text"
                                            class="form-control @error('kelurahan')
                                                        is-invalid
                                                    @enderror"
                                            placeholder="Kelurahan" name="kelurahan" id="kelurahan"
                                            wire:model="kelurahan">
                                        <label for="kelurahan">Kelurahan</label>
                                        @error('kelurahan')
                                            <div class="invalid-feedback d-flex justify-content-star">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text"
                                            class="form-control @error('kecamatan')
                                                        is-invalid
                                                    @enderror"
                                            placeholder="Kecamatan" name="kecamatan" id="kecamatan"
                                            wire:model="kecamatan">
                                        <label for="kecamatan">Kecamatan</label>
                                        @error('kecamatan')
                                            <div class="invalid-feedback d-flex justify-content-star">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text"
                                            class="form-control @error('kabupaten')
                                                        is-invalid
                                                    @enderror"
                                            placeholder="Kabupaten" name="kabupaten" id="kabupaten"
                                            wire:model="kabupaten">
                                        <label for="kabupaten">Kabupaten</label>
                                        @error('kabupaten')
                                            <div class="invalid-feedback d-flex justify-content-star">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text"
                                            class="form-control @error('provinsi')
                                                        is-invalid
                                                    @enderror"
                                            placeholder="Provinsi" name="provinsi" id="provinsi"
                                            wire:model="provinsi">
                                        <label for="provinsi">Provinsi</label>
                                        @error('provinsi')
                                            <div class="invalid-feedback d-flex justify-content-star">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text"
                                            class="form-control @error('email')
                                                        is-invalid
                                                    @enderror"
                                            placeholder="Alamat Email" name="email" id="email"
                                            wire:model="email">
                                        <label for="email">Alamat Email</label>
                                        @error('email')
                                            <div class="invalid-feedback d-flex justify-content-star">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text"
                                            class="form-control @error('telepon')
                                                        is-invalid
                                                    @enderror"
                                            placeholder="Nomor Telepon" name="telepon" id="telepon"
                                            wire:model="telepon">
                                        <label for="telepon">Nomor Telepon</label>
                                        @error('telepon')
                                            <div class="invalid-feedback d-flex justify-content-star">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text"
                                            class="form-control @error('web')
                                                        is-invalid
                                                    @enderror"
                                            placeholder="Website" name="web" id="web" wire:model="web">
                                        <label for="web">Website</label>
                                        @error('web')
                                            <div class="invalid-feedback d-flex justify-content-star">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    
                                    <div class="mb-4 mt-3">
                                        <input type="file" class="hidden d-inline mb-1" id="logo"
                                            wire:model="logo" style="" onchange="logoPreview()">
                                        <label for="logo"><span type="submit"
                                                class="badge bg-secondary py-2 px-3">Pilih
                                                Gambar Logo</span></label>
                                        <span wire:loading wire:target="logo" wire:key="logo">
                                            <i class="spinner-border" role="status"
                                                style="margin-bottom: -7px; margin-left: 5px;"></i>
                                        </span>
                                        @error('logo')
                                            <small class="text-danger d-block">{{ $message }}</small>
                                        @enderror
                                        <small class="text-secondary d-block">Format foto PNG (Transparan) adalah yang
                                            di
                                            rekomendasikan</small>
                                        <div wire:ignore>
                                            <img class="logo-preview img-fluid d-block mt-2" style="width: 50px;">
                                        </div>
                                    </div>
                                    <div class="mb-4 mt-3">
                                        <input type="file" class="hidden d-inline mb-1" id="struktur_organisasi"
                                            wire:model="struktur_organisasi" style=""
                                            onchange="strukturPreview()">
                                        <label for="struktur_organisasi"><span type="submit"
                                                class="badge bg-secondary py-2 px-3">Pilih
                                                Gambar Struktur</span></label>
                                        <span wire:loading wire:target="struktur_organisasi"
                                            wire:key="struktur_organisasi">
                                            <i class="spinner-border" role="status"
                                                style="margin-bottom: -7px; margin-left: 5px;"></i>
                                        </span>
                                        @error('struktur_organisasi')
                                            <small class="text-danger d-block">{{ $message }}</small>
                                        @enderror
                                        <div wire:ignore>
                                            <img class="struktur-preview img-fluid d-block mt-2" style="width: 50px;">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">

                                    <div class="mb-3">
                                        <label for="">Visi Instansi</label>
                                        <div wire:ignore>
                                            <textarea wire:model="visi" class="form-control" name="visi" id="visi"></textarea>
                                        </div>
                                        @error('visi')
                                            <small class="text-danger">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Misi Instansi</label>
                                        <div wire:ignore>
                                            <textarea wire:model="misi" class="form-control" name="misi" id="misi"></textarea>
                                        </div>
                                        @error('misi')
                                            <small class="text-danger">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Fasilitas Instansi</label>
                                        <div wire:ignore>
                                            <textarea wire:model="fasilitas" class="form-control" name="fasilitas" id="fasilitas"></textarea>
                                        </div>
                                        @error('fasilitas')
                                            <small class="text-danger">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="">Sejarah Singkat Instansi</label>
                                        <div wire:ignore>
                                            <textarea wire:model="sejarah" class="form-control" name="sejarah" id="sejarah"></textarea>
                                        </div>
                                        @error('sejarah')
                                            <small class="text-danger">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Kata Sambutan</label>
                                        <div wire:ignore>
                                            <textarea wire:model="kata_sambutan" class="form-control" name="kata_sambutan" id="kata_sambutan"></textarea>
                                        </div>
                                        @error('kata_sambutan')
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

            $('#fasilitas').summernote({
                placeholder: 'Fasilitas Instansi',
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
                        @this.set('fasilitas', contents);
                    }
                },
            });
            $('#visi').summernote({
                placeholder: 'Visi Instansi',
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
                        @this.set('visi', contents);
                    }
                },
            });
            $('#misi').summernote({
                placeholder: 'Misi Instansi',
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
                        @this.set('misi', contents);
                    }
                },
            });
            $('#sejarah').summernote({
                placeholder: 'Sejarah Singkat Instansi',
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
                        @this.set('sejarah', contents);
                    }
                },
            });
            $('#kata_sambutan').summernote({
                placeholder: 'Kata Sambutan',
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
                        @this.set('kata_sambutan', contents);
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
