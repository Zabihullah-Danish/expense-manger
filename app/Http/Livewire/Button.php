<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Button extends Component
{
    public $title = '';
    // public $submenu = false;
    public $items = [];

    public function subMenu(){
        $this->submenu = true;
    }
    public function render()
    {
        return view('livewire.button');
    }
}
