<?php

namespace App\Http\Livewire\Dashboard\Kelas;

use App\Models\Kelas;
use Livewire\Component;

class Update extends Component
{
    public $closeModal = false;

    // data request
    public $nama_kelas;

    public $idEdit;

    public function mount($kelas)
    {

        $this->nama_kelas = $kelas['nama_kelas'];

        $this->idEdit = $kelas['id_kelas'];
    }

    public function update($id)
    {
        $kelas = Kelas::where('id_kelas', $id)->first();

        $rules  = [
            'nama_kelas' => 'required',
        ];

        if ($this->nama_kelas != $kelas->nama_kelas) {
            $rules['nama_kelas'] = 'required|unique:kelas,nama_kelas';
        }

        $this->validate($rules);

        Kelas::where('id_kelas', $id)->update([
            'nama_kelas' => strtoupper($this->nama_kelas),
        ]);

        $this->emit('updated');

        $this->closeModal = true;

        session()->flash('message');
    }

    public function render()
    {
        return view('livewire.dashboard.kelas.update');
    }
}
