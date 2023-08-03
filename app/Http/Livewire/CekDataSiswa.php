<?php

namespace App\Http\Livewire;

use App\Models\ProfilInstansi;
use App\Models\Siswa;
use Livewire\Component;

class CekDataSiswa extends Component
{
    public $nisn_atau_nik;
    public $siswa = null;
    public $validate_siswa = false;

    public function cekDataSiswa()
    {

        $siswa = Siswa::where('nisn', '=', $this->nisn_atau_nik)
            ->orWhere('nik', '=', $this->nisn_atau_nik)
            ->first();


        if ($this->nisn_atau_nik == null) {
            $this->siswa = null;
            $this->validate_siswa = true;
        } else {
            if ($siswa) {
                $this->siswa = $siswa;
                $this->validate_siswa = false;
            } else {
                $this->validate_siswa = true;
                $this->siswa = null;
            }
        }
    }

    public function render()
    {
        return view('livewire.cek-data-siswa', [
            'title' => 'Cek Peserta Didik',
            'subtitle' => '<li>Data Sekolah</li><li>Cek Peserta Didik</li>',
            'profil' => ProfilInstansi::first(),
            // 'siswa' => $this->search == null ?
            //     null :
            //     Siswa::where('nisn', 'like', '%' . $this->search . '%')
            //     ->orWhere('nik', 'like', '%' . $this->search . '%')
            //     ->first()

        ])->layout('index');
    }
}
