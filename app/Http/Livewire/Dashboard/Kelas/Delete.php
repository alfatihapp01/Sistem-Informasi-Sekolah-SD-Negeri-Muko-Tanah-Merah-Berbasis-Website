<?php

namespace App\Http\Livewire\Dashboard\Kelas;

use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Delete extends Component
{
    public $closeModal = false;

    // data request
    public $idDelete;

    public function mount($kelas)
    {
        $this->idDelete = $kelas;
    }

    public function destroy($id)
    {

        $kelas = Kelas::where('id_kelas', $id)->first();

        $siswa = Siswa::where('id_kelas', $id)->get();

        if ($siswa) {
            foreach ($siswa as $data) {
                DB::table('siswa')->where('id_siswa', $data->id_siswa)->delete();
            }
        }

        Kelas::destroy('id_kelas', $id);

        $this->emit('deleted');

        $this->closeModal = true;

        session()->flash('message');
    }

    public function render()
    {
        return view('livewire.dashboard.kelas.delete');
    }
}
