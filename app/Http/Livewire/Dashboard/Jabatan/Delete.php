<?php

namespace App\Http\Livewire\Dashboard\Jabatan;

use App\Models\Guru;
use App\Models\Jabatan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Delete extends Component
{
    public $closeModal = false;

    // data request
    public $nama_jabatan;
    public $idDelete;


    public function mount($jabatan)
    {
        $this->idDelete = $jabatan;
    }

    public function destroy($id)
    {

        $guru = Guru::where('id_jabatan', $id)->get();

        if ($guru) {
            foreach ($guru as $data) {
                if ($data->image) {
                    Storage::delete($data->image);
                }
                DB::table('guru')->where('id_guru', '=', $data->id_guru)->delete();
            }
        }

        Jabatan::destroy('id_jabatan', $id);

        $this->emit('deleted');


        $this->closeModal = true;

        session()->flash('message');
    }

    public function render()
    {
        return view('livewire.dashboard.jabatan.delete');
    }
}
