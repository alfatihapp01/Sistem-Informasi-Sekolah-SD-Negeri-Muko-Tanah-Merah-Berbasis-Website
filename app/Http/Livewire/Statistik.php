<?php

namespace App\Http\Livewire;

use App\Models\Guru;
use App\Models\Kelas;
use App\Models\ProfilInstansi;
use App\Models\Siswa;
use Livewire\Component;
use Livewire\WithPagination;

class Statistik extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.statistik', [
            'title' => 'Statistik Sekolah',
            'subtitle' => '<li>Data Sekolah</li><li>Statistik Sekolah</li>',
            'profil' => ProfilInstansi::first(),

            'kelas' => Kelas::get(),
            'siswa' => Siswa::get(),
            'guru' => Guru::get()

        ])->layout('index');
    }
}
