<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class UsersList extends Component
{
    use WithPagination;

    #[On('user_created')]
    public function updateList() {}


    public function render()
    {
        $users = User::latest()->paginate(5);
        return view('livewire.users-list', [
            'users' => $users
        ]);
    }
}
