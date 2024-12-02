<?php

namespace App\Livewire;

use App\Models\Todo;
use Exception;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class TodoList extends Component
{
    use WithPagination;


    #[Rule('required|min:3|max:50')]
    public $name;

    public $search;

    public $editingTodoId;

    #[Rule('required|min:3|max:50')]
    public $editingTodoName;

    public function create()
    {
        // validate
        $validated = $this->validateOnly('name');
        //create todo
        Todo::create($validated);
        //clear the input
        $this->reset('name');
        //flash the message
        session()->flash('success', 'Created.');

        $this->resetPage();
    }

    public function delete($todoId)
    {
        try {
            Todo::findOrFail($todoId)->delete();
        } catch (Exception $e) {
            session()->flash('error', 'Failed to delete the todo!');
            return;
        }
    }

    public function toggle($todoId)
    {
        try {
            $todo = Todo::findOrFail($todoId);
            $todo->completed = !$todo->completed;
            $todo->save();
        } catch (Exception $e) {
            session()->flash('error', 'Failed to update the todo!');
            return;
        }
    }

    public function edit($todoId)
    {
        try {
            $this->editingTodoId = $todoId;
            $this->editingTodoName = Todo::findOrFail($todoId)->name;
        } catch (Exception $e) {
            session()->flash('error', 'Failed to find the todo!');
            return;
        }
    }

    public function cancelEditing()
    {
        $this->reset('editingTodoId', 'editingTodoName');
    }

    public function update()
    {
        try {
            $validated = $this->validateOnly('editingTodoName');
            Todo::findOrFail($this->editingTodoId)->update([
                'name' => $validated['editingTodoName']
            ]);

            $this->cancelEditing();
        } catch (Exception $e) {
            session()->flash('error', 'Failed to update the todo!');
            return;
        }
    }

    public function render()
    {
        $todos = Todo::latest()->where('name', 'like', "%{$this->search}%")->paginate(5);
        return view('livewire.todo-list', [
            'todos' => $todos
        ]);
    }
}
