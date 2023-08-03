<?php

namespace App\Http\Livewire\Dashboard\Video;

use App\Models\Video;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Delete extends Component
{
    public $closeModal = false;

    // data request
    public $idDelete;


    public function mount($video)
    {
        $this->idDelete = $video;
    }

    public function destroy($id)
    {
        $video = Video::where('id_video', $id)->first();

        if ($video->video) {
            Storage::delete($video->video);
        }

        Video::destroy('id_video', $id);

        $this->emit('deleted');

        $this->closeModal = true;

        session()->flash('message');
    }

    public function render()
    {
        return view('livewire.dashboard.video.delete');
    }
}
