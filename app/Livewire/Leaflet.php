<?php

namespace App\Livewire;

use Livewire\Component;

class Leaflet extends Component
{
    public array $breadcrumb = [
        ['lable' => 'Home', 'link' => '/livewire/home'],
        ['lable' => 'Leaflet', 'link' => '#']
    ];

    public function render()
    {
        return view('livewire.leaflet');
    }
}
