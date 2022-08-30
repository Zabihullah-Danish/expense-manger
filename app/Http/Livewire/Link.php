<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Link extends Component
{
    public $routeName = '';
    public $linkText = '';
    public function render()
    {
        return view('livewire.link');
    }
}
