<?php

namespace App\Http\Livewire;

use App\Models\InformasiKegiatan;
use App\Models\ProfilInstansi;
use Livewire\Component;

class InformasiExtrakurikuler extends Component
{
    public function render()
    {
        return view('livewire.informasi-extrakurikuler', [
            'title' => 'Ekstrakurikuler Sekolah',
            'subtitle' => '<li>Informasi</li> <li>Ekstrakurikuler Sekolah</li>',
            'profil' => ProfilInstansi::first(),
            'informasi' => InformasiKegiatan::first(),

        ])->layout('index');
    }
}
