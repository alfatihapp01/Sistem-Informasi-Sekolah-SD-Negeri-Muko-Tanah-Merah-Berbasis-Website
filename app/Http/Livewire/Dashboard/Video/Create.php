<?php

namespace App\Http\Livewire\Dashboard\Video;

use App\Models\Video;
use Illuminate\Support\Facades\Storage;
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
    public $video;
    public $keterangan;

    public function store()
    {
        $this->validate([
            'judul' => 'required|max:255',
            'keterangan' => 'required',
            'video' => 'required|mimes:mp4,mov,3gp,avi,wmv | max:10240',
        ]);

        $fileName = $this->video->store('video');

        $slug = SlugService::createSlug(Video::class, 'slug', $this->judul);

        Video::create([
            'slug' => $slug,
            'judul' => $this->judul,
            'excerpt' => Str::limit(strip_tags($this->keterangan, 200)),
            'isi' => $this->keterangan,
            'video' => $fileName,
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
        return view('livewire.dashboard.video.create');
    }
}
