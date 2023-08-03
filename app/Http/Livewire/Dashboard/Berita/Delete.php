<?php

namespace App\Http\Livewire\Dashboard\Berita;

use App\Models\Berita;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Delete extends Component
{
    public $closeModal = false;

    // data request
    public $idDelete;

    public function mount($berita)
    {
        $this->idDelete = $berita;
    }

    public function destroy($id)
    {
        $berita = Berita::where('id_berita', $id)->first();

        if ($berita->image) {
            Storage::delete($berita->image);
        }

        Berita::destroy('id_berita', $id);

        $this->emit('deleted');

        $this->closeModal = true;

        session()->flash('message');
    }

    public function render()
    {
        return view('livewire.dashboard.berita.delete');
    }
}
