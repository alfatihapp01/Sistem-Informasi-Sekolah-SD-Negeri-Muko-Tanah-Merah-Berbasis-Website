<?php

namespace App\Http\Livewire\Dashboard\Informasi;

use App\Models\Informasi;
use App\Models\ProfilInstansi;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $showLivewireCreate = false;
    public $showLivewireUpdate = false;
    public $showLivewireDelete = false;

    public $getInformasi;

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

        $informasi = Informasi::where('id_informasi', $id)->first();
        $this->getInformasi = $informasi;
    }

    public function handleUpdated()
    {
        $this->showLivewireUpdate = false;
    }

    // delete
    public function delete($id)
    {
        $this->showLivewireDelete = true;

        $informasi = Informasi::where('id_informasi', $id)->first();

        $this->getInformasi = $informasi->id_informasi;
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
        return view('livewire.dashboard.informasi.index', [
            'title' => 'SD Muhammadiyah Ambon | Dashboard - Pengumuman Sekolah',
            'icon' => '<i class="bi bi-megaphone"></i>',
            'title_page' => 'Pengumuman Sekolah',
            'profil' => ProfilInstansi::first(),
            'informasi' => $this->search == null ?
                Informasi::orderBy('id_informasi', 'DESC')->paginate($this->paginate) :
                Informasi::where('judul', 'like', '%' . $this->search . '%')
                ->orderBy('id_informasi', 'DESC')->paginate($this->paginate)
        ])->extends('dashboard-layouts.app')->section('container');
    }
}
