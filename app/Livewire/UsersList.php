<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class UsersList extends Component
{
    use WithPagination;

    public $search;

    // #[On('user_created')]
    // public function updateList() {}

    // public function placeholder()
    // {
    //     return view('placeholder');
    // }

    public function update() {}

    public function render()
    {
        $users = User::latest()
            ->where('name', 'like', "%{$this->search}%")
            ->paginate(5);
        return view('livewire.users-list', [
            'users' => $users
        ]);
    }
}
