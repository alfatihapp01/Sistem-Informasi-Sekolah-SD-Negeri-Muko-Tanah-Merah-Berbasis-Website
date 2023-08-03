<?php

namespace App\Http\Livewire\Dashboard\Video;

use App\Models\Video;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class Update extends Component
{
    use WithFileUploads;

    public $closeModal = false;

    // data request
    public $judul;
    public $keterangan;
    public $video;

    public $video_old;
    public $idEdit;


    public function mount($data_video)
    {
        $this->judul = $data_video['judul'];

        $this->keterangan = $data_video['isi'];

        $this->video_old = $data_video['video'];

        $this->idEdit = $data_video['id_video'];
    }

    public function update($id)
    {
        $video = Video::where('id_video', $id)->first();

        $rules  = [
            'judul' => 'required|max:255',
            'keterangan' => 'required',
        ];

        if ($this->video) {
            $rules['video'] = 'required|mimes:mp4,mov,3gp,avi,wmv | max:10240';
        }

        $this->validate($rules);

        if ($this->video) {
            if ($this->video_old) {
                Storage::delete($this->video_old);
            }
            $fileName = $this->video->store('video');
        } else {
            $fileName = $video->video;
        }

        $slug = SlugService::createSlug(Video::class, 'slug', $this->judul);

        Video::where('id_video', $id)->update([
            'slug' => $slug,
            'judul' => $this->judul,
            'excerpt' => Str::limit(strip_tags($this->keterangan, 200)),
            'isi' => $this->keterangan,
            'video' => $fileName,
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
        return view('livewire.dashboard.video.update');
    }
}
