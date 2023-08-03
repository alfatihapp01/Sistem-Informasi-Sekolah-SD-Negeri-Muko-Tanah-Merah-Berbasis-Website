<?php

namespace App\Http\Livewire\Dashboard\Jabatan;

use App\Models\Jabatan;
use Livewire\Component;

class Create extends Component
{
    public $closeModal = false;

    // data request
    public $nama_jabatan;

    public function store()
    {
        $this->validate([
            'nama_jabatan' => 'required|max:255|unique:jabatan,nama_jabatan',
        ]);

        Jabatan::create([
            'nama_jabatan' => $this->nama_jabatan
        ]);

        $this->emit('stored');

        $this->closeModal = true;

        session()->flash('message');
    }

    public function render()
    {
        return view('livewire.dashboard.jabatan.create');
    }
}
