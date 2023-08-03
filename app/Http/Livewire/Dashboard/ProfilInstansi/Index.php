<?php

namespace App\Http\Livewire\Dashboard\ProfilInstansi;

use App\Models\ProfilInstansi;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $showLivewireCreate = false;
    public $showLivewireUpdate = false;
    public $showLivewireDelete = false;

    public $getInstansi;

    public $paginate = 15;
    public $search;

    protected $paginationTheme = 'bootstrap';

    protected $listeners = [
        'stored' => 'handleStored',
        'updated' => 'handleUpdated',
        'deleted' => 'handleDeleted',

        'closeLivewire' => 'handleCloseLivewire'
    ];

    // edit
    public function edit($id)
    {
        $this->showLivewireUpdate = true;

        $instansi = ProfilInstansi::where('id', $id)->first();
        $this->getInstansi = $instansi;
    }

    public function handleUpdated()
    {
        $this->showLivewireUpdate = false;
    }

    public function handleCloseLivewire()
    {
        $this->showLivewireCreate = false;
        $this->showLivewireUpdate = false;
        $this->showLivewireDelete = false;
    }



    public function render()
    {
        return view('livewire.dashboard.profil-instansi.index', [
            'title' => 'SD Muhammadiyah Ambon | Dashboard - Profil Instansi',
            'icon' => '<i class="bi bi-info-circle"></i>',
            'title_page' => 'Profil Instansi',
            'instansi' => ProfilInstansi::limit(1)->first()
        ])->extends('dashboard-layouts.app')->section('container');
    }
}
