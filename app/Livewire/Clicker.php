<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class Clicker extends Component
{

    use WithPagination;

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
        $users = User::paginate(5);

        return view('livewire.clicker', [
            'users' => $users
        ]);
    }
}
