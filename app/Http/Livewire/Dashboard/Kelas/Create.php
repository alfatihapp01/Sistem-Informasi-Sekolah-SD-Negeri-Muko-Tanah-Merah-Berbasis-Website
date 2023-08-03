<?php

namespace App\Http\Livewire\Dashboard\Kelas;

use App\Models\Kelas;
use Livewire\Component;

class Create extends Component
{
    public $closeModal = false;

    // data request
    public $nama_kelas;

    public function store()
    {
        $this->validate([
            'nama_kelas' => 'required|unique:kelas,nama_kelas',
        ]);

        Kelas::create([
            'nama_kelas' => strtoupper($this->nama_kelas)
        ]);

        $this->emit('stored');

        $this->closeModal = true;

        session()->flash('message');
    }

    public function render()
    {
        return view('livewire.dashboard.kelas.create');
    }
}
