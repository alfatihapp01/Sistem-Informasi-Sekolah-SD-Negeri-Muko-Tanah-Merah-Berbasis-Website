<?php

namespace App\Http\Livewire\Dashboard\Guru;

use App\Models\Guru;
use Livewire\Component;

class Show extends Component
{
    public $closeModal = false;

    // data request
    public $nama_instansi;
    public $nip;
    // public $status_tim_pengajar;
    public $nama;
    public $tempat_lahir;
    public $tanggal_lahir;
    public $jabatan;
    public $status;
    // public $agama;
    public $jenis_kelamin;
    public $nomor_telepon;
    public $email;
    public $alamat;
    public $image;

    public function mount($guru)
    {
        $guru = Guru::where('id_guru', $guru['id_guru'])->first();

        $this->jabatan = $guru->jabatan->nama_jabatan;
        // // $this->status_tim_pengajar = $guru['status_tim_pengajar'];
        $this->status = $guru['status'];
        $this->nip = $guru['nip'];
        $this->nama = $guru['nama'];
        $this->tempat_lahir = $guru['tempat_lahir'];
        $this->jenis_kelamin = $guru['jenis_kelamin'];
        $this->tanggal_lahir = $guru['tanggal_lahir'];
        $this->nomor_telepon = $guru['nomor_telepon'];
        $this->email = $guru['email'];
        $this->alamat = $guru['alamat'];
        $this->image = $guru['image'];
    }

    public function render()
    {
        return view('livewire.dashboard.guru.show');
    }
}
