<?php

namespace App\Http\Livewire\Dashboard\Siswa;

use App\Models\Kelas;
use App\Models\Siswa;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
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


    public function store()
    {
        $rules = [
            'kelas' => 'required',
            'nomor_induk' => 'required|unique:siswa,induk',
            'nik' => 'required|digits:16|unique:siswa,nik',
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

        if ($this->nisn) {
            $rules['nisn'] =  'required|digits:10|unique:siswa,nisn';
        }

        $this->validate($rules);

        $tanggal_lahir = $this->tanggal . ' ' . $this->bulan . ' ' . $this->tahun;

        Siswa::create([
            'id_kelas' => $this->kelas,
            'nisn' => $this->nisn,
            'induk' => $this->nomor_induk,
            'nik' => $this->nik,
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

        $this->emit('stored');

        $this->closeModal = true;

        session()->flash('message');
    }

    public function render()
    {
        return view('livewire.dashboard.siswa.create', [
            'dataKelas' => Kelas::orderBy('nama_kelas')->get()
        ]);
    }
}
