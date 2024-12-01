<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class Clicker extends Component
{



    public function createNewUser()
    {
        User::create([
            'name' => "test user2",
            'email' => "test@mail2.com",
            'password' => "123456789"
        ]);
    }

    public function render()
    {
        $title = "Test";

        $users = User::all();

        return view('livewire.clicker', [
            'title' => $title,
            'users' => $users
        ]);
    }
}
