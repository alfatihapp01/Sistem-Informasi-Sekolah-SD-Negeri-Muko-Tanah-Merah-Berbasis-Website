<?php

namespace App\Http\Livewire;

use App\Models\Berita;
use App\Models\Galeri;
use App\Models\Guru;
use App\Models\Informasi;
use App\Models\Kelas;
use App\Models\ProfilInstansi;
use App\Models\Siswa;
use App\Models\Video;
use Livewire\Component;
use Livewire\WithPagination;

class Home extends Component
{
    use WithPagination;

    public $bacaSambutan = false;

    public function bacaSambutan()
    {
        $this->bacaSambutan = true;
    }

    public function tutupSambutan()
    {
        $this->bacaSambutan = false;
    }

    public function render()
    {

        return view('livewire.home', [
            'title' => 'Beranda',
            'subtitle' => '',
            'profil' => ProfilInstansi::first(),

            'informasi' => Informasi::orderBy('id_informasi', 'DESC')->first(),
            'berita' => Berita::orderBy('id_berita', 'DESC')->first(),

            'guru' => Guru::get(),
            'siswa' => Siswa::get(),

            'galeri' => Galeri::orderBy('id_galeri', 'DESC')->get()

        ])->layout('index');
    }
}
