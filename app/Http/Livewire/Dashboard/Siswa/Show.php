<?php

namespace App\Http\Livewire\Dashboard\Siswa;

use App\Models\Siswa;
use Livewire\Component;

class Show extends Component
{
    public $closeModal = false;

    // data request
    public $kelas;
    public $nisn;
    public $nik;
    public $nomor_induk;
    public $nama;

    public $tempat_lahir;
    public $jenis_kelamin;
    public $agama;
    public $pendidikan_sebelumnya;
    public $alamat;
    public $nama_ayah;
    public $nama_ibu;
    public $pekerjaan_ayah;
    public $pekerjaan_ibu;
    public $jalan;
    public $kelurahan;
    public $kecamatan;
    public $kabupaten;
    public $provinsi;

    public $tanggal_lahir;
    public $bulan;
    public $tahun;


    public function mount($siswa)
    {
        $siswa = Siswa::where('id_siswa', $siswa['id_siswa'])->first();
        $this->kelas = $siswa->kelas->nama_kelas;
        $this->nisn = $siswa['nisn'];
        $this->nik = $siswa['nik'];
        $this->nomor_induk = $siswa['induk'];
        $this->nama = $siswa['nama'];
        $this->tempat_lahir = $siswa['tempat_lahir'];
        $this->tanggal_lahir = $siswa['tanggal_lahir'];

        $this->jenis_kelamin = $siswa['jenis_kelamin'];
        $this->agama = $siswa['agama'];
        $this->pendidikan_sebelumnya = $siswa['pendidikan_sebelumnya'];
        $this->alamat = $siswa['alamat'];
        $this->nama_ayah = $siswa['nama_ayah'];
        $this->nama_ibu = $siswa['nama_ibu'];
        $this->pekerjaan_ayah = $siswa['pekerjaan_ayah'];
        $this->pekerjaan_ibu = $siswa['pekerjaan_ibu'];
        $this->jalan = $siswa['jalan'];
        $this->kelurahan = $siswa['kelurahan'];
        $this->kecamatan = $siswa['kecamatan'];
        $this->kabupaten = $siswa['kabupaten'];
        $this->provinsi = $siswa['provinsi'];
    }

    public function render()
    {
        return view('livewire.dashboard.siswa.show');
    }
}
