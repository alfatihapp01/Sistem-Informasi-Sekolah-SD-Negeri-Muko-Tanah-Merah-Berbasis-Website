<?php

namespace App\Http\Livewire\Dashboard\Jabatan;

use App\Models\Jabatan;
use Livewire\Component;

class Update extends Component
{
    public $closeModal = false;

    // data request
    public $nama_jabatan;
    public $idEdit;

    public function mount($jabatan)
    {
        $this->nama_jabatan = $jabatan['nama_jabatan'];

        $this->idEdit = $jabatan['id_jabatan'];
    }

    public function update($id)
    {
        $jabatan = Jabatan::where('id_jabatan', $id)->first();

        $rules = [
            'nama_jabatan' => 'required'
        ];

        if ($this->nama_jabatan != $jabatan->nama_jabatan) {
            $rules['nama_jabatan'] = 'required|max:255|unique:jabatan,nama_jabatan';
        }

        $this->validate($rules);

        Jabatan::where('id_jabatan', $id)->update([
            'nama_jabatan' => $this->nama_jabatan
        ]);

        $this->emit('updated');

        $this->closeModal = true;

        session()->flash('message');
    }

    public function render()
    {
        return view('livewire.dashboard.jabatan.update');
    }
}
