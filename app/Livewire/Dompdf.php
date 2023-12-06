<?php

namespace App\Livewire;

use Livewire\Component;

class Dompdf extends Component
{
    public array $breadcrumb = [
        ['lable' => 'Home', 'link' => '/livewire/home'],
        ['lable' => 'Basic Crud', 'link' => '#']
    ];

    public function render()
    {
        return view('livewire.dompdf');
    }
}
