<?php

namespace App\Livewire\Comps;

use Livewire\Component;

class TitlePage extends Component
{
    public $title;
    public $subTitle;
    public $breadcrumb = [];

    public function mount($title = null, $subTitle = null,  $breadcrumb = [])
    {
        $this->title = $title;
        $this->subTitle = $subTitle;
        $this->breadcrumb = $breadcrumb;
    }

    public function render()
    {
        return view('livewire.comps.title-page');
    }
}
