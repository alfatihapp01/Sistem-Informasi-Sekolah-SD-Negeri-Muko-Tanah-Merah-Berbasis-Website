<?php

namespace App\Http\Livewire\Dashboard\InformasiKegiatan;

use App\Models\InformasiKegiatan;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $showLivewireCreateEkstrakurikuler = false;

    public $paginate = 15;
    public $search;

    protected $paginationTheme = 'bootstrap';

    protected $listeners = [
        'stored_ekstrakurikuler' => 'handleStoredEkstrakurikuler',

        'closeLivewire' => 'handleCloseLivewire'
    ];

    // create_ekstrakurikuler
    public function create_ekstrakurikuler()
    {
        $this->showLivewireCreateEkstrakurikuler = true;
    }


    public function handleStoredEkstrakurikuler()
    {
        $this->showLivewireCreateEkstrakurikuler = false;
    }

    public function handleCloseLivewire()
    {
        $this->showLivewireCreateEkstrakurikuler = false;
    }


    public function render()
    {
        return view('livewire.dashboard.informasi-kegiatan.index', [
            'title' => 'SD Muhammadiyah Ambon | Dashboard - Informasi Kegiatan',
            'icon' => '<i class="bi bi-info-square"></i>',
            'title_page' => 'Informasi Kegiatan',

            'informasi_kegiatan' => InformasiKegiatan::first()

        ])->extends('dashboard-layouts.app')->section('container');
    }
}
