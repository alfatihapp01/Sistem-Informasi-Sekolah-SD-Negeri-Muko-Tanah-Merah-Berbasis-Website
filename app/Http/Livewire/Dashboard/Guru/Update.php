<?php

namespace App\Http\Livewire\Dashboard\Guru;

use App\Models\Guru;
use App\Models\Jabatan;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
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
    public $nomor_telepon;
    // public $status_tim_pengajar;
    public $alamat;
    public $image;
    public $email;

    public $jabatan;
    public $status;

    public $tanggal;
    public $bulan;
    public $tahun;

    public $image_old;
    public $idEdit;


    public function mount($guru)
    {
        // $this->nama_instansi = $guru['id_sekolah'];
        $this->jabatan = $guru['id_jabatan'];
        $this->status = $guru['status'];
        $this->nip = $guru['nip'];
        // // $this->status_tim_pengajar = $guru['status_tim_pengajar'];
        $this->nama = $guru['nama'];
        // $this->agama = $guru['agama'];
        $this->tempat_lahir = $guru['tempat_lahir'];
        $this->jenis_kelamin = $guru['jenis_kelamin'];
        // $this->agama = $guru['agama'];
        $this->nomor_telepon = $guru['nomor_telepon'];
        $this->alamat = $guru['alamat'];
        $this->email = $guru['email'];

        if ($guru['tanggal_lahir']) {
            $tanggal_lahir = explode(' ', $guru['tanggal_lahir']);
            $this->tanggal = $tanggal_lahir[0];
            $this->bulan = $tanggal_lahir[1];
            $this->tahun = $tanggal_lahir[2];
        }

        $this->image_old = $guru['image'];

        $this->idEdit = $guru['id_guru'];
    }


    public function update($id)
    {
        $guru = Guru::where('id_guru', $id)->first();

        $rules  = [
            'jabatan' => 'required',
            'status' => 'required',
            'email' => 'required|email',
            // 'status_tim_pengajar' => 'required',
            'nama' => 'required|max:255',
            // 'agama' => 'required|max:255',
            'tempat_lahir' => 'required|max:255',

            'tanggal' => 'required|max:255',
            'bulan' => 'required|max:255',
            'tahun' => 'required|digits:4',

            'jenis_kelamin' => 'required|max:255',
            'nomor_telepon' => 'required|max:16',
            'alamat' => 'required|max:255',
            // 'image' => 'required|image|max:2024',
        ];

        // // if ($this->nik != $guru->nik) {
        // // $rules['nik'] = 'required|digits:16|unique:guru,nik';
        // }

        if ($this->image) {
            $rules['image'] = 'required|image|max:2024';
        }

        $this->validate($rules);

        if ($this->image) {
            if ($this->image_old) {
                Storage::delete($this->image_old);
            }
            $fileName = $this->image->store('guru');
        } else {
            $fileName = $guru->image;
        }

        $tanggal_lahir = $this->tanggal . ' ' . $this->bulan . ' ' . $this->tahun;

        Guru::where('id_guru', $id)->update([
            'id_jabatan' => $this->jabatan,
            // // 'status_tim_pengajar' => $this->status_tim_pengajar,
            'status' => $this->status,
            'nip' => $this->nip,
            // // 'nik' => $this->nik,
            'email' => $this->email,
            'nama' => strtoupper($this->nama),
            // 'agama' => $this->agama,
            'tempat_lahir' => $this->tempat_lahir,
            'tanggal_lahir' => $tanggal_lahir,
            'jenis_kelamin' => $this->jenis_kelamin,
            'nomor_telepon' => $this->nomor_telepon,
            'alamat' => $this->alamat,
            'image' => $fileName,
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
        return view('livewire.dashboard.guru.update', [
            'dataJabatan' => Jabatan::orderBy('id_jabatan', 'ASC')->get()
        ]);
    }
}
