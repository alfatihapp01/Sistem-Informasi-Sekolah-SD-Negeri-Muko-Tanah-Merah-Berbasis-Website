<?php

namespace App\Http\Livewire\Dashboard\ProfilInstansi;

use App\Models\ProfilInstansi;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $closeModal = false;

    // data request
    public $nama_instansi;
    public $npsn;

    public $akreditas;
    public $status;
    public $no_sk_pendirian;
    public $tanggal_sk_pendirian;
    public $no_sk_operasional;
    public $tanggal_sk_operasional;
    public $operator;
    
    public $visi;
    public $misi;
    public $sejarah;
    public $kata_sambutan;
    public $latitude;
    public $longitude;
    public $kode_pos;
    public $alamat;
    public $kelurahan;
    public $kecamatan;
    public $kabupaten;
    public $provinsi;
    public $email;
    public $facebook;
    public $instagram;

    public $telepon;
    public $web;
    public $logo;
    public $struktur_organisasi;
    public $kepala_instansi;
    public $nip;
    public $fasilitas;

    public $logo_old;
    public $struktur_organisasi_old;

    public $idEdit;


    public function mount($instansi)
    {
        $this->nama_instansi = $instansi['nama_instansi'];
        $this->npsn = $instansi['npsn'];

        $this->operator = $instansi['operator'];
        $this->akreditas = $instansi['akreditas'];
        $this->status = $instansi['status'];
        $this->no_sk_pendirian = $instansi['no_sk_pendirian'];
        $this->tanggal_sk_pendirian = $instansi['tanggal_sk_pendirian'];
        $this->no_sk_operasional = $instansi['no_sk_operasional'];
        $this->tanggal_sk_operasional = $instansi['tanggal_sk_operasional'];

        $this->visi = $instansi['visi'];
        $this->misi = $instansi['misi'];
        $this->sejarah = $instansi['sejarah'];
        $this->kata_sambutan = $instansi['kata_sambutan'];
        $this->latitude = $instansi['latitude'];
        $this->longitude = $instansi['longitude'];
        $this->kode_pos = $instansi['kode_pos'];
        $this->alamat = $instansi['alamat'];
        $this->kelurahan = $instansi['kelurahan'];
        $this->kecamatan = $instansi['kecamatan'];
        $this->kabupaten = $instansi['kabupaten'];
        $this->provinsi = $instansi['provinsi'];
        $this->email = $instansi['email'];
        $this->facebook = $instansi['facebook'];
        $this->instagram = $instansi['instagram'];
        $this->telepon = $instansi['telepon'];
        $this->web = $instansi['web'];
        $this->kepala_instansi = $instansi['kepala_instansi'];
        $this->nip = $instansi['nip'];
        $this->fasilitas = $instansi['fasilitas'];

        $this->struktur_organisasi_old = $instansi['struktur_organisasi'];
        $this->logo_old = $instansi['logo'];

        $this->idEdit = $instansi['id'];
    }


    public function update($id)
    {
        $profil = ProfilInstansi::where('id', $id)->first();

        $rules = [
            'nama_instansi' => 'max:255',
            'npsn' => 'max:255',
            'kode_pos' => 'max:255',
            'alamat' => 'max:255',
            'kelurahan' => 'max:255',
            'kecamatan' => 'max:255',
            'kabupaten' => 'max:255',
            'provinsi' => 'max:255',
            'email' => 'email|max:255',
            'facebook' => 'max:255',
            'instagram' => 'max:255',
            'telepon' => 'max:255',
            'web' => 'max:255',
            'logo' => '',
            'struktur_organisasi' => '',
            'kepala_instansi' => 'max:255',
            'nip' => 'max:255',
            'visi' => '',
            'misi' => '',
            'sejarah' => '',
            'fasilitas' => '',
            'kata_sambutan' => '',
            'latitude' => 'max:255',
            'longitude' => 'max:255',

            'operator' => 'max:255',
            'akreditas' => 'max:255',
            'status' => 'max:255',
            'no_sk_pendirian' => 'max:255',
            'tanggal_sk_pendirian' => 'max:255',
            'no_sk_operasional' => 'max:255',
            'tanggal_sk_operasional' => 'max:255',
        ];

        if ($this->struktur_organisasi) {
            $rules['struktur_organisasi'] = 'image|max:2024';
        }

        if ($this->logo) {
            $rules['logo'] = 'image|max:2024';
        }

        $this->validate($rules);

        // struktur
        if ($this->struktur_organisasi) {
            if ($this->struktur_organisasi_old) {
                Storage::delete($this->struktur_organisasi_old);
            }

            $fileNameStruktur = $this->struktur_organisasi->store('profil-instansi');
        } else {
            $fileNameStruktur = $profil->struktur_organisasi;
        }
        // logo
        if ($this->logo) {
            if ($this->logo_old) {
                Storage::delete($this->logo_old);
            }

            $fileNameLogo = $this->logo->store('profil-instansi');
        } else {
            $fileNameLogo = $profil->logo;
        }

        ProfilInstansi::where('id', $id)->update([
            'nama_instansi' => $this->nama_instansi,
            'npsn' => $this->npsn,

            'akreditas' => $this->akreditas,
            'status' => $this->status,
            'no_sk_pendirian' => $this->no_sk_pendirian,
            'tanggal_sk_pendirian' => $this->tanggal_sk_pendirian,
            'no_sk_operasional' => $this->no_sk_operasional,
            'tanggal_sk_operasional' => $this->tanggal_sk_operasional,
            'operator' => $this->operator,

            'visi' => $this->visi,
            'misi' => $this->misi,

            'sejarah' => $this->sejarah,
            'kata_sambutan' => $this->kata_sambutan,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'kode_pos' => $this->kode_pos,
            'alamat' => $this->alamat,
            'kelurahan' => $this->kelurahan,
            'kecamatan' => $this->kecamatan,
            'kabupaten' => $this->kabupaten,
            'provinsi' => $this->provinsi,
            'email' => $this->email,
            'facebook' => $this->facebook,
            'instagram' => $this->instagram,
            'telepon' => $this->telepon,
            'web' => $this->web,
            'kepala_instansi' => $this->kepala_instansi,
            'nip' => $this->nip,
            'struktur_organisasi' => $fileNameStruktur,
            'logo' => $fileNameLogo,
            'fasilitas' => $this->fasilitas,
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
        return view('livewire.dashboard.profil-instansi.update');
    }
}
