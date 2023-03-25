<?php

namespace App\Http\Livewire\App;

use App\Http\Livewire\Component;

class Homepage extends Component
{
    public function render()
    {
        return view('livewire.app.homepage')->layout('layouts.app');
    }
}
