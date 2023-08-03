<?php

namespace App\Http\Livewire\Dashboard\Guru;

use App\Models\Guru;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $showLivewireCreate = false;
    public $showLivewireUpdate = false;
    public $showLivewireDelete = false;
    public $showLivewireShow = false;

    public $getGuru;

    public $paginate = 15;
    public $search;

    protected $paginationTheme = 'bootstrap';

    protected $listeners = [
        'stored' => 'handleStored',
        'updated' => 'handleUpdated',
        'deleted' => 'handleDeleted',

        'closeLivewire' => 'handleCloseLivewire'
    ];

    // show
    public function show($id)
    {
        $this->showLivewireShow = true;

        $guru = Guru::where('id_guru', $id)->first();
        $this->getGuru = $guru;
    }

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

        $guru = Guru::where('id_guru', $id)->first();
        $this->getGuru = $guru;
    }

    public function handleUpdated()
    {
        $this->showLivewireUpdate = false;
    }

    // delete
    public function delete($id)
    {
        $this->showLivewireDelete = true;

        $guru = Guru::where('id_guru', $id)->first();

        $this->getGuru = $guru->id_guru;
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
        $this->showLivewireShow = false;
    }

    public function ExportExcel()
    {
        return redirect('/dashboard/guru/excel');
    }

    public function render()
    {
        return view('livewire.dashboard.guru.index', [
            'title' => 'SD Muhammadiyah Ambon | Dashboard - Data Guru',
            'icon' => '<i class="bi bi-people-fill"></i>',
            'title_page' => 'Data Guru',
            'guru' => $this->search == null ?
                Guru::orderBy('id_jabatan')->orderBy('nama')->paginate($this->paginate) :
                Guru::where('nama', 'like', '%' . $this->search . '%')->orderBy('nama')
                ->paginate($this->paginate)
        ])->extends('dashboard-layouts.app')->section('container');
    }
}
