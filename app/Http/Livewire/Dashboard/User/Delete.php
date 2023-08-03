<?php

namespace App\Http\Livewire\Dashboard\User;

use App\Models\Guru;
use App\Models\Operator;
use App\Models\Sekolah;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use PhpOffice\PhpSpreadsheet\Calculation\Engine\Operands\Operand;

class Delete extends Component
{
    public $closeModal = false;

    // data request
    public $level;
    public $nama;
    public $idDelete;

    public $sekolah;
    public $guru;

    public function mount($user)
    {
        $this->idDelete = $user;
    }

    public function destroy($id)
    {
        $user = User::where('id', $id)->first();

        User::destroy('id', $id);

        $this->emit('deleted');

        $this->closeModal = true;

        session()->flash('message');
    }

    public function render()
    {
        return view('livewire.dashboard.user.delete');
    }
}
