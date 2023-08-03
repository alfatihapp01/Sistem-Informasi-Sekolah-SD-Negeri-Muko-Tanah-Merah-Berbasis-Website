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
            <div class="modal-dialog modal-dialog-scrollable modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5><i class="bi bi-pencil"></i> Ubah data guru</h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
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
                                            class="form-control @error('nama')
                                                            is-invalid
                                                        @enderror"
                                            placeholder="Nama" name="nama" id="nama" wire:model="nama">
                                        <label for="nama">Nama</label>
                                        @error('nama')
                                            <div class="invalid-feedback d-flex justify-content-star">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text"
                                            class="form-control @error('tempat_lahir')
                                                            is-invalid
                                                        @enderror"
                                            placeholder="Tempat Lahir" name="tempat_lahir" id="tempat_lahir"
                                            wire:model="tempat_lahir">
                                        <label for="tempat_lahir">Tempat Lahir</label>
                                        @error('tempat_lahir')
                                            <div class="invalid-feedback d-flex justify-content-star">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <select class="form-select mb-1 @error('tanggal') is-invalid @enderror"
                                            id="tanggal" name="tanggal" wire:model="tanggal"
                                            style="width: 100px;display: inline-block;height: 58px;">
                                            <option value=" ">Tgl.</option>
                                            <?php for($i=1; $i<=31; $i++) : ?>
                                            <?php if($i>=1 && $i<=9) : ?>
                                            <option value="<?php echo '0' . $i; ?>" <?php if ($i == $tgl) {
                                                echo 'selected';
                                            } ?>>
                                                <?php echo '0' . $i; ?>
                                            </option>
                                            <?php else : ?>
                                            <option value="<?php echo $i;
                                            ?>" <?php if ($i == $tgl) {
                                                echo 'selected';
                                            } ?>>
                                                <?php echo $i; ?>
                                            </option>
                                            <?php endif; ?>
                                            <?php endfor; ?>
                                        </select>
                                        <select class="form-select @error('bulan') is-invalid @enderror" id="bulan"
                                            name="bulan" wire:model="bulan"
                                            style="width: 170px;display: inline-block;height: 58px;">
                                            <option value="">Bulan</option>
                                            <?php for ($i=1; $i <= 12 ; $i++) : ?>
                                            <option value="<?php echo $namaBulan[$i]; ?>" <?php if ($i == $bulan) {
                                                echo 'selected';
                                            } ?>>
                                                <?php echo $namaBulan[$i]; ?>
                                            </option>
                                            <?php endfor; ?>
                                        </select>
                                        <input type="text" class="form-control @error('tahun') is-invalid @enderror"
                                            name="tahun" id="tahun" placeholder="Tahun"
                                            style="width: 100px; display: inline-block;display: inline-block;height: 58px;"
                                            wire:model="tahun">
                                        <br>
                                        @error('tanggal')
                                            <div class="invalid-feedback d-inline">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        @error('bulan')
                                            <div class="invalid-feedback d-inline ml-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        @error('tahun')
                                            <div class="invalid-feedback d-inline ml-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <select
                                            class="form-select form-select-md @error('jenis_kelamin')
                                            is-invalid
                                            @enderror"
                                            id="jenis_kelamin" name="jenis_kelamin" wire:model="jenis_kelamin"
                                            style="height: 58px;">
                                            <option value=" ">-- Jenis Kelamin --</option>
                                            <option value="Laki-Laki">Laki-Laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                        @error('jenis_kelamin')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <select
                                            class="form-select form-select-md @error('jabatan')
                                            is-invalid
                                            @enderror"
                                            id="jabatan" name="jabatan" wire:model="jabatan" style="height: 58px;">
                                            <option value=" ">-- Pilih Jabatan --</option>
                                            @foreach ($dataJabatan as $data)
                                                <option value="{{ $data->id_jabatan }}">{{ $data->nama_jabatan }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('jabatan')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">

                                    <div class="mb-3">
                                        <select
                                            class="form-select form-select-md @error('status')
                                            is-invalid
                                            @enderror"
                                            id="status" name="status" wire:model="status" style="height: 58px;">
                                            <option value=" ">-- Status Pegawai --</option>
                                            <option value="PNS">PNS</option>
                                            <option value="PPPK">PPPK</option>
                                            <option value="Honor">Honor</option>
                                        </select>
                                        @error('status')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text"
                                            class="form-control @error('nomor_telepon')
                                                            is-invalid
                                                        @enderror"
                                            placeholder="Nomor Telepon" name="nomor_telepon" id="nomor_telepon"
                                            wire:model="nomor_telepon">
                                        <label for="nomor_telepon">Nomor Telepon</label>
                                        @error('nomor_telepon')
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
                                            placeholder="Email" name="email" id="email" wire:model="email">
                                        <label for="email">Email</label>
                                        @error('email')
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
                                    <div class="mb-3">
                                        <input type="file" class="hidden d-inline mb-1" id="image"
                                            wire:model="image" style="" onchange="imgPreview()"
                                            style="height: 58px;">
                                        <label for="image"><span type="submit"
                                                class="badge bg-secondary py-2 px-3">Pilih
                                                Image</span></label>
                                        <span wire:loading wire:target="image" wire:key="image">
                                            <i class="spinner-border spinner-border-sm text-primary" role="status"
                                                style="margin-bottom: px; margin-left: 5px;"></i>
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
                        <button class="btn bg-light border-primary px-4" style="width: 100px;">
                            <span wire:loading.remove wire:target="update">Simpan</span>
                            <span wire:loading wire:target="update"
                                class="spinner-border spinner-border-sm text-primary" role="status"
                                aria-hidden="true" style="width: 12px; height: 12px;"></span>
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
