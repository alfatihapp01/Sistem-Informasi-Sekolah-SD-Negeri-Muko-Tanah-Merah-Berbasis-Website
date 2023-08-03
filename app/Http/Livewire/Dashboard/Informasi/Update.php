<?php

namespace App\Http\Livewire\Dashboard\Informasi;

use App\Models\Informasi;
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
    public $isi_informasi;

    public $idEdit;

    public function mount($informasi)
    {
        $this->judul = $informasi['judul'];

        $this->isi_informasi = $informasi['isi'];

        $this->idEdit = $informasi['id_informasi'];
    }

    public function update($id)
    {
        $rules  = [
            'judul' => 'required|max:255',
            'isi_informasi' => 'required',
        ];

        $this->validate($rules);

        $slug = SlugService::createSlug(Informasi::class, 'slug', $this->judul);

        Informasi::where('id_informasi', $id)->update([
            'slug' => $slug,
            'judul' => $this->judul,
            'excerpt' => Str::limit(strip_tags($this->isi_informasi, 200)),
            'isi' => $this->isi_informasi,
        ]);

        $this->emit('updated');

        $this->closeModal = true;

        session()->flash('message');
    }

    public function render()
    {
        return view('livewire.dashboard.informasi.update');
    }
}
