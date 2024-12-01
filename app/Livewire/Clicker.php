<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Clicker extends Component
{
    #[Rule('required|min:3|max:50')]
    public $name;

    #[Rule('required|email|unique:users')]
    public $email;

    #[Rule('required|min:6|max:50')]
    public $password;



    public function createNewUser()
    {
        $validated = $this->validate();

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password'])
        ]);

        $this->reset(['name', 'email', 'password']);
        request()->session()->flash('success', "User created successfully");
    }

    public function render()
    {
        $users = User::all();

        return view('livewire.clicker', [
            'users' => $users
        ]);
    }
}
