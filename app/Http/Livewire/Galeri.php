<?php

namespace App\Http\Livewire;

use App\Models\Galeri as ModelsGaleri;
use App\Models\ProfilInstansi;
use Livewire\Component;
use Livewire\WithPagination;

class Galeri extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.galeri', [
            'title' => 'Galeri Sekolah',
            'subtitle' => '<li>Media</li> <li>Galeri Sekolah</li>',
            'profil' => ProfilInstansi::first(),
            'galeri' => ModelsGaleri::orderBy('id_galeri', 'DESC')->paginate(8),
        ])->layout('index');
    }
}
