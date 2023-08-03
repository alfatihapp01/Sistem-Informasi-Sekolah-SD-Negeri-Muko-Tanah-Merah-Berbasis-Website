<?php

namespace App\Http\Livewire\Dashboard\Siswa;

use App\Models\Kelas;
use App\Models\Siswa;
use Livewire\Component;
use Livewire\WithFileUploads;

class UpdateKelas extends Component
{
    use WithFileUploads;

    public $closeModal = false;

    // data request
    // public $sekolah;
    public $kelas;

    public $data_siswa;

    public $idEdit;


    public function mount($siswa)
    {
        $this->data_siswa = $siswa;

    }

    public function update()
    {
        $rules = [
            'kelas' => 'required',
        ];
        $this->validate($rules);

        $siswa = Siswa::whereIn('id_siswa', $this->data_siswa)->get();

        foreach ($siswa as $data) {
            siswa::where('id_siswa', $data->id_siswa)->update([
                'id_kelas' => $this->kelas,
            ]);
        }

        $this->emit('updatedKelas');

        $this->closeModal = true;

        session()->flash('message');
    }

    public function render()
    {
        return view('livewire.dashboard.siswa.update-kelas', [
            'dataKelas' => Kelas::orderBy('nama_kelas')->get()
        ]);
    }
}
