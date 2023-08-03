<?php

namespace App\Http\Livewire\Dashboard\User;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Str;

class Create extends Component
{
    public $closeModal = false;

    // data request
    public $nama;
    public $username;
    public $password;

    public function store()
    {
        $this->validate([
            'nama' => 'required|max:25',
            'username' => 'required|unique:users,username',
            'password' => 'required|min:8|max:255'
        ]);

        User::create([
            'nama' => $this->nama,
            'username' => $this->username,
            // 'username _verified_at'  => date('Y-m-d h:i:s'),
            'password' => password_hash($this->password, PASSWORD_DEFAULT),
            // 'remember_token' => Str::random(10),
            'level' => 0
        ]);

        $this->emit('stored');

        $this->closeModal = true;

        session()->flash('message');
    }

    public function render()
    {
        return view('livewire.dashboard.user.create');
    }
}
