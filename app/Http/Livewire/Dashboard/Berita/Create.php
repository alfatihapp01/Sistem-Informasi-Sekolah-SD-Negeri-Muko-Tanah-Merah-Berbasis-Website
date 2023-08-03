<?php

namespace App\Http\Livewire\Dashboard\Berita;

use App\Models\Berita;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Intervention\Image\ImageManager;
use Intervention\Image\ImageManagerStatic as Image;


class Create extends Component
{
    use WithFileUploads;

    public $closeModal = false;

    // data request
    public $judul;
    public $image;
    public $isi_berita;

    public function store()
    {
        $this->validate([
            'judul' => 'required|max:255',
            'isi_berita' => 'required',
            'image' => 'required|image|max:2024',
        ]);

        // $fileName = $this->image->store('berita');

        $imagePath = $this->image->store('berita');

        // $name = collect(explode('/', $imagePath))->last();

        $image = Image::make(Storage::get($imagePath))->resize(760, 320)->encode('jpg', 100);

        Storage::put($imagePath, $image);

        $slug = SlugService::createSlug(Berita::class, 'slug', $this->judul);

        Berita::create([
            'slug' => $slug,
            'judul' => $this->judul,
            'excerpt' => Str::limit(strip_tags($this->isi_berita, 200)),
            'isi' => $this->isi_berita,
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
        return view('livewire.dashboard.berita.create');
    }
}
