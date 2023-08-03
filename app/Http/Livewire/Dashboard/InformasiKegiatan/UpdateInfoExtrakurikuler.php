<?php

namespace App\Http\Livewire\Dashboard\InformasiKegiatan;

use App\Models\InformasiKegiatan;
use Livewire\Component;

class UpdateInfoExtrakurikuler extends Component
{
    public $closeModal = false;

    // data request
    public $info_ektrakurikuler;
    public $idUpdate;

    public function mount()
    {
        $informasi_kegiatan = InformasiKegiatan::first();
        $this->info_ektrakurikuler     = $informasi_kegiatan->info_ektrakurikuler;
        $this->idUpdate = $informasi_kegiatan->id;
    }

    public function store()
    {
        $this->validate([
            'info_ektrakurikuler' => 'required',
        ]);

        InformasiKegiatan::where('id', $this->idUpdate)->update([
            'info_ektrakurikuler' => $this->info_ektrakurikuler
        ]);

        $this->emit('stored_ekstrakurikuler');

        $this->closeModal = true;

        session()->flash('message');
    }

    public function render()
    {
        return view('livewire.dashboard.informasi-kegiatan.update-info-extrakurikuler');
    }
}
