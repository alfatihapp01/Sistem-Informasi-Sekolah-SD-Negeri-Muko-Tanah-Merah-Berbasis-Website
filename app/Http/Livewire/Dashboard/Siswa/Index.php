<?php

namespace App\Http\Livewire\Dashboard\Siswa;

use App\Models\Kelas;
use App\Models\Siswa;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $showLivewireCreate = false;
    public $showLivewireUpdate = false;
    public $showLivewireUpdateKelas = false;
    public $showLivewireDelete = false;
    public $showLivewireDeleteArray = false;
    public $showLivewireShow = false;

    public $paginate = 20;
    public $search;
    public $search_nama;

    public $getSiswa;

    public $sekolah;
    public $kelas;
    public $id_siswa = [];

    protected $paginationTheme = 'bootstrap';

    protected $listeners = [
        'stored' => 'handleStored',
        'updated' => 'handleUpdated',
        'updatedKelas' => 'handleUpdatedKelas',
        'deleted' => 'handleDeleted',
        'deletedArray' => 'handleDeletedArray',

        'closeLivewire' => 'handleCloseLivewire'

    ];

    // show
    public function show($id)
    {
        $this->showLivewireShow = true;
        $siswa = Siswa::where('id_siswa', $id)->first();
        $this->getSiswa = $siswa;
    }

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

        $siswa = Siswa::where('id_siswa', $id)->first();
        $this->getSiswa = $siswa;
    }

    public function handleUpdated()
    {
        $this->showLivewireUpdate = false;
    }

    // edit data array kelas
    public function update_kelas()
    {
        $this->showLivewireUpdateKelas = true;

        $data_siswa = [];
        $data_siswa = $this->id_siswa;

        $this->getSiswa = $data_siswa;
    }

    public function handleUpdatedKelas()
    {
        $this->showLivewireUpdateKelas = false;
    }

    // delete data array
    public function delete_array()
    {
        $this->showLivewireDeleteArray = true;

        $data_siswa = [];
        $data_siswa = $this->id_siswa;
        $this->getSiswa = $data_siswa;
    }

    public function handleDeletedArray()
    {
        $this->showLivewireDeleteArray = false;
    }

    public function tanggal_lahir_invalid()
    {
    }

    // delete
    public function delete($id)
    {
        $this->showLivewireDelete = true;

        $siswa = Siswa::where('id_siswa', $id)->first();

        $this->getSiswa = $siswa->id_siswa;
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
        $this->showLivewireShow = false;
        $this->showLivewireUpdateKelas = false;
        $this->showLivewireDeleteArray = false;
    }

    public function ExportExcel()
    {
        return redirect('/dashboard/siswa/excel');
    }

    public function render()
    {

        // $siswa = null;
        if ($this->search_nama && !$this->search) {
            $siswa = Siswa::where('nama', 'like', '%' . $this->search_nama . '%')
                ->orderBy('nama');
        } else if ($this->search && !$this->search_nama) {
            $siswa = Siswa::where('id_kelas', 'like', '%' . $this->search . '%')
                ->orderBy('nama');
        } else if ($this->search && $this->search_nama) {
            $siswa = Siswa::where('id_kelas', 'like', '%' . $this->search . '%')
                ->where('nama', 'like', '%' . $this->search_nama . '%')
                ->orderBy('nama');
        } else {
            $siswa = Siswa::orderBy('id_kelas')->orderBy('nama');
        }

        return view('livewire.dashboard.siswa.index', [
            'title' => 'SD Muhammadiyah Ambon | Dashboard - Data Siswa',
            'icon' => '<i class="bi bi-people-fill"></i>',
            'title_page' => 'Data Siswa',

            'siswa' => $siswa->paginate($this->paginate),

            'dataKelas' => Kelas::orderBy('nama_kelas')->get()
        ])->extends('dashboard-layouts.app')->section('container');
    }
}
