<?php

namespace App\Http\Livewire\Dashboard\Video;

use App\Models\ProfilInstansi;
use App\Models\Video;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $showLivewireCreate = false;
    public $showLivewireUpdate = false;
    public $showLivewireDelete = false;

    public $getVideo;

    public $paginate = 15;
    public $search;

    protected $paginationTheme = 'bootstrap';

    protected $listeners = [
        'stored' => 'handleStored',
        'updated' => 'handleUpdated',
        'deleted' => 'handleDeleted',

        'closeLivewire' => 'handleCloseLivewire'
    ];

    // create
    public function create()
    {
        $this->showLivewireCreate = true;
    }

    public function handleStored()
    {
        $this->showLivewireCreate = false;
    }

    // edit
    public function edit($id)
    {
        $this->showLivewireUpdate = true;

        $video = Video::where('id_video', $id)->first();
        $this->getVideo = $video;
    }

    public function handleUpdated()
    {
        $this->showLivewireUpdate = false;
    }

    // delete
    public function delete($id)
    {
        $this->showLivewireDelete = true;

        $video = Video::where('id_video', $id)->first();

        $this->getVideo = $video->id_video;
    }

    public function handleDeleted()
    {
        $this->showLivewireDelete = false;
    }

    public function handleCloseLivewire()
    {
        $this->showLivewireCreate = false;
        $this->showLivewireUpdate = false;
        $this->showLivewireDelete = false;
    }

    public function render()
    {
        return view('livewire.dashboard.video.index', [
            'title' => 'SD Muhammadiyah Ambon | Dashboard - Video',
            'icon' => '<i class="bi bi-camera-video"></i>',
            'title_page' => 'Video',
            'profil' => ProfilInstansi::first(),
            'video' => $this->search == null ?
                Video::orderBy('id_video', 'DESC')->paginate($this->paginate) :
                Video::where('judul', 'like', '%' . $this->search . '%')->orderBy('id_video', 'DESC')
                ->paginate($this->paginate)
        ])->extends('dashboard-layouts.app')->section('container');
    }
}
