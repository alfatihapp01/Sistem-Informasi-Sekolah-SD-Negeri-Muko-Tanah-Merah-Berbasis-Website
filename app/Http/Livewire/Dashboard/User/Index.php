<?php

namespace App\Http\Livewire\Dashboard\User;

use App\Models\ProfilInstansi;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $showLivewireCreate = false;
    public $showLivewireDelete = false;
    public $showLivewireReset = false;

    public $getUser;

    public $paginate = 15;
    public $search;

    protected $paginationTheme = 'bootstrap';

    protected $listeners = [
        'stored' => 'handleStored',
        'reseted' => 'handleResetPassword',
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

    // delete
    public function delete($id)
    {
        $this->showLivewireDelete = true;

        $user = User::where('id', $id)->first();

        $this->getUser = $user->id;
    }

    public function handleDeleted()
    {
        $this->showLivewireDelete = false;
    }

    // reset
    public function resetPassword($id)
    {
        $this->showLivewireReset = true;

        $user = User::where('id', $id)->first();

        $this->emit('reset', $user);
    }

    public function handleResetPassword()
    {
        $this->showLivewireReset = false;
    }

    public function handleCloseLivewire()
    {
        $this->showLivewireCreate = false;
        $this->showLivewireReset = false;
        $this->showLivewireDelete = false;
    }

    public function render()
    {
        return view('livewire.dashboard.user.index', [
            'title' => 'SD Muhammadiyah Ambon | Dashboard - Daftar User',
            'icon' => '<i class="bi bi-people"></i>',
            'title_page' => 'Daftar User',

            'auth' => auth()->user(),
            'user' => $this->search == null ?
                User::orderBy('level')->paginate($this->paginate) :
                User::where('nama', 'like', '%' . $this->search . '%')->orderBy('level')->paginate($this->paginate)
        ])->extends('dashboard-layouts.app')->section('container');
    }
}
