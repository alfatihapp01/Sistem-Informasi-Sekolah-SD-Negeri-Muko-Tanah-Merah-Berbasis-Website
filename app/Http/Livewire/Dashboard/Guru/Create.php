<?php

namespace App\Http\Livewire\Dashboard\Guru;

use App\Models\Guru;
use App\Models\Jabatan;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $closeModal = false;

    // data request
    public $nama_instansi;
    public $nip;
    // public $nik;
    public $nama;
    public $tempat_lahir;
    // public $tanggal_lahir;
    public $jenis_kelamin;
    // public $status_tim_pengajar;
    public $nomor_telepon;
    public $alamat;
    public $image;
    public $email;
    public $jabatan;
    public $status;

    public $tanggal;
    public $bulan;
    public $tahun;


    public function store()
    {
        $rules = [
            'jabatan' => 'required',
            // 'status_tim_pengajar' => 'required',
            'status' => 'required',
            // // 'nik' => 'required|digits:16|unique:guru,nik',
            'nama' => 'required|max:255',
            // 'agama' => 'required|max:255',
            'tempat_lahir' => 'required|max:255',

            'tanggal' => 'required|max:255',
            'bulan' => 'required|max:255',
            'tahun' => 'required|digits:4',

            'jenis_kelamin' => 'required|max:255',
            'nomor_telepon' => 'required|max:16',
            'email' => 'required|email',
            'alamat' => 'required|max:255',
            // 'image' => 'required|image|max:2024',
        ];

        if ($this->image) {
            $rules['image'] =  'required|image|max:2024';
        }

        $this->validate($rules);

        if ($this->image) {
            $fileName = $this->image->store('guru');
        } else {
            $fileName = null;
        }

        $tanggal_lahir = $this->tanggal . ' ' . $this->bulan . ' ' . $this->tahun;

        Guru::create([
            'id_jabatan' => $this->jabatan,
            // // 'status_tim_pengajar' => $this->status_tim_pengajar,
            'nip' => $this->nip,
            'status' => $this->status,
            'nama' => strtoupper($this->nama),
            'tempat_lahir' => $this->tempat_lahir,
            'tanggal_lahir' => $tanggal_lahir,
            'jenis_kelamin' => $this->jenis_kelamin,
            // // 'agama' => $this->agama,
            'nomor_telepon' => $this->nomor_telepon,
            'alamat' => $this->alamat,
            'image' => $fileName,
            'email' => $this->email,
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
        return view('livewire.dashboard.guru.create', [
            'dataJabatan' => Jabatan::orderBy('id_jabatan', 'ASC')->get()
        ]);
    }
}
