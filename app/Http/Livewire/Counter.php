<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Redis;
use Livewire\Request;
use Livewire\Component;

class Counter extends Component
{
    public $count = '';
    public $name = '';
    public $lastname = '';
    public $email = '';
    public function increment(){
        $this->count++;
    }
    public function decrement(){
        $this->count--;
    }
    public function resetToZero(){
        $this->count = 0;
    }

    public function name(){
        $this->name = 'Zabihullah';
    }
    public function info(){
        $this->name;
        $this->lastname;
        $this->email;
    }

    public function render()
    {
        return view('livewire.counter');
    }
}
