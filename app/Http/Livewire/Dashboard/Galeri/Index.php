<?php

namespace App\Http\Livewire\Dashboard\Galeri;

use App\Models\Galeri;
use App\Models\ProfilInstansi;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $showLivewireCreate = false;
    public $showLivewireUpdate = false;
    public $showLivewireDelete = false;

    public $getGaleri;

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

        $galeri = Galeri::where('id_galeri', $id)->first();
        $this->getGaleri = $galeri;
    }

    public function handleUpdated()
    {
        $this->showLivewireUpdate = false;
    }

    // delete
    public function delete($id)
    {
        $this->showLivewireDelete = true;

        $galeri = Galeri::where('id_galeri', $id)->first();

        $this->getGaleri = $galeri->id_galeri;
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
        return view('livewire.dashboard.galeri.index', [
            'title' => 'SD Muhammadiyah Ambon | Dashboard - Galeri',
            'icon' => '<i class="bi bi-images"></i>',
            'title_page' => 'Galeri',
            'profil' => ProfilInstansi::first(),
            'galeri' => $this->search == null ?
                Galeri::orderBy('id_galeri', 'DESC')->paginate($this->paginate) :
                Galeri::where('judul', 'like', '%' . $this->search . '%')->orderBy('id_galeri', 'DESC')->paginate($this->paginate)
        ])->extends('dashboard-layouts.app')->section('container');
    }
}
