<?php

namespace App\Http\Livewire\Dashboard\Berita;

use App\Models\Berita;
use App\Models\ProfilInstansi;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $showLivewireCreate = false;
    public $showLivewireUpdate = false;
    public $showLivewireDelete = false;

    public $getBerita;

    public $paginate = 15;
    public $search;

    protected $paginationTheme = 'bootstrap';

    protected $listeners = [
        'stored' => 'handleStored',
        'updated' => 'handleUpdated',
        'deleted' => 'handleDeleted',

        'closeLivewire' => 'handleCloseLivewire'
    ];

    // create
    public function create()
    {
        $this->showLivewireCreate = true;
    }

    public function handleStored()
    {
        $this->showLivewireCreate = false;
    }

    // edit
    public function edit($id)
    {
        $this->showLivewireUpdate = true;

        $berita = Berita::where('id_berita', $id)->first();
        $this->getBerita = $berita;
    }

    public function handleUpdated()
    {
        $this->showLivewireUpdate = false;
    }

    // delete
    public function delete($id)
    {
        $this->showLivewireDelete = true;

        $berita = Berita::where('id_berita', $id)->first();

        $this->getBerita = $berita->id_berita;
    }

    public function handleDeleted()
    {
        $this->showLivewireDelete = false;
    }

    public function handleCloseLivewire()
    {
        $this->showLivewireCreate = false;
        $this->showLivewireUpdate = false;
        $this->showLivewireDelete = false;
    }

    public function render()
    {
        return view('livewire.dashboard.berita.index', [
            'title' => 'SD Muhammadiyah Ambon | Dashboard - Berita',
            'icon' => '<i class="bi bi-newspaper"></i>',
            'title_page' => 'Berita',
            'profil' => ProfilInstansi::first(),
            'berita' => $this->search == null ?
                Berita::orderBy('id_berita', 'DESC')->paginate($this->paginate) :
                Berita::where('judul', 'like', '%' . $this->search . '%')->orderBy('id_berita', 'DESC')->paginate($this->paginate)
        ])->extends('dashboard-layouts.app')->section('container');
    }
}
