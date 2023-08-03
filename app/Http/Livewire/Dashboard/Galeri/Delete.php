<?php

namespace App\Http\Livewire\Dashboard\Galeri;

use App\Models\Galeri;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Delete extends Component
{
    public $closeModal = false;

    // data request
    public $idDelete;


    public function mount($galeri)
    {
        $this->idDelete = $galeri;
    }

    public function destroy($id)
    {
        $galeri = Galeri::where('id_galeri', $id)->first();

        if ($galeri->image) {
            Storage::delete($galeri->image);
        }

        Galeri::destroy('id_galeri', $id);

        $this->emit('deleted');

        $this->closeModal = true;

        session()->flash('message');
    }

    public function render()
    {
        return view('livewire.dashboard.galeri.delete');
    }
}
