<?php

namespace App\Http\Livewire\Dashboard\Galeri;

use App\Models\Galeri;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Intervention\Image\ImageManager;
use Intervention\Image\ImageManagerStatic as Image;

class Create extends Component
{
    use WithFileUploads;

    public $closeModal = false;

    // data request
    public $judul;
    public $image;


    public function store()
    {
        $this->validate([
            'judul' => 'required|max:255',
            'image' => 'required|image|max:2024',
        ]);

        $imagePath = $this->image->store('galeri');

        // $name = collect(explode('/', $imagePath))->last();

        $image = Image::make(Storage::get($imagePath))->resize(760, 320)->encode('jpg', 100);

        Storage::put($imagePath, $image);


        Galeri::create([
            'judul' => $this->judul,
            'image' => $imagePath,
        ]);

        $this->emit('stored');

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
        return view('livewire.dashboard.galeri.create');
    }
}
