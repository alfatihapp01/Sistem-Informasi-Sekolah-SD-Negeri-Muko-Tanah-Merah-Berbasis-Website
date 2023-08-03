<?php

namespace App\Http\Livewire\Dashboard\Galeri;

use App\Models\Galeri;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Intervention\Image\ImageManager;
use Intervention\Image\ImageManagerStatic as Image;

class Update extends Component
{
    use WithFileUploads;

    public $closeModal = false;

    // data request
    public $judul;
    public $image;

    public $image_old;
    public $idEdit;


    public function mount($galeri)
    {
        $this->judul = $galeri['judul'];

        $this->image_old = $galeri['image'];

        $this->idEdit = $galeri['id_galeri'];
    }

    public function update($id)
    {
        $galeri = Galeri::where('id_galeri', $id)->first();

        $rules  = [
            'judul' => 'required|max:255'
        ];

        if ($this->image) {
            $rules['image'] = 'required|image|max:2024';
        }

        $this->validate($rules);

        if ($this->image) {
            if ($this->image_old) {
                Storage::delete($this->image_old);
            }

            $imagePath = $this->image->store('galeri');

            // $name = collect(explode('/', $imagePath))->last();

            $image = Image::make(Storage::get($imagePath))->resize(760, 320)->encode('jpg', 100);

            Storage::put($imagePath, $image);
        } else {
            $imagePath = $galeri->image;
        }

        Galeri::where('id_galeri', $id)->update([
            'judul' => $this->judul,
            'image' => $imagePath,
        ]);

        $this->emit('updated');

        $this->cleanLiveWireTemp();

        $this->closeModal = true;

        session()->flash('message');
    }

    protected function cleanLiveWireTemp()
    {
        $storage = Storage::disk('public');

        foreach ($storage->allFiles('livewire-tmp') as $filePath) {
            $storage->delete($filePath);
        }
    }

    public function render()
    {
        return view('livewire.dashboard.galeri.update');
    }
}
