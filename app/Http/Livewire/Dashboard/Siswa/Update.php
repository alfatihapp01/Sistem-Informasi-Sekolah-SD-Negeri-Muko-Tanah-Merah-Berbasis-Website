<?php

namespace App\Http\Livewire\Dashboard\Siswa;

use App\Models\Kelas;
use App\Models\Siswa;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

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

    public $tanggal;
    public $bulan;
    public $tahun;

    public $idEdit;


    public function mount($siswa)
    {
        $this->kelas = $siswa['id_kelas'];
        $this->nisn = $siswa['nisn'];
        $this->nik = $siswa['nik'];
        $this->nomor_induk = $siswa['induk'];
        $this->nama = $siswa['nama'];
        $this->tempat_lahir = $siswa['tempat_lahir'];

        if ($siswa['tanggal_lahir']) {
            $tanggal_lahir = explode(' ', $siswa['tanggal_lahir']);
            if (empty($tanggal_lahir[0]) || empty($tanggal_lahir[1]) || empty($tanggal_lahir[2])) {
                $this->tanggal = 1;
                $this->bulan = 'Januari';
                $this->tahun = 1998;
            } else {
                $this->tanggal = $tanggal_lahir[0];
                $this->bulan = $tanggal_lahir[1];
                $this->tahun = $tanggal_lahir[2];
            }
        }

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

        $this->idEdit = $siswa['id_siswa'];

    }


    public function update($id)
    {
        $siswa = Siswa::where('id_siswa', $id)->first();

        $rules = [
            'kelas' => 'required',
            // 'nomor_induk' => 'required|unique:siswa,induk',
            'nama' => 'required|max:255',
            'tempat_lahir' => 'required|max:255',

            'tanggal' => 'required|max:255',
            'bulan' => 'required|max:255',
            'tahun' => 'required|digits:4',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'pendidikan_sebelumnya' => 'required|max:255',
            'alamat' => 'required|max:255',
            'nama_ayah' => 'required|max:255',
            'nama_ibu' => 'required|max:255',
            'pekerjaan_ayah' => 'required|max:255',
            'pekerjaan_ibu' => 'required|max:255',
            'jalan' => 'required|max:255',
            'kelurahan' => 'max:255',
            'kecamatan' => 'max:255',
            'kabupaten' => 'max:255',
            'provinsi' => 'max:255',
        ];

        if ($this->nomor_induk != $siswa->induk) {
            $rules['nomor_induk'] = 'required|unique:siswa,induk';
        }

        if ($this->nik != $siswa->nik) {
            $rules['nik'] = 'required|digits:16|unique:siswa,nik';
        }

        if ($this->nisn) {
            if ($this->nisn != $siswa->nisn) {
                $rules['nisn'] =  'required|digits:10|unique:siswa,nisn';
            }
        }

        $this->validate($rules);

        $tanggal_lahir = $this->tanggal . ' ' . $this->bulan . ' ' . $this->tahun;

        siswa::where('id_siswa', $id)->update([
            'id_kelas' => $this->kelas,
            'nisn' => $this->nisn,
            'nik' => $this->nik,
            'induk' => $this->nomor_induk,
            'nama' => strtoupper($this->nama),
            'tempat_lahir' => $this->tempat_lahir,
            'tanggal_lahir' => $tanggal_lahir,
            'jenis_kelamin' => $this->jenis_kelamin,
            'agama' => $this->agama,
            'pendidikan_sebelumnya' => $this->pendidikan_sebelumnya,
            'alamat' => $this->alamat,
            'nama_ayah' => $this->nama_ayah,
            'nama_ibu' => $this->nama_ibu,
            'pekerjaan_ayah' => $this->pekerjaan_ayah,
            'pekerjaan_ibu' => $this->pekerjaan_ibu,
            'jalan' => $this->jalan,
            'kelurahan' => $this->kelurahan,
            'kecamatan' => $this->kecamatan,
            'kabupaten' => $this->kabupaten,
            'provinsi' => $this->provinsi,
        ]);

        $this->emit('updated');

        $this->closeModal = true;

        session()->flash('message');
    }

    public function render()
    {
        return view('livewire.dashboard.siswa.update', [
            'dataKelas' => Kelas::orderBy('nama_kelas')->get()
        ]);
    }
}
