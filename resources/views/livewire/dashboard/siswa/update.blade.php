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
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5><i class="bi bi-pencil"></i> Ubah data siswa</h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <select
                                            class="form-select form-select-md @error('kelas')
                                            is-invalid
                                            @enderror"
                                            id="kelas" name="kelas" wire:model="kelas" style="height: 58px;">
                                            <option value=" ">-- Pilih Kelas --</option>
                                            @foreach ($dataKelas as $data)
                                                <option value="{{ $data->id_kelas }}">{{ $data->nama_kelas }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('kelas')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text"
                                            class="form-control @error('nomor_induk')
                                                            is-invalid
                                                        @enderror"
                                            placeholder="Nomor Induk" name="nomor_induk" id="nomor_induk"
                                            wire:model="nomor_induk">
                                        <label for="nomor_induk">Nomor Induk Siswa</label>
                                        @error('nomor_induk')
                                            <div class="invalid-feedback d-flex justify-content-star">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text"
                                            class="form-control @error('nisn')
                                                            is-invalid
                                                        @enderror"
                                            placeholder="NISN " name="nisn" id="nisn" wire:model="nisn">
                                        <label for="nisn">NISN </label>
                                        @error('nisn')
                                            <div class="invalid-feedback d-flex justify-content-star">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text"
                                            class="form-control @error('nik')
                                                            is-invalid
                                                        @enderror"
                                            placeholder="NIK " name="nik" id="nik" wire:model="nik">
                                        <label for="nik">NIK </label>
                                        @error('nik')
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
                                            class="form-select form-select-md @error('agama')
                                            is-invalid
                                            @enderror"
                                            id="agama" name="agama" wire:model="agama" style="height: 58px;">
                                            <option value=" ">-- Pilih Agama --</option>
                                            <option value="Islam">Islam</option>
                                            <option value="Protestan">Protestan</option>
                                            <option value="Katolik">Katolik</option>
                                            <option value="Hindu">Hindu</option>
                                            <option value="Buddha">Buddha</option>
                                            <option value="Khonghucu">Khonghucu
                                            </option>
                                            <option value="Lain-Lain">Lain-Lain
                                            </option>
                                        </select>
                                        @error('agama')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text"
                                            class="form-control @error('pendidikan_sebelumnya')
                                                            is-invalid
                                                        @enderror"
                                            placeholder="Pendidikan Sebelumnya" name="pendidikan_sebelumnya"
                                            id="pendidikan_sebelumnya" wire:model="pendidikan_sebelumnya">
                                        <label for="pendidikan_sebelumnya">Pendidikan Sebelumnya</label>
                                        @error('pendidikan_sebelumnya')
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
                                            placeholder="Alamat Siswa" name="alamat" id="alamat"
                                            wire:model="alamat">
                                        <label for="alamat">Alamat Siswa</label>
                                        @error('alamat')
                                            <div class="invalid-feedback d-flex justify-content-star">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <h6>Data Orang Tua/Wali</h6>
                                    <div class="form-floating mb-3">
                                        <input type="text"
                                            class="form-control @error('nama_ayah')
                                                            is-invalid
                                                        @enderror"
                                            placeholder="Nama Ayah" name="nama_ayah" id="nama_ayah"
                                            wire:model="nama_ayah">
                                        <label for="nama_ayah">Nama Ayah</label>
                                        @error('nama_ayah')
                                            <div class="invalid-feedback d-flex justify-content-star">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text"
                                            class="form-control @error('nama_ibu')
                                                            is-invalid
                                                        @enderror"
                                            placeholder="Nama Ibu" name="nama_ibu" id="nama_ibu"
                                            wire:model="nama_ibu">
                                        <label for="nama_ibu">Nama Ibu</label>
                                        @error('nama_ibu')
                                            <div class="invalid-feedback d-flex justify-content-star">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text"
                                            class="form-control @error('pekerjaan_ayah')
                                                            is-invalid
                                                        @enderror"
                                            placeholder="Pekerjaan Ayah" name="pekerjaan_ayah" id="pekerjaan_ayah"
                                            wire:model="pekerjaan_ayah">
                                        <label for="pekerjaan_ayah">Pekerjaan Ayah</label>
                                        @error('pekerjaan_ayah')
                                            <div class="invalid-feedback d-flex justify-content-star">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text"
                                            class="form-control @error('pekerjaan_ibu')
                                                            is-invalid
                                                        @enderror"
                                            placeholder="Pekerjaan Ibu" name="pekerjaan_ibu" id="pekerjaan_ibu"
                                            wire:model="pekerjaan_ibu">
                                        <label for="pekerjaan_ibu">Pekerjaan Ibu</label>
                                        @error('pekerjaan_ibu')
                                            <div class="invalid-feedback d-flex justify-content-star">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text"
                                            class="form-control @error('jalan')
                                                            is-invalid
                                                        @enderror"
                                            placeholder="Alamat Jalan" name="jalan" id="jalan"
                                            wire:model="jalan">
                                        <label for="jalan">Alamat Jalan</label>
                                        @error('jalan')
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
