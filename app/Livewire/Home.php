<?php

namespace App\Livewire;

use Livewire\Component;

class Home extends Component
{
    public array $breadcrumb = [
        ['lable' => 'Home', 'link' => '#'],
        // ['lable' => 'Layout', 'link' => '#']
    ];

    public function render()
    {
        return view('livewire.home');
    }
}
