<?php

namespace App\Http\Livewire;

use App\Models\ProfilInstansi;
use App\Models\Video as ModelsVideo;
use Livewire\Component;
use Livewire\WithPagination;

class Video extends Component
{
    use WithPagination;

    public $video_opsi;
    public $showFullText = false;

    protected $paginationTheme = 'bootstrap';

    public $listeners = [
        'showOpsi' => 'handleShowOpsi'
    ];

    public function fullText()
    {
        $this->showFullText = true;
    }

    public function closeFullText()
    {
        $this->showFullText = false;
    }

    public function video_opsi($id)
    {
        $this->showFullText = false;

        $video = ModelsVideo::where('id_video', $id)->first();

        $this->video_opsi = $video;

        $this->emit('showOpsi');
    }

    public function handleShowOpsi()
    {
    }

    public function render()
    {
        return view('livewire.video', [
            'title' => 'Video Dokumentasi',
            'subtitle' => '<li>Media</li> <li>Video Dokumentasi</li>',
            'profil' => ProfilInstansi::first(),
            'video' => ModelsVideo::orderBy('id_video', 'DESC')->paginate(10),
            'video_terbaru' => ModelsVideo::orderBy('id_video', 'DESC')->limit(1)->first(),
        ])->layout('index');
    }
}
