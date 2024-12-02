<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class RegisterForm extends Component
{

    use WithFileUploads;

    #[Rule('required|min:3|max:50')]
    public $name;

    #[Rule('required|email|unique:users')]
    public $email;

    #[Rule('required|min:6|max:50')]
    public $password;

    #[Rule('nullable|sometimes|image|max:5120')]
    public $image;

    public function create()
    {
        $validated = $this->validate();

        if ($this->image) {
            $validated['image'] = $this->image->store('uploads', 'public');
        }

        User::create($validated);

        $this->reset('name', 'email', 'password', 'image');

        session()->flash('success', 'User created.');
    }

    public function render()
    {
        return view('livewire.register-form');
    }
}
