<?php

namespace App\Http\Livewire\Public;

use App\Http\Livewire\Component;

class Homepage extends Component
{
    public function render()
    {
        return view('livewire.public.homepage')->layout('layouts.public');
    }
}
