<?php

namespace App\Http\Livewire\Dashboard\Kelas;

use App\Models\Kelas;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $showLivewireCreate = false;
    public $showLivewireUpdate = false;
    public $showLivewireDelete = false;

    public $getKelas;

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

        $kelas = Kelas::where('id_kelas', $id)->first();
        $this->getKelas = $kelas;
    }

    public function handleUpdated()
    {
        $this->showLivewireUpdate = false;
    }

    // delete
    public function delete($id)
    {
        $this->showLivewireDelete = true;

        $kelas = Kelas::where('id_kelas', $id)->first();

        $this->getKelas = $kelas->id_kelas;
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
        return view('livewire.dashboard.kelas.index', [
            'title' => 'SD Muhammadiyah Ambon | Dashboard - Kelas Belajar',
            'icon' => '<i class="bi bi-box"></i>',
            'title_page' => 'Kelas Belajar',
            'kelas' => $this->search == null ?
                Kelas::orderBy('nama_kelas')->paginate($this->paginate) :
                Kelas::where('nama_kelas', 'like', '%' . $this->search . '%')->orderBy('nama_kelas')
                ->paginate($this->paginate)
        ])->extends('dashboard-layouts.app')->section('container');
    }
}
