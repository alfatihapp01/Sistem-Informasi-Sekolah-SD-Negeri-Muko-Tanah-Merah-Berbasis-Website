<?php

namespace App\Http\Livewire\Dashboard\Informasi;

use App\Models\Informasi;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class Create extends Component
{
    use WithFileUploads;

    public $closeModal = false;

    // data request
    public $judul;
    // public $image;
    public $isi_informasi;


    public function store()
    {
        $this->validate([
            'judul' => 'required|max:255',
            'isi_informasi' => 'required',
            // 'image' => 'required|image|max:2024',
        ]);

        $slug = SlugService::createSlug(Informasi::class, 'slug', $this->judul);

        Informasi::create([
            'slug' => $slug,
            'judul' => $this->judul,
            'excerpt' => Str::limit(strip_tags($this->isi_informasi, 200)),
            'isi' => $this->isi_informasi,
        ]);

        $this->emit('stored');

        // $this->cleanLiveWireTemp();

        $this->closeModal = true;

        session()->flash('message');
    }

    public function render()
    {
        return view('livewire.dashboard.informasi.create');
    }
}
