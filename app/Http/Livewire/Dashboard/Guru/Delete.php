<?php

namespace App\Http\Livewire\Dashboard\Guru;

use App\Models\Guru;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Delete extends Component
{
    public $closeModal = false;

    // data request
    public $idDelete;

    public function mount($guru)
    {
        $this->idDelete = $guru;
    }

    public function destroy($id)
    {
        $guru = Guru::where('id_guru', $id)->first();

        if ($guru->image) {
            Storage::delete($guru->image);
        }

        Guru::destroy('id_guru', $id);

        $this->emit('deleted');

        $this->closeModal = true;

        session()->flash('message');
    }

    public function render()
    {
        return view('livewire.dashboard.guru.delete');
    }
}
