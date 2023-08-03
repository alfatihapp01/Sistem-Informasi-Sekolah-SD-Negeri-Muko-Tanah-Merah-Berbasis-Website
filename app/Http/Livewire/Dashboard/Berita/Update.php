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

class Update extends Component
{
    use WithFileUploads;

    public $closeModal = false;

    // data request
    public $judul;
    public $isi_berita;
    public $image;

    public $image_old;
    public $idEdit;

    public function mount($berita)
    {
        $this->judul = $berita['judul'];

        $this->isi_berita = $berita['isi'];

        $this->image_old = $berita['image'];

        $this->idEdit = $berita['id_berita'];
    }


    public function update($id)
    {
        $berita = Berita::where('id_berita', $id)->first();

        $rules  = [
            'judul' => 'required|max:255',
            'isi_berita' => 'required',
        ];

        if ($this->image) {
            $rules['image'] = 'required|image|max:2024';
        }

        $this->validate($rules);

        if ($this->image) {
            if ($this->image_old) {
                Storage::delete($this->image_old);
            }
            $imagePath = $this->image->store('berita');

            // $name = collect(explode('/', $imagePath))->last();

            $image = Image::make(Storage::get($imagePath))->resize(760, 320)->encode('jpg', 100);

            Storage::put($imagePath, $image);
        } else {
            $imagePath = $berita->image;
        }

        $slug = SlugService::createSlug(Berita::class, 'slug', $this->judul);

        Berita::where('id_berita', $id)->update([
            'slug' => $slug,
            'judul' => $this->judul,
            'excerpt' => Str::limit(strip_tags($this->isi_berita, 200)),
            'isi' => $this->isi_berita,
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
        return view('livewire.dashboard.berita.update');
    }
}
