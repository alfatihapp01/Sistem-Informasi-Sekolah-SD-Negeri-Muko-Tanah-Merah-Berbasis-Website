<?php

namespace App\Http\Livewire;

use App\Models\ProfilInstansi as ModelsProfilInstansi;
use Livewire\Component;
use Livewire\WithPagination;

class ProfilInstansi extends Component
{
    use WithPagination;

    public function render()
    {

        return view('livewire.profil-instansi', [
            'title' => 'Profil Sekolah',
            'subtitle' => '<li>Profil Sekolah</li>',
            'profil' => ModelsProfilInstansi::first()

        ])->layout('index');
    }
}
