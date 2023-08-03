<?php

namespace App\Http\Livewire\Dashboard\Siswa;

use App\Models\Siswa;
use Livewire\Component;

class Delete extends Component
{
    public $closeModal = false;

    // data request
    public $nama;
    public $idDelete;


    public function mount($siswa)
    {
        $this->idDelete = $siswa;
    }

    public function destroy($id)
    {
        Siswa::destroy('id_siswa', $id);

        $this->emit('deleted');

        $this->closeModal = true;

        session()->flash('message');
    }

    public function render()
    {
        return view('livewire.dashboard.siswa.delete');
    }
}
