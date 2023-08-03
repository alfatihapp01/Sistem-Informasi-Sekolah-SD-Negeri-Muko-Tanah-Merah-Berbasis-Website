<?php

namespace App\Http\Livewire;

use App\Models\Berita as ModelsBerita;
use App\Models\ProfilInstansi;
use Livewire\Component;
use Livewire\WithPagination;

class Berita extends Component
{
    use WithPagination;

    public $berita_opsi;
    public $showFullText = false;

    protected $paginationTheme = 'bootstrap';

    public $listeners = [
        'showBerita'
    ];

    public function fullText()
    {
        $this->showFullText = true;
    }

    public function closeFullText()
    {
        $this->showFullText = false;
    }

    public function berita_opsi($id)
    {
        $this->showFullText = false;

        $berita = ModelsBerita::where('id_berita', $id)->first();

        $this->berita_opsi = $berita;

        $this->emit('showBerita');
    }

    public function showBerita()
    {
    }

    public function render()
    {
        return view('livewire.berita', [
            'title' => 'Berita',
            'subtitle' => '<li>Media</li> <li>Berita</li>',
            'profil' => ProfilInstansi::first(),
            'berita' => ModelsBerita::orderBy('id_berita', 'DESC')->paginate(10),
            'berita_terbaru' => ModelsBerita::orderBy('id_berita', 'DESC')->limit(1)->first(),
        ])->layout('index');
    }
}
