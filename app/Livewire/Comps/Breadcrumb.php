<?php

namespace App\Livewire\Comps;

use Livewire\Component;

class Breadcrumb extends Component
{
    public $title;
    public $breadcrumb = [];

    public function mount($title = null,  $breadcrumb = [])
    {
        $this->title = $title;
        $this->breadcrumb = $breadcrumb;
    }

    public function render()
    {
        return view('livewire.comps.breadcrumb');
    }
}
