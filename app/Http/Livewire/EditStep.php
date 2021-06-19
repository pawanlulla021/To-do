<?php

namespace App\Http\Livewire;

use Livewire\Component;

class EditStep extends Component
{
    public $count = 0;
    public  $steps;
    public $todo;

    public function mount($steps)
    {
        
        $this->steps = $steps;
        
    }
    public function increment()
    {
        $this->count++;
    }
    public function render()
    {
        return view('livewire.edit-step');
    }
}
