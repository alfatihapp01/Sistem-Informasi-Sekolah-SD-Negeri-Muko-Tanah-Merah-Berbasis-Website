<?php

namespace App\Http\Livewire\Dashboard\Siswa;

use App\Models\Siswa;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class DeleteDataArray extends Component
{
    public $closeModal = false;

    // data request
    public $data_siswa;
    public $idDelete;

    public function mount($siswa)
    {
        $this->data_siswa = $siswa;
        // dd($this->data_siswa);
    }

    public function destroy()
    {
        $siswa = Siswa::whereIn('id_siswa', $this->data_siswa)->get();

        foreach ($siswa as $data) {
            DB::table('siswa')->where('id_siswa', '=', $data->id_siswa)->delete();
        }

        $this->emit('deletedArray');

        $this->closeModal = true;

        session()->flash('message');
    }

    public function render()
    {
        return view('livewire.dashboard.siswa.delete-data-array');
    }
}
