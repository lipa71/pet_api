<?php

namespace App\Livewire\User;

use Livewire\Component;
use GuzzleHttp\Client;

class Register extends Component
{
    public function render()
    {
        return view('livewire.user.register');
    }
}
