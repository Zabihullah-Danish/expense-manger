<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SubMenu extends Component
{   
    public $routeName = '';
    public $linkText = '';
    public function render()
    {
        return view('livewire.sub-menu');
    }
}
