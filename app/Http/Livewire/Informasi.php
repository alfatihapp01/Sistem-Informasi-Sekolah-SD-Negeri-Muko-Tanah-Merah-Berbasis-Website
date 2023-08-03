<?php

namespace App\Http\Livewire;

use App\Models\Berita;
use App\Models\Informasi as ModelsInformasi;
use App\Models\ProfilInstansi;
use Livewire\Component;
use Livewire\WithPagination;

class Informasi extends Component
{
    use WithPagination;

    public $informasi_opsi;
    public $showFullText = false;

    protected $paginationTheme = 'bootstrap';

    public $listeners = [
        'showInformasi'
    ];

    public function fullText()
    {
        $this->showFullText = true;
    }

    public function closeFullText()
    {
        $this->showFullText = false;
    }

    public function informasi_opsi($id)
    {
        $this->showFullText = false;

        $informasi = ModelsInformasi::where('id_informasi', $id)->first();

        $this->informasi_opsi = $informasi;

        $this->emit('showInformasi');
    }

    public function showInformasi()
    {
    }

    public function render()
    {
        return view('livewire.informasi', [
            'title' => 'Pengumuman Sekolah',
            'subtitle' => '<li>Media</li> <li>Pengumuman Sekolah</li>',
            'profil' => ProfilInstansi::first(),
            'informasi' => ModelsInformasi::orderBy('id_informasi', 'DESC')->paginate(10),
            'informasi_terbaru' => ModelsInformasi::orderBy('id_informasi', 'DESC')->limit(1)->first(),
        ])->layout('index');
    }
}
