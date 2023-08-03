<?php

namespace App\Http\Livewire\Dashboard\Home;

use App\Models\Galeri;
use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Siswa;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.dashboard.home.index', [
            'icon' => '<i class="bi bi-layout-text-sidebar-reverse"></i>',
            'title_page' => 'Dashboard',

            'kelas' => Kelas::get(),
            'siswa' => Siswa::get(),
            'guru' => Guru::get(),

           

        ])->extends('dashboard-layouts.app')->section('container');
    }
}
