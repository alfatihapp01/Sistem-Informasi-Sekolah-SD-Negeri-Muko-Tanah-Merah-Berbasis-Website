<?php

namespace App\Http\Livewire;

use App\Models\Guru;
use App\Models\ProfilInstansi;
use Livewire\Component;

class DataGuru extends Component
{
    public function render()
    {
        return view('livewire.data-guru',[
            'title' => 'Tenaga Pendidik',
            'subtitle' => '<li>Data Sekolah</li><li>Tenaga Pendidik</li>',
            'profil' => ProfilInstansi::first(),

            'guru' => Guru::get()

        ])->layout('index');
    }
}
