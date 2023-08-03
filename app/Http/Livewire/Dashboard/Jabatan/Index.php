<?php

namespace App\Http\Livewire\Dashboard\Jabatan;

use App\Models\Jabatan;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $showLivewireCreate = false;
    public $showLivewireUpdate = false;
    public $showLivewireDelete = false;

    public $getJabatan;

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

       $jabatan = Jabatan::where('id_jabatan', $id)->first();
       $this->getJabatan = $jabatan;
   }
   public function handleUpdated()
   {
       $this->showLivewireUpdate = false;
   }

    // delete
    public function delete($id)
    {
        $this->showLivewireDelete = true;

        $jabatan = Jabatan::where('id_jabatan', $id)->first();

        $this->getJabatan = $jabatan->id_jabatan;
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
        return view('livewire.dashboard.jabatan.index', [
            'title' => 'Sisipen Kurikulum 2013 | Dashboard - Jabatan Fungsional',
            'title_page' => 'Jabatan Fungsional',
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-fill-gear" viewBox="0 0 16 16">
            <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-9 8c0 1 1 1 1 1h5.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.544-3.393C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Zm9.886-3.54c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.306 1.175.308.87.869l-.075.136a.64.64 0 0 0 .382.92l.149.045c.612.18.612 1.048 0 1.229l-.15.043a.64.64 0 0 0-.38.921l.074.136c.305.561-.309 1.175-.87.87l-.136-.075a.64.64 0 0 0-.92.382l-.045.149c-.18.612-1.048.612-1.229 0l-.043-.15a.64.64 0 0 0-.921-.38l-.136.074c-.561.305-1.175-.309-.87-.87l.075-.136a.64.64 0 0 0-.382-.92l-.148-.045c-.613-.18-.613-1.048 0-1.229l.148-.043a.64.64 0 0 0 .382-.921l-.074-.136c-.306-.561.308-1.175.869-.87l.136.075a.64.64 0 0 0 .92-.382l.045-.148ZM14 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0Z"/>
            </svg>',
            'jabatan' => $this->search == null ?
                Jabatan::orderBy('id_jabatan', 'ASC')->paginate($this->paginate) :
                Jabatan::where('nama_jabatan', 'like', '%' . $this->search . '%')->orderBy('id_jabatan', 'ASC')->paginate($this->paginate)
        ])->extends('dashboard-layouts.app')->section('container');
    }
}
